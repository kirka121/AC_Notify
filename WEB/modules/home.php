<?php
	if(isset($_GET['id']) && $_GET['id'] != null){
		echo "the id is: ".$_GET['id'];
		echo $database->getHtml("SELECT * FROM profiles WHERE profile_id = ".$_GET['id']);
	} else {
		echo "no id provided";
	}
?>