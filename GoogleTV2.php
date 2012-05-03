<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Utilities.php');
	include_once('Utils/Facebook.php');
	include_once('Utils/Social.php');
	include_once('Utils/SyntaxHighlighter.php');
	include_once('Widgets/Group.php');
	include_once('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Blog.css');
	DomManager::addCSS('CSS/Social.css');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("Google TV: The Full Monty"); ?>
	</head>
	<body>
		<?php
			echo NavigationBar::getNavigationBar($buttons);
		?>
		<div class="Container">
			<div class="TableOfContents">
				<?php  echo Social::getSocialBar(); ?>
				<h2>Google TV: The Full Monty</h2>
				<ul>
				
					<li><a href="#Header_1">Synopsis</a></li>
					<li><a href="#Header_2">Google TV Then</a></li>
					<li><a href="#Header_3">Google TV Now</a></li>
					<li><a href="#Header_4">3.0 Home Screen</a></li>
					<li><a href="#Header_5">3.1 (also 3.2) Home Screen</a></li>
					<li><a href="#Header_6">CES 2012</a></li>
					<li><a href="#Header_7">Sony Remote</a></li>
					<li><a href="#Header_8">Vizio Stream</a></li>
					<li><a href="#Header_9">LG</a></li>
					<li><a href="#Header_10">Lenovo</a></li>
					<li><a href="#Header_11">Samsung</a></li>
					<li><a href="#Header_12">Summary</a></li>
					<li><a href="#Header_13">Competition</a></li>
		
				</ul>

			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
			<div class="Essay">
				
				<h1 id="HighLevelOverView">Google TV: The Full Monty</h1>
				<h2 id="Header_1">Synopsis</h2>
				<p>
Some time has passed since my <a href="GoogleTV.php">initial investigation</a> of Google TV.
While this is still relevant, a lot is happening. <a href="http://en.wikipedia.org/wiki/Original_equipment_manufacturer">OEM</a>s are starting to 
show their support with different Google TV implementations and Google has also kept their partners busy
with newer operating system releases.
				</p>
				<h2 id="Header_2">Google TV Then</h2>
				<p>
Google TV is a multimedia centre that takes a video feed and overlays it with the Android operating system.
On October 6, 2010 Google TV made its apperance via the 
<a href="http://www.logitech.com/en-us/smartTV/revue">Logitech Revue</a> and 
<a href="http://www.google.com/tv/get.html">two Sony devices</a>, 
a Blu-Ray player and a Television. The initial release offered users the ability to access the internet 
as well as a few pre-installed native applications, such as 
<a href="https://play.google.com/store/apps/details?id=com.nbadigital.gametimegtv&hl=en">NBA Gametime</a>
and 
<a href="https://signup.netflix.com/">Netflix</a>.
At that point, the only way to distibute an application to Google TV 
was to design a TV optimized web app. These apps run in Chrome, the native browser. 
Google features such apps through their 
<a href="http://www.google.com/tv/spotlight-gallery.html">Spotlight</a>
 application, which is found in the main menu. 
 This release was Google's first attempt to put  <a href="https://www.google.com/chrome">Chrome</a> 
  on an Android device and  
 support <a href="http://get.adobe.com/flashplayer">Flash</a> in the native browser.
				</p>
				<p>
The Logitech Revue is a separate device that takes in an HDMI 
feed and adds Google TV. Logitech has recently announced that it will be dropping its Google TV initiative. 
				</p>

				<img class="Images" src="Images/GoogleTV/logitech_revue.jpg" width="500px"/>

				<p>
Sony has a Blu-Ray player as well as a television with Google TV built into the devices.
In my opinion, this is the best way to distribute Google TV.				
				</p>
				
<img class="Images" src="Images/GoogleTV/sony_bluray.jpg" width="500px"/>				
<img class="Images" src="Images/GoogleTV/sonyTV.png" width="500px"/>
				<h2 id="Header_3">Google TV Now</h2>
				<p>
 
In January of 2012, Google released version 3.1. Sony was the first
to update its devices and Logtech followed suit a few months later. For developers, 
this new version opened up native app development. 
The first release featured Android SDK version 3.0 
(<a href="http://developer.android.com/sdk/android-3.0-highlights.html">Honeycomb</a>)
and did not have a market application (<a href="https://play.google.com/store?hl=en">Google Play</a>).
Native (SDK) development was not available to the public
until this point. For end users, this new version opened up the market
and the ability to download the native apps that developers could now make. A few apps were available shortly 
after this initial release, such as the 
<a href="http://www.xtremelabs.com/client/al-jazeera/">Aljazeera Google TV</a> 
application, for which I was the technical lead at <a href="http://www.xtremelabs.com">Xtreme Labs</a>,
 who also produced the 
<a href="http://www.xtremelabs.com/client/national-film-board-of-canada/">National Film Board of Canada</a> 
Google TV application.  
				</p>
				<h2 id="Header_4">3.0 Home Screen</h2>
				<img class="Images" src="Images/GoogleTV/honeycomb_launcher_30.jpg" width="500px"/>
				<h2 id="Header_5">3.1 (also 3.2) Home Screen</h2>
				<img class="Images" src="Images/GoogleTV/honeycomb_launcher_31.png" width="500px"/>
				<p>
Recently, Google TV released Android SDK version 3.2 to their Sony devices and soon to Logitech devices.
Version 3.2 includes <a href="http://en.wikipedia.org/wiki/HTTP_Live_Streaming">Http Live Streaming</a> support,
with a focus on <a href="http://en.wikipedia.org/wiki/M3U">m3u8</a> files. 
These files point to variable bit rates of the same video
and allow apps using the native video player to get the best response. 
This is critical for in market devices, as they do not have a lot of processing power.
While every optimization is valuable, m3u8 support is the most relevant. Before this support was available
,
users without a strong internet connection would see their devices hang (black screen or worse) 
while the video loaded.
				</p>
				<h2 id="Header_6">CES 2012</h2>
				<p>
Smart television was the main focus of this year's <a href="http://www.cesweb.org/">CES</a>, where
 many companies showed off their Google TVs.
Those that did not have a showcase ready for CES made sure to announce their progress.
 Google announced new partners Vizio, Samsung and LG.
				</p>
				<h2 id="Header_7">Sony Remote</h2>
				<p>
Sony still leads the market with Google TV devices. Their latest addition is their new remote control.
				</p>
				<img class="Images" src="Images/GoogleTV/sony_controller_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/sony_controller_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/sony_controller_3.jpg" width="500px"/>
				<h2 id="Header_8">Vizio Stream</h2>
				<p>
Vizio is entering the market with a streaming device, the 
<a href="http://www.vizio.com/ces/streamplayer/overview">Vizio Stream Player</a>.
 It has yet to be seen what this device will be streaming and how the experience will
compare to that of the existing Sony and Logitech devices. Vizio is also
rumoured to be working on a 
<a href="http://en.wikipedia.org/wiki/Set-top_box">set-top box</a>,
 which would allow cable providers to sell Google TV. 
				</p>
				<img class="Images" src="Images/GoogleTV/vizio_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_3.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_4.jpg" width="500px"/>
				
				<h2 id="Header_9">LG</h2>
				<p>
LG hasn't made any announcements about when their work will be available for purchase,
 but they did show off a Google TV and its matching remote.
				</p>
				<img class="Images" src="Images/GoogleTV/lg_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/lg_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/lg_3.jpg" width="500px"/>
				
				<h2 id="Header_10">Lenovo</h2>
				<p>
The <a href="http://www.android.com/about/ice-cream-sandwich/">Ice Cream Sandwich</a> (Android SDK 4.0) 
hype was at its peak during CES.
Lenovo capitalized on this by announcing an Ice Cream Sandwich based Smart TV, rumoured to initially launch 
in China.
It is important to note that this Ice Cream Sandwich Smart TV is not a part of the official Google TV family. 
Its users will not have access to Google Play or native video support that official Google
TV boxes have, similar to the difference between an Android tablet and a 
<a href="http://en.wikipedia.org/wiki/Kindle_Fire">Kindle Fire</a> or 
<a href="http://www.kobobooks.com/kobovox">Kobo Vox</a>.
				</p>
				<img class="Images" src="Images/GoogleTV/lenovo.jpg" width="500px"/>
				
				<h2 id="Header_11">Samsung</h2>
				<p>
Samsung already has an HTML5 based 
<a href="http://www.samsung.com/us/2012-smart-tv/">Smart TV</a> initiative. So it will be interesting to see
what this means for their Google TV initiative.
				</p>
				<h2 id="Header_12">Summary</h2>
				<p>
Clearly, there are many devices doing a variety of things with Google TV; set-top box vs. 
stream player vs. Blu-Ray vs. Televisions.
Within all of these, there are different operating system versions; 3.1 vs. 3.2 vs 4.0,
as well as different remotes and home screens.
				</p>
				<p>
This market fragmentation may seem like a bad thing, but there are benefits. The Android operating system allows 
for apps to move between versions easily;
 app deployment/development will still be quick and easy.
From the OEM point of view, each attempts to differentiate themselves. 
Consider the home screen for a <a href="Images/GoogleTV/samsung_home_screen.jpg">Samsung Android phone</a> 
vs. a <a href="Images/GoogleTV/galaxy_nexus_home_screen.jpghasa">Google Sponsored phone</a>  
such as the Nexus series, which appear different but operate in the same way.
The advantage to this is that each OEM can infiltrate their best selling market with Google TV.
I predict that in time Google TV will be in every TV market. 
It is a inexpensive implementation (Google does the develpment for free) and Google has a large 
user and developer following.
OEMs would be missing out if they didn't take advantage of such a lucrative opportunity. 
				</p>
				<h2 id="Header_13">Competition</h2>
				<p>
Apple has been looming in the shadows with <a href="http://www.apple.com/ca/appletv/">Apple TV</a>. 
It operates as an TV add-on and does not supplement the feed as Google TV does.
Apple TV has not yet opened up development for their devices so
only the apps that come pre-installed are currently available. Most of the pre-installed apps are based off
 a template, which means they all appear the same but offer different content. The major differentiation 
between Apple TV and Google TV is the ability to move files to the Apple TV from other iOS devices
or iTunes and play, stream and <a href="http://en.wikipedia.org/wiki/AirPlay">air play</a>. 
Google TV has the technology to accomplish this but does not have applications that do so, yet.
				</p>
				<p>
Lets not forget <a href="http://www.boxee.tv/">Boxee</a>, 
<a href="http://www.roku.com/ca">Roku</a>, 
<a href="http://www.samsung.com/us/2012-smart-tv/">Samsung Smart TV</a>,
<a href="http://www.xbox.com/">X-Box</a>, 
<a href="http://www.playstation.ca/">Playstation 3</a> and  
<a href="http://www.wdc.com/en/products/WDTV/">WDTV</a>. Each of these have 
the same potential as Google TV, but not the same focus or OEM support. 
It will be interesting to see their individual long term success.
				</p>
			
				<br />
				<br />
				<br />
				<br />
				
			</div>
			
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
