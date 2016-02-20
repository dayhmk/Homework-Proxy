<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~benjamin_gresser/?OpenItemURL=S0B6220A6");
	$text = util_split("/<b>new<\/b>/i", $text, 1, 1);
	$text = util_split('/<table[^>]*>/i', $text, 1, 0);
	$text = preg_split('/<tr[^>]*>/i', $text)[2];
	$text = preg_split('/<td[^>]*>/i', $text)[3];
	$text = util_split("/homework/i", $text, 0, 1);
	echo finalize($text);
?>
