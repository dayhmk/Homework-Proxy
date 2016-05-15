<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~courtney_fournier/?OpenItemURL=S08BD3AB2");
	$text = util_split('/(enero|febrero|marzo|abril|mayo|junio|julio|agosto|septiembre|octubre|noviembre|diciembre)/i', $text, -1, 0);
	$text = util_split('/<div[^>]*>/i', $text, -4, -1);
	echo_json(finalize($text, '<br>'), "http://www2.newton.k12.ma.us/~courtney_fournier/?OpenItemURL=S08BD3AB2");
?>
