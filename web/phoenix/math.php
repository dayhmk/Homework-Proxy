<?php
	header('Access-Control-Allow-Origin: http://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~millos/?OpenItemURL=S07EAED39");
	$text = util_split("/(january|february|march|april|may|june|july|august|september|october|november|december)/i", $text, 1, 0);
	$text = util_split("/(math:|math)/i", $text, 1, 1);
	$text = util_split("/(english|math|science|history|Social Studies)/i", $text, 0, 0);
	echo strip_tags($text, '<br>');
?>
