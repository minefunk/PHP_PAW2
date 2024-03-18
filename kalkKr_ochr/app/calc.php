<?php
require_once dirname(__FILE__) . '/../config.php';
include _ROOT_PATH.'/app/security/check.php';

function getParams(&$kwota, &$oprocentowanie, &$okres, &$operation) {
    $kwota = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
    $oprocentowanie = isset($_REQUEST['oprocentowanie']) ? $_REQUEST['oprocentowanie'] : null;
    $okres = isset($_REQUEST['okres']) ? $_REQUEST['okres'] : null;
    $operation = isset($_REQUEST['op']) ? $_REQUEST['op'] : null;
}

function validate(&$kwota, &$oprocentowanie, &$okres, &$operation, &$messages) {
    global $role;
    if (!(isset($kwota) && isset($oprocentowanie) && isset($okres) && isset($operation))) {
        return false;
    }

    if ($kwota == "") {
        $messages [] = 'Nie podano kwoty';
    }
    if ($oprocentowanie == "") {
        $messages [] = 'Nie podano oprocentowania';
    }
    if ($okres == "") {
        $messages [] = 'Nie podano okresu czasu';
    }

    if (count($messages) != 0) return false;

    if (!is_numeric($kwota)) {
        $messages [] = 'Błąd: Podaj liczbę w Kwota';
    }
    if (!is_numeric($oprocentowanie)) {
        $messages [] = 'Błąd: Podaj liczbę w Oprocentowanie';
    }
    if (!is_numeric($okres)) {
        $messages [] = 'Błąd: Podaj liczbę w Okres czasu';
    }

    if ($kwota < 0) {
        $messages [] = 'Kwota nie może być ujemna';
    }
    if ($oprocentowanie < 0) {
        $messages [] = 'Oprocentowanie nie może być ujemne';
    }
    if ($okres < 0) {
        $messages [] = 'Okres czasu nie może być ujemny';
    }
    //ustawienie dla role ograniczenia dla uzytkownika user
  if ($role === 'user') {
        if ($oprocentowanie < 8 || $oprocentowanie > 100) {
            $messages[] = 'Dla roli "user", oprocentowanie musi być większe niż 8 i równe lub mniejsze niż 100';
        }
    }

    return (count($messages) == 0);
}

function process(&$kwota, &$oprocentowanie, &$operation, &$messages, &$rata, &$okres) {
    if ($oprocentowanie == 0) {
        $messages [] = 'Oprocentowanie nie może być zerowe';
        return;
    }

    $kwota = floatval($kwota);
    $oprocentowanie = floatval($oprocentowanie);
    $okres = intval($okres);

    switch ($operation) {
        case 'lata':
            $oproc_mies = ($oprocentowanie / 100) / 12;
            $okres_mies = $okres * 12;
            $rata = ($kwota * $oproc_mies) / (1 - pow(1 + $oproc_mies, -$okres_mies));
            break;
        case 'mies':
            $oproc_mies = ($oprocentowanie / 100) / 12;
            $rata = ($kwota * $oproc_mies) / (1 - pow(1 + $oproc_mies, -$okres));
            break;
    }
}

$kwota = null;
$oprocentowanie = null;
$operation = null;
$okres = null;
$rata = null;
$messages = array();

getParams($kwota, $oprocentowanie, $okres, $operation);
if (validate($kwota, $oprocentowanie, $okres, $operation, $messages)) {
    process($kwota, $oprocentowanie, $operation, $messages, $rata, $okres);
}
include 'calc_viev.php';
?>
