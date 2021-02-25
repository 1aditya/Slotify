<?php
include("../../config.php");

if(isset($_POST['songId'])) {
	$songId = $_POST['songId'];

	$query = pg_query($con, "SELECT * FROM songs WHERE id='$songId'");

	$resultArray = pg_fetch_array($query);

	echo json_encode($resultArray);
}


?>