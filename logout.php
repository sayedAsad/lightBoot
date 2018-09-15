<?php 

require_once("phpAssets/connect.php");


if(isset($_SESSION['user']))
{
	$user = $_SESSION['user'];
	$getStatus = mysqli_query($connect, "UPDATE usertable SET status=0 WHERE user_id=$user");
session_start();
session_unset($_SESSION['user']);
echo $_SESSION['user'];
}
?>