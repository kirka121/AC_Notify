<?php
	if (isset($_GET['id']) && $_GET['id'] != null){
		$session->set_id($_GET['id']);
	}
	if(isset($_SESSION['ANDROID_ID'])){ 
		echo "the session id is: ".$_SESSION['ANDROID_ID']."<br />";
		echo $database->get_html($_SESSION['ANDROID_ID']);
	}
?>