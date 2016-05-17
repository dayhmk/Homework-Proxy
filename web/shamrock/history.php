<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~tim_matthews/?OpenItemURL=S0CBFB329");
	$text = util_split(REGEX_MONTHS, $text, 1, SPLIT_ONE);
	$text = util_split("/(homework|homework:)/i", $text, 1, SPLIT_ONE);

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~tim_matthews/?OpenItemURL=S0CBFB329");
?>
