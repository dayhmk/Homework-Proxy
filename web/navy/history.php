<?php
	header('Access-Control-Allow-Origin: http://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~kathy_maher/?OpenItemURL=S054D0D5C");
	$text = util_split("/for Navy English and Social Studies/i", $text, 1, 1);
	$text = util_split('/<table[^>]*>/i', $text, 1, 0);
	$text = preg_split('/<tr[^>]*>/i', $text)[3];
	$text = preg_split('/<td[^>]*>/i', $text)[2];
	echo strip_tags($text, '<br>');
?>
