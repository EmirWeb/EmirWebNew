<?php
/**
 * Navigation bar
 * @var $buttons
 * Array of Buttons, each button has $LINK, $TEXT and $TITLE keys.
 * Default buttons
 * $buttons = array(
 *		array(
 *			$LINK => "http://www.emirweb.com/pages/Scholastic",
 *			$TEXT => "Scholastic",
 *			$TITLE => "University of Toronto Class Websites"
 *		),
 *		array(
 *			$LINK => "http://www.emirweb.com/files/Resume.pdf",
 *			$TEXT => "Resume",
 *			$TITLE => "Online Resume"
 *		),
 *		array(
 *			$LINK => "http://www.emirweb.com",
 *			$TEXT => "Home",
 *			$TITLE => "Main Page"
 *		)
 * );
 */
include_once('Utils/DomManager.php');
DomManager::addCSS('CSS/Widgets/NavigationBar.css');

class NavigationBar {
	private static $TEXT = "text";
	private static $LINK = "link";
	private static $TITLE = "title";
	private static $IS_CHOSEN = "isChosen";

	static function getNavigationBar($buttons){
		if (empty($buttons)){
			$buttons = array(
				self::getCell("Resume.php", "Resume", "Online Resume", false),
				self::getCell( "/" , "Home", "Main Page", false)
			);
		}
		
		$navigationBar = '<div class="NavigationBar"><div class="NavigationBarContainer"><div class="Title"><img class="Icon" src="favicon.ico" height="35px"><span>emir</span>web</div><div class="NavigationBarButtonContainer">';
		
		foreach ($buttons as $button){
			if (!$button[self::$IS_CHOSEN]){
			$navigationBar .=  '
<a href="' . $button[self::$LINK] . '">
	<div class="Button" title="' . $button[self::$TITLE] . '">
		' . $button[self::$TEXT] . '
	</div>
</a>';
			} else {
				$navigationBar .=  '
	<div class="Button Chosen" title="' . $button[self::$TITLE] . '">
		' . $button[self::$TEXT] . '
	</div>';
			}
		}
		return $navigationBar . "\n</div></div></div>\n";
	}

	public static function getCell($link, $text, $title, $isChosen){
		return array(
			self::$LINK => $link,
			self::$TEXT => $text,
			self::$TITLE => $title,
			self::$IS_CHOSEN => $isChosen
		);
	}
}
?>
