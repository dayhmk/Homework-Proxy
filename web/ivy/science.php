 <?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("https://sites.google.com/a/newton.k12.ma.us/adamson/homework");
	$text = util_split("/__________________/", $text, 1, SPLIT_AND_HIGHER);
	// Ok, maybe not perfect...
	$text = util_split("/You can also visit the Ivy Team Google Calendar to view the assignments from all of your classes/i", $text, 1, SPLIT_ONE);
	$text = util_split("/<\/tbody>/i", $text, 0, SPLIT_ONE);

	echo_json(finalize($text), "https://sites.google.com/a/newton.k12.ma.us/adamson/homework");
?>
