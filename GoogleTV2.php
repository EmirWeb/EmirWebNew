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
					<li><a href="#Header_2">Recap</a></li>
					<li><a href="#Header_3">What has happen since then</a></li>
					<li><a href="#Header_4">3.0 Home Screen</a></li>
					<li><a href="#Header_5">3.1 (also 3.2) Home Screen</a></li>
					<li><a href="#Header_6">CES 2012</a></li>
					<li><a href="#Header_7">New Sony Remote</a></li>
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
Some time has passed since my initial <a href="GoogleTV.php">investigation</a> of Google TV.
The initial investigation is still relevant, but a lot has been happening. OEMs are starting to 
show their support with different devices and Google TV attempts. Google has also kept their partners busy
with newer operating system releases.
				</p>
				<h2 id="Header_2">Recap</h2>
				<p>
Google TV is a multimedia centre that takes a video feed and overlays it with the Android operating system.
On October 6, 2010 Google TV made its apperance via the <a href="http://www.logitech.com/en-us/smartTV/revue">Logitech Revue</a> and <a href="http://www.google.com/tv/get.html">two Sony devices</a>, 
a Blu-Ray player and a Television. The initial release offered users the ability to access the internet 
as well as a few pre-installed native applications, such as 
<a href="https://play.google.com/store/apps/details?id=com.nbadigital.gametimegtv&hl=en">NBA Gametime</a>.
At that point, the only way to get your app on Google TV was to design a TV optimized web app. These apps would 
run through the native browser (chrome). 
Google was really good about featuring such apps through their 
<a href="http://www.google.com/tv/spotlight-gallery.html">Spotlight</a>
 application, which could be found in the main menu. 
 This was the first attempt to put Google's <a href="https://www.google.com/chrome">Chrome</a> 
 browser on an Android device, this was also their first attempt 
 to support <a href="http://get.adobe.com/flashplayer">Flash</a> in the browser.
				</p>
				<p>
The Logitech Revue is a separate device that takes in an hdmi 
feed and adds Google TV to it. (Logitech has recently announced that it will be dropping its Google TV initiative.) 
				</p>

				<img class="Images" src="Images/GoogleTV/logitech_revue.jpg" width="500px"/>

				<p>
Sony has a Blu-Ray player that accomplishes as much as the logitech Revue. It also has a TV that has Google TV built right in, which is really the best way to distribute Google TV in my opinion.				
				</p>
				
<img class="Images" src="Images/GoogleTV/sony_bluray.jpg" width="500px"/>				
<img class="Images" src="Images/GoogleTV/sonyTV.png" width="500px"/>
				<h2 id="Header_3">What has happen since then</h2>
				<p>
The first release featrued Android SDK version 3.0 
(<a href="http://developer.android.com/sdk/android-3.0-highlights.html">Honeycomb</a>)
and did not have a market (<a href="https://play.google.com/store?hl=en">Google Play</a>) application. 
In January of 2012 Google came out with version 3.1. Sony was the first
to update its devices to 3.1, Logtech followed suit a few months later. For developers, 
this new version opened up native app development. Native (SDK) development was not available to the public
until this point. For end users, this new version opened up the market
and the ability to download the native apps that developers could now make. A few apps were there shortly 
after the initial release, I was lucky enough to be the lead developer for the 
<a href="http://www.xtremelabs.com/client/al-jazeera/">Aljazeera Google TV</a> 
application through <a href="http://www.xtremelabs.com">Xtreme Labs</a> who also produced the 
<a href="http://www.xtremelabs.com/client/national-film-board-of-canada/">National Film Board of Canada</a> Google TV application.  
				</p>
				<h2 id="Header_4">3.0 Home Screen</h2>
				<img class="Images" src="Images/GoogleTV/honeycomb_launcher_30.jpg" width="500px"/>
				<h2 id="Header_5">3.1 (also 3.2) Home Screen</h2>
				<img class="Images" src="Images/GoogleTV/honeycomb_launcher_31.png" width="500px"/>
				<p>
Recently Google TV released Android SDK version 3.2 to their Sony devices, Logitech coming soon.
 3.2 includes <a href="http://en.wikipedia.org/wiki/HTTP_Live_Streaming">Http Live Streaming support</a>,
particularly it supports <a href="http://en.wikipedia.org/wiki/M3U">m3u8</a> files. 
These files point to variable bit rates of the same video
and allow apps using the native player to get the best resoponse. 
This is critical for the current devices in market as they do not have a lot of processing power.
At this point, every optimization counts and this one is the most relevant. Before this support, if your
user did not have a strong internet connection devices would hang, black screen or worse, while the video loaded.
				</p>
				<h2 id="Header_6">CES 2012</h2>
				<p>
Smart television was the main focus of this year's CES, many companies showed off their attempts at Smart TV
 and Google TV.
Those that didn't have a showcase ready for CES made important announcements instead.
 Google Announced new partners Vizio, Samsung and LG. Here's a list of the newest announcements:
				</p>
				<h2 id="Header_7">New Sony Remote</h2>
				<img class="Images" src="Images/GoogleTV/sony_controller_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/sony_controller_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/sony_controller_3.jpg" width="500px"/>
				<h2 id="Header_8">Vizio Stream</h2>
				<p>
Vizio is entering the Google TV market with a streaming device, the 
<a href="http://www.vizio.com/ces/streamplayer/overview">Vizio Stream Player</a>.
 I'm not yet sure what it will be streaming and how this experience will
compare to the experiences that the existing Sony and Logitech devices offer. Vizio is also
rumoured to be working on a 
<a href="http://en.wikipedia.org/wiki/Set-top_box">set-top box</a>,
 which means that your cable provider might start selling you Google TV. 
				</p>
				<img class="Images" src="Images/GoogleTV/vizio_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_3.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/vizio_4.jpg" width="500px"/>
				
				<h2 id="Header_9">LG</h2>
				<img class="Images" src="Images/GoogleTV/lg_1.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/lg_2.jpg" width="500px"/>
				<img class="Images" src="Images/GoogleTV/lg_3.jpg" width="500px"/>
				
				<h2 id="Header_10">Lenovo</h2>
				<p>
The <a href="http://www.android.com/about/ice-cream-sandwich/">Ice Cream Sandwich</a> (Android SDK 4.0) 
hype was at its peak during CES.
Lenovo capitolized on it by announcing an Ice Cream Sandwich based TV. Rumoured to initially be launched 
in China and then brought to other international markets.
It is important to note that this Ice Cream Sandwich Google TV is not a part of the official Google TV push. 
Its users will not have access to Google Play or the native video support that the official Google
TV boxes will have. Think of the difference between an Android tablet and a 
<a href="http://en.wikipedia.org/wiki/Kindle_Fire">Kindle Fire</a> or 
<a href="http://www.kobobooks.com/kobovox">Kobo Vox</a>.
				</p>
				<img class="Images" src="Images/GoogleTV/lenovo.jpg" width="500px"/>
				
				<h2 id="Header_11">Samsung</h2>
				<p>
Google and Samsung have anounced a partnership. Interestingly enough, Samsung already has an HTML5 based 
<a href="http://www.samsung.com/us/2012-smart-tv/">Smart TV</a> initiative. So what does that mean for their
Google TV initiative?
				</p>
				<h2 id="Header_12">Summary</h2>
				<p>
As you may have noticed, there are many devices all doing different things with Google TV; set-top box vs. stream player vs. Blu-Ray vs. TV.
Within all of these, there are different operating system versions; 3.1 vs. 3.2 vs 4.0. Don't forget all the different looking remotes 
and home screens.
				</p>
				<p>
This may seem like a bad thing, but in reality it is a good thing. The Android operating system allows 
for apps to move between versions of their operating systems easily, app deployment/development will still be quick and easy.
From the OEM point of view, each tries to differentiate themselves through different means, 
think about the home screen for a <a href="Images/GoogleTV/samsung_home_screen.jpg">Samsung Android phone</a> vs. a <a href="Images/GoogleTV/galaxy_nexus_home_screen.jpg">Google Sponsored phone</a> like the Nexus series.
They look different but they operate the same. The advantage here is that each OEM can inflitrate their best selling market with Google TV.
Mark my words, sooner or later Google TV will be everywhere. 
It is a cheap implementation (Google does the develpment for free) and has a large user and developer following.
OEMs would be missing out if they didn't take advantage of such a lucrative offer. 
				</p>
				<h2 id="Header_13">Competition</h2>
				<p>
Apple has been looming in the shadows with <a href="http://www.apple.com/ca/appletv/">Apple TV</a>. 
Apple TV operates as an add-on for your TV, it does not add to your TV feed the way Google TV does.
Apple TV has not yet opened up develompent for their devices (can't access market) so
only the apps that come pre-installed are curently available. Most of the pre-installed apps are based off
of a template, this means they all look the same but offer different content. The major differentiation 
between Apple TV and Google TV is that you can move your files to the Apple TV from your other iOS devices
or iTunes and play them, stream them, <a href="http://en.wikipedia.org/wiki/AirPlay">air play</a> etc. 
Google TV has the technology to accomplish this but does not have applications that do so, yet.
				</p>
				<p>
Lets not forget <a href="http://www.boxee.tv/">Boxee</a>, 
<a href="http://www.roku.com/ca">Roku</a>, 
<a href="http://www.samsung.com/us/2012-smart-tv/">Samsung Smart TV</a>,
<a href="http://www.xbox.com/">X-Box</a>, 
<a href="http://www.playstation.ca/">Playstation 3</a> and  
<a href="http://www.wdc.com/en/products/WDTV/">WDTV</a>. Each of these have 
the exact same potential as Google TV, just not the same focus or OEM support. 
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
