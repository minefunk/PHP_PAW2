<?php



require_once $conf->root_path.'/Smarty/libs/Smarty.class.php';
require_once $conf->root_path.'../Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

/** Kontroler kalkulatora
 * @author Przemoprosław Kudłacik
 *
 */
class CalcCtrl {

	private $msgs;   
	private $infos;  
	private $form;   
	private $result; 
	private $hide_intro; 


	public function __construct(){
		
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->kwota = isset($_REQUEST ['kwota']) ? $_REQUEST ['kwota'] : null;
		$this->form->opro = isset($_REQUEST ['opro']) ? $_REQUEST ['opro'] : null;
		$this->form->czas = isset($_REQUEST ['czas']) ? $_REQUEST ['czas'] : null;
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnoprom wopropadku 
	 */
	public function validate() {
		
		if (! (isset ( $this->form->kwota ) && isset ( $this->form->opro ) && isset ( $this->form->czas ))) {
			
			return false; 
		} else { 
			$this->hide_intro = true; 
		}
		
		
		if ($this->form->kwota == "") {
			$this->msgs->addError('Nie podano kwoty');
		}
		if ($this->form->opro == "") {
			$this->msgs->addError('Nie podano oprocentowania');
		}
        if ($this->form->czas == "") {
			$this->msgs->addError('Nie podano czasu');
		}
		
		if (! $this->msgs->isError()) {
			
			
			if (! is_numeric ( $this->form->kwota )) {
				$this->msgs->addError('Kwota ma być zapisania liczbowo');
			}
			
			if (! is_numeric ( $this->form->opro )) {
				$this->msgs->addError('Oprocentowanie ma być zapisania liczbowo');
			}
            if (! is_numeric ( $this->form->czas )) {
				$this->msgs->addError('Czas ma być zapisania liczbowo');
			}
		}
		
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i woproświetlenie
	 */
	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			
			$this->form->kwota = intval($this->form->kwota);
			$this->form->opro = intval($this->form->opro);
            $this->form->czas = intval($this->form->czas);
			$this->msgs->addInfo('Parametropro poprawne.');
				
			
			
					// $this->result->result = $this->form->kwota - $this->form->opro;
					$oproc_mies = ($this->form->opro/100)/12;
                    $this->result->result = ($this->form->kwota * $oproc_mies)/(1-pow(1+$oproc_mies, -$this->form->czas));
	                $this->result->result = number_format($this->result->result, 2);
					
			
			$this->msgs->addInfo('Woprokonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	
	/**
	 * Woprogenerowanie widoku
	 */
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Przoprokład 05');
		$smarty->assign('page_description','Obiektowość. Funkcjonalność aplikacji zamknięta w metodach różnoproch obiektów. Pełen model MVC.');
		$smarty->assign('page_header','Obiektopro w PHP');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc/CalcView.html');
	}
}
