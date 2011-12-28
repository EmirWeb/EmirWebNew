<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/Utilities.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Facebook.php');
	include_once('Utils/Social.php');
	include_once('Widgets/Group.php');
	include_once('Widgets/NavigationBar.php');
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
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo '<script type="text/javascript">var URL = "Images/StarFighter/"; var mainContainer = "#StarFighterContainer";</script>'; ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("StarFighter (JavaScript)"); ?>
	</head>
	<body>
		<?php
			$buttons = array(
				NavigationBar::getCell("About.php", "About", "About", false),
				NavigationBar::getCell("Projects.php", "Projects", "Projects", false),
				NavigationBar::getCell("Blog.php", "Blog", "Blog", false),
				NavigationBar::getCell( "/" , "Home", "Main Page", false)
			);
			echo NavigationBar::getNavigationBar($buttons);
		?>
		<div class="Container">
			<div class="Instructions">
				<?php echo Social::getSocialBar(); ?>
				<div class="InstructionsTitle">Instructions</div>
				<div class="Instruction"><div class="Left"><strong>A</strong></div><div class="Right">Left</div></div> 
				<div class="Instruction"><div class="Left"><strong>D</strong></div><div class="Right"> Right</div></div>
				<div class="Instruction"><div class="Left"><strong>W</strong></div><div class="Right"> Up </div></div>
				<div class="Instruction"><div class="Left"><strong>S</strong></div><div class="Right"> Down</div></div>
				<div class="Instruction"><div class="Left"><strong>Space</strong></div><div class="Right"> Shoot</div></div>
				<div class="Instruction"><div class="Left"><strong>Enter</strong></div><div class="Right"> Shoot</div></div>
				<div class="Facebook">
					
					<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "2"); ?>
				</div>
			</div> 	
			<div class="Content">
				<h1>Star Fighter (JavaScript)</h1>
				<div id="StarFighterContainer">
				<!-- 
					All code by Emir Hasanbegovic, not for resale, the creators of the 
					images have not provided consent for the images' use and should not 
					be used or reproduced. 
				-->
				</div>
				<div class="Divider"></div>
				<div class="Details">
					<p>Star Fighter (JavaScript) was written in regular HTML and CSS, not HTML5 and CSS3. This was an attempt to test modern day browsers' ability to run a basic 2D game enginge.</p>
					<p>A personal goal in this project was to do all the work through Object Oriented JavaScript. The basic rules followed were: Every container on the page was represented by a class, each class would contain a reference to the dom object it was representing and it was manipulated. All the work to add every object including the actual game itself should be done through JavaScript.</p> 
					<p>This was originally based off of a game I made in high school that was written in QBasic <a href="Files/StarFighter.zip">StarFighter V2.05</a></p><br/>
				</div>
			</div>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>