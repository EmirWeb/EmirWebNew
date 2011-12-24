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
		if (is_array($css)){
			foreach ($css as $value){
				self::addCSS($value);
			}
		}else {
			self::addToDom($css, self::$cssKey);
		}
	}

	static function addScript($script){
		if (is_array($script)){
			foreach ($script as $value){
				self::addScript($value);
			}
		}else {
			self::addToDom($script, self::$scriptKey);
		}
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
			$script .= '<script type="text/javascript" src="' . $value . '"></script> ' . "\n";
		}

		return $script;
	}
}
?>