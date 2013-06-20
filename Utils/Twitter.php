<?php
include_once('Utils/DomManager.php');
include_once('Utils/Utilities.php');
DomManager::addScript('http://widgets.twimg.com/j/2/widget.js');

class Twitter {
	
	private static $NONE = "none";
	private static $HORIZONTAL = "horizontal";
	private static $VERTICAL = "vertical";

	public static function getTwitter(){
		DomManager::addScript('Scripts/Utils/Twitter.js');
		return '<a class="twitter-timeline"  width="300" height="300" href="https://twitter.com/PhiGammEmir" data-widget-id="347504074146582530">Tweets by @PhiGammEmir</a>';
	}

	public static function getTweetButton(){
		return self::getTweetButtonHelper(Utilities::getCurrentPageURL(), null, self::$NONE);
	}
	
	public static function getTweetButtonWithUrl($href, $text){
		return self::getTweetButtonHelper($href, $text, self::$NONE);
	}

	public static function getTweetButtonVertical($href, $text){
		return self::getTweetButtonHelper($href, $text, self::$VERTICAL);
	}

	public static function getTweetButtonHorizontal($href, $text){
		return self::getTweetButtonHelper($href, $text, self::$HORIZONTAL);
	}

	private static function getTweetButtonHelper($href, $text, $count){
		$return =  '<a href="https://twitter.com/share" class="twitter-share-button"  data-via="phigammemir"';

		if (isset($count)){
			$return .= ' data-count="' . $count . '"';
		}else{
			$return .= ' data-count="' . self::$NONE . '"';
		}
		
		if (isset($href)){
			$return .= ' data-url="' . $href . '"';
		}
		
		if (isset($text)){
			$return .= ' data-text="' . $text . '"';
		}

		$return .= '>Tweet</a>';
		DomManager::addScript("//platform.twitter.com/widgets.js");
		
		return $return;
	}

	public static function getTwitterFollow(){
		return '<a href="https://twitter.com/PhiGammEmir" class="twitter-follow-button" data-show-count="false">Follow @PhiGammEmir</a><script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>';
	}
}
?>


