<?php
	include('Utils/DomManager.php');
	include('Utils/GoogleAnalytics.php');
	include('Widgets/Group.php');
	include('Widgets/NavigationBar.php');
	DomManager::addCSS('CSS/Body.css');
	DomManager::addCSS('CSS/Scholastic.css');
	DomManager::addCSS('Scripts/Scholastic.js');
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
				NavigationBar::getCell( "Scholastic.php", "Scholastic","University of Toronto Class Websites", true),
				NavigationBar::getCell("Files/Resume.pdf", "Resume", "Online Resume", false),
				NavigationBar::getCell( "/" , "Home", "Main Page", false)
			);
			echo NavigationBar::getNavigationBar($buttons); 
			
			$leftColomnGroups = array(
				array(
					'Title' => 'Emir Hasanbegovic',
					'Row' => array (
						array(
							'Text' => '<a href="Files/Resume.pdf">My Resume</a>'				
						)
					)
				),
				array (
					'Title' => 'Useful Links',
					'Row' => array (
						array(
							'Text' => '<a href="https://portal.utoronto.ca">Portal</a>'				
						),
						array(
							'Text' => '<a href="https://webmail.utoronto.ca">Webmail</a>'				
						),
						array(
							'Text' => '<a href="https://www.rosi.utoronto.ca">R.O.S.I.</a>'				
						),
						array(
							'Text' => '<a href="https://www.utm.utoronto.ca">U.T.M.</a>'				
						),
						array(
							'Text' => '<a href="https://www.gmail.com">Gmail</a>'				
						)								
					)
				)
			);
			$rightColomnGroups = array (
			array (
					'Title' => 'Fall 2010',
					'Row' => array (
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~kyros/courses/418/">CSC418</a>'				
						)					
					)
				),
				array (
					'Title' => 'Spring 2010',
					'Row' => array (
						array(
							'Text' => '<a href="http://www.cs.utoronto.ca/~bonner/courses/2010s/csc338/">CSC338</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~arnold/309/10s/">CSC309</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~arnold/343/10s/">CSC343H5</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~rackoff/373s10/">CSC373</a>'				
						),
						array(
							'Text' => '<a href="http://www.cdf.toronto.edu/~csc343h/winter/">CSC343H1</a>'				
						)					
					)
				),
				array (
					'Title' => 'Fall 2009',
					'Row' => array (
						array(
							'Text' => '<a href="http://www.cs.utoronto.ca/~sills/301/09f/index.shtml">CSC301</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~arnold/347/09f/">CSC347</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~avner/teaching/363/">CSC363</a>'				
						),
						array(
							'Text' => '<a href="http://www.cdf.toronto.edu/~csc369h/fall/">CSC369</a>'				
						),
						array(
							'Text' => '<a href="http://www.cdf.toronto.edu/~csc108h/fall/">CSC108</a>'				
						)					
					)
				),
				array (
					'Title' => 'Spring 2009',
					'Row' => array (
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~arnold/290/09s/">CSC290</a>'				
						),
						array(
							'Text' => '<a href="http://www.dgp.toronto.edu/~ajr/209/">CSC209</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~rackoff/263s09/">CSC263</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.toronto.edu/~bonner/courses/2009s/csc324/">CSC324</a>'				
						),
						array(
							'Text' => '<a href="https://portal.utoronto.ca/webapps/login?action=relogin">MAT224</a>'				
						)					
					)
				),
				array (
					'Title' => 'Fall 2008',
					'Row' => array (
						array(
							'Text' => '<a href="https://portal.utoronto.ca/webapps/login?action=relogin">MAT232</a>'				
						),
						array(
							'Text' => '<a href="http://cslinux.utm.utoronto.ca/~csc207">CSC207</a>'				
						),
						array(
							'Text' => '<a href="http://fisher.utstat.toronto.edu/~minl/257f08/">STA257</a>'				
						),
						array(
							'Text' => '<a href="http://www.cs.utoronto.ca/~avner/teaching/236">CSC236</a>'				
						),
						array(
							'Text' => '<a href="https://portal.utoronto.ca/webapps/login?action=relogin">CSC258</a>'				
						)					
					)
				)
			);
		?>
		<div class="Table">	
			<div class="LeftColumn Column">
				<?php echo Group::getGroups($leftColomnGroups);?>
			</div>
			<div class="RightColumn Column">
				<?php echo Group::getGroups($rightColomnGroups);?>
			</div>
		</div>
	</body>
</html>
