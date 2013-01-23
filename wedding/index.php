<?php
	include_once('Utils/DomManager.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Home.css');
	DomManager::addScript('Scripts/Utils/jquery-1.8.3.min.js');
	DomManager::addScript('Scripts/Home.js');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Emir & Laura</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>		
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<div class="Content">
			<?php $BANNER_WIDTH = 952; ?>
			<div class="Crop">
				<img class="BannerFrame" id="BannerAnimator0" alt="Laura & Emir" src="/Files/Images/BannerAnimationFrame0.JPG" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator1" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator2" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator3" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator4" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator5" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<img class="BannerFrame" id="BannerAnimator6" alt="Laura & Emir" width="<?php echo $BANNER_WIDTH; ?>">
				<div class="Banner">
					Laura + Emir </br>
					August 17th 2013
				</div>
			</div>
		</div>
	</body>
</html>
