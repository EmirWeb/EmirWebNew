<?php 
include_once('Utils/DomManager.php');
DomManager::addScript('https://apis.google.com/js/plusone.js');
class GooglePlus {
	
	public static function getPlusOne(){
		$ret = '<g:plusone annotation="none" size="medium"></g:plusone>';
		return $ret;
	}	
	
	public static function getPlusOneWithUrl($url){
		$ret = '<g:plusone annotation="none" size="medium" href="' . $url . '"></g:plusone>';
		return $ret;
	}
}
?>