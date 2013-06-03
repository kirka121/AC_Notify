<?php
/*
	session file. handles one instance of tablet session.
	

*/
class Session{
	var $android_id; 		//android_id from the get variable at initial application launch. if no id provided, default 00 is left
	var $time;				//time session started
	var $referrer;			//where did the request come from.

	function Session(){
		//default constructor
		$this->time = time();
		$this->start_session();
	}

	function start_session(){
		session_start();
	}

	function set_id($id){
		$this->android_id = $id;
		$_SESSION['ANDROID_ID'] = $id;
	}
}

$session = new Session;
?>