<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Facebook.php');
	include_once('Data.php');
	include_once('Utils/Social.php');
	include_once('Utils/GooglePlus.php');
// 	include_once('Utils/MySQL.php');
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
		
		
// 			$mySQL = new MySQL();
// 			$mySQL->open();
// 			if ($mySQL->isServerRunning()){
// 				echo 'results: ' . $mySQL->rawQuery("SELECT * FROM Blogs");
// 				$mySQL->close();	
// 			} else {
// 				echo "SQL NOT PRESENT";
// 			}
		
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
					$posts = Data::getAllPosts(); 
					
					foreach ($posts as $post){
				 		echo Post::getPost($post);
					} 
				?>
			</div>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
