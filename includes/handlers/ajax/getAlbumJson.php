<?php
include("../../config.php");

if(isset($_POST['albumId'])) {
	$albumId = $_POST['albumId'];

	$query = pg_query($con, "SELECT * FROM albums WHERE id='$albumId'");

	$resultArray = pg_fetch_array($query);

	echo json_encode($resultArray);
}
?>