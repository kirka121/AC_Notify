$(document).ready(function() {
	$('div#red_notification_message_box span#close_button').click(function () {
	    $('div#red_notification_message_box').remove();
	});
	$('div#blue_notification_message_box span#close_button').click(function () {
	    $('div#blue_notification_message_box').remove();
	});
});