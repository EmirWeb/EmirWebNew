<?php
include_once('Utils/DomManager.php');
DomManager::addCSS('CSS/Utils/shCoreDefault.css');
DomManager::addScript(array(
			"Scripts/Utils/jquery-1.4.2.min.js",
			"Scripts/Utils/SyntaxHighlighter/shCore.js",
			"Scripts/Utils/SyntaxHighlighter/shBrushJava.js",
			"Scripts/Utils/SyntaxHighlighter/shBrushXml.js",
			"Scripts/Utils/SyntaxHighlighter/SyntaxHighlighter.js"
		 ));
?>