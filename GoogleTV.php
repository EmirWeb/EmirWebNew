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
	DomManager::addScript('https://js.taplytics.com/jssdk/6eb86dda0e7f40069b85b84261e9e7d9.min.js"');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead("Google TV"); ?>
	</head>
	<body>
		<?php
			echo NavigationBar::getNavigationBar($buttons);
		?>
		<div class="Container">
			<div class="TableOfContents">
				<?php  echo Social::getSocialBar(); ?>
				<h2>Google TV review and tutorial</h2>
				<ol>
					<li>
						<a href="#HighLevelOverView">Google TV</a>
						<ul>
							<li><a href="#QuickSummary">The Device</a></li>
							<li><a href="#HighLevel">UX/UI</a></li>
							<li><a href="#DeviceSpecificFeatures">Capabilities and Features</a></li>
							<li><a href="#Persona">Mobile and Social Implications</a></li>
							<li><a href="#Interesting">Benefits</a></li>
							<li><a href="#Downfalls">Challenges</a></li>
						</ul>
					</li>
					<li>
						<a href="#LowLevelOverView">Developing on a Google TV</a>
						<ul>
							<li><a href="#Introduction">Honeycomb</a></li>
							<li><a href="#Videos">Videos</a></li>
							<li><a href="#OpenSource">Open Source</a></li>
						</ul>
					</li>
				</ol>

			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
			<div class="Essay">
				
				<h1 id="HighLevelOverView">Google TV</h1>
				<h2 id="QuickSummary">The Device</h2>
				<p>
Google TV is a multimedia centre that takes in an HDMI feed and overlays it with the Android operating system. 
It attempts to connect to and communicate with a settop box (cable box) through the connecting HDMI cable.
It reads channel information and controls the box by changing channels. 
Some Google TV devices, such as the Logitech Revue, have the ability to control your television as well. 
By integrating Google TV into a home theatre system, you have the ability to host native android applications
and experience Chrome through your television. To interact with the device, users are given a keyboard and 
mouse in one controller. The controller is a standard keyboard which has had the arrow keys and numerical pad 
replaced with a digital arrow pad and a laptop-styled touch-pad mouse.
				</p>
				<h2 id="HighLevel">User experience and interface (UX/UI)</h2>
				<p>
Most of the interfacing is done through the digital arrow keys as they seem to be the most intuitive. The
standard approach to android design is still available as the keyboards have the standard back, home,
menu and search buttons that all android phones and devices are equipped with. The user experience
for veteran android users will not change much. The addition of the 3.x android SDK provides a
more intuitive approach to large screen space utilization. This is accomplished through the Fragment
class (more on that below) which allows users to hit the back key and retrieve previous states of the
same screen. This is contradictory to previous SDK versions as they emphasized retrieving the entire
previous screen instead.
				</p>
				
				<h2 id="DeviceSpecificFeatures">Capabilities and Features</h2>
				<p>
The device is connected to a settop box and can provide a cable feed. The feed cannot be
changed, added to or interfered with, except through alert messages (<a href="http://developer.android.com/guide/topics/ui/notifiers/toasts.html">Toasts</a>). This is due to agreements between individual
channels, cable distributors and third parties over real estate within the video feed. The feed can also be viewed in Picture in
Picture mode (PIP). Applications can not call up the video feed to full
screen or PIP on their own, only the user has control through the device.
				</p>
				<p>
Settop box connection is a neat feature but provides little satisfaction. Through this connection,
developers are given the opportunity to read the channel listing information provided by the
box/cable provider and ask the Google TV box to change the channel. (This may
allow the settop box feed to be brought into focus but I was unable to test this due to lack of
equipment)
				</p>
				<p>
The main feature that the box provides is a more comprehensive list of supported video streams,
specifically VP6 (*.flv or flash), WMV9/VC-1 and MPEG-2 formats are specifically available
with the device and not the SDK (<a href="http://code.google.com/tv/android/docs/gtv_media_formats.html">supported formats</a>).
				</p>
				<p>
Google TV has the ability to act as a server (OTA and within a closed network) and  
listen to connections without being concerned with battery power. Google has
provided sample code that allows decelopers to build Android phone applications that can replace the physical keyboard. (<a href="http://code.google.com/tv/remote/docs/index.html">Sample Code</a>).
				</p>
				<h2 id="Persona">Mobile and Social Implications</h2>
				<p>
Home theatre systems are communal devices, which make profiling the users somewhat difficult.
Consider mutiple individuals having access to one market account or credit card, or a person
logging into Facebook and forgetting to log out. The operating system and all of
the currently available Android apps were designed for personal devices. This paradigm is no longer relevant, creating a need for 
innovation within social media. A "user" must be redefined and targetted as groups.   
				</p>
				<h2 id="Interesting">Benefits</h2>
				<p>
The addition of internet browsing and native application browsing through the TV experience is not
something new. Apple has been in this market, with little growth. Technology
enthusiasts have been connecting and running their home theatres via computers for years, but the general population
does not have this capability. With Google TV, everything is brought
to one device. This solves many of the complex problems such as connectivity, accessibility, UI/UX
comfort, smart connection to a TV feed and hardware device / operating system developer support.
This results in a rich environment powerful enough for simple as well as complex applications.
				</p> 
				<p>
Google is the first to launch and app market for smart TVs. Apple TV 2 was recently released,
 with very few apps, no market and poor UX/UI. 
Boxee is another big name and is gaining speed, but the large number of already existing apps in the 
the Android market, that just made their way to Google TV,
 will most likely overwhelm the competition. Finally, it looks like Sony has been describing their Google TV initiative as 
one of their prized projects. This means that there will likely be some strong devices coming out to support Google TV. 			
				</p>
				<h2 id="Downfalls">Challenges</h2>
				<p>
Although the UX/UI is well designed, there has been little innovation in terms of providing new features for developers. 
The most appealing feature that Google has demonstrated at <a href="http://www.google.com/events/io/2011/index-live.html">Google I/O</a>
is its ability to interact and add content to the cable feed. However, this is not currently available and likey will not be in the near future.
				</p>
				<p>
I have yet to see a device that is fast enough to offer a UX that is as good as its smaller
tablet counterparts. The devices are slow, so non-native apps tend to offer poor experiences.
The devices currently being distributed are about a year old and some are still awaiting the new SDK. 
It is yet to be seen whether these devices will show improvement with the new release.
				</p>
				
				<h1 id="LowLevelOverView">Developing on a Google TV</h1>
				<h2 id="Introduction">Honeycomb</h2>
				
				<p>
Honeycomb introduced the Fragment class. This allows developers to change parts of their screen
without it affecting others. Fragments live their own life cycle, which is similar to that of an Activity.
This is relevant to Google TV, as the screen real estate is very large and Fragments allow for the creation of stronger user flow.
This is done by creating 'viewing sections' on the screen, interchanging them with relevant information and allowing for interaction
between them and the user. 
				</p>
		
				<p>
In the example below, the fragment tag can be replaced by any instantiation of the Fragment class. the
FrameLayout can act in the same way. The FrameLayout is the best way to use Fragments, due
to some issues or unavailable documentation concerning natively inflated fragments.
				</p>

<pre class="brush: xml;">				
&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="http://schemas.android.com/apk/res/android"
	android:orientation="vertical"
	android:layout_width="fill_parent"
	android:layout_height="fill_parent"&gt;
	
	&lt;fragment class="com.classes.example"
		android:layout_weight="1"
		android:layout_width="fill_parent"
		android:layout_height="0dp"
		android:id="@+id/fragment" /&gt;
		
	&lt;FrameLayout
		android:layout_width="fill_parent"
		android:layout_height="wrap_content"
		android:id="@+id/list" /&gt;
		
&lt;/LinearLayout&gt;
</pre>
				
				<p>
The example below shows how to replace/create fragments.  
				</p>
<pre class="brush: java;">
SampleFragment f = SampleFragment.initialize(object);
FragmentTransaction tr = getFragmentManager().beginTransaction();
tr.replace(R.id.list, f);
tr.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_OPEN);
tr.commit();
</pre>
				<p>The example below shows the initialization function 
that passes the relevant information into the Fragment's parameters.</p>
<pre class="brush: java;">
public static SampleFragment initialize(Object serializableObject) {
	Bundle bundle = new Bundle();
	bundle.putSerializable(“Object”, serializableObject);
	SampleFragment sampleFragment = new SampleFragment();
	sampleFragment.setArguments(bundle);
	return sampleFragment;
}
</pre>
				<h2 id="Videos">Videos</h2>
				<p>
Although Flash and HTML5 is now available for integration into native applications on tablets (other
honeycomb devices), Google TV has not yet provided that feature. Flash and HTML5 (video) are strictly
available through chrome. For example, embedding a YouTube video in a native
application (using a WebView) will not work on Google TV. The only video solution is the native
VideoView (<a href="http://code.google.com/tv/android/docs/gtv_media_formats.html">supported formats</a>).
				</p>
				
				<p>
The example below will start a video feed (including flv's).
				</p>
<pre class="brush: java;">
VideoView videoView = (VideoView) findViewById(R.id.video);
videoView.setVideoPath(“http://www.sample.com/videoFeed”);
videoView.requestFocus();
videoView.start();
</pre>
				
				<h2 id="OpenSource">Open Source</h2>
				<p>
					<a href="https://github.com/EmirWeb/Canada-TV">Click here</a> to see some of the Google TV work that 
					I have done. It uses <a href="http://www.canada.com">canada.com</a> APIs and 
					<a hreaf="http://www.bing.com/images">Bing image</a> APIs to bring Canadians a TV guide. 
				</p>
				
			</div>
			
		</div>
		<?php echo Facebook::getFacebookRoot();?>
		<?php echo DomManager::getScripts(); ?>
	</body>
</html>
