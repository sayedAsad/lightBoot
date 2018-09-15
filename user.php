<?php

//Sets the session and gets the user id.
session_start();
$Suser = $_SESSION['user'];

$user = $_GET['user'];
//connected to database.
require_once("phpAssets/connect.php");


//query for extract proposed user details.
$query = mysqli_query($connect, "SELECT * FROM usertable WHERE user_id = $user");
$fetch = mysqli_fetch_assoc($query);
$firstName = $fetch['name'];
$lname = $fetch['last_name']; 
$jtitle = $fetch['job_title'];
$username = $fetch['username'];
$email = $fetch['email'];
$pic = $fetch['profile_pic'];
$status = $fetch['status'];
$loginType = $fetch['login_type'];


//form values for update
if(isset($_POST['firstName']))
{
	$fName = $_POST['firstName'];
	$lastname = $_POST['lname'];
	$jobTitle = $_POST['jtitle'];
	$uname = $_POST['username'];
	$logType = $_POST['logType'];
	$picture = $_FILES['picture']['name'];
	
	move_uploaded_file($_FILES["picture"]["tmp_name"],"images/".$picture);
	$dir = "images/" . $picture;
	
	$query = mysqli_query($connect, "UPDATE usertable SET name='$fName', last_name='$lastname', job_title='$jobTitle', username='$uname', profile_pic='$dir', login_type=$logType WHERE user_id=$user");

	if($query)
		header("Location:user.php?success=done && user=$user");
	else
		header("Location:user.php?fail=done && user=$user");

}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>User profile</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


		<script src="js/alertify.min.js"></script>
		<link rel="stylesheet" href="css/alertify.core.css" />
		<link rel="stylesheet" href="css/alertify.custom.css" id="toggleCSS" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
	<?php $active= basename($_SERVER['PHP_SELF'],".php"); include('phpAssets/sidebar.php');?>
    <div class="main-panel">
		<?php $head ='User'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form action='' method='post' enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>First name</label>
                                                <input type="text" name='firstName' class="form-control" value="<?php echo $firstName;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Last name</label>
                                                <input type="text" name='lname' class="form-control" value="<?php echo $lname;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>JOb title</label>
                                                <input type="text" name='jtitle' class="form-control" value="<?php echo $jtitle;?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>user name</label>
                                                <input type="text" name='username' class="form-control" value="<?php echo $username;?>">
                                            </div>
                                        </div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Login as</label>
												<select name='logType' class="form-control">
													<option value="<?php echo $loginType;?>"><?php if($loginType==1){echo "<span style='color:green'>Admin</span>";}else{echo "<span style='color:green'>User</span>";}?></option>
													<option value="">----------------------</option>
													<option value="1">Admin</option>
													<option value="0">User</option>
												</select>
											</div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="images/pp.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
									 
							     	<input type='file' value="<?php echo $pic;?>" name='picture' id='pic2'  style='display:none'/>									 
                                    <img class="avatar border-gray" src="<?php echo $pic;?>" id='preview2' onClick='get2();' style='cursor:pointer'/>

                                      <h4 class="title"><?php echo $firstName ."&nbsp;". $lname;?><br />
                                         <small><?php echo $username;?></small>
                                      </h4>
                                </div>
								</form>
                                <p class="description text-center"><?php echo $jtitle . "<br/>" ;
									if($status==0) 
										echo "<span style='font-weight:bold'>OFF LINE</span>";
									else
										echo "<span style='font-weight:bold;color:green'>ON LINE</span>"; ?>
								</p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
			<!-- page footer is included.-->
			<?php include('phpAssets/footer.php');?>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<script type="text/javascript">
	function get2()
	{
		document.getElementById('pic2').click();
	}
</script>
<script>

	$(document).ready(function()
	{
		//Real time view the picture that user want to upload.
		$(function()
		{
			$("#pic2").change(function()
			{
				var reader = new FileReader();
				reader.onload = function(e)
				{

					$('#preview2').attr('src',e.target.result);

				}
					reader.readAsDataURL(this.files[0]);

			});
		});
	});
</script>



	
<script>
	function JSalert1(){
	// successful submition of form
	alertify.alert("<span style='color:#228B22'><b>Success!</b> Update successfuly done.</span>");
	}
	function JSalert2(){
	// An error alert
	alertify.alert("<span style='color:#DC143C'><b>Error</b>, Please try again!</span>");
	}
</script>

<!-- Alert is called. -->
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
