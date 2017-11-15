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
DomManager::addScript('https://js.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js"');

$TITLE = "Clicks and Glass: Four Things to Consider When Developing Apps for Google Glass.";
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
				<li><a href="#Header1">Be a Minimalist</a></li>
				<li><a href="#Header2">Say Goodbye to Netflix and Hello to Timeline</a></li>
				<li><a href="#Header3">Link Your Device Screens</a></li>
				<li><a href="#Header4">Think Outside of the Smartphone to Think Outside of the Box</a></li>
			</ul>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
		
		<h1 class="Title"><?php echo $TITLE; ?></h1>
<p>You&#8217;ve seen the reviews, the keynotes, the videos and the endless debates on whether this sci-fi tech-like innovation is a solution, a problem, or just an unfinished idea. Yet, we all can agree that Google&#8217;s <a href="http://www.google.com/glass/start/">Project Glass</a>, deemed to be the <a href="http://thenextweb.com/google/2012/05/30/googles-project-glass-could-be-its-iphone-moment/">next hot personal computing device after iPhone&#8217;s big break</a> in 2007 and lauded to be at the <a href="http://money.cnn.com/2013/05/14/technology/innovation/google-glass/index.html">forefront of technology</a> for years to come, has the attention of the entire world. Consumers and professionals of all kinds are gawking at the ability to connect to the digital world with literally the blink of an eye. </p>
<img class="Images" src="http://i0.wp.com/allthingsd.com/files/2013/07/google_glass_display.png?resize=380%2C285" alt="google_glass_display"  />
<p>Yet, Google Glass is still out of reach for most. </p>
<p>On the backend, developers are eager and anxious to start creating apps for Glass. They&#8217;re pressing play, pause and repeat of this <a href="https://developers.google.com/events/io/sessions/332490621">Developing for Glass video of Timothy Jordan</a>, Senior Developer Advocate at Project Glass. But just because you know where to find <a href="https://developers.google.com/glass/">Google&#8217;s Mirror API</a> and that the <a href="http://www.zdnet.com/googles-glass-developer-kit-video-streaming-on-deck-7000015513/">Glass Developer Kit</a> is about to be unveiled does not mean you&#8217;re completely prepared to develop Glassware. </p>
<p>Here are four things to consider before going all-in on wearable computing.</p>
<h2 id="Header1">Be a Minimalist</h2>
<p>Keep it simple. As of late, developers have been trying to keep up with the <a href="http://www.bostonglobe.com/business/2013/03/14/sizing-cellphones-smartphones-getting-bigger/8keJS93AHLvlC6pv5B9pmI/story.html">&#8220;bigger is better&#8221;</a> slogan that goes hand in hand with tablets and phablets. But Google Glass is tiny, and there are plans to shrink it even further. If there ever was a time to go with the &#8220;less is more&#8221; mentality, this is it &#8212; the screen measures 0.375 square inches and will sit less than an inch from the user&#8217;s eye. </p>
<p>Simple, easy-to-digest nuggets of information and a simple user interface are critical. No one wants a busy screen constantly in his or her line of sight; therefore, Project Glass&#8217; Timeline Cards forces information to be efficiently displayed so that a user can absorb it with a glance. </p>
<p><a href="http://www.twitter.com/">Twitter</a> is a great example of the type of app that&#8217;s ideal for Glass (the microblogging site has already <a href="https://blog.twitter.com/2013/announcing-twitter-google-glass">announced its first iteration on the platform</a>). The brevity of Twitter content will easily fit on the screen and its straightforward interactions make for the perfect single-tap actions. On the flipside, a full-bodied application like <a href="http://docs.google.com/">Google Docs</a> will not be a good experience because executions will not only be time consuming but features like hyperlinking will be arduous to do.</p>
<h2 id="Header2">Say Goodbye to Netflix and Hello to Timeline</h2>
<p>Mobile devices connect people to a wealth of information, but the constant glances and stares at their smartphones have disconnected many from their immediate physical surroundings. Soon, Glass will be able to reconnect the physically disconnected. Like a watch, Glass aims to be worn constantly but interacted with in shorter bursts. Developers should keep in mind that users will not be sitting in Central Park, straining to watch <a href="http://thegreatgatsby.warnerbros.com/">&#8220;The Great Gatsby&#8221;</a> on <a href="http://www.netflix.com/">Netflix</a> with one eye. However, a moviegoer making a spontaneous trip to the theater may quickly check out <a href="http://www.theinternshipmovie.com/">&#8220;The Internship&#8221;</a> trailer on <a href="http://www.youtube.com/watch?v=VKsVSBhSwJg">YouTube</a> and make sure to watch a better movie.</p>
<p>Apps should be primarily notification-based as users post and check out friends&#8217; posts on services like <a href="https://vine.co/">Vine</a> or <a href="http://www.foursquare.com">Foursquare</a>. This timeline interface will prove to be popular for Glass apps; the flow of information must not only be prompt but also personalized. Unlike a smartphone, this screen isn&#8217;t tucked away in your back pocket &#8212; it&#8217;s fixed on your face. Through the interactions between smartphones and Glass, contextual data must be perfected and clutter must be cut out. </p>
<h2 id="Header3">Link Your Device Screens</h2>
<p>A Glass application can&#8217;t offer a verbose text-based experience the same way a tablet or a phone can. Similarly, a handheld device cannot offer the immersive experience Glass can. We&#8217;ll see a symbiotic relationship form where Google Glass works in conjunction with other mobile devices to offer a fully encompassing user experience. </p>
<p>As mentioned previously, time-sensitive information should be the key focus of Glass. Breaking news services such as the <a href="http://www.reuters.com/tools/rss">Reuters RSS feed</a> easily fit the paradigm. The <a href="http://www.nytimes.com/2010/07/12/technology/12google.html">New York Times</a>, which has been at the front line of the publication industry in implementing digital and mobile strategies, will ease well onto Glassware with its mobile style for brief headlines and abstracts. Similarly, <a href="http://www.espn.go.com/">ESPN</a> will thrive with Glass, expediting score and bracket updates. </p>
<p>Like <a href="http://getpocket.com/">Pocket</a>, apps will be able to sync data and interactions, and incorporate links that can be easily transferred to handheld devices. Google already demonstrates the ability to link cross-platform with its Chrome browser, which syncs information across desktop and mobile. Glass can take this a step further to display headlines with an easy way for users to save articles and pull them up on other devices.</p>
<h2 id="Header4">Think Outside of the Smartphone to Think Outside of the Box</h2>
<p>&#8220;<a href="http://techcrunch.com/2012/11/01/the-best-part-about-google-hangouts-is-that-the-technology-itself-completely-disappears/">Get technology out of the way so it can do the work for you</a>&#8221; is Google&#8217;s recurring theme. Follow the same mantra for Glass apps. Users adopt new technology to enhance their day-to-day activities, not inhibit them. Make use of sensors and one-tap interactions on Glass so that apps are not just an extension of the smartphone but also an extension of the mind. </p>
<p>Functions like scrolling should be automatic when a user reaches the end corner of the screen, and something as simple as pinch to zoom can be tinkered to perfection. A 3-D panorama shot application could have a user looking and walking around a new apartment simply by catching the motions of the user&#8217;s head. The ability to browse through a <a href="http://www.facebook.com/facebook?v=app_10467688569&#038;">Facebook</a> feed just by the movement of one&#8217;s eyes will be more intuitive than the old touch and swipe. There is a point of using too many sensors, but Glass is new and experimental and this is the time for bold design. </p>
<p>Find the balance between data and design, handheld and wearable, sensors and intuition. The opportunity is there to create the perfect Glass app and win the new platform.</p>
<p><em>Emir Hasanbegovic is an Agile Engineer for <a href="http://www.xtremelabs.com/">Xtreme Labs</a> and a key player in designing the core infrastructure that lines most of Xtreme Labs&#8217; Android and Google TV applications. Emir has a bachelor degree in computer science from the University of Toronto.</em></p>
<p>
Originally posted <a href="http://allthingsd.com/20130705/clicks-and-glass-four-things-to-consider-when-developing-apps-for-google-glass/comment-page-1/">here</a>.
</p>	
		</div>
	
	<?php echo Facebook::getFacebookRoot();?>
	<?php echo DomManager::getScripts(); ?>
	</body>
</html>