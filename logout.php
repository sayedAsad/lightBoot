<?php 

require_once("phpAssets/connect.php");


	$user = $_GET['user'];
	$getStatus = mysqli_query($connect, "UPDATE usertable SET status=0 WHERE user_id=$user");
session_start();
session_unset($_GET['user']);
header("Location:index.php");

?>