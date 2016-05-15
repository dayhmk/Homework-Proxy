<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';
	$text = file_get_contents("http://www2.newton.k12.ma.us/~anna_prada/?OpenItemURL=S0CBD5057");
	# Search for the heading in the table
	$text = util_split("/date due/i", $text, 1, 1);
	# Get a list of table rows
	$array = preg_split("/<tr>/i", $text);
	$text = "";
	for($i = 0, $size = count($array); $i<$size; $i++) {
		$tdArray = preg_split("/<td>/i", $array[$i]);
		# Don't process empty tags
		if(strip_tags($tdArray[1]) != "" || strip_tags($tdArray[2]) != ""){
			# Uitls will trim out the leading <br>
			$text = $text."<br><br>".$tdArray[1]." due ".$tdArray[2];
		}
	}
	# Don't just leave the box blank!
	if(strip_tags($text) == ""){
		$text = "None!";
	}
	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~anna_prada/");
?>
