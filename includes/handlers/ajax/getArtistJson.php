<?php
include("../../config.php");

if(isset($_POST['artistId'])){
    $artistId =$_POST['artistId'];
    $query = pg_query($con,"SELECT * FROM artists WHERE id='$artistId'");
    $resultArray = pg_fetch_array($query);

    echo json_encode($resultArray);
}

?>