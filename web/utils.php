<?php
	// Constants
	// See util_split. These are constants for $dir
	define("SPLIT_AND_LOWER", -1);
	define("SPLIT_AND_HIGHER", 1);
	define("SPLIT_ONE",        0);
	// Regex constants. These are just useful!
	define("REGEX_CLASSES", "/(english|ela|math|science|history|social studies|learning center|academic support)/i");
	define("REGEX_MONTHS", "/(january|february|march|april|may|june|july|august|september|october|november|december)/i");
	define("REGEX_DAYS", "/(monday|tuesday|wednesday|thursday|friday|saturday|sunday)/i");
	
	// An extended split function. $n is the index the split starts
	// or ends at. If it is negative, it is added to the length
	// of the split. $dir is the direction of the array inclusion.
	// If it is negative it returns anything less than $n. If it
	// is positive, it returns everying greater than $n. If it is
	// zero, it returns $n.
	function util_split($pattern, $str, $n, $dir){
		$array = preg_split($pattern, $str);
		if($n<0){
			$n = sizeof($array)+$n;
		}
		$text = '';
		for($i = 0; $i < count($array); $i++){
			if(($dir == 0 && $i == $n) ||
				($dir < 0 && $i <= $n) ||
				($dir > 0 && $i >= $n)){
				$text = $text.$array[$i];
			}
		}
		return $text;
	}
	
	// Grabs a rss feed
	function util_rss($url, $filter){
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($url);
		$items=$xmlDoc->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');
		foreach($items as $item){
			if($filter == "" || stripos($item->getElementsByTagName('title')->item(0)->nodeValue, $filter) !== false){
				return $item->getElementsByTagName('encoded')->item(0)->childNodes->item(0)->nodeValue;
			}
		}
		return null;
	}
	
	// Grabs a blogspot feed
	function util_blogspot($url){
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($url);
		$items=$xmlDoc->getElementsByTagName('feed')->item(0)->getElementsByTagName('entry');
		return $items->item(0)->getElementsByTagName('content')->item(0)->childNodes->item(0)->nodeValue;
	}

	function trimStart($str, $prefix){
		while (substr($str, 0, strlen($prefix)) == $prefix) {
    			$str = trim(substr($str, strlen($prefix)));
		} 
		return $str;
	}

	function trimEnd($str, $prefix){
		while (substr($str, strlen($str)-strlen($prefix), strlen($prefix)) == $prefix) {
    			$str = trim(substr($str, 0, strlen($str)-strlen($prefix)));
		} 
		return $str;
	}

	function finalize($text){
		//Remove all HTML tags EXCEPT <br>
		$text = strip_tags($text, '<br><ol><li>');
		//Make </br>, <br />, or any variation of <br> into <br>
		$text = preg_replace("/<\s*\/\s*br\s*>|<\s*br\s*\/\s*>/i","<br>",$text);
		$text = trim($text, chr(0xC2).chr(0xA0).chr(0x3A).chr(0x0D).chr(0x0A));
		$text = trimStart($text, "<br>");
		$text = trimEnd($text, "<br>");
		return $text;
	}

	function echo_json($homework, $url, $websiteName="Teacher Website"){
		echo json_encode(array('hw' => $homework, 'url' => $url, 'name' => $websiteName));
	}

?>
