<?php


require_once $conf->root_path.'/libs/Smarty.class.php';
require_once $conf->root_path.'/libs/Messages.class.php';
require_once $conf->root_path.'/app/kalkForm.class.php';
require_once $conf->root_path.'/app/kalkResul.class.php';

class CalcCtrl{
    private $msgs;   
	private $form;   
	private $result; 

	
	public function __construct(){
		
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}

   public function getParams(){
	$this->form->wysokoscKredytu = isset($_REQUEST['wysokoscKredytu']) ? $_REQUEST['wysokoscKredytu'] : null;
	$this->form->oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
	$this->form->lata = isset($_REQUEST['lata']) ? $_REQUEST['lata'] : null;
}

    /**
     * Walidacja parametrów
     * @return true jeśli brak błedów, false w przeciwnym wypadku
     */
public function validate(){
	
	
	
    if ( ! (isset($this->form->wysokoscKredytu) && isset($this->form->oprocentowanie) && isset($this->form->lata))) {
		
		return false;
	}
	
	
	
	if ( $this->form->wysokoscKredytu == "") {
		$this->msgs->addError('Nie podano wysokości');
	}
	if ( $this->form->oprocentowanie == "") {
		$this->msgs->addError('Nie podano oprocentowania');
	}
	if ( $this->form->lata == "") {
        $this->msgs->addError('Nie podano długości kredytu (lata)');
	}
	
	
	
	if (! $this->msgs->isError()) {
	
	if (! is_numeric( $this->form->wysokoscKredytu )) {
		$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
	}
	
	if (! is_numeric( $this->form->oprocentowanie )) {
		$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
	}	
	if (! is_numeric( $this->form->lata )) {
	    $this->msgs->addError('Trzecia wartość nie jest liczbą całkowitą');
	}
}
return ! $this->msgs->isError();
}

public function process(){
    $this->getparams();
    if ($this->validate()) {

    $infos [] = 'Parametry poprawne. Wykonuję obliczenia.';

	$this->form->wysokoscKredytu = intval($this->form->wysokoscKredytu);
	$this->form->oprocentowanie = intval($this->form->oprocentowanie);
	$this->form->lata = intval($this->form->lata);
	
	
	$this->result = ($this->form->wysokoscKredytu + $this->form->wysokoscKredytu * ($this->form->oprocentowanie / 100)) / ($this->form->lata * 12);
	$this->msgs->addInfo('Wykonano obliczenia.');
    }
	$this->generateView();
}



public function generateView(){
    global $conf;

$smarty = new Smarty();
$smarty->assign('conf',$conf);

    $smarty->assign('page_title','Kalkulator Kredytowy');
    $smarty->assign('page_description','Profesjonalne szablonowanie oparte na bibliotece smarty');
    $smarty->assign('page_header','Szablony smarty');
				
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/kalkulatorKredytowy.html');
}
}
?>