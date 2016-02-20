<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = util_rss("https://zappdragons.wordpress.com/feed", "homework");
	$text = util_split("/(science:|science)/i", $text, 1, 1);
	$text = util_split("/(english|math|science|history)/i", $text, 0, 0);
	$text = util_split('/<a rel="nofollow"/i', $text, 0, 0);
	echo finalize($text);
?>
