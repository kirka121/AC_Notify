<style type="text/css">
div#blue_notification_message_box{
    max-width: 960px;
    position: relative;
    margin: 0 auto;
    padding: 15px 15px 15px 15px;
    font-weight: bold;
    font-size: 12px;
    color: #264c72;
    border: 1px solid #97c1da;
    border-radius: 3px;
    background-color: #d0e3ef;
    background-image: -moz-linear-gradient(#d8ebf8, #d0e3ef);
    background-image: -webkit-linear-gradient(#d8ebf8, #d0e3ef);
    background-image: linear-gradient(#d8ebf8, #d0e3ef);
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
class blue_notification_box {
	function display($string){
		echo "<div id='blue_notification_message_box'>$string<span id='close_button'><img src='assets/img/blue_notification_close.png'></span></div>";
	}
}

$blue_notification_box = new blue_notification_box;
?>
