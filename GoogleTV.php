<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Widgets/Group.php');
	include('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/GoogleTV.css');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
	</head>
	<body>
		<?php echo NavigationBar::getNavigationBar(null);?>
		
		
		<div class="Container">
			<div class="TableOfContents">
				<ol>
					<li>
						<a href="#HighLevelOverView">High Level OverView</a>
						<ul>
							<li><a href="#QuickSummary">Quick Summary</a></li>
							<li><a href="#HighLevel">High Level UX/UI</a></li>
							<li><a href="#DeviceSpecificFeatures">Device Specific Features</a></li>
							<li><a href="#Interesting">Why the device is interesting</a></li>
							<li><a href="#Persona">Mobile/Social persona</a></li>
							<li><a href="#Upside">Upside</a></li>
							<li><a href="#Downfalls">Downfalls</a></li>
						</ul>
					</li>
					<li>
						<a href="#LowLevelOverView">Lower Levels of the Device</a>
						<ul>
							<li><a href="#Introduction">Introduction of the Honeycomb SDK 3.x</a></li>
							<li><a href="#Videos">Videos</a></li>
						</ul>
					</li>
				</ol>
			
			</div>
			<div class="Essay">
				<h1 id="HighLevelOverView">High Level Over View</h1>
				<h2 id="QuickSummary">Quick Summary</h2>
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
				<h2 id="HighLevel">High Level UX/UI</h2>
				<p>
Most of the interfacing is done through the digital arrow keys as they seem to be the most intuitive. The
standard approach to android design is still available as the keyboards have the standard back, home,
menu and search buttons that all android phones and devices are equipped with. So the user experience
for experienced android users will not change much. The addition of the 3.x android SDK provides a
more intuitive approach to large screen space utilization. This is accomplished through the Fragment
class, more on that below, which allows users to hit the back key and retrieve previous states of the
same screen. This is contradictory to previous SDK versions as they emphasized retrieving the entire
previous screen instead.
				</p>
				
				<h2 id="DeviceSpecificFeatures">Device Specific Features</h2>
				<p>
The device is connected to a settop box and can provide a cable feed. The feed cannot be
changed, added to or interfered with except through alert messages (Toasts for those more
familiar with the SDK). This is due to many complicated legal reasons and deals that individual
channel providers, channels and cable distributors have with each other and third parties over
who has control of what real estate of the video feed. The feed can also be viewed in Picture in
Picture mode (PIP) only at the user's request. Applications can not call up the video feed to full
screen or to PIP on their own, only the user has that control through his device.
				</p>
				<p>
Settop box connection is a fun feature that provides little satisfaction. Through this connection,
developers are given the opportunity to read the channel listing information provided by the
box/cable provider and ask the Google TV box to change the channel to any of these. (This may
allow the settop box feed to be brought into focus but I was unable to test this due to lack of
equipment)
				</p>
				<p>
The main feature that the box provides is a more comprehensive list of supported video streams
specifically VP6 (*.flv or flash), WMV9/VC-1 and MPEG-2 formats are specifically available
with the device and not the SDK: <a href="http://code.google.com/tv/android/docs/gtv_media_formats.html">source</a>
				</p>
				<p>
The ability to for the device to act as a server (OTA and within a closed network) and allow the
device to listen to connections without being concerned with battery power. Google has
provided a very specific example that allows users to build Android phone devices that control
the hardware features such as controlling the channel with the phone and a
				</p>
				
				
				<h2 id="Interesting">Why the device is interesting</h2>
				<p>
The addition of internet browsing and native application browsing through the TV experience is not
something that is new. Apple has been in the market for a few years with no growth. Computer
enthusiasts have also been connecting and running their home theatres via their computers for years.
But only a select few knew how to do it, use it and maintain it. With Google TV, everything is brought
to one device that has many of the complex problems such as connectivity, accessibility, UI/UX
comfort, smart connection to TV feed and a hardware device - operating system combination powerful
enough to provide a rich environment for simple and complex applications alike that fall into the
simple use paradigm of their UX.
				</p>
				
				<h2 id="Persona">Mobile/Social persona</h2>
				<p>
Home theatre systems are communal devices which makes the idea of a user somewhat difficult.
Consider two individuals having access to one market account and one credit card. Or one person
logging into Facebook and then forgetting to log out. The issue is that the operating system and all of
the currently available apps were designed for personal devices. This paradigm is no longer available,
although this offers room for innovation within social media, i.e. how do you get a family to interact
with the online community or a group of students etc.
				</p>
				<h2 id="Upside">Upside</h2>
				<p>
Google does a first with their best foot forward. The market is currently unchallenged. Apple TV 2 just came out with very few apps, no market and the standard UI freeze here and there that we've all come to expect from apple. I raise this issue because it is accentuated on a Television platform. 
Boxee is a big name and is gaining speed. But the large number of already existing apps in the Google TV market that need slight changes to their UI/UX to make it to a new audience will most likely overwhelm the competition. Finally it looks like Sony has been describing it as one of their prized projects which means that there will be some strong devices coming out to support HoneyComb. 			
				</p>
				<h2 id="Downfalls">Downfalls</h2>
				<p>
There has been very little innovation in terms of providing new features for developers. When you can
count the individual features on one hand, you know something has gone awry. Most of it seems to
stem from the fact that Google has had a hard time fighting the different entities that already control
television media for control over the feed. The most appealing feature that Google had demonstrated at
Google I/O, interacting and adding content to the video feed, is not available and there seems to be a
very small road-map ahead to accomplish this.
				</p>
				<p>
I've yet to see a device that is fast enough to offer a UX that is as good if not better than its smaller
tablet counterparts. The devices in general have been very slow and have not been fun to watch at
work. The devices currently being distributed are about a year old and are awaiting the new SDK that
will apparently save the experience, but I doubt that the Logitech Revue, for example, who barely runs
the 2.2 version will be able to run the clunky 3.1 operating system.
				</p>
				
				
				<h1 id="LowLevelOverView">Lower Levels of the Device</h1>
				<h2 id="Introduction">Introduction of the Honeycomb SDK 3.x - Fragments and why they are important</h2>
				
				<p>
Honeycomb introduced the Fragment class, this allows developers to change parts of their screen
without it affecting others. Fragments live their own life cycle, which is similar to that of an Activity.
This is mostly relevant on Google TV as the screen real estate is very large and from a design point of
view, we want to be able to leverage it as efficiently as possible. This is done by creating 'viewing
sections' on the screen, interchanging them with relevant information and allowing for interaction
between them and the user. These are best accomplished with Fragments.
				</p>
				<p>Example:</p>
				<code class="XML">
					<pre>
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
				</code>
				<p>
In the example above, the fragment tag can be replaced by any instantiation of the Fragment class, the
FrameLayout can act the same way. In actuality the FrameLayout is the best way to use Fragments due
to some issues or unavailable documentation concerning natively inflated fragments.
				</p>
				<p>A:</p>
				<code class="Java">
					<pre>
		SampleFragment f = SampleFragment.initialize(object);
		FragmentTransaction tr = getFragmentManager().beginTransaction();
		tr.replace(R.id.list, f);
		tr.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_OPEN);
		tr.commit();
					</pre>
				</code>
				<p>B:</p>
				<code class="Java">
					<pre>
		public static SampleFragment initialize(Object serializableObject) {
			Bundle bundle = new Bundle();
			bundle.putSerializable(“Object”, serializableObject);
			SampleFragment sampleFragment = new SampleFragment();
			sampleFragment.setArguments(bundle);
			return sampleFragment;
		}
					</pre>
				</code>
				<p>
A is an example of how to replace fragments, and be is the initialize function that passes the relevant
information into the bundle so that when the Fragment surfaces through the SDK it has values in its
bundle. For some reason you can not accomplish this through a constructor.
				</p>
				<h2 id="Videos">Videos</h2>
				<p>
Although flash and html is now available for integration into native applications on tablets (other
honeycomb devices) Google TV has not yet provided that feature. Flash and HTML5 are strictly
available through chrome. Someone, for example, wanting to embed a YouTube video in their native
application can do so on a tablet but can not on a Google TV device. The only alternative is the native
VideoView. Use the above mentioned supported formats,.
				</p>
				<p>Example:</p>
				<code class="Java">
					<pre>
	VideoView videoView = (VideoView) findViewById(R.id.video);
	videoView.setVideoPath(“http://www.sample.com/videoFeed”);
	videoView.requestFocus();
	videoView.start();
					</pre>
				</code>
				<p>
This will start a video feed, including flv's.
				</p>
				
				<h2 id="OpenSource">Open Source</h2>
				<p>
					The work I did can be found here 
					<a href="https://github.com/EmirWeb/Canada-TV"></a>
				</p>
				
			</div>
		</div>
	</body>
</html>