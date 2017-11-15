<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');
include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/Blog.css');
DomManager::addCSS('CSS/Social.css');
DomManager::addScript('https://js.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js"');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead("Canada TV"); ?>
	</head>
	<body>
	<?php
		echo NavigationBar::getNavigationBar(null);
	?>
	<div class="Container">
		<div class="TableOfContents">
			
			
		<?php  echo Social::getSocialBar(); ?>
			
			<h2><a href="https://market.android.com/details?id=canada.tv">Canada TV</a></h2>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">




			<h1 id="Title"><a href="https://market.android.com/details?id=canada.tv"><img  height="48px" src="Images/CanadaTV/icon.png"/>Canada TV (Google TV)</a></h1>
			<p>This simple application allows Canadian Google TV users to access their TV listings. This was a simple project that attempts to showcase HoneyComb on Google TV.</p>
			<p><a href="https://market.android.com/details?id=canada.tv">Download from market</a> | <a href="https://github.com/EmirWeb/Canada-TV">Downlaod source code</a></p>
			<img class="ScreenShot" width="600px" src="Images/CanadaTV/screenshot2.png"/>
			
		</div>

	</div>
	
	
		<?php echo Facebook::getFacebookRoot();?>
		<?php echo DomManager::getScripts(); ?>
	</body>
</html>
