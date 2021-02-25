<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Kolkata");

	$con = pg_connect(getenv("DATABASE_URL"));

	if($con==false) {
		echo "Failed to connect: ";
	}
?>
