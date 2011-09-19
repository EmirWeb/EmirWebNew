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
function getNavigationBar(){
	
	$TEXT = "Text";
	$LINK = "Link";
	$TITLE = "Title";
	
	$navigationBar = '<div class="NavigationBar">';
	if (empty($buttons)){
		$buttons = array(
			array(
				$LINK => $GLOBALS['webRoot'] . "pages/Scholastic",
				$TEXT => "Scholastic",
				$TITLE => "University of Toronto Class Websites"
			),
			array(
				$LINK => $GLOBALS['webRoot'] . "Files/Resume.pdf",
				$TEXT => "Resume",
				$TITLE => "Online Resume"
			),
			array(
				$LINK => $GLOBALS['webRoot'],
				$TEXT => "Home",
				$TITLE => "Main Page"
			)
		);
	}

	foreach ($buttons as $button){
		$navigationBar .=  '
<a href="' . $button[$LINK] . '">
	<div class="Button" title="' . $button[$TITLE] . '">
		' . $button[$TEXT] . '
	</div>
</a>';
	}

	return $navigationBar . "\n</div>\n";
}
?>