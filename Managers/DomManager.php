<?php

class DomManager {

	private static $cssKey = 'CSS';
	private static $scriptKey = 'SCRIPTS';

	private static function addToDom($value, $key){
		if (empty($value) || empty($key)){
			return;
		}

		if (!isset($GLOBALS[$key])){
			$GLOBALS[$key] = array();
		}

		if (!in_array($value, $GLOBALS[$key])) {
			array_push($GLOBALS[$key], $value);
		}
	}

	static function addCSS($css){
		self::addToDom($GLOBALS['webRoot'] . $css, self::$cssKey);
	}

	static function addScript($script){
		self::addToDom($GLOBALS['webRoot'] . $script, self::$scriptKey);
	}

	private static function getValuesFromDom($key){
		if (empty($key)){
			return array();
		}
		if (!isset($GLOBALS[$key])){
			return array();
		}
		return $GLOBALS[$key];
	}

	static function getCSS(){
		$css = "";
		foreach (self::getValuesFromDom(self::$cssKey) as $value){
			$css .= '<link rel="stylesheet" type="text/css" href="' . $value . '" />'. "\n";
		}

		return $css;
	}


	function getScripts(){
		$script = "";
		foreach (self::getValuesFromDom(self::$scriptKey) as $value){
			$script .= '<link rel="stylesheet" type="text/css" href="' . $value . '" />' . "\n";
		}

		return $script;
	}
}
?>