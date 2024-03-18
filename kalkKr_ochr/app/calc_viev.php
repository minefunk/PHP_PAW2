<?php

?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Kalkulator kredytowy</title>
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>
	
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
<legend>Kalkulator kredytowy</legend>
	<label for="id_kwota">Podaj kwote: </label>
	<input id="id_kwota" type="text" name="kwota" value="<?php if(isset($kwota)) out($kwota) ?>" /><br />
	<label for="id_oprocentowanie">Podaj oprocentownanie: </label>
	<input id="id_oprocentowanie" type="text" name="oprocentowanie" value="<?php if(isset($oprocentowanie)) out($oprocentowanie) ?>" /><br />
    <label for="id_okres">Podaj okres splaty: </label>
	<input id="id_okres" type="text" name="okres" value="<?php if(isset($okres)) out($okres) ?>" />
	<label for="id_op">Wybierz: </label>
	<select name="op">
		<option value="lata">lata</option>
		<option value="mies">miesiace</option>
	</select><br />
	<input type="submit" value="Oblicz"  class="pure-button pure-button-primary" />
</form>	

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($rata)){ ?>
<div style="margin-top: 1em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
<?php echo 'Rata wynosi: '.number_format($rata, 2, ',', '.') .' zł '; ?>
</div>
<?php } ?>

</div>

</body>
</html>