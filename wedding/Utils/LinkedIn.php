<?php

include_once ('Utils/DomManager.php');
include_once('Utils/Utilities.php');
DomManager::addScript('http://platform.linkedin.com/in.js');

class LinkedIn {
	public static function getLinkedIn(){
		$url = Utilities::getCurrentPageURL();
		return self::getLinkedInForUrl($url);
	}

	public static function getLinkedInForUrl($url){
		return '
			<script type="IN/Share" data-url="' . $url . '"></script>
		';
	}
	public static function getLinkedInForUrlWithCounterOnRight($url){
		return '
			<script type="IN/Share" data-counter="right" data-url="' . $url . '"></script>
		';
	}
	
	public static function getLinkedInForUrlWithCounterOnTop($url){
		return '
			<script type="IN/Share" data-counter="top" data-url="' . $url . '"></script>
		';
	}
}

?>