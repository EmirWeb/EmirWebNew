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

$TITLE = "Practical Android Design";
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
				<li><a href="#Header1">Splitting Design Up Into “Form Factors”</a></li>
				<li><a href="#Header2">Naming Conventions</a></li>
			</ul>
			<h2>Screen sizes</h2>
			<ul>
				<li><a href="#Header3">Designing For Form Factors</a></li>
				<li><a href="#Header4">DPI “Buckets”</a></li>
				<li><a href="#Header5">Form Factors And Their DPI “Buckets”</a></li>
				<li><a href="#Header6">Recap Of Designing For "Form Factors" And DPI "Buckets"</a></li>
				<li><a href="#Header7">Screen Ratios</a></li>
				
				<li><a href="#Header8">Fragments</a></li>
				<li><a href="#Header9">Scrolling</a></li>
				<li><a href="#Header10">Title Bars And Keyboards Oh My!</a></li>
				<li><a href="#Header11">Flat Colors and Assets</a></li>
				<li><a href="#Header12">Conclusion</a></li>
			</ul>
			
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
		
		<h1 class="Title"><?php echo $TITLE; ?></h1>
<p>

I have received many mocks for Android applications that were beautiful but did not translate appropriately to devices. The mocking/design process tends to happen separately or before the development process and reconciling the two can become a timely process. Designs also set expectations and imply flows that do not always translate to the development paradigms Android enforces. Here are a few concrete steps that will help you minimize some of the churn.
</p>
<h2 id="Header1">Splitting Design Up Into “Form Factors”</h2>
<p>
There are 4 form factors that you should be designing for:
<ul>
<li> Regular sized phones (phones)</li>
<li> Over sized phones (5” phones) </li>
<li> Mid sized tablets (7” tablets)</li>
<li> Regular sized tablets (10” tablets) </li>
</ul>

If you are looking to cut down on the number of form factors, simply group 5” and 7” devices into their own group or group them with their closest neighbour. This doesn’t always give ideal results, but it will not ruin the user experience. We’ll get into how to best target these form factors later.

<h2 id="Header2">Naming Conventions</h2>
<p>

Before we can start talking about more advanced topics, it is important to know how Android wants you to organise your assets. Every device type you target has a specially named assets folder, you’ll see more detailed ones <a href="#Header5">below</a>, here are a few examples:
<ul>
<li>drawable-hdpi/</li>
<li>drawable-xhdpi/</li>
</ul>

When you are making an asset, please make sure you put an appropriately sized copy in each folder, we’ll discuss picking the sizes <a href="Header4">later</a>. For example, if you made an icon at 72x72 pixels and one at 96x96 pixels, put a copy of each of those icons in their appropriate folder. The 72x72 in the hdpi folder and the 96x96 in the xhdpi folder. These two assets must have the same name or android will not be able to choose the appropriate asset at runtime.
Example:

<ul>
<li>drawable-hdpi/icon.png	(72x72)</li>
<li>drawable-xhdpi/icon.png	(96x96)</li>
</ul>

The drawable folders are flat and will only ever contain files. The file names inside the drawable folder can only contain lowercase letters, numbers, underscores and nothing else.

<dl>
<dt>
Good Example:</dt>
<dd>
my_icon_12.png
</dd>
<br />
<dt>
Bad Example:</dt>
<dd>My-Icon 12.png</dd>
</dl>
For your own sanity, stick to a naming convention, I recommend naming every asset as follows:
</p>
<p>
&lt;screen name&gt;_&lt;asset_type&gt;_&lt;name&gt;.png
<br />
ie.
<br />
loginscreen_actionbaricon_search.png


</p>
<h1 class="Title">Screen sizes</h1>


<h2 id="Header3">Designing For Form Factors</h2>
<p>
With the large fragmentation of screen sizes across Android devices, it practically becomes impossible to design with all screens in mind. Google gives you a lot of information about different screen resolutions and pixel densities that you should understand and follow. On the other hand, I find that keeping all of these details in mind when designing is difficult. So here are the tricks: 
</p>
<p>
Pick the form factors you want to support. As a rule of thumb, always start with phones as they cover the majority of the market and their designs can easily be ported to bigger devices. Pick any of the phones on <a href="http://www.emirweb.com/ScreenDeviceStatistics.php">this page</a> and use their resolution. Design for that phone and that resolution. Then repeat the process with the other form factors. Make sure you note the differences in height and width when including the status bar, nav bar and title bar. 
</p>
<p>
Important notes for those pixel pushers out there:
<ul>
<li>
The nav bar does not always appear at the bottom of the screen in landscape, sometimes it appears at the bottom of the base of the phone regardless of its orientation. This is depicted here by stating that the nav bar has a width as opposed to a height.
</li>
<li>
 Title bars, nav bars and status bars don’t always appear on all devices
</li>
<li>
 Title bars, nav bars and status bars can differ in size in landscape vs. portrait
</li>
<li>
 Title bars and status bars can be removed so that your application can gain extra space as needed.
</li>
<li>
 The nav bar can be hidden temporarily on certain devices, as a rule of thumb expect this bar to always be there.
</li>
</ul>
</p>
<p>
Now that you have a design for each form factor, do not try to be pixel perfect yet. It will not translate well later. At this point all you want to do is create general guidelines for how the application will lay out for each form factor.
</p>
<h2 id="Header4">DPI “Buckets”</h2>

<p>Android has dpi “buckets” for each device based on their resolutions and pixel densities:
</p>
<p class="Center">
nodpi ldpi mdpi tvdpi hdpi xhdpi xxhdpi
</p>
<p>

The goal of these buckets is to ensure that an asset in the mdpi folder is the same physical size across all devices. This means that if an asset in the mdpi folder appears 3x3cm large on device A, it will appear (approximately) 3x3cm large on device B regardless of the devices specifications. 
</p>
<p>
The reason behind the different buckets is to ensure that when certain assets shrink or grow to fit into the right physical size, that they do not appear pixelated or lose fidelity, respectively. To ensure that your assets look good on all devices and are the same physical size, you should cut an asset for each dpi bucket using the following ratios:
</p>
<p >
<table class="Center">
<tr>
<td>
xxhdpi
</td>
<td>
xhdpi
</td>
<td>
hdpi
</td>
<td>
tvdpi
</td>
<td>
mdpi
</td>
<td>
ldpi
</td>
</tr>
<tr>
<td>
1.5
</td>
<td>
1
</td>
<td>
0.75
</td>
<td>
0.66
</td>
<td>
0.5
</td>
<td>
0.375
</td>
</tr>
</table>
</p>
<p>
To recap, this will ensure that the originally designed asset appears the same physical size on all devices and is the right fidelity for each pixel density. 
</p>
<p>
On a non design point, having the right sized assets for the appropriate dpi bucket will directly improve the performance of the application on devices. This is because each device is optimized in terms of processing power and memory availability with respect to its screen size. So having the appropriate dpi will optimize the fidelity and the responsiveness of the application simultaneously.
</p>

<h2 id="Header5">Form Factors And Their DPI “Buckets”</h2>

<p>
Now that we have designed for each form factor and we know how to cut our assets, notice that we have the same named asset for an xhdpi phone as an xhdpi tablet, but they are of different sizes. 
There are several ways to target just the right form factor and dpi bucket. I recommend using the folder names below associated with their respective form factors. There are a lot of folders, do not worry about filling all of them up. 
We will discuss which ones you need to fill out in the next section.
</p>
<p>
<table>
<tr>
<td>


Phone assets:
<ul>
<li>
drawable-ldpi/
</li>
<li>
drawable-mdpi/
</li>
<li>
drawable-tvdpi/
</li>
<li>
drawable-hdpi/
</li>
<li>
drawable-xhdpi/
</li>
<li>
drawable-xxhdpi/
</li>
</ul>
</td>
<td>
5” device Gingerbread assets:
<ul>
<li>
drawable-large-ldpi/
</li>
<li>
drawable-large-mdpi/
</li>
<li>
drawable-large-tvdpi/
</li>
<li>
drawable-large-hdpi/
</li>
<li>
drawable-large-xhdpi/
</li>
<li>
drawable-large-xxhdpi/
</li>
</ul>
</td>
</tr>
<tr>
<td>
5” device above Gingerbread assets:
<ul>
<li> 
drawable-sw480dp-ldpi/
</li>
<li>
drawable-sw480dp-mdpi/
</li>
<li>
drawable-sw480dp-tvdpi/
</li>
<li>
drawable-sw480dp-hdpi/
</li>
<li>
drawable-sw480dp-xhdpi/
</li>
<li>
drawable-sw480dp-xxhdpi/
</li>
</ul>
</td>
<td>
7” device assets:
<ul>
<li>
drawable-sw600dp-ldpi/
</li>
<li>
drawable-sw600dp-mdpi/
</li>
<li>
drawable-sw600dp-tvdpi/
</li>
<li>
drawable-sw600dp-hdpi/
</li>
<li>
drawable-sw600dp-xhdpi/
</li>
<li>
drawable-sw600dp-xxhdpi/
</li>
</ul>
</td>
</tr>
<tr>
<td>
10” device assets:
<ul>
<li>
drawable-sw720dp-ldpi/
</li>
<li>
drawable-sw720dp-mdpi/
</li>
<li>
drawable-sw720dp-tvdpi/
</li>
<li>
drawable-sw720dp-hdpi/
</li>
<li>
drawable-sw720dp-xhdpi/
</li>
<li>
drawable-sw720dp-xxhdpi/
</li>
</ul>
</td>
</tr>
</table>
</p>

<h2 id="Header6">Recap Of Designing For "Form Factors" And DPI "Buckets"</h2>
<p>
Recall we first designed all of our form factors, we then learned how to get the best fidelity for each asset using dpi buckets and now we have folders that tie in form factors to dpi buckets. For best results at runtime in terms of responsiveness and visual fidelity, you want to fill out each of these buckets. Keep in mind that filling all these folders can make your application very large. You should choose one or two folder(s)/DPI buckets for each of the form factors you wish to support and put assets in those folders. Then decide if specific assets do not have adequate fidelity on the devices you are targeting. 
</p>
<h2 id="Header7">Screen Ratios</h2>

<p>
Devices do not follow any rules when it comes to screen ratio, title bar size, status bar size or nav bar size and location. It is important to know what widths and heights you are dealing with when designing. You should be aware of the largest/smallest physical and pixel widths/heights for each form factor. 
Spend time designing layouts that stretch and fit appropriately on both extremes. Do not design a layout that barely fits all the information on one screen as there is guaranteed to be a device that
 will not be able to handle the size you designed for. A use of appropriately stretching sections and margins is more powerful than using a scrolling section to fit your content. 
 More on scrolling <a href="#Header9">below</a>. 
</p>
<h2 id="Header8">
Fragments</h2>

<p>
Android introduced the concept of Fragments when it released their first set of tablets. 
Developers use these all the time to marry design with data. Getting familiar with them and designing for them in your mocks will push your application to the next level.
</p>
<p>
Fragments are a very powerful way to solve for designs across form factors. 
Fragments are literally “fragments of the screen”, they are boxes that contain data. 
Imagine a screen where you have a scores section and a teams section. 
Draw an imaginary box around each of them, or a literal one, and designate them as Fragments.
Now cut and paste them between form factors changing everything from layout to position of the actual fragments on a screen but not changing anything inside the cut out pieces.
</p>
<p> 
Fragments define such a section by holding data and displaying it appropriately. 
They can be treated as individual pieces of UI. 
You can and should design for a Fragment the same way you would treat an asset or screen for a form factor. 
</p>
<p>
Fragments have the ability to choose their layout in the same way a screen layout does (based on form factor, dpi bucket etc..) but they can do it separately from the rest of the screen. 
In other words the best way to design a fragment is to detach it from everything else you are doing, lay it out for each form factor and then put it back into the UI as you would any other asset.
</p>
<p>
A modern Android design for fragments, is one that assumes that the fragment will be the approximately the same physical size on all devices/form factors.</p>
<p> 
As an example, if a fragment takes up the whole screen on a phone, when it got to the 5”,7” and 10” devices, it would still be the same physical size, but positioned appropriately.
On a 5”/7”, it may be centered with a background appearing past the margins/borders of the fragment. 
On 10” devices it might appear with a few other fragments that have been appropriately spaced out. 
A great example of this can be seen in the Google IO 2013 application. 
A fragment that on phones is full screened, gets its own section on the 7” and 10” form factors and is approximately the same size.
</p>

<img width="200px" src="Images/AndroidDesign/phoneioscreenshot.png">
<img width="400px" src="Images/AndroidDesign/7landscapeinchioscreenshot.png">
<h2 id="Header9">Scrolling</h2>

<p>
There are two types of scrolling. Scrolling a variable set of similar items is efficient (smooth scrolling) and a great use of space when it comes to a variable width or height. 
Think of the gmail app, it has emails (similar items) below an action bar, which does not change height. The emails section, by scrolling, ensures that devices with different heights will 
always make the best use of the vertical space.</p>
<p>
Scrolling a static page, the way a web site would, with no variable content is inefficient (choppy scrolling) and not a smart way to use space.
This option usually indicates that you have attempted to squeeze too much information on one screen and you should consider splitting the information. 
Consider using fragments to solve the issue, a flow that would be one page on a tablet, could be two pages on the phone.
</p>
<p>
If you must scroll to fit your data on one page, be creative about what scrolls and how. Introduce a parallax effect, for example. Have two pieces of UI scrolling at different speeds and having one ultimately end up on top of the other. 
This lets you fit all your information on one screen without looking like a website.
</p>

<h2 id="Header10">Title Bars And Keyboards Oh My!</h2>

<p>
Users like having access to their status bar, they need access to their nav bar and most users like having access to the title/action bar. 
That is 3 bars for those who are counting, add the keyboard to that... How much real estate does that leave you with? 
</p>
<p>
This is purely opinion, but from experience, I find that tab bars not only look bad but take up real estate that you can’t spare, especially when in landscape mode or with the keyboard up.
For those still keeping count, that becomes 4 bars and a keyboard. So please avoid them. 
</p>
<p>
The left menu panel sliding in is by far the best navigation aide in terms of UI and UX, so please use it. 
Similarly, the overflow menu or a drop down (spinner) from the action/title bar is also a very smart way of using the space you are given.
</p>
<h2 id="Header11">
Flat Colors and Assets</h2>

<p>
Android designs tend to be flat and rectangular. 
Do not cut assets for things with flat colors, borders or simple gradients. 
Android is designed to handle these efficiently. 
They will look better and draw faster if you let Android build the graphics for you. 
In these cases, define colors, sizes, etc..  and let the development team do the work in XML. 
Only cut assets that the developer can not draw using code such as icons, graphics, etc... Buttons and such can usually be drawn via XML, don’t be afraid to challenge the development team.
</p>
<h2 id="Header12">
Conclusion</h2>

<p>
Designing for android can be a difficult task if you do not approach it in the right manner. Following the guidelines above, will not solve all of your problems, but will help you get better results faster. 
More importantly, it will translate directly into Android development paradigms and make conversations, flow and timelines easier between/for developers and designers.
	</p>	
		
		</div>
	
	<?php echo Facebook::getFacebookRoot();?>
	<?php echo DomManager::getScripts(); ?>
	</body>
</html>