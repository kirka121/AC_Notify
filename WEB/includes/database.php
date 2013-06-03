<?php
class db_operations{
// class responsible for all the database operations. all your queries should be here.
	var $connection;

	function db_operations(){
		//default constructor.
		// \/ establish connection to db
		$this->connection = mysql_connect(CONNECTION_SERVER, CONNECTION_USER, CONNECTION_PASS) or die("no connection to db.");
		// \/ select database
		mysql_select_db(CONNECTION_DB, $this->connection) or die("there is no such database.");
	}

	function get_html($id){
		// \/ load the query
		$query = "";
		if(!$this->check_custom_profile($id)){
			// if not custom profile
			$query = "select profile_html from profiles where profile_id = (select device_profile from devices where device_id = '".$id."')";
		} else {
			// if is custom profile
			$query = "select custom_profile_html from devices where device_id = '".$id."'";
		}
		$result = mysql_query($query, $this->connection);
		// \/ return the result in an array
		while($row = mysql_fetch_array($result)){
			return $row['profile_html'];
		}
		// \/ close connection
		$this->close_connection();
	}

	function check_custom_profile($id){
		// if device has custom profile, returns true, else returns false.
		$query = "select custom_profile_html from devices where device_id = '".$id."'";
		$result = mysql_query($query, $this->connection);
		$answer = mysql_fetch_array($result);
		if($answer['custom_profile_html'] != null && $answer['custom_profile_html'] != 0){
			return true;
		}else{
			return false;
		}
		$this->close_connection();
	}

	function close_connection(){
		// \/ close connection
		mysql_close($this->connection);
	}

}
$database = new db_operations;
?>