<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Facebook.php');
	include_once('Data.php');
	include_once('Utils/Social.php');
	include_once('Utils/GooglePlus.php');
	include_once('Widgets/Post.php');
	include_once('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addScript('Scripts/Home.js');
	DomManager::addScript('Scripts/Taplytics.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo Facebook::getFacebookBlogHead("EmirWeb"); ?>
		<?php echo DomManager::getCSS(); ?>		
	</head>
	<body>
		<?php 
			$buttons = array(
				NavigationBar::getCell("About.php", "About", "About", false),
				NavigationBar::getCell("Projects.php", "Projects", "Projects", true),
				NavigationBar::getCell("Blog.php", "Blog", "Blog", false),
				NavigationBar::getCell( "/" , "Home", "Main Page", false)
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
					$posts = Data::getProjectPosts(); 
					
					foreach ($posts as $post){
				 		echo Post::getPost($post);
					} 
				?>
			</div>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
		<?php echo DomManager::getScripts(); ?>
	</body>
</html>
