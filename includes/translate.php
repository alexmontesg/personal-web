<?php
function getAge() {
	$dia = date('j');
	$mes = date('n');
	$ano = date('Y');
	$dianaz = 12;
	$mesnaz = 11;
	$anonaz = 1990;
	if (($mesnaz == $mes && $dianaz > $dia) || $mesnaz > $mes) {
		$ano = ($ano - 1);
	}
	return ($ano - $anonaz);
}


function translate($phrase) {
	echo translateNoEcho($phrase);
}

function translateNoEcho($phrase) {
	switch ($_SERVER['HTTP_ACCEPT_LANGUAGE']) {
		case 'es':
			require './lang/es.php';		
			return $dicc[$phrase];
		default:
			require './lang/en.php';
			return $dicc[$phrase];
	}
}
?>
	