<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Widgets/Group.php');
	include('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/StarFighter.css');
	DomManager::addScript(array(
			"Scripts/Utils/jquery-1.4.2.min.js",
			"Scripts/StarFighter/StarFighter.js",
			"Scripts/StarFighter/CollisionDetector.js",
			"Scripts/StarFighter/Bullet.js",
			"Scripts/StarFighter/Star.js",
			"Scripts/StarFighter/Rectangle.js",
			"Scripts/StarFighter/Circle.js",
			"Scripts/StarFighter/Point.js",
			"Scripts/StarFighter/Canvas.js",
			"Scripts/StarFighter/Enemy.js",
			"Scripts/StarFighter/enemyList.js",
			"Scripts/StarFighter/PowerUp.js",
			"Scripts/StarFighter/Scroller.js",
			"Scripts/StarFighter/Explosion.js",
			"Scripts/StarFighter/Game.js",
			"Scripts/StarFighter/TitleScreen.js",
			"Scripts/StarFighter/TitleBar.js",
			"Scripts/StarFighter/Font.js",
			"Scripts/StarFighter/Vector.js",
			"Scripts/StarFighter/Triangle.js",
			"Scripts/StarFighter/Constructor.js"
	));
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<?php echo DomManager::getCSS(); ?>
		<?php echo '<script type="text/javascript">var URL = "Images/StarFighter/"; var mainContainer = "#StarFighterContainer";</script>'; ?>
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<?php echo NavigationBar::getNavigationBar(null);?>
		<div class="Container">
			<div class="Instructions">
				<div class="InstructionsTitle">Instructions</div>
				<strong>&larr;</strong> Left<br /> 
				<strong>&rarr;</strong> Right<br />
				<strong>&uarr;</strong> Up <br />
				<strong>&darr;</strong> Down<br />
				<strong>Space</strong> Shoot<br />
				<strong>Enter</strong> Shoot<br />					
			</div> 	
			<div id="StarFighterContainer">
			<!-- 
				All code by Emir Hasanbegovic, not for resale, the creators of the 
				images have not provided consent for the images' use and should not 
				be used or reproduced. 
			-->
			</div>
		</div>
	</body>
</html>