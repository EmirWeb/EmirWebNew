<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Widgets/Post.php');
	include('Widgets/NavigationBar.php');
	include('Widgets/Twitter.php');
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
			<div class="SideBar">
				<?php 
					Twitter::getTwitter();
				?>
			</div>
			<div class="Posts">
				<?php		
					$post = Post::getPostModel('First Post','October 12, 2010:','StarFighter (JavaScript) available online for first time. This game was designed to show case the web development knowledge I had acquired while working with <a href="http://www.visibli.com"  target="_blank">Visibli</a>. One of the things to note is the async loop class. It demostrates how scope and threading works in JavaScript.', "StarFighter.php");
				 	echo Post::getPost($post); 
				?>
			</div>
		</div>
	</body>
</html>
