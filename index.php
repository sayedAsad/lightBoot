<?php

session_start();
require_once("phpAssets/connect.php");

if(isset($_SESSION['user']))
{
	$getinfo = mysqli_query($connect,"SELECT user_id, login_type FROM usertable WHERE user_id=".$_SESSION['user']);
	$count = mysqli_num_rows($getinfo);
	$fetch = mysqli_fetch_assoc($getinfo);
	
	$radio2 = $fetch['login_type'];

	if($radio2==1)
	{
		header("Location:dashboard.php");
	}
	elseif($radio2==0)
	{
		header("Location:userIndex.php");
	}	
	exit();	
}
if(isset($_POST['username']))
{	
$username = $_POST['username'];
$pass = $_POST['pass'];
$radio1 = $_POST['radio'];

$getinfo = mysqli_query($connect,"SELECT user_id, username, password, login_type FROM usertable WHERE username='$username' AND password = '$pass'");
$count = mysqli_num_rows($getinfo);
$fetch = mysqli_fetch_assoc($getinfo);

	$radio2 = $fetch['login_type'];
	$_SESSION['user'] = $fetch['user_id'];
	$password = $fetch['password'];
if($count==1)
{

	if($radio2 == 1 && $radio1 == $radio2)
	{	
		
		header("Location:dashboard.php");
		$getStatus = mysqli_query($connect, "UPDATE usertable SET status=1 WHERE user_id=".$_SESSION['user']);
		
	}
	elseif($radio == 0  && $radio1 == $radio2)
	{
		header("Location:userIndex.php");
		$getStatus = mysqli_query($connect, "UPDATE usertable SET status=1 WHERE user_id=".$_SESSION['user']);
	}
	else
		header("Location:index.php?failed = done");
}
else
	header("Location:index.php?failed = done");
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="logfile/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="logfile/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="logfile/css/form-elements.css">
        <link rel="stylesheet" href="logfile/css/style.css">


        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="logfile/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="logfile/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="logfile/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="logfile/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="logfile/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>
	
		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Bootstrap Registration Form Template</a></div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login</h3>
                            		<p>Provide username and password to get instant access:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">User name</label>
			                        	<input type="text" name="username" placeholder="User name..." class="form-first-name form-control" id="form-first-name">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="pass">Password</label>
			                        	<input type="text" name="pass" placeholder="Password..." class="form-last-name form-control" id="form-last-name">
			                        </div>
			                        <div class="form-group">
										<center><input type="radio" name="radio" id='admin' value="1">&nbsp;&nbsp;<span style='color:#47add5'><label for='admin'>Admin</label></span>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<input type="radio" name="radio" id='user' value="0">&nbsp;&nbsp;<span style='color:#47add5'><label for='user'>User</label></span></center>
			                        </div>									
			                        <button type="submit" class="btn">Sign me in!</button>
									<span class="pull-right">
										<a href='registration.php'><p>Create Account</p></a>
									</span>
								</form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="logfile/js/jquery-1.11.1.min.js"></script>
        <script src="logfile/bootstrap/js/bootstrap.min.js"></script>
        <script src="logfile/js/jquery.backstretch.min.js"></script>
        <script src="logfile/js/retina-1.1.0.min.js"></script>
        <script src="logfile/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="logfile/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>