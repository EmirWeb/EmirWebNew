<?php

class MySQL {

	protected $MY_SQL_LINK = "";
	
	public function open(){
		$this->MY_SQL_LINK = mysql_connect('localhost', 'root', 'root');
	}
	
	public function isServerRunning(){
		if (!$this->MY_SQL_LINK)
			return false;
		return true;
	}	
	
	public function rawQuery($rawQuery){
		return mysql_query($rawQuery, $this->MY_SQL_LINK);
	}
	
	
	public function close(){
		mysql_close($this->MY_SQL_LINK);
	}
	
}