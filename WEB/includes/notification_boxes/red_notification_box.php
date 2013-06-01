<style type="text/css">
div#red_notification_message_box{   
    max-width: 960px;
    position: relative;
    margin: 0 auto;
    padding: 15px 15px 15px 15px;
    font-weight: bold;
    font-size: 16px;
    color: #9c2400;
    border: 1px solid #da9797;
    border-radius: 3px;
    background-color: #efd0d0;
    background-image: -moz-linear-gradient(#f8d8d8, #efd0d0);
    background-image: -webkit-linear-gradient(#f8d8d8, #efd0d0);
    background-image: linear-gradient(#f8d8d8, #efd0d0);
    background-repeat: repeat-x;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    text-shadow: 0 1px 0 rgba(255,255,255,0.8);
    text-align: center;
}
span#close_button{
	position: absolute;
	top: 50%;
	margin-top: -18px;
	right: 7px;
	cursor: pointer;
	text-decoration: none;
}
</style>
<?php
class red_notification_box {
	function display($string){
		echo "<div id='red_notification_message_box'>$string<span id='close_button'><img src='assets/img/red_notification_close.png'></span></div>";
	}
}

$red_notification_box = new red_notification_box;
?>
