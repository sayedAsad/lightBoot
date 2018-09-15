<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connect = mysqli_connect($servername, $username, $password);
mysqli_select_db($connect,'blog');



?>