<?php
if(getenv("VCAP_SERVICES")){
 	//if in webserver with vpcap services
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];
	$username = $mysql_config["username"];
	$password = $mysql_config["password"];
	$hostname = $mysql_config["hostname"];
	$port = $mysql_config["port"];
	$db = $mysql_config["name"];

	define("CONNECTION_SERVER", "$hostname");
	define("CONNECTION_USER", "$username");
	define("CONNECTION_PASS", "$password");
	define("CONNECTION_DB", "$db");
} else {
	//if local testing
	define("CONNECTION_SERVER", "localhost");
	define("CONNECTION_USER", "website");
	define("CONNECTION_PASS", "9doggy9");
	define("CONNECTION_DB", "notify");
}




?>