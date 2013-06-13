<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');

include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
include_once('Utils/SyntaxHighlighter.php');

DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/Blog.css');
DomManager::addCSS('CSS/Social.css');
$TITLE = "Android Device Screen Sizes";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns:fb="http://www.facebook.com/2008/fbml"
	xmlns:og="http://opengraphprotocol.org/schema/"
	xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />
<?php echo DomManager::getCSS(); ?>
<?php echo DomManager::getScripts(); ?>
<?php echo Facebook::getFacebookArticleHead($TITLE); ?>
</head>

<?php

include 'ScreenSize/Constants.php';

$portraitQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 1)";
$landscapeQuery = "(SELECT * FROM $TABLE_NAME_SCREEN_DETAILS WHERE $TABLE_COLUMN_NAME_IS_PORTRAIT = 0)";
$orientationQuery = "(SELECT * FROM $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT , $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE ";

$query = "SELECT DISTINCT ".


" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DENSITY_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DENSITY_NAME_KEY,  " .
" $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_SCREEN_SIZE_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_DEVICE_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_DEVICE_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_NAV_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_NAV_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_NAV_BAR_WIDTH_KEY AS $TABLE_COLUMN_PORTRAIT_NAV_BAR_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_STATUS_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_STATUS_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_PORTRAIT.$REQUEST_TITLE_BAR_HEIGHT_KEY AS $TABLE_COLUMN_PORTRAIT_TITLE_BAR_HEIGHT_KEY,  " .

" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_DEVICE_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_DEVICE_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_CONTENT_VIEW_PIXEL_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_CONTENT_VIEW_PIXEL_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_NAV_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_NAV_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_NAV_BAR_WIDTH_KEY AS $TABLE_COLUMN_LANDSCAPE_NAV_BAR_WIDTH_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_STATUS_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_STATUS_BAR_HEIGHT_KEY,  " .
" $TABLE_COLUMN_NAME_LANDSCAPE.$REQUEST_TITLE_BAR_HEIGHT_KEY AS $TABLE_COLUMN_LANDSCAPE_TITLE_BAR_HEIGHT_KEY " .

"FROM $TABLE_NAME_DEVICE_INFORMATION, $portraitQuery as $TABLE_COLUMN_NAME_PORTRAIT, $landscapeQuery as $TABLE_COLUMN_NAME_LANDSCAPE WHERE $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID = $TABLE_COLUMN_NAME_LANDSCAPE.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID AND $TABLE_COLUMN_NAME_PORTRAIT.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID =  $TABLE_NAME_DEVICE_INFORMATION.$TABLE_COLUMN_NAME_DEVICE_INFORMATION_ID".
" ORDER BY $TABLE_NAME_DEVICE_INFORMATION.$REQUEST_DEVICE_NAME_KEY;";

$database = new mysqli($URL, $USER_NAME, $PASSWORD, $DATABASE);
$results = $database->query($query);

?>

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

<?php

function calculateDp($pixel,$density){
	return $dp = (int)($pixel / $density);
}

function getMeasurements ($yPixel, $xPixel, $density, $newline = false){
	$yDp = calculateDp($yPixel, $density);
	$xDp = calculateDp($xPixel, $density);
	$newlineHtml = " ";
	if ($newline)
	$newlineHtml = "<br>";
	return "$xPixel x $yPixel px$newlineHtml($xDp x $yDp dp)";
}

function getDpMeasurement ($pixel, $density){
	$dp = calculateDp($pixel, $density);
	return "($dp dp)";

}

function getPixelMeasurement ($pixel){
	return "$pixel px";
}

function getMeasurement ($pixel, $density){
	return getPixelMeasurement($pixel) . " " . getDpMeasurement($pixel,$density);
}

function getScreenDetails($navBarHeight, $navBarWidth, $titleBarHeight, $statusBarHeight,$contentViewPixelWidth ,$contentViewPixelHeight, $density){
	$html ="<table>";


	// Navigation bar
	$html .="<tr>";
	$html .="<td>";

	if ($navBarHeight != 0){
		$html .="Navigation bar height: ";
		$html .="</td>";
		$html .="<td>";
		$navBarMeasurement = getMeasurement($navBarHeight, $density);
		$html .=$navBarMeasurement;
	}else if ($navBarWidth != 0){
		$html .="Navigation bar width: ";
		$html .="</td>";
		$html .="<td>";
		$navBarMeasurement = getMeasurement($navBarWidth, $density);
		$html .=$navBarMeasurement;
	}else{
		$html .="No navigation bar found";
	}

	$html .="</td>";
	$html .="</tr>";


	// Title bar
	$html .="<tr>";
	$html .="<td>";
	$html .="Title bar width: ";
	$html .="</td>";
	$html .="<td>";
	if ($titleBarHeight != 0){
		$titleBarMeasurement = getMeasurement($titleBarHeight, $density);
		$html .=$titleBarMeasurement;
	}else{
		$html .="No title bar found";
	}

	$html .="</td>";
	$html .="</tr>";


	// Status bar
	$html .="<tr>";
	$html .="<td>";
	$html .="Status bar width: ";
	$html .="</td>";
	$html .="<td>";
	if ($statusBarHeight != 0){
		$statusBarMeasurement = getMeasurement($statusBarHeight, $density);
		$html .=$statusBarMeasurement;
	}else{
		$html .="No status bar found";
	}

	$html .="</td>";
	$html .="</tr>";



	// ContentView
	$html .="<tr>";
	$html .="<td>";
	$html .="Content View: ";
	$html .="</td>";
	$html .="<td>";
	$statusBarMeasurement = getMeasurements($contentViewPixelWidth,$contentViewPixelHeight, $density, true);
	$html .=$statusBarMeasurement;

	$html .="</td>";
	$html .="</tr>";



	$html .="</table>";
	return $html;
}

$menu = "";

$content = "";
$id = 0;
while ($row = $results->fetch_assoc()){

	$deviceName = $row[$REQUEST_DEVICE_NAME_KEY];
	$density = $row[$REQUEST_DENSITY_KEY];
	$densityName = $row[$REQUEST_DENSITY_NAME_KEY];
	$screenSize = $row[$REQUEST_SCREEN_SIZE_KEY];


	$portraitDevicePixelHeight = $row[$TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_HEIGHT_KEY];
	$portraitDevicePixelWidth = $row[$TABLE_COLUMN_PORTRAIT_DEVICE_PIXEL_WIDTH_KEY];
	$portraitContentViewPixelHeight = $row[$TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_HEIGHT_KEY];
	$portraitContentViewPixelWidth = $row[$TABLE_COLUMN_PORTRAIT_CONTENT_VIEW_PIXEL_WIDTH_KEY];
	$portraitNavBarHeight = $row[$TABLE_COLUMN_PORTRAIT_NAV_BAR_HEIGHT_KEY];
	$portraitNavBarWidth = $row[$TABLE_COLUMN_PORTRAIT_NAV_BAR_WIDTH_KEY];
	$portraitStatusBarHeight = $row[$TABLE_COLUMN_PORTRAIT_STATUS_BAR_HEIGHT_KEY];
	$portraitTitleBarHeight = $row[$TABLE_COLUMN_PORTRAIT_TITLE_BAR_HEIGHT_KEY];

	$landscapeDevicePixelHeight = $row[$TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_HEIGHT_KEY];
	$landscapeDevicePixelWidth = $row[$TABLE_COLUMN_LANDSCAPE_DEVICE_PIXEL_WIDTH_KEY];
	$landscapeContentViewPixelHeight = $row[$TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_HEIGHT_KEY];
	$landscapeContentViewPixelWidth = $row[$TABLE_COLUMN_LANDSCAPE_CONTENT_VIEW_PIXEL_WIDTH_KEY];
	$landscapeNavBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_NAV_BAR_HEIGHT_KEY];
	$landscapeNavBarWidth = $row[$TABLE_COLUMN_LANDSCAPE_NAV_BAR_WIDTH_KEY];
	$landscapeStatusBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_STATUS_BAR_HEIGHT_KEY];
	$landscapeTitleBarHeight = $row[$TABLE_COLUMN_LANDSCAPE_TITLE_BAR_HEIGHT_KEY];


	$menu .= "<li><a href='#Header$id'>$deviceName</a></li>";

	$html = "<h2 id='Header$id'>$deviceName</h2>";
	$deviceMeasurements = getMeasurements($portraitDevicePixelWidth, $portraitDevicePixelHeight, $density);
	$html .= "<p class='Center'>$deviceMeasurements / ";
	$html .= "$densityName / ";
	$html .= "$screenSize</p>";

	$html .="<div class='ScreenDetails'>";
	$html .="<div class='Table'>";
	$html .= "<h2>Portrait Details</h2>";
	$html .= getScreenDetails($portraitNavBarHeight, $portraitNavBarWidth, $portraitTitleBarHeight, $portraitStatusBarHeight, $portraitContentViewPixelWidth, $portraitContentViewPixelHeight, $density);
	$html .="</div>";
	$html .="<div class='Table'>";
	$html .= "<h2>Landscape Details</h2>";
	$html .= getScreenDetails($landscapeNavBarHeight, $landscapeNavBarWidth, $landscapeTitleBarHeight, $landscapeStatusBarHeight, $landscapeContentViewPixelWidth, $landscapeContentViewPixelHeight, $density);
	$html .="</div>";
	$html .="<div class='Clear'></div>";
	$html .="</div>";
	$content .=$html;
	$id ++;
}
?>
<div class="Container">
<div class="TableOfContents"><?php  echo Social::getSocialBar(); ?>

<h2><?php echo ($TITLE);?></h2>
<ul>
<?php echo($menu);?>
</ul>



<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
</div>
<div class="Essay">
<h1><?php echo ($TITLE);?></h1>
<p>This page is a compliment to the <a href="#">Screen Size</a> Android
application. The <a href="#">client code</a> can be found on github as
well as the <a href="#">server code</a> that receives and displays the
data. You can also use the following <a href="#">api call</a> to pull
the full set of data down.</p>
<?php echo($content); ?> <br>
<br>
<br>
<br>
<br>
<br>
</div>
</div>

<?php echo Facebook::getFacebookRoot();?>
</body>
</html>


<?php

$database->close();

?>