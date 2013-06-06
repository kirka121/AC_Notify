<?php
	if (isset($_GET['id']) && $_GET['id'] != null){
		$session->set_id($_GET['id']);
	}
	if(isset($_SESSION['ANDROID_ID'])){ 
		echo "the session id is: ".$_SESSION['ANDROID_ID']."<br />";
		echo $database->get_html($_SESSION['ANDROID_ID']);
	}
?>
<div style="text-align: left; margin: 0 auto;">
THERE IS A GLITCH INSIDE MY SYSTEM<br/>
RUSHING THROUGH MY WHOLE EXISTENCE<br/>
GOT ME TWISTED, CANT RESIST THIS<br/>
SOMETHING IS FLIPPING ALL MY SWITCHES<br/>
TAKE EM, BREAK EM, MAKE EM FEEL IT<br/>
MIX IT UP AND MASS APPEAL IT<br/>
PRESSURE IS RIDING ME HARD, KILLED DOSE RIGHT TO MY HEART
</div>