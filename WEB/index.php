<!--
	Prject: 		AC Notify [ Algonquin College Notify - Open source version of NiTec Classroom Portal ]
	Developers: 	Kirill Afanasenko, 
					Thom Palmer, 
					Adam Etherington
	Technologies:	Android 4.0.3 Ice Cream Sandwitch 
					PHP 5.4.14
					jQuery 1.9.1
					MySql 5.6.11
	GitHub Repo: 	https://github.com/kirka121/AC_Notify
	Version: 		1.0.17
-->
<?php 
include_once("includes/config.php");
error_reporting(E_ALL); 	//allow error reporting in case webserver's default prevents it
?>
<html>
	<head>
		<title>Notify</title>
		<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon"> 
		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"> 
		<link rel="stylesheet" type="text/css" media="screen" href="assets/css/index.css">				<!-- most css is here. special exceptions occur. -->
		<script src="assets/js/jQuery.js" type="text/javascript" charset="utf-8"></script>				<!-- standard jquery lib -->
		<script src="assets/js/notification_boxes.js" type="text/javascript" charset="utf-8"></script> 	<!-- custom jquery for notification boxes -->
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="header_container"><a href="index.php"><img src="assets/img/logo.png" width="150" height="75"></a>
					<div id="header_tabs_container"> 
						<!-- \/ Header links setup -->
						<?php 
							$tab->create('home');
							$tab->create('navigation'); 
							$tab->create_folder('admin');
						?>
					</div>
				</div>
			</div>
			<div  id="content">
			<?php
				// \/ identify which module to include in content
				if (!isset($_GET['op'])) { 
					include("modules/home.php"); 
				}else{
			      	if(is_file("modules/".$_GET['op'].".php")){
			      		include("modules/".$_GET['op'].".php");
			      	}else{
			      		$red_notification_box->display('Module could not be found.');	
			      	}
				}
			?>
			<br />
			<a href="http://www.google.com">google</a> | <a href="http://www.facebook.com">facebook</a>
			</div>
		</div>
	</body>
</html>

