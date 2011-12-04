<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Utils/Utilities.php');
	include('Utils/Facebook.php');
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
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>		
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<?php 
			$buttons = array(
				NavigationBar::getCell("Resume.php", "Resume", "Online Resume", false),
				NavigationBar::getCell( "" , "Home", "Main Page", true)
			);
			echo NavigationBar::getNavigationBar($buttons); 
		?>
		<div class="Content">
			<div class="SideBar">
				<?php
					echo Twitter::getTwitter();
				?>
					<br />
					<br />
					<br />
				<?php 
					echo Facebook::getFacebookLike(Utilities::getCurrentPageURL(), "200");
					echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "250", "2");
				?>
			</div>
			<div class="Posts">
				<?php		
					$posts = array(
						Post::getPostModel('Google TV review and tutorial','December 2, 2011:','Read about what Google TV development is like and take a peak at some of the source code I\'ve built.', "GoogleTV.php"),
						Post::getPostModel('New web site design','December 2, 2011:','I\'ve been working hard to get this new design out. <p>COPYRIGHT (C) 2008 SITENAME.COM. ALL RIGHTS RESERVED. DESIGN BY CSS TEMPLATES.</p>', null),
						Post::getPostModel('Star Fighter (javascript)','October 12, 2010:','StarFighter (JavaScript) available online for first time. This game was designed to show case the web development knowledge I had acquired while working with <a href="http://www.visibli.com"  target="_blank">Visibli</a>. One of the things to note is the async loop class. It demostrates how scope and threading works in JavaScript.', "StarFighter.php")
						
					); 
					
					foreach ($posts as $post){
				 		echo Post::getPost($post);
					} 
				?>
			</div>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
