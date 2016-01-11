<?php
	
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
	function util_rss($url){
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($url);
		$items=$xmlDoc->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');
		return $items->item(0)->getElementsByTagName('encoded')->item(0)->childNodes->item(0)->nodeValue;
	}
	
	// Grabs a blogspot feed
	function util_blogspot($url){
		$xmlDoc = new DOMDocument();
		$xmlDoc->load($url);
		$items=$xmlDoc->getElementsByTagName('feed')->item(0)->getElementsByTagName('entry');
		return $items->item(0)->getElementsByTagName('content')->item(0)->childNodes->item(0)->nodeValue;
	}
?>
