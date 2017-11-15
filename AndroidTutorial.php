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
DomManager::addScript('https://js.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js"');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead("Android Tutorial"); ?>
	</head>
<body>
<?php
echo NavigationBar::getNavigationBar($buttons);
?>
	<div class="Container">
		<div class="TableOfContents">
			
		<?php  echo Social::getSocialBar(); ?>

			<h2>Android Tutorial</h2>
			<ul>
				<li>
					<a href="#Title1">Android Workshop</a>
			
					<ul>
						<li><a href="#Header1">Android Details</a></li>
						<li><a href="#Header2">Model View Controller (MVC)</a></li>
						<li><a href="#Header3">Main idea (Guidelines)</a></li>
						<li><a href="#Header4">MVC with Android</a></li>
						<li><a href="#Header5">Threads</a></li>
						<li><a href="#Header6">User Interface (UI) Thread</a></li>
						<li><a href="#Header7">Activity Life Cycle</a></li>
					</ul>
				</li>
				<li>
					<a href="#Title2">Tutorial</a>
			
					<ul>
						<li><a href="#Header8">Extra Android Information</a></li>
						<li><a href="#Header9">Full Tutorial (Source code)</a></li>
					</ul>
				</li>
			</ul>
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
			<h1 id="Title1">Android Workshop</h1>
			<h2 id="Header1">Android Details</h2>

			<p>Android is a framework that provides java programmers the ability
				to control different aspects of smart devices. This interaction
				happens through the Android SDK (Software Development Kit).</p>

			<h2 id="Header2">Model View Controller (MVC)</h2>

			<p>This is a programming paradigm that is used to help programmers
				organize large projects in common ways. As a result, Larger projects
				become more maintanable and incoming develpers can quickly learn
				about the project, as they will have an idea about how everything is
				generally organized. Models represent the raw information or access
				points to the raw information. Views represent the visual
				representation of the models. More generally they represent the
				layout of the information.</p>

			<p>Your model, for example, can be a collection of menu items and
				prices (Strings and doubles). The view may be a scrollable list that
				has the menu item names on the left of each cell (list item) and the
				prices on the right. The view may offer other extra information such
				as dollar signs in front of each price.</p>

			<p>Controllers connect the Views to the Models, they contain all the
				logic. Every event that is intercepted, such as a touch, is sent to
				its respective controller. The controller then decides, based on the
				input, which models to query. The information collected is then sent
				to the view which renders the visual representation of the models
				and the associated actions. The users actions are completed by the
				view being rendered</p>

			<p>Consider the following example: A user taps on one of the menu
				items, the device collects the information and sends it to the
				controller, the controller now retrieves the Model for the
				information for that menu item. In this case the information
				contains the ingredients, the wine pairing and an image of the item
				(these may be several Models that have been queried to collect these
				results). The controller then packs the information up nicely for
				the view that will show this information to the user in an organized
				fashion.</p>

			<h2 id="Header3">Main idea (Guidelines)</h2>

			<p>The view is expensive to manage, so minimize the amount of work it
				does. The Model is expensive to retrieve so minimize the work it
				does. The controller does the majority of the work and is also
				responsible for minimizing the amount of work the model or view will
				have to do. The controller knows everything about the Models and
				very little about the Views. The views, in turn, know a lot about
				their controllers.</p>

			<h2 id="Header4">MVC with Android</h2>

			<p>Android attempts to use this by providing the user with resources
				and layouts (res folder) that are either raw data files, such as
				images, or layouts (in XML format). These are the views, they
				dictate exactly what the program will look like, how everything is
				laid out. Android follows the “Main idea” from above by doing
				absolutely no work in the views(ie. No loops, no procedural
				programming). The controllers are called activities, they interact
				with the views to create a user experience. The SDK triggers events
				in the activities. The activity collects the information from the
				models, builds the view and sets up the event triggers needed to
				accomplish the tasks. Models are left to the user's discretion,
				usually they are implemented as classes, it is recommended to build
				as many classes that have no ties to the activities as possible to
				provide modularity.</p>

			<h2 id="Header5">Threads</h2>

			<p>A thread is a process that is run on the CPU. When a program is
				started it is a thread/process. A program/thread/process can spawn
				and control other threads and processes to do tasks simultaneously.</p>

			<p>For example: A thread can collect keyboard information, while
				another thread can allow the cursor to flicker. This can obviously
				be done in one thread if the programmer so wishes, but it is easier
				to let the operating system deal with running multiple threads at
				the same time and let the programmer code simpler programs. If
				threads were unavailable, and the programmer wanted to keep his
				program as simple, the cursor would stop blinking while we wait for
				the user to input information into the keyboard (this may cause the
				user to think the computer crashed).</p>

			<p>The difficulty behind threads is that they are very hard to
				control and can cause many issues related to accessing variables
				simultaneously.</p>

			<h2 id="Header6">User Interface (UI) Thread</h2>

			<p>Because threads are so difficult to control accurately, Android
				(and most smart phones) have a UI thread that controls all user
				input and all drawing of objects. Android will not allow you to do
				these outside of the UI Thread. So DO NOT LOOP ENDLESSLY in the UI
				thread as it will cause the phone to stop responding.</p>

			<p>Layouts and Views</p>

			<p>Layouts are xml files that describe how everything will be laid
				out on the screen. The simplest layout tool is the LinearLayout this
				lets the items inside it be places horizontally or vertically, one
				after the other in the order in which they appear in the XML file.
				The simpler Views: An ImageView holds the images and a TextView
				holds the text. Note that everything must have layout_height and
				layout_width value in its opening XML tag. See the example below.</p>

<pre class="brush: xml;">
&lt;?xml version="1.0" encoding="utf-8"?&gt;
&lt;LinearLayout xmlns:android="http://schemas.android.com/apk/res/android"
	android:orientation="vertical"
	android:layout_width="fill_parent"
	android:layout_height="fill_parent"&gt;
	&lt;ImageView  
		android:layout_width="wrap_content" 
		android:layout_height="wrap_content" 
		android:src="@drawable/kitty"/&gt;
	&lt;TextView  
		android:layout_width="wrap_content" 
		android:layout_height="wrap_content" 
		android:text="Kitten"/&gt;
&lt;/LinearLayout&gt;
</pre>

			<h2 id="Header7">Activity Life Cycle</h2>
			<p>The activity life cycle is important to know as it tells you what
				state your app is in, ie. Whether or not you have focus or if you
				are on the screen.</p>

			<img src="Images/AndroidTutorial/lifeCycle.png">

			<h1 id="Title2">Tutorial</h1>

			<h2 id="Header8">Instructions</h2>

			<p>
				Download, install and open <a href="http://www.eclipse.org">eclipse</a>
			</p>

			<p>Select file/new</p>

			<p>Choose Android Project</p>

			<p>Enter a project name</p>

			<p>Select a “Build Target” (android 2.2)</p>

			<p>Fill in properties: “Package name” is something along the lines of
				com.android.myself, whatever you think is relevant.</p>

			<p>Select create Activity and Give your Activity class a name,
				remember to use one word that starts with a Capitol letter</p>

			<p>Click finish</p>

			<p>You should see your new project in the navigator</p>

			<p>If you do not see your navigator, click on window then show view
				then navigator.</p>

			<p>Inside your project you will see:</p>

			<p>bin – Binary files created during the compilation stage, these are
				not of relevance to you</p>
			<p>gen – These files are generated so that your program can reference
				your resource files correctly from your code</p>
			<p>src – This is where your code goes, notice that everything is
				found inside the package you named earlier.</p>

			<p>res/layout – layouts that will describe your view</p>
			<p>res/drawable-_dpi – images that will go into your views</p>

			<p>In your package you will see the activity you created earlier, if
				you double click on it you will be able to edit it.</p>


			<h2 id="Header9">Extra Android Information:</h2>

			<p>The AVD manager is what runs the android environment. It holds all
				the emulators and SDKs. There is an AVD manager installed in eclipse
				that you can play with to try different emulators and sdks.</p>

			<p>The devices provide a log of current activities, to view that log,
				simply connect your device to the computer via usb and run the
				following command:</p>

			<p>adb -d logcat</p>

			<p>adb: is the android debugger</p>

			<p>-d: means that you are accessing a device, (-e means emulator)</p>

			<p>logcat: says that you are want to see the device log</p>

			<h2>Full Tutorial (Source code)</h2>
			<p>The two downloads below were a part of a workshop that I conducted
				at the University of Toronto for Highschool teachers. They are set
				up in such a way that they show full circle how to build a simple
				app that collects models from the cloud and displays them using
				controllers and views.</p>
			<p><a href="Files/AndroidTutorial/workshop1.pdf">Day 1</a> | 
			<a href="Files/AndroidTutorial/workshop2.pdf">Day 2</a> | <a href="TwitterReader.php">Twitter Reader</a></p>	

		</div>
	</div>
		<?php echo Facebook::getFacebookRoot();?>
		<?php echo DomManager::getScripts(); ?>
	</body>
</html>
