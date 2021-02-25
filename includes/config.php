<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Europe/London");

	$con = pg_connect("host=localhost port=5432 dbname=slotify user=postgres password=aditya");

	if($con==false) {
		echo "Failed to connect: ";
	}
?>