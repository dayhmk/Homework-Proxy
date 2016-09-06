<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~michael_moran/?OpenItemURL=S084A1442");
	$text = util_split(REGEX_DAYS, $text, 1, 0);
	$text = util_split("/-----------------------/", $text, 0, 0);
	$text = util_split("/(english:|english)/i", $text, 1, 1);
	$text = util_split(REGEX_CLASSES, $text, 0, 0);
	$text = util_split("/(top of page)/i", $text, 0, SPLIT_ONE);

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~michael_moran/", "Mr.Moran's Website");
?>
