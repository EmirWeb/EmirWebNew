<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');
include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/Blog.css');
DomManager::addCSS('CSS/Social.css');
DomManager::addScript('https://staging.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js?env=staging&log_level=2"');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead("Little Droid Creator"); ?>
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
			
			<h2><a href="https://market.android.com/details?id=com.littledroid">Little Droid Creator</a></h2>
			<ul>
				<li><a href="#Header1">High Level</a></li>
				<li><a href="#Header2">Technical Structure</a></li>
				<li><a href="#Header3">Renderer</a></li>
				<li><a href="#Header4">Activities</a></li>
				<li><a href="#Header5">Engine</a></li>
				<li><a href="#Header6">Rendering a Frame</a></li>
				<li><a href="#Header7">Collision Detection</a></li>
				<li><a href="#Header8">Collision Detection Math</a></li>
				<li><a href="#Header9">Reflection</a></li>
				<li><a href="#Header10">Dynamic Collision Detection</a></li>
				<li><a href="#Header11">Issues</a></li>
				<li><a href="#Header12">Programming</a></li>
			</ul>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
			<h1 id="Title"><a href="https://market.android.com/details?id=com.littledroid"><img  height="48px" src="Images/LittleDroidCreator/icon.png"/>Litte Droid Creator</a></h1>
			<p>Little Droid Creator was designed to showcase the dynamic engine
				on which it runs. This document will first describe at a high level
				what the game offers then we will dig down into the technical
				aspects of the program and talk about how it offers the high level
				aspects.</p>
			<p><a href="https://market.android.com/details?id=com.littledroid">Download from market</a> |
			<a href="https://github.com/EmirWeb/little_physics">Download source code</a></p>
			<img class="ScreenShot" width="600px" src="Images/LittleDroidCreator/screenshot1.png"/>
			<h2 id="Header1">High Level</h2>
			<p>The idea of the application is to allow users to interactively
				create games/levels/worlds and play with them without leaving the
				comfort of the hand-held device. The application provides a creation
				aspect where the user is presented with a blank canvas and a
				selection of interactive objects with which to create his world. The
				two main types of objects are Terrain and Mobile. Terrain objects
				are immobile and Mobile objects are not. Each has its own set of
				properties Terrain objects are breakable or can cause a winning
				state whereas Mobile objects are movable (react to touch events).</p>
			<p>The game play is limited only by the player's imagination. The
				more individual tools become available the more the game play grows.
			</p>

			<h2 id="Header2">Technical Structure</h2>
			<p>The Code is divided into three sections. Android Activities,
				OpenGl renderer and the engine (World). The Android activities
				handle the flow of the application and communicate the user's
				actions with the renderer. The renderer communicates the necessary
				user actions to the engine in a way it understands as it requests
				the world layout and draws it on the screen.</p>
			<h2 id="Header3">Renderer</h2>
			<p>The renderer set up is straight forward, please consult the
				following <a href="http://blog.jayway.com/2009/12/03/opengl-es-tutorial-for-android-part-i/" >tutorial</a> to set up a basic OpenGl set up.</p>
			<p>OpenGl ES 1.0 was chosen so that it is easy to transfer to all
				android phones, but it does not have the necessary support to
				retrieve the current transformation matrices or projection matrices
				to allow for custom features, such as ray casting for touch events.
				Google offers MatrixTrackingGL, this class overrides the internal
				matrix manipulation used by OpenGl and surfaces getter methods that allow for
				current transformation matrix retrieval.</p>
			<h2 id="Header4">Activities</h2>
			<p>GameActivity is the activity that holds all the information and
				control for the renderer and hence the engine. All other activities
				that either run or create a game extend it and therefore do not have
				to worry about the underlying inner workings of the OpenGLSurface
				that prove to be difficult to set up properly on Android phones.</p>
			<h2 id="Header5">Engine</h2>
			<p>The engine was the core of the work, the difficulty lied in
				attempting to make the engine fully dynamic, ie any shape and size
				of objects and any juxtaposition of objects, with the idea of adding
				more control elements to the world and to is objects.</p>
			<h2 id="Header6">Rendering a frame</h2>
			<p>Each time the renderer requests a new frame, the engine advances
				the frame by the number of milliseconds that have passed since the
				previous frame, this way if the phone slows down or a slower phone
				is used, the speed of the game-play does not suffer, but instead the
				game will seem to jump frames.</p>
			<h2 id="Header7">Collision detection:</h2>
			<p>The engine keeps a collection of immovable object in a grid
				format. The grid is held inside a HashMap&lt;Integer,
				HashMap&lt;Integer, WorldObject&gt;&gt; which acts as a dynamic 2
				dimensional array that can grow as it needs to and is only as large
				as the number of elements on the grid. The mobile objects consider
				their previous and next positions, map them to the grid and check
				only collisions within the mapped grid. This brings collision
				detection down to O(1), on average.</p>
			<p>The difficulty comes when we need to consider collisions of moving
				objects with other moving obejcts, because these change every frame, we
				need to create a structure for their collisions. We accomplish this by moving objects one by one.
				Although the best solution would be to move them simultaneously and figure out where they would intersect, this solution will hopefully be embedded at a later time.</p>
			<h2 id="Header8">Collision detection math</h2>
			<p>Each object is a collection of lines that go in a clockwise
				direction, objects can have any number of sides and can be either
				convex or concave. When considering a collision between two objects,
				each point (p2) on object one is used to create a line segment in
				the direction (d, magnitude included in the direction) of the
				movement of the object. The line segment becomes:
				</p>
				<p class="Formula"> p1 + lambda * d = p1</p>
				<p> Each such line segment is then compared to each line
				representing object two. For each pair of lines the intersection
				point is found, if there is one, then:
				</p>
				<p> p1 + lambda * d = intersectionPoint </p>
				<p> Is solved for lambda. Because d includes
				magnitude, if lambda is between 0 and 1 then a collision has
				occurred. This process is repeated with object one and two
				interchanged, the smallest lambda represents the closest collision
				and is the one we consider. At that point the object is moved by
				lambda * d.</p>
			<h2 id="Header9">Reflection</h2>
			<p>After a collision is detected, if lambda is smaller than 1 then
				the object still has some inertia that needs to be considered. The
				reflection vector is calculated by finding a vector that is theta
				radians away from the normal of the line with which it is colliding
				and pointing away from the line. Once the reflection vector is
				calculated, the collision detection method is called recursively
				with the reflection vector set as the new direction vector, this is
				repeated until no collision is detected or the magnitude of the
				direction vector is approximately 0.</p>
			<h2 id="Header10">Dynamic collision detection</h2>
			<p>The issue that arises is that the objects may collide with right
				angles or several objects at once and the movable object needs to
				decide which lines to reflect off of and which ones not to. The
				current algorithm saves all the collisions that are calculated and
				considers only the ones that have the same, lowest, lambda value. If
				there is only one, then it simply reflects on it and continues,
				otherwise we take all the points that we have collided with and
				create lines from them, we then compare these lines to the lines
				that we have collided with, if their direction vectors are the same,
				we add them (the lines that we have collided with, not the ones we
				have just created) to a collection of lines that we will consider.
				If they are not, then we discard them. This helps catch a
				combination of squares (as an example) side by side by without
				considering the lines that would act as normals to the outer most
				lines, but instead just considering the one line they form. Finally
				once all the considered lines are collected, we then only use a set
				of the direction vectors, no repeats, and we reflect off of all of
				those direction vectors by reflecting off of them individually and
				adding their results, this gives us the correct reflection
				direction, we then normalize it and multiply it by the magnitude of
				the reflection/direction vector we were considering to begin with.
				We then call collision detection recursively.</p>
			<h2 id="Header11">Issues</h2>
			<p>The biggest issues that still arise are due to floating point
				arithmetic rounding errors, where some lambdas undeservingly get
				priority over others and the reflections do not look organic.
				Similarly some objects get stuck in walls due to the same issues.</p>
			<h2 id="Header12">Programming</h2>
			<p>The World is the engine, each object in the world is a WorldObject
				interface. There are Terrain interface objects that do not move and
				have terrain like properties, breakable and winning (state). The
				Terrain interface was mostly created in an attempt to minimize the
				collision detection overhead by having an object grid structure that
				would not change from frame to frame. There are also Mobile
				interface objects that have properties such as movable. These are
				set up in such a way that we may now begin creating custom objects
				either dynamically or by hard coding them, and the World engine will
				handle them very gracefully. This, along with the full polygon
				collision detection, is used to allow for a fully dynamic engine
				that can later be extended to a full game maker where the world has
				as few limitations as possible.</p>
		</div>
	</div>
	
		<?php echo Facebook::getFacebookRoot();?>
		<?php echo DomManager::getScripts(); ?>
	</body>
</html>
