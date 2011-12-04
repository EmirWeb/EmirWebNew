<?php
DomManager::addScript('Scripts/Utils/Facebook.js');
class Facebook {

	static function getFacebookRoot(){
		return "<div id='fb-root'></div>";
	}

	static function getFacebookLike($href, $width){
		if (!isset($width)){
			$width = "450";
		}

		return '<div class="fb-like" data-href="' . $href . '" data-send="true" data-width="' . $width . '" data-show-faces="true"></div>';
	}

	static function getFacebookComments($href, $width, $posts){
		if (!isset($width)){
			$width = "500";
		}

		if (!isset($posts)){
			$posts = "2";
		}

		return '<div class="fb-comments" data-href="' . $href . '" data-num-posts="' . $posts . '" data-width="' . $width . '"></div>';
	}
}
?>



