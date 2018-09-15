<?php

require_once("phpAssets/connect.php");


if(isset($_POST['name']))
{
$name = $_POST['name'];
$lname = $_POST['lname'];
$job = $_POST['job'];
$email = $_POST['email'];
$photo = $_FILES['photo']['name'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$repass = $_POST['repass'];
move_uploaded_file($_FILES["photo"]["tmp_name"],"images/".$photo);
$dir = "images/".$photo;

if($pass == $repass)
{
$query = mysqli_query($connect,"INSERT INTO usertable (user_id, name, last_name, job_title, username, password, re_pass,
											  email, profile_pic,status) 
								   VALUES (NULL, '$name', '$lname', '$job', '$email', '$dir', '$username', '$pass', '$repass',0)");
if($query)
	header("Location:registration.php?success=done");
else
	header("Location:registration.php?fail=done");
}
else
	header("Location:registration.php?fail=done");	
}


?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Account</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="regisfile/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="regisfile/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="regisfile/css/form-elements.css">
        <link rel="stylesheet" href="regisfile/css/style.css">
		<script src="js/alertify.min.js"></script>
		<link rel="stylesheet" href="css/alertify.core.css" />
		<link rel="stylesheet" href="css/alertify.custom.css" id="toggleCSS" />

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="regisfile/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="regisfile/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="regisfile/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="regisfile/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="regisfile/ico/apple-touch-icon-57-precomposed.png">

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
					<a class="navbar-brand" href="index.html">Bootstrap Registration Form Template</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->

			</div>
		</nav>

			<div class='modal fade' id='myModal' role='dialog'> 
				<div class='modal-dialog'> 
					 <div class='modal-content'> 
						 <div class='modal-header'> 
						   <button type='button' class='close' data-dismiss='modal'>&times;</button> 
						   <h4 class='modal-title'><strong>Success!</strong>&nbsp;&nbsp;&nbsp;Form successfuly submitted</h4> 
						 </div>       
					 </div> 
				 </div> 
			</div> 

		<!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Registration Form</h3>
                            		<p>Fill in the form below to get instant access:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-pencil"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" enctype="multipart/form-data" class="registration-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="name">First name</label>
			                        	<input type="text" name="name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
			                        </div>					
									<div class="form-group">
			                        	<label class="sr-only" for="lname">Last name</label>
			                        	<input type="text" name="lname" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="job">Job title</label>
			                        	<input type="text" name="job" placeholder="Job title..." class="form-first-name form-control" id="form-first-name">
			                        </div>
									
			                        <div class="form-group">
			                        	<label class="sr-only" for="email">Email</label>
			                        	<input type="text" name="email" placeholder="Email..." class="form-email form-control" id="form-email">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="photo">photo</label>
			                        	<input type="file" name="photo" class="form-first-name form-control" id="form-first-name">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="username">User name</label>
			                        	<input type="text" name="username" placeholder="User name..." class="form-first-name form-control" id="form-first-name">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="pass">Password</label>
			                        	<input type="text" name="pass" placeholder="Password..." class="form-first-name form-control" id="form-first-name">
			                        </div>
			                    	<div class="form-group">
			                    		<label class="sr-only" for="repass">Re-enter password</label>
			                        	<input type="text" name="repass" placeholder="Re-enter password..." class="form-first-name form-control" id="form-first-name">
			                        </div>
									
			                        <button type="submit" class="btn">Give it to me!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
		
        <!-- Javascript -->
        <script src="regisfile/js/jquery-1.11.1.min.js"></script>
        <script src="regisfile/bootstrap/js/bootstrap.min.js"></script>
        <script src="regisfile/js/jquery.backstretch.min.js"></script>
        <script src="regisfile/js/retina-1.1.0.min.js"></script>
        <script src="regisfile/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="regisfile/js/placeholder.js"></script>
        <![endif]-->

    </body>

<script>
function JSalert1(){
// successful submition of form
alertify.alert("<span style='color:#228B22'><b>Success!</b> Form successfuly submitted.</span>");
}
function JSalert2(){
// An error alert
alertify.alert("<span style='color:#DC143C'><b>Error</b>, Please try again!</span>");
}

</script>

<?php
if(isset($_GET['success']))
{
?>
<script>JSalert1();</script>
<?php
}
if(isset($_GET['fail']))
{
?>
<script>JSalert2();</script>
<?php
}
?>


</html>