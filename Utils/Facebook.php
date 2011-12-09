<?php
include_once('Utils/DomManager.php');
include_once('Utils/Utilities.php');
DomManager::addScript('Scripts/Utils/Facebook.js');
class Facebook {
	private static $APP_ID = "137862939568281";

	private static $LAYOUT = "button_count";
	
	//Activities
	private static $TYPE_ACTIVITY = "activity";
	private static $TYPE_SPORT ="sport";

	//Businesses
	private static $TYPE_BAR ="bar";
	private static $TYPE_COMPANT ="company";
	private static $TYPE_CAFE ="cafe";
	private static $TYPE_HOTEL ="hotel";
	private static $TYPE_RESTAURANT ="restaurant";

	//Groups
	private static $TYPE_CAUSE ="cause";
	private static $TYPE_SPORTS_LEAGUE ="sports_league";
	private static $TYPE_SPORTS_TEAM ="sports_team";

	//Organizations
	private static $TYPE_BAND ="band";
	private static $TYPE_GOVERNMENT ="government";
	private static $TYPE_NON_PROFIT ="non_profit";
	private static $TYPE_SCHOOL ="school";
	private static $TYPE_UNIVERSITY ="university";

	//People
	private static $TYPE_ACTOR ="actor";
	private static $TYPE_ATHLETE ="athlete";
	private static $TYPE_AUTHOR ="author";
	private static $TYPE_DIRECTOR ="director";
	private static $TYPE_MUSICIAN ="musician";
	private static $TYPE_POLITICIAN ="politician";
	private static $TYPE_PUBLIC_FIGURE ="public_figure";

	//Places
	private static $TYPE_CITY ="city";
	private static $TYPE_COUNTRY ="country";
	private static $TYPE_LANDMARK ="landmark";
	private static $TYPE_STATE_PROVINCE ="state_province";

	//Products and Entertainment
	private static $TYPE_ALBUM ="album";
	private static $TYPE_BOOK ="book";
	private static $TYPE_DRINK ="drink";
	private static $TYPE_FOOD ="food";
	private static $TYPE_GAME ="game";
	private static $TYPE_PRODUCT ="product";
	private static $TYPE_SONG ="song";
	private static $TYPE_MOVIE ="movie";
	private static $TYPE_TV_SHOW ="tv_show";

	//Websites
	private static $TYPE_BLOG ="blog";
	private static $TYPE_WEBSITE ="website";
	private static $TYPE_ARTICLE ="article";


	public static function getFacebookRoot(){
		return "<div id='fb-root'></div>";
	}

	public static function getFacebookArticleHead($title){
		return self::getFacebookHead($title, self::$TYPE_ARTICLE);
	}

	public static function getFacebookBlogHead($title){
		return self::getFacebookHead($title, self::$TYPE_BLOG);
	}

	private static function getFacebookHead($title, $contentType){
		return '
			<meta property="og:title" content="' . $title . '" />
			<meta property="og:type" content="' . $contentType .'" />
			<meta proerty="og:url" content="' . Utilities::getCurrentPageURL() . '"/>
			<meta proerty="og:image" content="' . Utilities::getURL("/Files/emir.jpg") . '"/>
			<meta property="og:site_name" content="EmirWeb" />
			<meta property="fb:app_id" content="' . self::$APP_ID . '" />
		';
	}

	public static function getFacebookLike(){
		return self::getFacebookLikeWithUrl(Utilities::getCurrentPageURL());
	}
	
	public static function getFacebookLikeWithUrl($href){
		return self::getFacebookLikeFull($href, 50, false, false, self::$LAYOUT);
	}
	
	public static function getFacebookLikeFull($href, $width, $showFaces, $send, $layout){
		if (!isset($width)){
			$width = "450";
		}

		$ret = '<div class="fb-like" data-font="arial" data-href="' . $href . '"';

		if ($send) {
			$send = "true";
		} else {
			$send = "false";
		}
		$ret .= 'data-send="' . $send . '"';

		if (isset($layout)) {
			$ret .='data-layout="' . $layout . '"';
		}

		$ret .= 'data-width="' . $width . '"';

		if ($showFaces){
			$showFaces = "true";
		} else {
			$showFaces = "false";
		}
		$ret .='data-show-faces="' .$showFaces . '"';

		$ret .= '></div>';

		return $ret;
	}

	public static function getFacebookComments($href, $width, $posts){
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



