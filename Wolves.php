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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EmirWeb</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("AAAGHHH -Blew it on 5 wolves....."); ?>
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
			
			<h2>AAAGHHH -Blew it on 5 wolves.....</h2>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
			<p> I went hunting in <a href="http://maps.google.ca/maps?q=wawa+ontario&um=1&ie=UTF-8&hq=&hnear=0x4d470a56353969c7:0x633c8d94fc5a0f15,Wawa,+ON&gl=ca&ei=JWf7TtvhDI_bggeZmLWCAg&sa=X&oi=geocode_result&ct=title&resnum=1&ved=0CDMQ8gEwAA">Wawa Ontario</a> here is the story written by charlie about our experiences</p>
			<h1 id="Title">AAAGHHH -Blew it on 5 wolves.....</h1>
			<p>
			In the annual installment of "I blew it on a ........", I can edit it
to "we blew it on ...."
</p><p>
Day started out with Gunner410 calling me wondering why I hadnt picked
him up yet, in my turkey stuffed state last night, I forgot to set the
alarm and slept in.
</p><p>
Twenty minutes later, picked him up and drove through Timmies for our
morning eye opener along with a nice young man from Toronto - a
cityite visiting the north who has never hunted or seen a wolf.
</p><p>
We did a couple of sets with the caller - all quiet and no action.
Drove out to a spot where we had placed a moose hide and head in a
beaver flood in the slush. Idea was to get them to freeze in but we
havent had any cold weather since we put them out over a week ago.
</p><p>
Checked the site three times over the last week and half - no activity
including checking it on the 23rd. Pulled up this morning - 4 wolf
tracks heading into our bait site.
</p><p>
I already had shot a wolf this year, so Gunner410 leads the way in,
followed by me and the fellow from TO. We are walking through 20
inches of snow and its nice and quiet. We are almost up to the edge of
the opening overlooking the flood and I hear him bolt a round into the
chamber. I look over him and there is a black wolf out in the snow
lying down and looking at us. Gunner410 turns and whispers to the guy
from TO - come here and take a look.
</p><p>
The wolf has now stood up and is standing there and I am
subconsciously screaming "SHOOT"....
</p><p>
And then Gunner410 says in a very loud voice "HOLY f**k, LOOK AT ALL
OF THEM", and then all hell breaks loose. There are wolves running
everywhere. I can see one running on the other side of the black
spruce finger separating us from the flood. I decide to not shoot
because there is no way I can thread a 22-250 bullet through the trees
at a wide out running wolf.
</p><p>
I turn back as Gunner410 lets a shot off. I can see 3 wolves running
in three different directions, but he is between me and them. I am a
foot taller than him so I can see everything in front of him. He is
bolting in another round and pivoting to his left. There is a black
one running down the creek and he is drawing a bead on him, so I step
beside him and tell him I am going to shoot at one that is making a
beeline away from us. Gunner410 drops to a knee and I can hear him
shoot.
</p><p>
I line up on mine, now about 150 yards away and booking it for the
tree line. I fire and it hunches up a bit. I bolt the fired case out
and line up on the wolf just before it gets out of view, and CLICK...
I had short stroked the bolt and didnt chamber a round
</p><p>
Now there is nothing in sight - I look down at Gunner410 and say - did
you get him - he is laughing so hard, and says no he missed him. There
were 5 wolves - one black one laying out on a hummock in the flooded
area acting as a sentinel (the one we first saw), and 4 more lying on
the ice chewing the moose hide - another black one, a blonde one and
two tawny gray ones. I never saw them at the hide as they were on the
other side of the spruce trees we were walking beside.
</p><p>
Checked where Gunner had shot - ho hair or blood. One bullet furrow in
the snow where he shot over it. We walk out to where mine was and
again no blood or hair. Where I sot, there are 4 tracks in the snow
(it was leaping about 4 feet per bound) and a bullet furrow in the
snow, about 4 inches right behind the tracks. I went in for about 200
yards in the knee beep snow and it never slowed down, and with no
blood or hair. If it was a male, it came withing mere inches of being
castrated!
</p><p>
Anyways, was pretty exiting and most action we have had since we
started hunting wolves again three weeks ago. Fellow from TO was
pretty pumped - first time he got to see a wolf and two "professional"
hunters in action!
</p><p>
Going back in two days to try again!
</p><p>
__________________
</p><p>
Chas
</p><p>
I am a gunnutz, and I can stop impulsive buying, if I have to, I
guess............
</p><p>
FURP
</p>	
		</div>
	</div>
	
		<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
