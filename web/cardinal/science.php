<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = util_blogspot("http://cardinalnationnews.blogspot.com/feeds/posts/default");
	$text = util_split("/(science:|science)/i", $text, 1, 1);
	$text = util_split("/(english|math|science|history)/i", $text, 0, 0);
	$text = util_split('/<a rel="nofollow"/i', $text, 0, 0);
	echo_json(finalize($text), "https://cardinalnationnews.blogspot.com/", "Cardinal Nation News");
?>
