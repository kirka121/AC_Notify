<?php 
include_once("includes/database.php");
error_reporting(E_ALL);
?>
<html>
	<head>
		<title>Notify</title>
		<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> 
		<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon"> 
		<link rel="stylesheet" type="text/css" media="screen" href="assets/css/index.css">
		<link rel="stylesheet" type="text/css" media="screen" href="assets/css/960.css">
		<link rel="stylesheet" type="text/css" media="screen" href="assets/css/reset.css">
		<link rel="stylesheet" type="text/css" media="screen" href="assets/css/text.css">
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="header_container"><a href="index.php"><img src="assets/img/logo.png" width="150" height="75"></a>
					<div id="header_tabs_container"> 
						<a href="index.php?op=home"><div <?php if(!isset($_GET['op']) || $_GET['op'] == 'home' || $_GET['op'] == null){echo 'class="header_tabs_divs_active"';} else {echo 'class="header_tabs_divs"';} ?>>home</div></a>
						<a href="index.php?op=navigation"><div <?php if(isset($_GET['op']) && $_GET['op'] == 'navigation'){echo 'class="header_tabs_divs_active"';} else {echo 'class="header_tabs_divs"';} ?>>navigation</div></a>
						<a href="index.php?op=placeholder"><div <?php if(isset($_GET['op']) && $_GET['op'] == 'placeholder'){echo 'class="header_tabs_divs_active"';} else {echo 'class="header_tabs_divs"';} ?>>placeholder</div></a>
						<a href="index.php?op=admin"><div <?php if(isset($_GET['op']) && $_GET['op'] == 'admin'){echo 'class="header_tabs_divs_active"';} else {echo 'class="header_tabs_divs"';} ?>>admin</div></a>
					</div>
				</div>
			</div>
			<div  id="content">
			<?php
				if (!isset($_GET['op'])) { 
					include("modules/home.php"); 
				} else {
				  	$op = $_GET['op'];
			      	if (is_file("modules/".$op.".php")) {
			      		include("modules/".$op.".php");
			      	} else {	
						echo ("<div id='red_notification_message_box'>Module could not be found.</div>");
			      	}
				}
			?>
			<br />
			<a href="http://google.com">google</a> | <a href="http://facebook.com">facebook</a>
			</div>
		</div>
	</body>
</html>

