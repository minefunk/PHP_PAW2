<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/libs/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['opro'] = isset($_REQUEST['opro']) ? $_REQUEST['opro'] : null;
	$form['czas'] = isset($_REQUEST['czas']) ? $_REQUEST['czas'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kwota']) && isset($form['opro']) && isset($form['czas']) ))	return false;	
	
	//parametry przekazane zatem
	//nie pokazuj wstępu strony gdy tryb obliczeń (aby nie trzeba było przesuwać)
	// - ta zmienna zostanie użyta w widoku aby nie wyświetlać całego bloku itro z tłem 
	$hide_intro = true;

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kwota'] == "") $msgs [] = 'Nie podano kwoty';
	if ( $form['opro'] == "") $msgs [] = 'Nie podano oprocentowania';
	if ( $form['czas'] == "") $msgs [] = 'Nie podano czasu';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $kwota i $opro są liczbami całkowitymi
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Kwota musi być liczbą';
		if (! is_numeric( $form['opro'] )) $msgs [] = 'Oprocentowanie musi być liczbą';
		if (! is_numeric( $form['czas'] )) $msgs [] = 'Czas ma być podany liczbowo';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Wykonuję obliczenia.';
	
	//konwersja parametrów na int
	$form['kwota'] = floatval($form['kwota']);
	$form['opro'] = floatval($form['opro']);
	$form['czas'] = floatval($form['czas']);
	

	$oproc_mies = ($form['opro']/100)/12;
    $result = ($form['kwota'] * $oproc_mies)/(1-pow(1+$oproc_mies, -$form['czas']));
	$result = number_format($result, 2);
	//wykonanie operacji
	/*switch ($form['czas']) {
	case 'minus' :
		$result = $form['kwota'] - $form['opro'];
		$form['op_name'] = '-';
		break;
	case 'times' :
		$result = $form['kwota'] * $form['opro'];
		$form['op_name'] = '*';
		break;
	case 'div' :
		$result = $form['kwota'] / $form['opro'];
		$form['op_name'] = '/';
		break;
	default :
		$result = $form['kwota'] + $form['opro'];
		$form['op_name'] = '+';
		break;
	}
*/
}


//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
$hide_intro = false;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Przykład 04');
$smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece Smarty');
$smarty->assign('page_header','Szablony Smarty');

$smarty->assign('hide_intro',$hide_intro);

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');