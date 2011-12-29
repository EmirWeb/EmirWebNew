<?php
class Utilities {
	private static $SERVER_NAME = "SERVER_NAME";
	private static $HTTP = "http";
	private static $HTTPS = "HTTPS";
	private static $HTTPS_ON = "on";
	private static $SERVER_PORT_80 = "80";
	private static $SERVER_PORT = "SERVER_PORT";
	private static $REQUEST_URI = "REQUEST_URI";
	private static $CSS = "://";
	private static $S = "s";

	private static $curPageURL;

	public static function getCurrentPageURL() {
		if (!isset(self::$curPageURL)){
			self::$curPageURL = self::$HTTP;

			if (isset($_SERVER[self::$HTTPS]) && $_SERVER[self::$HTTPS] == self::$HTTPS_ON) {
				self::$curPageURL .= self::$S;
			}

			self::$curPageURL .= self::$CSS;

			if ($_SERVER[self::$SERVER_PORT] != self::$SERVER_PORT_80) {
				self::$curPageURL .= $_SERVER[self::$SERVER_NAME] . ":" . $_SERVER[self::$SERVER_PORT] . $_SERVER[self::$REQUEST_URI];
			} else {
				self::$curPageURL .= $_SERVER[self::$SERVER_NAME].$_SERVER[self::$REQUEST_URI];
			}
		}

		return self::$curPageURL;
	}
	
	public static function getURL($requestUri) {
			$url = self::$HTTP;
	
			if (isset($_SERVER[self::$HTTPS]) && $_SERVER[self::$HTTPS] == self::$HTTPS_ON) {
				$url .= self::$S;
			}
	
			$url .= self::$CSS;
	
			if ($_SERVER[self::$SERVER_PORT] != self::$SERVER_PORT_80) {
				$url .= $_SERVER[self::$SERVER_NAME] . ":" . $_SERVER[self::$SERVER_PORT] . $requestUri;
			} else {
				$url .= $_SERVER[self::$SERVER_NAME].$requestUri;
			}
// 			var_dump($requestUri);
	
		return $url;
	}
	
}
?>