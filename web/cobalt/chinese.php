<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~qiao_mao/?OpenItemURL=S0CC27BD7");
	#$text = util_split('/<img src="\/Icons\/0" alt="" border="0" height="1" width="10">/i', $text, 1, 0);
	#Table 10 is the newest one
	$text = util_split('/<table[^>]*>/i', $text, 10, 0);
	$text = util_split('/<\/table>/i', $text, 0, 0);
	$text = util_split('/<div[^>]*>/i', $text, -1, 0);
	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~qiao_mao/");
?>
