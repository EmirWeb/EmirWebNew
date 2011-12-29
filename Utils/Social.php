<?php
include_once ('Utils/Facebook.php');
include_once ('Utils/GooglePlus.php');
include_once ('Utils/LinkedIn.php');
include_once ('Utils/Twitter.php');
include_once ('Utils/DomManager.php');
DomManager::addCSS('CSS/Social.css');

class Social {
	public static function getSocialBar(){
		return'
		<div class="Social">
			<div class="Button">' .
		Twitter::getTweetButton()
		. '</div>
			<div class="Button">'.
		LinkedIn::getLinkedIn()
		.'</div>
			<div class="Button">'.
		GooglePlus::getPlusOne()
		.'</div>
			<div class="Button">'.
		Facebook::getFacebookLike()
		.'</div>
			<div class="Clear"></div>
		</div>
		<div class="Clear"></div>
		';
	}

	public static function getSocialBarWithUrl($url, $title){
		return'
			<div class="Social">
				<div class="Button">' .
		Twitter::getTweetButtonWithUrl($url, $title)
			. '</div>
				<div class="Button">'.
		LinkedIn::getLinkedInForUrl($url)
			. '</div>
				<div class="Button">'.
		GooglePlus::getPlusOneWithUrl($url)
		.'</div>
				<div class="Button">'.
			Facebook::getFacebookLikeWithUrl($url)
			.'</div>
				<div class="Clear"></div>
			</div>
			<div class="Clear"></div>
			';
	}

}
?>