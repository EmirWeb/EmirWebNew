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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />









		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("Android Tutorial"); ?>
	</head>
<body>






<?php
echo NavigationBar::getNavigationBar(null);
?>
	<div class="Container">
		<div class="TableOfContents">
			
		<?php  echo Social::getSocialBar(); ?>
		<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
		</div>
		<div class="Essay">
			<h1 id="Title">Twitter Reader</h1>
			<p>
				Twitter Reader was built as a part of the <a
					href="AndroidTutorial.php">Android Tutorial</a>. It searches
				twitter for key words using the <a
					href="https://dev.twitter.com/docs/api/1/get/search">Twitter search
					API</a>.
			</p>
			<p>
				<a
					href="https://market.android.com/details?id=emirweb.twitterreader&feature=search_result#?t=W251bGwsMSwyLDEsImVtaXJ3ZWIudHdpdHRlcnJlYWRlciJd">Download
					from market</a> | <a
					href="https://github.com/EmirWeb/Twitter-Reader">Downlaod source
					code</a>
			</p>
		</div>

	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
