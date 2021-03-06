<?php
include_once('Utils/DomManager.php');
include_once('Utils/Social.php');
DomManager::addCss('CSS/Widgets/Post.css');
class Post {
	private static $YEAR = "Year";
	private static $MONtH = "Month";
	private static $DAY = "Day";
	private static $TITLE = "Title";
	private static $DATE = "Date";
	private static $HTML = "Html";
	private static $POST = "Post";
	private static $IMAGES = "Images";
	private static $THUMBNAIL = "Thumbnail";
	private static $READ_MORE_LINK = "ReadMoreLink";
	private static $DOWNLOAD_LINK = "DownloadLink";
	private static $SOURCE_CODE_LINK = "SourceCodeLink";
	private static $READ_MORE_TEXT = "Read More";
	private static $DOWNLOAD_TEXT = "Download";
	private static $SOURCE_CODE_TEXT = "Source Code";
	private static $TWITTER = "Twitter";

	static function getPost($post){
		if (empty($post)){
			return;
		}

		if (isset($post[self::$THUMBNAIL])){
			$thumbnail = $post[self::$THUMBNAIL];
		}
		
		if (isset($post[self::$READ_MORE_LINK])){
			$readMoreLink = $post[self::$READ_MORE_LINK];
		}

		$ret = '<div class="' . self::$POST . '">';

		if (!empty($readMoreLink)){
			$ret .= '<a href="' . $readMoreLink . '">';
		}

		
		if (!empty($thumbnail)){
			$ret .= '<div class="' . self::$IMAGES . '">';
				$ret .= '<img class="Thumbnail" src="' . $thumbnail . '" />';
			$ret .= '</div>';
		}
		
		if (isset($post[self::$TITLE])){
			$title = $post[self::$TITLE];
			if (!empty($title)){
				$ret .= '<div class="' . self::$TITLE . '">';
				$ret .= $title . '</div>';
			}
		}

		if (!empty($readMoreLink)){
			$ret .= self::$READ_MORE_TEXT . '</a>';
		}

		$links = '';

		if (isset($post[self::$DOWNLOAD_LINK])){
			$downloadLink = $post[self::$DOWNLOAD_LINK];
			if (!empty($readMoreLink)){
				$links .= ' | ';
			}
			$links .= '<a href="' . $downloadLink . '">' . self::$DOWNLOAD_TEXT . '</a>';
		}

		if (isset($post[self::$SOURCE_CODE_LINK])){
			$sourceCodeLink = $post[self::$SOURCE_CODE_LINK];
			if (!empty($readMoreLink) || $links != ''){
				$links .= ' | ';
			}
			$links .= '<a href="' . $sourceCodeLink . '">' . self::$SOURCE_CODE_TEXT . '</a>';
		}

		if ($links != ''){
			$ret .= $links;
		}
			
		if (isset($post[self::$DATE])){
			$date = $post[self::$DATE];
			if (!empty($date)){
				$dateString = date('l jS \of F Y', $date);
				$ret .= '<div class="' . self::$DATE . '">' . $dateString . '</div>';
			}
		}

		if (isset($post[self::$HTML])){
			$html = $post[self::$HTML];
			if (!empty($html)){
				$ret .= '<div class="' . self::$HTML . '">' . $html . '</div>';
			}
		}


		if (!empty($readMoreLink)){
			$absoluteURL = Utilities::getURL("/" . $readMoreLink);
			$ret .= Social::getSocialBarWithUrl($absoluteURL, $title);
		}

		return $ret . '</div><div class="Clear"></div>';
	}

	public static function getPostModel($title, $date, $html, $readMoreLink, $download, $source, $thumbnail){
		return array(
		self::$TITLE => $title,
		self::$DATE => $date,
		self::$HTML => $html,
		self::$READ_MORE_LINK => $readMoreLink,
		self::$DOWNLOAD_LINK => $download,
		self::$THUMBNAIL => $thumbnail,
		self::$SOURCE_CODE_LINK => $source
		);
	}

	public static function cmp($post1, $post2) {
		$date1 = $post1[self::$DATE];
		$date2 = $post2[self::$DATE];
		if ($date1 == $date2) {
			return 0;
		}else if ($date1 < $date2) {
			return 1;
		}
			
		return -1;
	}

}
?>
