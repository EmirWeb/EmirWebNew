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
DomManager::addCSS('CSS/Widgets/NavigationBar.css');

class NavigationBar {
	private static $TEXT = "Text";
	private static $LINK = "Link";
	private static $TITLE = "Title";

	static function getNavigationBar($buttons){
		if (empty($buttons)){
			$buttons = array(
				self::getCell( $GLOBALS['webRoot'] . "Scholastic.php", "Scholastic","University of Toronto Class Websites"),
				self::getCell( $GLOBALS['webRoot'] . "Files/Resume.pdf", "Resume", "Online Resume"),
				self::getCell( $GLOBALS['webRoot'] , "Home", "Main Page")
			);
		}

		$navigationBar = '<div class="NavigationBar">';
		foreach ($buttons as $button){
			$navigationBar .=  '
<a href="' . $button[self::$LINK] . '">
	<div class="Button" title="' . $button[self::$TITLE] . '">
		' . $button[self::$TEXT] . '
	</div>
</a>';
		}
		return $navigationBar . "\n</div>\n";
	}

	private static function getCell($link, $text, $title){
		return array(
		self::$LINK => $link,
		self::$TEXT => $text,
		self::$TITLE => $title
		);
	}
}
?>