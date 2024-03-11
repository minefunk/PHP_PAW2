<?php
require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];
$operation = $_REQUEST ['op'];

if ( ! (isset($x) && isset($y) && isset($z))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $z == "") {
	$messages [] = 'Nie podano okrsu czasu';
}

if (empty( $messages )) {
	
	
	if (! is_numeric( $x )) {
		$messages [] = 'Brak kwoty(podaj liczbe)';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Brak oprocentowania(podaj liczbe)';
	}	
    if (! is_numeric( $z )) {
        $messages [] = 'Brak okrsu czasu(podaj liczbe)';
    }
    if($x<0){
        $messages [] = 'Kwota nie moze byc ujemna';
    }
    if($y<0){
        $messages [] = 'Oprocentowanie nie moze byc ujemna';
    }
    if($z<0){
        $messages [] = 'Okres czasu nie moze byc ujemna';
    }
}
if (empty ( $messages )) { 
	
        
        $x = floatval($x);
        $y = floatval($y);
        $z = intval($z);
        switch($operation){
            case 'lata':
        $oproc_mies = ($y/100)/12;
        $okres = $z * 12;
        $rata = ($x * $oproc_mies)/(1-pow(1+$oproc_mies, -$okres));
        break;
        case 'mies':
            $oproc_mies = ($y/100)/12;
            $rata = ($x * $oproc_mies)/(1-pow(1+$oproc_mies, -$z));
            break;
}
        
}
include 'calc_viev.php';
