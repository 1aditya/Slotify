<?php
include("../../config.php");


if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$orderIdQuery = pg_query($con, "SELECT MAX(playlistOrder) + 1 as playlistOrder FROM playlistSongs WHERE playlistId='$playlistId'");
	$row = pg_fetch_array($orderIdQuery);
	$order = $row['playlistOrder'];

	$query = pg_query($con, "INSERT INTO playlistSongs(songid,playlistid,playlistorder) VALUES( '$songId', '$playlistId', '$order')");

}
else {
	echo "PlaylistId or songId was not passed into addToPlaylist.php";
}



?>