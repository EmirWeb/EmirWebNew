<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Facebook.php');
	include_once('Utils/Social.php');
	include_once('Utils/MySQL.php');
	include_once('Widgets/Post.php');
	include_once('Widgets/NavigationBar.php');
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
		<?php echo Facebook::getFacebookBlogHead("EmirWeb"); ?>
		<?php echo DomManager::getCSS(); ?>		
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<?php 
		
		
			$mySQL = new MySQL();
			$mySQL->open();
			if ($mySQL->isServerRunning()){
				echo 'results: ' . $mySQL->rawQuery("SELECT * FROM Blogs");
				$mySQL->close();	
			} else {
				echo "SQL NOT PRESENT";
			}
		
			$buttons = array(
				NavigationBar::getCell("About.php", "About", "About", false),
				NavigationBar::getCell("Projects.php", "Projects", "Projects", false),
				NavigationBar::getCell("Blog.php", "Blog", "Blog", false),
				NavigationBar::getCell( "" , "Home", "Main Page", true)
			);
			echo NavigationBar::getNavigationBar($buttons); 
		?>
		<div class="Content">
			<div class="SideBar">
				<?php
					echo Social::getSocialBar();
					echo Twitter::getTwitter();
				?>
				
				<br />
				<br />
				<br />
				<?php 
					echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "2");
				?>
			</div>
			<div class="Posts">
				<?php		
					$posts = array(
						Post::getPostModel('Google TV Review','December 2, 2011:','Google TV is a multimedia centre that takes in an HDMI feed and overlays it with the Android operating system. It attempts to connect to and communicate with a settop box (cable box) through the connecting HDMI cable. It reads channel information and controls the box by changing channels. Some Google TV devices, such as the Logitech Revue, have the ability to control your television as well. By integrating Google TV into a home theatre system, you have the ability to host native android applications and experience Chrome through your television. To interact with the device, users are given a keyboard and mouse in one controller. The controller is a standard keyboard which has had the arrow keys and numerical pad replaced with a digital arrow pad and a laptop-styled touch-pad mouse.', "GoogleTV.php"),
						Post::getPostModel('Little Droid Physics','December 2, 2011:','The idea behind droid physics was to offer a simple physics
				environment that would aid early high school students to understand
				some of the properties of physics. In particular, acceleration,
				projectile motion and Friction.', "LittleDroidPhysics.php"),
						Post::getPostModel('Little Droid Creator','December 2, 2011:','Little Droid Creator was designed to showcase the dynamic engine
				on which it runs. This document will first describe at a high level
				what the game offers then we will dig down into the technical
				aspects of the program and talk about how it offers the high level
				aspects', "LittleDroidCreator.php"),
						Post::getPostModel('New web site design','December 2, 2011:','I\'ve been working hard to get this new design out. <p>COPYRIGHT (C) 2008 SITENAME.COM. ALL RIGHTS RESERVED. DESIGN BY CSS TEMPLATES.</p>', null, null),
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
