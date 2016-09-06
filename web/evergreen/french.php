<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~catherine_hibbard/?OpenItemURL=S062456B0");
	$text = util_split('/(janvier|février|mars|avril|mai|juin|juillet|août|septembre|octobre|novembre|décembre)/i', $text, -1, SPLIT_ONE);
	$text = util_split('/<div[^>]*>/i', $text, -3, SPLIT_AND_LOWER);
	$text = util_split('/(lundi|mardi|mercredi|jeudi|vendredi)/i', $text, -2, SPLIT_AND_LOWER);

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~catherine_hibbard/?OpenItemURL=S062456B0");
?>
