<?php
	if(!$session->logged_in || !$session->isAdmin()){
		echo "you do not belong here. leave";
	} else {
?>
control panel
[<a href='process.php'>Logout</a>]




<?php } ?>