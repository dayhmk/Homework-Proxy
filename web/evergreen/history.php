<?php
	header('Access-Control-Allow-Origin: https://dayhmk.github.io');
	require '../utils.php';

	$text = file_get_contents("http://www2.newton.k12.ma.us/~karen_brennan/?OpenItemURL=S09A8287C");
	$text = util_split("/All materials are in/i", $text, 1, SPLIT_ONE);
	$text = util_split('/<table[^>]*>/i', $text, 1, SPLIT_ONE);
	$text = util_split("/(top of page)/i", $text, 0, SPLIT_ONE);

	$year = (int)date("Y");
	$array = preg_split("/<tr>/i", $text);
	$text = "dsfsdfadf";
	unset($array[0]);
	$array = array_values($array);

	foreach ($array as $row) {
	  // Ignore rows that will APPEAR blank to a human
	  if(finalize($row) !== "") {
	    // Parse the date...
	    $tmp_date_info = util_split('/<td[^>]*>/i', $row, 1, SPLIT_ONE);
	    $tmp_date_info = util_split('/<\/td>/i', $tmp_date_info, 0, SPLIT_ONE);
	    $date_info = date_parse($tmp_date_info);
	    // If the month is January and the month of the post is
	    // December, subtract one from the year.
	    if(date("M") === "Jan" && date_info["month"] == 12) {
	      $date_info["year"] = ((int)date("Y"))-1;
	    } else {
	      $date_info["year"] = (int)date("Y");
	    }
	  
	    // Turn the date into a DateTime for comparison
	    $date_final = new DateTime("now");
	    $date_final->setDate($date_info["year"], $date_info["month"], $date_info["day"]);
	    // If the current date is PAST the post date...
	    // We don't want homework for Monday showing up on Thursday!
	    if(new DateTime("now") >= $date_final){
	      $text = util_split('/<td[^>]*>/i', $row, 2, SPLIT_ONE);
	      $text = util_split("/HW/i", $text, -1, SPLIT_ONE);
	      break 1;
	    }
	  }
	}

	echo_json(finalize($text), "http://www2.newton.k12.ma.us/~karen_brennan/?OpenItemURL=S09A8287C");
?>
