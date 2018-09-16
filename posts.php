<?php

//Session set and gets user id.
session_start();
$user = $_SESSION['user'];
//$_SESSION['userID'] = $user;

//connected to database.
require_once('phpAssets/connect.php');

//Extracts category name and id to show in the select menu.
$select = mysqli_query($connect, "SELECT cat_id,cat_name FROM category");
$fetch = mysqli_fetch_assoc($select);


if(isset($_POST['ptitle']))
{

//Gets the post form values to insert into the posts table.	
$title = $_POST['ptitle'];
$content = $_POST['content'];
$pic = $_FILES['pic']['name'];
$cat = $_POST['cat'];
$date = $_POST['date'];

move_uploaded_file($_FILES['pic']['tmp_name'],"images/".$pic);
$dir = "images/".$pic;


$query = mysqli_query($connect,"INSERT INTO posts(post_id, title, content, image, category, user_id, publish_date)
												VALUES(NULL, '$title', '$content', '$dir', $cat, $user, '$date')");
	

if($query)
	header("Location:posts.php?success=done");
else
	header("Location:posts.php?fail=done");


	
}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Post</title>

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

	<!-- Page sidebar is included. -->
	<?php $active= basename($_SERVER['PHP_SELF'],".php"); include('phpAssets/sidebar.php');?>
    <div class="main-panel">
	
		<!-- Page header is included. -->
		<?php $head ='Posts'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Post details</h4>
                            </div>
                            <div class="content">
                                <form action='' method='post' enctype='multipart/form-data'>
                                    <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Post title</label>
												<input type="text" name='ptitle' class="form-control" placeholder="Post title">
											</div>
										</div>
									</div>
                          
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Post content</label>
                                                <textarea rows="5" name='content' class="form-control" placeholder="Here can be your description"></textarea>
                                            </div>
                                        </div>
                                    </div>
	                                <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Image</label>
												<input type="file" name='pic' class="form-control">
											</div>
										</div>
									</div>

                                    <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Category</label>
												<select name='cat' class="form-control">
													<option>--SELECT--</option>
													<?php 
														do
														{	
															$cat_name = $fetch['cat_name'];
															$cat_id = $fetch['cat_id'];
															echo "<option value='$cat_id'>$cat_name</option>";
														}while($fetch = mysqli_fetch_assoc($select));
													?>
												</select>
											</div>
										</div>
									</div>																
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Date</label>
												<input type="text" id='autoDate' name='date' class="form-control">
											</div>
										</div>
									</div>
										<br/>
										<button type="submit" class="btn btn-info btn-fill">Post</button>
								</form>
							</div>	                                
						</div>
					</div>
				</div>
			</div>
		</div>
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

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	
<script>	

//Gets the current date .
var date = new Date();
var y = date.getFullYear();
var m = date.getMonth();
var d = date.getDay();
var h = date.getHours();
var min = date.getMinutes();
var s = date.getSeconds();
document.getElementById("autoDate").value = y + " - " + m + " - " + d + " / " + h + " : " + min + " : " + s;
	

// successful submition of form	
function JSalert1(){
alertify.alert("<span style='color:#228B22'><b>Success!</b> You have posted successfuly.</span>");
}

// An error alert
function JSalert2(){
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
