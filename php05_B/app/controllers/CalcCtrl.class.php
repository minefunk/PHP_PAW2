<?php

namespace app\controllers;
use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {

	private $form;  
	private $result; 


	public function __construct(){
		
		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	

	public function getParams(){
		$this->form->kwota = getFromRequest('kwota');
		$this->form->opro = getFromRequest('opro');
		$this->form->czas = getFromRequest('czas');
	}
	
	
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
	

	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			
			$this->form->kwota = intval($this->form->kwota);
			$this->form->opro = intval($this->form->opro);
            $this->form->czas = intval($this->form->czas);
			getMessages()->addInfo('Parametry poprawne.');
				
			
			
					// $this->result->result = $this->form->kwota - $this->form->opro;
					$oproc_mies = ($this->form->opro/100)/12;
                    $this->result->result = ($this->form->kwota * $oproc_mies)/(1-pow(1+$oproc_mies, -$this->form->czas));
	                $this->result->result = number_format($this->result->result, 2);
					
			
					getMessages()->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
	}
	
	

	public function generateView(){
		getSmarty()->assign('page_title','Przykład 05b');
		getSmarty()->assign('page_description','Aplikacja z jednym "punktem wejścia". Zmiana w postaci nowej struktury foderów, skryptu inicjalizacji oraz pomocniczych funkcji.');
		getSmarty()->assign('page_header','Kontroler główny');
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
}
}