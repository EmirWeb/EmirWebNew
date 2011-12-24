<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');
include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/GoogleTV.css');
DomManager::addCSS('CSS/Social.css');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />




		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("Google TV"); ?>
	</head>
<body>




<?php echo NavigationBar::getNavigationBar(null);?>
	<div class="Container">
		<div class="TableOfContents">
			
			
			
			
		<?php  echo Social::getSocialBar(); ?>

			<h2>Little Droid Creator</h2>
			<ul>
				<li><a href="#Header1">High Level</a></li>
				<li><a href="#Header2">User Interface</a></li>
				<li><a href="#Header3">Simulation</a></li>
				<li><a href="#Header4">Details</a></li>
				<li><a href="#Header5">OpenGl</a></li>
				<li><a href="#Header6">Algorithm</a></li>
				<li><a href="#Header7">Coding</a></li>
				<li><a href="#Header8">Coding Acceleration and Gravity (Generic Class)</a></li>
			</ul>
			
			
			
			
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">

			<h1 id="Title"><img  height="48px" src="Images/LittleDroidPhysics/icon.png"/>Litte Droid Physics</h1>
			<p>
				This report assumes that the <a href="LittleDroidCreator.php">Little
					Droid Creator</a> report was read and understood in its entirety.
			</p>
			
			<img class="ScreenShot" width="600px" src="Images/LittleDroidPhysics/screenshot1.png"/>

			<h2 id="Header1">High Level</h2>
			<p>The idea behind droid physics was to offer a simple physics
				environment that would aid early high school students to understand
				some of the properties of physics. In particular, acceleration,
				projectile motion and Friction.</p>
			<h2 id="Header2">User interface</h2>
			<p>The user interacts with simple and familiar android features to
				run the individual simulations. The simulation does not include any
				interaction and provides accurate results that the user is expected
				to predict based on the given information. The given information is
				a question and the input is a number or several that will dictate
				the start values of certain pieces of the simulation.</p>
			<h2 id="Header3">Simulation</h2>
			<p>The simulation is running on the Little Droid Engine which takes
				care of collision detection and acceleration and velocity for all
				items involved in the simulation. This project has made the
				additions of acceleration and velocity control through the engine
				and its objects.</p>
			<h2 id="Header4">Details</h2>
			<p>Acceleration is being tracked discretely. Each MobileObject starts
				the simulation with a starting velocity and a starting acceleration.
				At each interval the object's velocity is increased by the
				acceleration.</p>
			<p>v(i) = v(i -1) + (delta)t * a</p>
			<code class="Java">
				<pre>
@Override
public float[] getDirectionVector(long timeChange) { 
	lastInterval = timeChange; 
	float ratio = getRatio(timeChange); 
	velocity = Algebra.add(velocity, Algebra.multiplyVectorByConstant(gravity, ratio)); 
	float[] d = Algebra.multiplyVectorByConstant(velocity, ratio);
	return d;
}
				</pre>
			</code>
			<p>
				v and a are vectors each containing an x and y component that
				dictates each items behaviour. To replicate projectile motion, it
				was simple enough to break down the velocity into speed and
				direction. Once the component vector for direction was established,
				we normalize it and multiply it by the magnitude. This gives us our
				initial velocity and the above gravity algorithm can take charge the
				rest of the way.
				<code class="Java">
					<pre>
		float xDirection = (float) (Math.cos(Math.toRadians(angle))); 
		float yDirection = (float) (Math.sin(Math.toRadians(angle))); 
		float[] direction = new float[] { xDirection, yDirection }; 
		direction = Algebra.normalize(direction);
		direction = Algebra.multiplyVectorByConstant(direction, power); 
					</pre>
				</code>
			
			
			<p>Friction was the last implementation and used the following
				discrete approach:</p>
			<p>v(i) = v(i-1) * ( (-c *(delta)t )/ m + 1)</p>
			<p>where c is the coefficient of friction and m is the mass of the
				object.</p>
			<h2 id="Header5">OpenGL</h2>
			<p>To provide a richer experience the renderer takes a background
				graphic. In OpenGL the background is moved away from the camera and
				scaled to fill the screen. The renderer also considers all the
				images associated with each individual item and displays it. Further
				optimization is available by grouping the similar imaged objects
				together and drawing them. A similar optimization is available if
				the developer who is building the World by adding objects with the
				same images in groups.</p>
			<h2 id="Header6">Algorithm</h2>
			<p>
				The collision detection needed to be improved due to the extra work
				being done by the renderer and the simulator. When each object is
				added to the grid, it is hashed into a low collision hash table
				based on integer rounding of the x and y position. A object to hash
				value reference is kept. Together these form the GridHash Class
				which allows for get, add and remove functions in 0(1), assuming no
				collisions. The following hash function guarantees low to no
				collisions:

				<code class="Java">
					<pre>
	private static final int gridSize = 100000; 
	private final LinkedList&lt;WorldObject&gt;[] gridSet = new LinkedList[gridSize];
	
	private static int hash(int x, int y) { 
		int hash = x * 100 + y;
	}
	
	if (hash &lt; 0) 
		hash += 10000;
	hash = hash % gridSize; return Math.abs(hash);
					</pre>
				</code>
			
			
			<p>This GridHash holds references to the WorldObjects and what grid
				boxes each of them falls into. So an item that falls in 4 grid boxes
				in the world will have a reference in each of the grid boxes. This
				allows for a localized collision comparison i.e. Only objects that
				are close to each other will then have the collision calculations
				executed. This greatly reduces the number of collisions that we must
				consider at each interval of the simulation.</p>
			<p>After these optimizations and additions of the new features in the
				renderer and the simulation, the frame rate averages 40 FPS on the
				NEXUS 1 device and higher on newer faster devices. The FPS is
				limited to 60 FPS.</p>
			<h2 id="Header7">Coding</h2>
			<p>The developers can set up an activity by extending GameActivity.
				This activity will act exactly as the Activity class if nothing
				involving the simulation is done. The developer has the option of
				creating a World Class as well as any combination of older
				WorldObjects and the new Generic WorldObject. When the World Object
				is built, simply call setWorld(world); to show the world as the
				activity's background and setAnimate(true/false); to start/stop the
				animation. To reset the World simply set the World again. Every
				thing else is taken care of.</p>

			<h2 id="Header8">Coding Acceleration and Gravity (Generic Class)</h2>
			<p>The constructor for the Generic class takes a position, a starting
				velocity and an acceleration Vector.</p>
			<code class="Java">
				<pre>
	public Generic(float[] acceleration, float[] position, float[] startVelocity);
				</pre>
			</code>
			<p>Example:</p>

			<code class="Java">
				<pre>
	Generic anvil = new Generic(
		new float[] { 0, EARTH_GRAVITY}, 
		new float[] { 3, height }, 
		new float[] { 0, 0 }
	);
	anvil.setImageId(15); anvil.setWaterMark("ANVIL"); world.add(anvil);
				</pre>
			</code>
			<p>In this case, we are choosing an image that we have added to the
				renderer previously and setting the waterMark, which is used to
				uniquely identify the type or the individual object for comparison
				upon collision detection.</p>


		</div>

	</div>
	
	
	
	
	
	
	
	
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
