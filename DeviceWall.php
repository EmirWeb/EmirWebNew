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
DomManager::addScript('Scripts/Taplytics.js');

$TITLE = "Device Wall: A second screen experiment.";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead($TITLE); ?>
	</head>
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
	<div class="Container">
		<div class="TableOfContents">
		<?php  echo Social::getSocialBar(); ?>

			<h2><?php echo $TITLE; ?></h2>
			<ul>
				<li><a href="#Header1">How we did it</a></li>
				<li><a href="#Header2">RabbitMQ</a></li>
				<li><a href="#Header3">Architecture diagram of libraries</a></li>
				<li><a href="#Header4">Screen Detection</a></li>
				<li><a href="#Header5">The Process</a></li>
				<li><a href="#Header6">Memory Game</a></li>
			</ul>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
		
		<h1 class="Title"><?php echo $TITLE; ?></h1>
		<p>Also posted at <a href="http://pivotallabs.com/device-wall-second-screen-experiment/">Pivotal Labs</a></p>
<p>Recently <a href="http://pivotallabs.com/">Pivotal Labs</a> decided to push mobile devices to the limit by connecting multiple devices to one other in order to have them behave as one. Through the use of image recognition, optical character recognition, persistent low cost connections and a whole lot of ingenuity Pivotal Labs was able to put together an innovative and unique experience. Below, we have collected all the accounts of the key individuals involved in bringing to life this piece of innovation and technology.</p>
<h2 id="Header1">How we did it</h2>
<p>Engineers at Pivotal Labs came up with an idea to use multiple devices to orchestrate a unique <b>unified experience</b>. With so many people interested in contributing to this idea, a hackathon ensued where engineers worked in groups, each group contributing on the separate pieces needed to make this happen. 
While most of the tasks were accomplished during the hackathon, a few projects lingered beyond the hackathon, such as building the stand and working on the general stability of the framework. The <a href="https://github.com/EmirWeb/DeviveWallSuite">source code</a> is available for those who want to try to replicate this flow.</p>
<h2 id="Header2">OTA and Architecture</h2>
<p>By Emir Hasanbegovic (<a href="www.emirweb.com">website</a>, <a href="www.twitter.com/#/phigammemir">twitter</a>, <a href="https://github.com/emir-hasanbegovic">GitHub</a>)</p>
<p>Before we could start building the applications that would run in this unified experience, we needed to build a software layer to run these applications. </p>
<p>We split the main communication layer into 3 parts. The <b>server</b>, the <b>client</b> and the <b>client server</b>. 
You can read in more detail the idea behind each of these <a href="http://www.emirweb.com/SecondScreen.php">here</a>.
The server would be our communication protocol layer, <a href="http://www.rabbitmq.com/">RabbitMQ</a> and apache in this case, the client would be the phone applications and the server client would be java applications running server side.
In short, the server clients and the clients would communicate between each other using the server. 
The server client would keep track of the entire state of the unified experience and report to each client their particular state with respect the unified experience.
Each client would then render their respective state. 
The clients would also collect sensor events such as touch and send this information back to the server client. Think of it as one big <a href="http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller">MVC</a> where the views are the clients, the controllers are the server clients and the models are replicated on boths sides. 
</p>
  
<p>To get the interactive and responsive experience we wanted, we knew we had to innovate on what kind of technologies we needed to bring to mobile. 
In this case we brought RabbitMQ's implementation of AMQP to help move messages between devices.</p>

<p>We built libraries and services that would manage all the connection details, 
allowing the client developers to focus on the content they were transmitting as opposed to the delivery system. 
This made development of the individual games and applications possible in a very short time. In some cases a single day.</p>
<h2 id="Header3">Architecture diagram of libraries</h2>
<p>The red parts represent the sections that app developers were responsible for. The rest was provided by the libraries team.</p>
<img class="Images" src="Images/DeviceWall/ArchitectureDiagram.png" width="500px"/>
<h2 id="Header4">Screen Detection</h2>
<p>By Greg Weresch (<a href="https://twitter.com/weresch">twitter</a>, <a href="https://github.com/xtreme-greg-weresch">GitHub</a>)</p>
<p>We had heard of the <a href="http://opencv.org/">OpenCV</a> (Open Source Computer Vision) library before, and it looked powerful with many potential applications. 
We started looking for an opportunity to play around with it and realized that one of the interesting problems that we'd want to solve for the 
Device Wall would be to determine where the device screens were relative to each other. 
We took this as an opportunity to give OpenCV a spin!</p>
<p>OpenCV is a library that focuses on image processing. It analyzes and manipulates images. 
This was useful after setting up the devices on the wall. We could take a picture of them to determine where their screens were relative to each other and identify each device.</p>
<p>The process starts by running an app on each of the devices. This application communicates with a server to get a unique id. 
The devices then each show a white screen with their id in the center. 
We take a picture of all these devices and analyze it. 
We detect contours in the picture and throw out those that don't have four corners and a minimum area. 
At this point we've found all the rectangles of sufficient size in the picture. 
Luckily devices have rounded corners and perfectly rectangular screens, so we only detect their screens.</p>

<p>We then iterate over all the various rectangles we've found to find the outermost points. 
These define the boundaries of the virtual screen that they all make up together.  
We use the virtual screen's dimensions and fit an image to it. 
Knowing all the screens' points relative to this virtual screen, we can cut out pieces of that image and show them on their respective devices. </p>
<p>The final step is determining which screen belongs to which device. 
We crop each screen individually from the picture, using <a href="http://www.imagemagick.org/">ImageMagick</a>, 
then run the open source optical character recognition (<a href="http://en.wikipedia.org/wiki/Optical_character_recognition">OCR</a>) program <a href="https://code.google.com/p/tesseract-ocr/">Tesseract</a> 
to detect the two digit id in the middle of the screen. 
We used two digits since it greatly improved the accuracy over using single digit numbers.</p>
<p>Finally we can match the id to each virtual screen and we can determine the relative position of the screens to their corresponding virtual screen. 
We write all this out into a <a href="http://www.json.org/">JSON</a> string, which the server will use to cut an image up and deliver to the devices.</p>
<h2 id="Header5">The Process</h2>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep0.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep1.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep2.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep3.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep4.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep5.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep6.png" width="500px"/></p>
<p><img class="Images" src="Images/DeviceWall/FindSquaresStep7.png" width="500px"/></p>


<h2 id="Header6">Memory Game</h2>
<p>By Devin Fallak (<a href="https://twitter.com/aefix">twitter</a>, <a href="http://ca.linkedin.com/pub/devin-fallak/11/816/385">LinkedIn</a>, <a href="https://github.com/xtreme-devin-fallak">GitHub</a>) </p>
<p>The Memory Game is a game enjoyed by children of all ages around the world. 
The rules are simple: flip up a card to see what it is, then flip up another card to see if you can find the same card.  
If the cards are the same, the cards stay flipped up. If they are different, the cards flip over again. 
Repeat until all cards are flipped up.</p>
<p>We built this game into the Xtreme Screen by making each phone represent a card, and each tablet represent two cards. If there are an odd number of cards, one phone will remain empty or a tablet will only show one card.</p>
<p>The game state resides on the Memory Game server client. When the game is initialized, all cards are shuffled and flipped down. The assignments are sent to the clients. When the user touches a card, events are sent to the server client. The server client responds by sending a message back to the client telling it to flip up the card if appropriate. It then either flips the two cards back over if they don't match, or if they do match, it either does nothing if there are more cards to be flipped, or displays a win message to the user if they have flipped over all the cards and won the game.</p>
<p>We used custom view animations to animate the card images in the Android app. In order to save time, we leveraged the <a href="https://code.google.com/p/android-3d-flip-view-transition/">Flip 3D</a> view transition project.</p>
<img class="Images" src="Images/DeviceWall/CardGame.jpg" width="500px"/>

		</div>
	
	<?php echo Facebook::getFacebookRoot();?>
	<?php echo DomManager::getScripts(); ?>
	</body>
</html>

