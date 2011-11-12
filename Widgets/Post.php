<?php
DomManager::addCss('CSS/Widgets/Post.css');
class Post {
	private static $TITLE = "Title";
	private static $DATE = "Date";
	private static $HTML = "Html";
	private static $POST = "Post";

	static function getPost($post){
		if (empty($post)){
			return;
		}

		$ret = '<div class="' . self::$POST . '">';

		if (isset($post[self::$TITLE])){
			$title = $post[self::$TITLE];
			if (!empty($title)){
				$ret .= '<div class="' . self::$TITLE . '">' . $title . '</div>';
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

		return $ret . '</div>';
	}

	public static function getPostModel($title, $date, $html){
		return array(
			self::$TITLE => $title,
			self::$DATE => $date,
			self::$HTML => $html
		);
	}
}
?>
