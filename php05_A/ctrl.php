<?php
require_once 'init.php';


switch ($action) {
	default : // 'calcView'
	    // załaduj definicję kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->generateView ();
	break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once 'app/controllers/CalcCtrl.class.php';
		// utwórz obiekt i uzyj
		$ctrl = new CalcCtrl ();
		$ctrl->process ();
	break;
	case 'action1' :
		// zrób coś innego ...
		print('hello');
	break;
	case 'action2' :
		// zrób coś innego ...
		print('goodbye');
	break;
}
