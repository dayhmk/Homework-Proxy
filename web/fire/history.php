<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = util_blogspot("http://fireteamhistory.blogspot.com/feeds/posts/default/", "homework");
	$text = strip_tags($text, '<br>');
	$text = util_split("/(homework:|homework)/i", $text, 1, 1);
	echo finalize($text, '<br>');
?>
