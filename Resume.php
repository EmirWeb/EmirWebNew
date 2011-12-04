<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Utils/Utilities.php');
	include('Utils/Facebook.php');
	include('Widgets/Post.php');
	include('Widgets/NavigationBar.php');
	include('Widgets/Twitter.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Resume.css');
	DomManager::addScript('Scripts/Home.js');
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
		<?php 
			$buttons = array(
				NavigationBar::getCell("Files/Resume.pdf", "Resume", "Online Resume", true),
				NavigationBar::getCell( "/" , "Home", "Main Page", false)
			);
			echo NavigationBar::getNavigationBar($buttons); 
		?>
		
		<div class="Card">
			<div class="Logo"><img  src="favicon.ico" height="60px"></div>
			<div class="Info">
				<h3>Emir Hasanbegovic</h3>
				<a href="http://www.twitter.com/ajelive">Twitter: @PhiGammEmir</a><br/>
				<a href="mailto:emir@emirweb.com">E-mail: emir@emirweb.com</a><br />
				<a href="http://ca.linkedin.com/pub/emir-hasanbegovic/2b/43a/62a">Linked in</a><br/>
				<a href="https://www.facebook.com/ehasanbegovic">Facebook</a><br/>
			</div>
		</div>
		
		<div class="Content">
			<?php echo Facebook::getFacebookLike(Utilities::getCurrentPageURL(), "200"); ?>
			<h1>Highlights of Qualifications</h1>
			<p>Hardworking, reliable and friendly yet professional individual. Fluently Bilingual (English-French). </p>
			<h2>Employment</h2>
			
			<h3><span>(May 2010)- Current </span>Agile Engineer for <a href="http://www.xtremelabs.com" target="_blank">Xtreme Labs Inc.</a> (Mobile and Web)</h3>
			<ul>
				<li>Held the Anchor position for several projects. This position entails communicating with the client, archetyping the software, designing the UI/UX and managing a team of developer</li>
				<li>Worked with <a href="http://www.visibli.com" target="_blank">Visibli</a> (formerly Assetize). Created and successfully implemented dynamic toolbar/widget system. </li>
				<li>Worked with Facebook, Google Analytics and Twitter sdk’</li>
				<li>Worked on Blackberry and Android applications (Some of the top selling apps in the market for some of North America’s largest corporations).</li>
			</ul>
			
			<h3><span>(January 2009)-(May 2010) </span>Teaching Assistant at the <a href="http://www.utoronto.ca/" target="_blank">University of Toronto</a></h3>
			<ul>
				<li>Computer Organization (2010 - 2nd year course). Class takes students from a transistor to an ALU to a stack.</li>
				<li>Introduction to Computer Science I and II (2009-2010 - 1rst year courses). Showing incoming Computer Science students the basics of Object Oriented Development.</li>
				<li>Communication for computer scientists (January, 2009 - 2nd year course). Getting Computer Science students to communicate their work with each other.</li>
			</ul>
			
			
			<h3><span>2002-Current </span> Private Tutor and Tutor for <a href="http://www.ladieslearningcode.com" target="_blank">Ladies Learning Code</a></h3>
			<ul>
				<li> Computer Organization (2010 - 2nd year course) </li>
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
				<li>Developed a small JavaScript game (<a href="http://www.emirweb.com/StarFighter.php" target="_blank">StarFighter</a>) to test whether modern browsers could provide an adequate level of interaction through JavaScript/CSS/JQuery while accurately depicting what a user would  expect out of a modern video game.</li>
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
				<li>Comfortable with MVCs. First hand  experience with Struts2, cake-php and Android</li>   
			</ul>
			
			<h2>Awards</h2>
			<ul>
				<li>University of Toronto Honor-Roll recipient 2008-2009 (2 classes above 90) and 2009-2010 (3 classes above 90).</li>
				<li>Ranked 25th Canada-wide in the CCC competition offered by Waterloo in 2002 (strong rankings in previous years as well). </li>
			</ul>
			
			<h2>Education</h2>
			<ul>
				<li>Scheduled to graduate in may of 2011 from the University of Toronto with a “Specialist in Computer Science” (Bachelors of Science Degree.</li>
				<li>Participated in the Canadian University Software Engineering Conference (CUSEC 2009).</li>
				<li>Attended a summer program offered by U of T entitled “Computing Insights”.</li>
				<li> Completed high school with a French immersion diploma (Knew French fluently before completing the French immersion program)</li>
				<li>4 years in French speaking elementary schools and middle schools in Québec. </li>   
			</ul>
		</div>
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>