<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~lauren_buckman/?OpenItemURL=S0D161504");
	$text = util_split("/<img src=\"http:\/\/www2.newton.k12.ma.us\/~lauren_buckman\//i", $text, 1, SPLIT_ONE);
	$text = util_split("/____/i", $text, 0, SPLIT_ONE);
	$text = util_split("/(social studies|social studies:)/i", $text, 1, SPLIT_AND_HIGHER);
	$text = util_split(REGEX_CLASSES, $text, 0, SPLIT_ONE);
	$text = util_split("/(top of page)/i", $text, 0, SPLIT_ONE);

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~lauren_buckman/?OpenItemURL=S0D161504", "Learning Center");
?>
