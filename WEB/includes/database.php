<?php
include_once("config.php");
class dbOperations {
// class responsible for all the database operations. all your queries should be here.
	function getHtml($query){
		// \/ establish connection to db
		$connection = mysql_connect(CONNECTION_SERVER, CONNECTION_USER, CONNECTION_PASS) or die("no connection to db.");
		// \/ select database
		mysql_select_db(CONNECTION_DB, $connection) or die("there is no such database.");
		// \/ load the query
		$result = mysql_query($query, $connection);
		// \/ return the result in an array
		while($row = mysql_fetch_array($result)){
			return $row['profile_html'];
		}
		// \/ close connection
		mysql_close($connection);
	}

}
$database = new dbOperations;
?>