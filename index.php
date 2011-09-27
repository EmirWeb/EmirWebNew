<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Widgets/Group.php');
	include('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addScript('Scripts/Home.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<?php 
			$buttons = array(
				NavigationBar::getCell( "Scholastic.php", "Scholastic","University of Toronto Class Websites", false),
				NavigationBar::getCell("Files/Resume.pdf", "Resume", "Online Resume", false),
				NavigationBar::getCell( "" , "Home", "Main Page", true)
			);
			echo NavigationBar::getNavigationBar($buttons); 
		?>
		<div class="Content">
		<?php
			$groups = array(
				array(
					'Title' => 'Current News',
					'Row' => array (
						array(
							'Label' => 'October 12, 2010:',
							'Text' => '<a href="StarFighter.php">StarFighter (JavaScript)</a> available online for first time.'				
						),
						array(
							'Label' => 'October 12, 2010:',
							'Text' => 'New website layout!'				
						)
					)
				)
			);
		 	echo Group::getGroups($groups); 
		?>
		</div>
	</body>
</html>
