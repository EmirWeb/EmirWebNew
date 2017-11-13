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
DomManager::addScript('https://staging.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js?env=staging&log_level=2"');

$TITLE = "The power and structure of push: A second screen solution.";
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
				<li><a href="#Header1">AMQP/MQTT</a></li>
				<li><a href="#Header2">RabbitMQ</a></li>
			</ul>
			<h2>Building a Second screen experience</h2>
			<ul>
				<li><a href="#Header3">Setup</a></li>
				<li><a href="#Header4">Clients</a></li>
				<li><a href="#Header5">Controller</a></li>
				<li><a href="#Header6">AMQP</a></li>
				<li><a href="#Header7">REST</a></li>
			</ul>
			<h2>Architecture</h2>
			<ul>
				<li><a href="#Header8">AMQP</a></li>
				<li><a href="#Header9">Controller</a></li>
				<li><a href="#Header10">Conclusion</a></li>
			</ul>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
		
		<h1 class="Title"><?php echo $TITLE; ?></h1>
		<p>Also posted at <a href="http://pivotallabs.com/power-structure-push-second-screen-solution/">Pivotal Labs</a></p>
<p><a href="http://en.wikipedia.org/wiki/Second_screen">Second screen</a> has been a buzzword for quite some time and rightfully so. 
Getting our tech gadgets to work as one has always been a desire. 
With the adoption of phones as the dominant personal computer over the last few years, we've naturally wanted to connect everything to them.</p>
<p>We're slowly implementing protocols and technologies such as <a href="http://www.intel.com/content/www/us/en/architecture-and-technology/intel-wireless-display.html">WIDI</a>, <a href="http://en.wikipedia.org/wiki/Near_field_communication">NFC</a> and <a href="http://www.bluetooth.com/Pages/Bluetooth-Home.aspx">Bluetooth</a> in the hopes of finding an all encompassing solution. 
So far, these solutions have been designed for communication over small distances, such as connecting to your car when it is nearby. 
What users really want, is to be connected to their world at all times regardless of distance.</p>
<p>Everything I've mentioned points to connecting one device to another. 
Second screen experiences shouldn't be limited to that. 
There is nothing stopping us from connecting a large number of devices together each playing their part in a <b>unified experience</b>.</p>
<p>Communication is getting cheaper and more reliable, devices are getting better access to the internet and better processing power. 
Applications are still being designed with the standard web/<a href="http://en.wikipedia.org/wiki/Representational_state_transfer">REST</a> model in mind. 
The REST model is still valid and an important piece of the puzzle, but it can not solve the second screen paradigm alone.</p>
<p>We've all "Pushed" data to devices using services such as <a href="http://urbanairship.com/">Urban Airship</a>, Push Notifications on iOS or <a href="http://developer.android.com/google/gcm/index.html">Google Cloud Messaging for Android</a>. 
Most people accomplish pushing by using third party service because the technology these services have or the problems they have solved have seemed slightly out of our reach. </p>
<h2 id="Header1">AMQP/MQTT</h2>
<p>The ideal is to have your devices connected and receiving/sending messages to each other in real time. <a href="http://mqtt.org/">MQTT</a> is an older protocol that has been used by industrial companies for years and more recently it is becoming a part of some of the software that you rely on the most, such as <a href="http://ca.blackberry.com/bbm.html">Blackberry Messenger</a>. 
MQTT is a low cost messaging protocol that allows for persistent connections between a device and a server and is agnostic of the data you transfer. A low cost persistent connection and protocol make MQTT an ideal solution for real time communication in both directions.</p>
<p><a href="http://en.wikipedia.org/wiki/Advanced_Message_Queuing_Protocol">AMQP</a> is a <a href="http://en.wikipedia.org/wiki/Message_broker">message broker</a> that runs on MQTT. 
AMQP offers rich features that help organize your connections and decide how messages get handled. 
The broker also gives a publish consume structure that is easy to use and understand.</p>
<h2 id="Header2">RabbitMQ</h2>
<p><a href="http://www.rabbitmq.com/">RabbitMQ</a> offers open sourced client and server implementation of AMQP. 
RabbitMQ comes in several languages and the community behind it offers implementations in several other languages. 
Their efforts make setting up an MQTT styled environment for your application simple and straightforward. </p>
<p>RabbitMQ offers some very convenient features such as guaranteeing delivery of messages and the ability to distribute server implementations. 
You can see an example of how Xtreme Labs has used RabbitMQ to connect devices for the <a href="http://www.emirweb.com/DeviceWall.php">Device Wall</a> project. </p>
<h1>Building a Second screen experience</h1>
<h2 id="Header3">Setup</h2>
<p>We'll go into the finer details of each of these roles and their implementation principles. For now lets simply introduce the key pieces of the puzzle.</p>
<img class="Images" src="Images/SecondScreen/SecondScreen.png" />
<h2 id="Header4">Clients</h2>
<p>Each client device will have a specific role in the second screen experience. 
Most of these clients will need an AMQP connection. Some devices will not need to receive push notifications, these devices can omit the AMQP connection if they don't want to implement it.</p>
<h2 id="Header5">Controller</h2>
<p>This application resides in the cloud and connects to the AMQP server as any other client would. 
The Controller manages the state of the unified experience. 
It sends and receives messages from/to the clients and manages their unified state. 
It should also tie into the data that is being served up via REST, specifically the state data. 
The controller must be running at all times and always be connected to AMQP as this is the center of your experience.</p>
<h2 id="Header6">AMQP</h2>
<p>The AMQP Server, or an MQTT implementation, will run in the cloud and handle all communication. </p>
<h2 id="Header7">REST</h2>
<p>You will still need a REST server. It will work like a traditional REST/<a href="http://en.wikipedia.org/wiki/Create,_read,_update_and_delete">CRUD</a> server, except the controller will be able to save state data into its databases so that the REST server can serve the larger chunks of data that define that state.</p>
<h1>Architecture</h1>
<p>Building an application with a new type of communication will require you to rethink your usual architectural approach. It is important to understand why and when you need to send/receive data through AMQP and when to use REST. </p>
<p>The key difference between a second screen experience and a single screen experience is that the multiple screens offers a unified experience. Keeping them in sync requires real time communication. AMQP offers the real time communication required.</p>
<h2 id="Header8">AMQP</h2>
<p>AMQP communication should be kept short and sweet. The information going through this channel will revolve around what state the user is in. In terms of second screen, the state should be related to what the collection of screens are doing in that moment. In the case of a game, if the users are waiting to start their game, they are in a waiting state and should all show a waiting room. Real time data such as the incoming messages from the other users also needs to come through on this channel.</p>
<h2 id="Header9">Controller</h2>
<p>Because the experience is split up across different devices, it is important to save all the state data on the server, the devices should no longer keep track of what screen they are on, to some degree. This allows the server to manage the experience. </p>
<p>The messages going through AMQP should be short and sweet, this ensures that the system as a whole isn't bogged down trying to transmit large data. Split your data appropriately between your REST server and your AMQP server. For example, do not transmit an entire document through AMQP, instead upload your document to the REST server and pass the url of the document via AMQP. In other words, try passing a minimum amount of information required via AMQP so that the application can build the state using the AMQP data and build the screen details using REST calls upon receiving a minimum amount of state information.</p>
<p>Using AMQP requires a constant connection to the AMQP server, as we all know devices such as our phone can seldom do that, especially as they move from connection to connection. With this concept of state being held on the server and real time information coming in at all times, losing connection means losing vital information to the user experience. </p>
<p>Regaining connection isn't as simple as with REST. Once you have reconnected, you need to "Fast Forward" to the right state. If you missed a message to start playing a game, you need to retrieve the missed message. Your REST server will need to be able to serve up the missed state data. In other words, the state of the Controller should be saved in the REST server in case clients need to recover from network failure, the Controller should only focus on the current state. The key point in all this is the order you perform actions to retrieve state. You must first regain a connection to AMQP and then ask the REST server for your state. This ensures that if the state changes between the time the server checks your state and sends it down, that your active AMQP connection will inform of this change and you can omit the information coming from REST.</p>
<p>While fast forwarding, it is up to you to figure out how to consolidate the incoming data. The easiest procedure is to ensure that only one data source is writing to your local state store at a time and launching events to let your UI know what it needs to do. </p>
<h2 id="Header10">Conclusion</h2>
<p>This architecture change is the main idea behind second screen experiences, it is important to understand each piece's role and how to best accomplish the task. As we move into the future we'll find more and more connected devices now have access to good internet connections and you'll find that a second screen experience will become more and more accessible.</p>

		</div>
	
	<?php echo Facebook::getFacebookRoot();?>
	<?php echo DomManager::getScripts(); ?>
	</body>
</html>