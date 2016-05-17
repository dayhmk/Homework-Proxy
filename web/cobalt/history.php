<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~michael_moran/?OpenItemURL=S053E12A4");
	$text = util_split("/(monday|tuesday|wednesday|thursday|friday|saturday|sunday)/i", $text, 1, 0);
	$text = util_split("/-----------------------/", $text, 0, 0);
	$text = util_split("/(history:|history|social studies|social studies:)/i", $text, 1, 1);
	$text = util_split("/(english|math|science|history|social studies|learning center)/i", $text, 0, 0);

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~michael_moran/", "Mr.Moran's Website");
?>
