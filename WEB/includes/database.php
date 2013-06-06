<?php
class db_operations{
// responsible for all the database operations. all your SQL queries and logic should be here.
	var $connection;

	function db_operations(){
		// \/ establish connection to db
		$this->connection = mysql_connect(CONNECTION_SERVER, CONNECTION_USER, CONNECTION_PASS) or die("no connection to db.");
		// \/ select database
		mysql_select_db(CONNECTION_DB, $this->connection) or die("there is no such database.");
	}

	function get_html($id){
		// \/ load the query
		$query = "";
		if(!$this->is_custom_profile($id)){
			// no custom profile set, prepare query to fetch specific profile
			$query = "select profile_html from profiles where profile_id = (select device_profile from devices where device_id = '".$id."')";
		} else {
			// there is custom profile data, prepare query to fetch custom profile
			$query = "select custom_profile_html from devices where device_id = '".$id."'";
		}
		$result = mysql_query($query, $this->connection);
		// \/ return the result in an array, itterate through each row of the result array (once)
		while($row = mysql_fetch_array($result)){
			if(!$this->is_custom_profile($id)){
				// return 
				return $row['profile_html'];
			}else{
				return $row['custom_profile_html'];
			}
		}
		$this->close_connection();
	}

	function is_custom_profile($id){
		// if device has custom profile, returns true, else returns false.
		$query = "select custom_profile_html from devices where device_id = '".$id."'";
		$result = mysql_query($query, $this->connection);
		$cell = mysql_fetch_array($result);
		if($cell['custom_profile_html'] != null || $cell['custom_profile_html'] != 0){
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