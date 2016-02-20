<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	date_default_timezone_set("America/New_York");
	
	$text = file_get_contents("http://www2.newton.k12.ma.us/~cassandra_spittel/?OpenItemURL=S0B3E6873");
	$text = util_split('/<div align="center">/i', $text, 1, 0);
	$text = util_split('/<table[^>]*>/i', $text, 1, 0);
	$text = util_split('/<\/table>/i', $text, 0, 0);
	$text = preg_split('/<tr>/i', $text)[2];
	$day = getdate()["wday"];
	if($day == 0 || $day == 5 || $day == 6){
		$text = preg_split('/<td[^>]*>/i', $text)[2];
	}else{
		$text = preg_split('/<td[^>]*>/i', $text)[$day+2];
	}
	$text = str_replace('due today:', '', $text);
	echo finalize($text);
?>
