<?php
	header('Access-Control-Allow-Origin: http://dayhmk.github.io');
	require '../utils.php';
	$text = util_blogspot("http://fireteamhistory.blogspot.com/feeds/posts/default/");
	$text = strip_tags($text, '<br>');
	echo util_split("/(homework:|homework)/i", $text, 1, 1);
?>
