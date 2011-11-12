<?php
DomManager::addScript('http://widgets.twimg.com/j/2/widget.js');

class Twitter {
	public static function getTwitter(){
		echo '<script>';
		$script = include('Scripts/Twitter.js');
		echo '</script>';
	}
}
?>


