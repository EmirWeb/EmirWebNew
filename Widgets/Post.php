<?php
include_once('Utils/DomManager.php');
include_once('Utils/Social.php');
DomManager::addCss('CSS/Widgets/Post.css');
class Post {
	private static $TITLE = "Title";
	private static $DATE = "Date";
	private static $HTML = "Html";
	private static $POST = "Post";
	private static $READ_MORE_LINK = "ReadMoreLink";
	private static $READ_MORE_TEXT = "Read More";
	private static $TWITTER = "Twitter";

	static function getPost($post){
		if (empty($post)){
			return;
		}
		
		if (isset($post[self::$READ_MORE_LINK])){
			$readMoreLink = $post[self::$READ_MORE_LINK];
		}
		

		$ret = '<div class="' . self::$POST . '">';

		if (isset($post[self::$TITLE])){
			$title = $post[self::$TITLE];
			if (!empty($title)){
				$ret .= '<div class="' . self::$TITLE . '">';
				if (!empty($readMoreLink)){
					$ret .= '<a href="' . $readMoreLink . '">' . $title . '</a> ';

					if (!empty($readMoreLink)){
						
						$absoluteURL = Utilities::getURL("/" . $readMoreLink);
						$ret .= Social::getSocialBarWithUrl($absoluteURL, $title);
						
// 						$ret .= LinkedIn::getLinkedInForUrl($absoluteURL);
// 						$ret .= Twitter::getTweetButtonHorizontal($absoluteURL, $title);
// 						$ret .= GooglePlus::getPlusOneWithUrl($absoluteURL);
					}
						
					$ret .= '</div>';
				} else {
					$ret .= $title . '</div>';
				}
			}
		}

		if (isset($post[self::$DATE])){
			$date = $post[self::$DATE];
			if (!empty($date)){
				$ret .= '<div class="' . self::$DATE . '">' . $date . '</div>';
			}
		}

		if (isset($post[self::$HTML])){
			$html = $post[self::$HTML];
			if (!empty($html)){
				$ret .= '<div class="' . self::$HTML . '">' . $html . '</div>';
			}
		}

		if (!empty($readMoreLink)){
			$ret .= '<div class="' . self::$READ_MORE_LINK . '"><a href="' . $readMoreLink . '">' . self::$READ_MORE_TEXT . '</a></div>';
		}

		return $ret . '</div>';
	}

	public static function getPostModel($title, $date, $html, $readMoreLink){
		return array(
		self::$TITLE => $title,
		self::$DATE => $date,
		self::$HTML => $html,
		self::$READ_MORE_LINK => $readMoreLink
		);
	}
}
?>
