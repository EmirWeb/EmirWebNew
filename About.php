<?php
	include_once('Utils/DomManager.php');
	include_once('Utils/GoogleAnalytics.php');
	include_once('Utils/Utilities.php');
	include_once('Utils/Facebook.php');
	include_once('Utils/Social.php');
	include_once('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Resume.css');
	DomManager::addScript('Scripts/About.js');
	DomManager::addScript('https://js.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js"');


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>		
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookBlogHead("EmirWeb"); ?>
		
	</head>
	<body>
		<?php 
			$buttons = array(
				NavigationBar::getCell("About.php", "About", "About", true),
				NavigationBar::getCell("Projects.php", "Projects", "Projects", false),
				NavigationBar::getCell("Blog.php", "Blog", "Blog", false),
				NavigationBar::getCell( "/" , "Home", "Main Page", false)
			);
			echo NavigationBar::getNavigationBar($buttons); 
		?>		
		<div class="Card">
			<div class="Logo"><img  src="Images/emir.jpg" height="50px"></div>
			<div class="Info">
				<h3>Emir Hasanbegovic</h3>
				<a href="https://github.com/emir-hasanbegovic" target="_blank">GitHub</a><br/>
				<a href="http://www.twitter.com/phigammemir" target="_blank">Twitter: @PhiGammEmir</a><br/>
				<a href="mailto:emir@emirweb.com" target="_blank">E-mail: emir@emirweb.com</a><br />
				<a href="http://ca.linkedin.com/pub/emir-hasanbegovic/2b/43a/62a" target="_blank">Linked in</a><br/>
				<a href="https://plus.google.com/113561694763577258189/posts" target="_blank">Google +</a><br/>
				<a href="https://www.facebook.com/ehasanbegovic" target="_blank">Facebook</a><br/>
			</div>
			<?php echo Social::getSocialBar(); ?>
		</div>
		
		<div class="Content">
			<div class="Resume">
				
	<!-- 			<h1>Highlights of Qualifications</h1> -->
	<!-- 			<p>Hardworking, reliable and friendly yet professional individual. Fluently Bilingual (English-French). </p> -->
				<h2>Employment</h2>
				
				<h3><span>(October 2013)- current </span>Agile Engineer for <a href="http://pivotallabs.com/" target="_blank">Pivotal Labs</a></h3>
				<ul>
					<li>Architected, developed and led a team of 7 developers to build a VOD Android application with 100,000 - 500,000 downloads and a rating of 4.0. This application was featured in the play store.</li>
					<li>Architected, developed and led a team of 5 developers to build a VOD Android application with 100,000 - 500,000 downloads and a rating of 4.1.</li>
					<li>Maintain an open source Android scrolling library called <a href="http://parchment.mobi" target="_blank">Parchment</a> </li>
					<li>Architected and developed a VOD Android application with 10,000 - 50,000 downloads and a rating of 4.4.</li>
					<li>Architected and developed a VOD Android application with 10,000 - 50,000 downloads and a rating of 4.6.</li>
				</ul>
				
				<h3><span>(May 2010)-(October 2013) </span>Agile Engineer for <a href="http://www.xtremelabs.com" target="_blank">Xtreme Labs Inc.</a> (Mobile and Web)</h3>
				<ul>
					<li>Architected, developed and led a team of 9 developers to build a digital receipt and document manager application with 10,000+ downloads and a rating of 3.6.</li>
					<li>Architected and developed the <b>Aljazeera</b> Google TV application. No longer in market. The application was featured in the app store upon Google TV 2.0 launch.</li>
					<li>Architected and developed the <a href="https://play.google.com/store/apps/details?id=com.xtreme.grammy" target="_blank">MusicMapper</a> Android application with 10,000+ downloads and a rating of 4.3 (API no longer functioning).</li>
					<li>Built <b>Networking</b>, <b>Image Cache</b> and <a href="https://github.com/EmirWeb/parchment" target="_blank">All Purpose Scrolling</a> libraries for that are used in close to 30 Android applications produced by Xtreme Labs Inc.</li>
					<li>Lead research into <b>Google TV</b>, <b>Google Glass</b> and <b>Chromecast</b> for Xtreme Labs.</li>
					<li>Created and lead the <b>Outreach</b> team at Xtreme Labs. The Outreach team was responsible for creating innovation projects such as the <a href="http://www.emirweb.com/DeviceWall.php">Device Wall</a>, finding and securing speaking opportunities for engineers, aiding engineers build material proposals for conferences and organizing travel for the engineers</li>
					<li>Worked with <a href="http://sharedby.co/" target="_blank">SharedBy.co</a> (formerly Visibli and Assetize). Created and successfully implemented dynamic toolbar/widget system that is the basis of their product.</li>  
					<li>Contributed heavily to training the Android team at Xtreme Labs Inc. to develop top tiered Android applications.</li>
					<li>Developed content for the bootcamp that our interns run through as a part of their training.</li>  
					<li>Held the Anchor position for several projects. This position entails communicating with the client, archetechting and building the software, guidig the UI/UX design and managing a team of developer.</li>
					<li>Worked on Blackberry Android and Web applications (Some of the top selling apps in the market for some of North America’s largest corporations).</li>
				</ul>
				
				<h3><span>(January 2009)-(May 2010) </span>Teaching Assistant at the <a href="http://www.utoronto.ca/" target="_blank">University of Toronto</a></h3>
				<ul>
					<li>Computer Organization (2010 - 2nd year course). Class takes students from a transistor to an ALU to a stack.</li>
					<li>Introduction to Computer Science I and II (2009-2010 - 1rst year courses). Showing incoming Computer Science students the basics of Object Oriented Development.</li>
					<li>Communication for computer scientists (January, 2009 - 2nd year course). Getting Computer Science students to communicate their work with each other.</li>
				</ul>
				
				
				<h3><span>2002-2011 </span> Private Tutor and Mentor for <a href="http://www.ladieslearningcode.com" target="_blank">Ladies Learning Code</a></h3>
				<ul>
					<li>Computer Organization (2010 - 2nd year course) </li>
					<li>Introduction to Computer Science I and II (2009-2010 - 1rst year courses) </li>
					<li>Communication for computer scientists (January, 2009 - 2nd year course) </li>
				</ul>
				 
				 
				<h3><span>2006-2009 </span> Bartender for <a href="http://www.alicefazoolis.com/" target="_blank">Alice Fazooli’s Downtown</a></h3>
				<ul>
					<li>High paced and high stress environment where multitasking, quick decisions and winning personalities are the key to success. </li>
					<li>Constant memory work. </li>
					<li>Strong A-type personality development.</li>
				</ul>
				
				<h3><span>2000-2002 </span> Computer technician and Assistant Network Administrator at Richview Collegiate Institute.</h3>
				<ul>
					<li>Sole computer technician for an entire high school.</li>
					<li>Fix all problems that arose with any computer at any time in the school. </li>
					<li>Prepare special stations for presentations of students and teachers. </li>
					<li>Prepare and upkeep computer configuration for entire courses. </li>
					<li> Some upkeep Network system.</li>
				</ul>
				
				<h2>Hobbies and Extra Curricular</h2>
				<ul>
					<li><a href="https://github.com/EmirWeb" target="_blank">Open Source Projects</a></li>
					<li>Led a team of 7 people and contributed by archetecting the <a href="http://www.emirweb.com/SecondScreen.php">second screen framework</a> that allowed the building of the <a href="http://www.emirweb.com/DeviceWall.php">Device Wall</a></li>
					<li>Developed a small JavaScript game (<a href="http://www.emirweb.com/StarFighter.php">StarFighter</a>) to test whether modern browsers could provide an adequate level of interaction through JavaScript/CSS/JQuery while accurately depicting what a user would  expect out of a modern video game.</li>
					<li>Spoke at the Ultimate Developer Conference about archetecting for Android and showed developers how to implenet a local REST cache. Blog post to come.</li>
					<li>Spoke about Google TV at a <a href="https://developers.google.com/groups/" target="_blank">GDG</a> meet up hosted by <a href="http://bnotions.com/" target="_blank">BNOTIONS</a></li>
					<li>Upkeep a blog with relevant information
					<li>Developed a GUI factory and application for portable devices through J2ME (Java 2 Micro Edition).</li>
					<li>I am a member of the Fraternity of Phi Gamma Delta where I have held Recording Secretary and Social chair positions. Currently I am on the Board of Chapter Advisors.</li>
					<li>Was a part of the computer programming team at University of Toronto Mississauga (2008-2009).</li> 
				</ul>
	
				<h2>Computer Skills and Interests</h2>
				<ul>
					<li>Have worked in an Agile environment, directly interacting with clients and utilizing Pivotal Tracker to accomplish Agile strategy.</li>
					<li>Wide array of computer skills as well as a very strong ability to learn and use new software tools.</li>
					<li>Currently my main interests lie within lower-end programming, algorithm design and network communication</li>
					<li>Have worked with the following languages: C(++), Java (including J2ME), Assembly, Scheme, Verilog, ML, Prolog,  Python, Visual Basic, PHP, SQL, HTML, Qbasic and JavaScript.</li>
					<li>Very comfortable with MVC and MVVM.   
				</ul>
				
				<h2>Awards</h2>
				<ul>
					<li>University of Toronto Honor-Roll recipient 2008-2009 (2 classes above 90) and 2009-2010 (3 classes above 90).</li>
					<li>Ranked 25th Canada-wide in the CCC competition offered by Waterloo in 2002 (strong rankings in previous years as well). </li>
				</ul>
				
				<h2>Education</h2>
				<ul>
					<li>Graduated in may of 2011 from the University of Toronto with a “Specialist in Computer Science” (Bachelors of Science Degree.</li>
					<li>Participated in the Canadian University Software Engineering Conference (CUSEC 2009).</li>
					<li>Attended a summer program offered by U of T entitled “Computing Insights”.</li>
					<li> Completed high school with a French immersion diploma (Knew French fluently before completing the French immersion program)</li>
					<li>4 years in French speaking elementary schools and middle schools in Québec. </li>   
				</ul>
			</div>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>