<?php
include_once("Widgets/Post.php");

class Data {

	public static function getBlogPosts(){
		return array(
		Post::getPostModel('Google TV Review', mktime(0,0,0,12,2,2011) ,'Google TV is a multimedia centre that takes in an HDMI feed and overlays it with the Android operating system. It attempts to connect to and communicate with a settop box (cable box) through the connecting HDMI cable. It reads channel information and controls the box by changing channels. Some Google TV devices, such as the Logitech Revue, have the ability to control your television as well. By integrating Google TV into a home theatre system, you have the ability to host native android applications and experience Chrome through your television. To interact with the device, users are given a keyboard and mouse in one controller. The controller is a standard keyboard which has had the arrow keys and numerical pad replaced with a digital arrow pad and a laptop-styled touch-pad mouse.', "GoogleTV.php"),
		Post::getPostModel('New web site design',mktime(0,0,0,12,2,2011),'I\'ve been working hard to get this new design out. <p>COPYRIGHT (C) 2008 SITENAME.COM. ALL RIGHTS RESERVED. DESIGN BY CSS TEMPLATES.</p>', null, null)
		);
	}

	public static function getProjectPosts(){
		return array(
		Post::getPostModel('Little Droid Physics',mktime(0,0,0,12,1,2011),'The idea behind droid physics was to offer a simple physics
					environment that would aid early high school students to understand
					some of the properties of physics. In particular, acceleration,
					projectile motion and Friction.', "LittleDroidPhysics.php"),
		Post::getPostModel('Little Droid Creator',mktime(0,0,0,12,2,2011),'Little Droid Creator was designed to showcase the dynamic engine
					on which it runs. This document will first describe at a high level
					what the game offers then we will dig down into the technical
					aspects of the program and talk about how it offers the high level
					aspects', "LittleDroidCreator.php"),
		Post::getPostModel('Star Fighter (javascript)',mktime(0,0,0,12,2,2011),'StarFighter (JavaScript) available online for first time. This game was designed to show case the web development knowledge I had acquired while working with <a href="http://www.visibli.com"  target="_blank">Visibli</a>. One of the things to note is the async loop class. It demostrates how scope and threading works in JavaScript.', "StarFighter.php")
		);
	}

	public static function getAllPosts(){
		$blogs = self::getBlogPosts();
		$projects = self::getProjectPosts();
		$posts = array();
		
		foreach ($projects as $project) {
			array_push($posts, $project);
		}
		
		foreach ($blogs as $blog) {
			array_push($posts, $blog);
		}
		
		uasort($posts, 'Post::cmp');
		
		return $posts;
	}
	
	

}