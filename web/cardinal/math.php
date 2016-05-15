<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~sarah_nitsche?OpenItemURL=S04B9F0E6");
	$text = util_split("/(january|february|march|april|may|june|july|august|september|october|november|december)/i", $text, 1, 0);
	$text = util_split("/<\/u>/i", $text, 1, 1);
	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~sarah_nitsche?OpenItemURL=S04B9F0E6");
?>
