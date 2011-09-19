<?php
	$GLOBALS['root'] = "";
	$GLOBALS['webRoot'] = "http://" . $_SERVER['HTTP_HOST'] . "/emirweb/";
	include($GLOBALS['root'] . 'Managers/DomManager.php');
	include($GLOBALS['root'] . 'Widgets/Group.php');
	include($GLOBALS['root'] . 'Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/home.css');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<?php echo DomManager::getCSS(); ?>
<?php echo DomManager::getScripts(); ?>
</head>
<body>
<?php echo getNavigationBar(); ?>
<div class="Content">
<?php
	$groups = array(
		array(
			'Title' => 'Current News',
			'Row' => array (
				array(
					'Label' => 'October 12, 2010:',
					'Text' => '<a href="/pages/StarFighter">StarFighter (JavaScript)</a> available online for first time.'				
				),
				array(
					'Label' => 'October 12, 2010:',
					'Text' => 'New website layout!'				
				)
			)
		)
	);
 	echo getGroups($groups); 
?>
</div>
</body>
</html>
