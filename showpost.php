<?php

//Sets the session and gets the user id.
session_start();
$user = $_GET['user'];
$_SESSION['userID'] = $user;
$pid = $_GET['p'];

//connected to database.
require_once("phpAssets/connect.php");



//Joined tables to get the required information.
$query = "SELECT * FROM posts INNER JOIN usertable ON posts.user_id = usertable.user_id iNNER JOIN category ON posts.category = category.cat_id WHERE post_id=$pid";
$res = mysqli_query($connect,$query);
$fetch = mysqli_fetch_assoc($res);

//fetches user details.
$firstName = $fetch['name'];
$lname = $fetch['last_name']; 
$jtitle = $fetch['job_title'];
$username = $fetch['username'];
$email = $fetch['email'];
$pic = $fetch['profile_pic'];
$status = $fetch['status'];
$loginType = $fetch['login_type'];

//fetches post details.
$pTitle = $fetch['title']; 
$pContent = $fetch['content'];
$pImage = $fetch['image'];
$pCat = $fetch['cat_name'];
$pDate = $fetch['publish_date']; 
$status = $fetch['status'];

if(isset($_POST['publish']))
{
	$pid = $_GET['p'];
	$query = mysqli_query($connect,"UPDATE posts SET status=1 WHERE post_id=$pid");
	if($query)
		header("Location:postview.php?user=$user && post=success");
}

if(isset($_POST['delete']))
{
	$pid = $_GET['p'];
	$query = mysqli_query($connect,"DELETE FROM posts WHERE post_id=$pid");
	if($query)
		header("Location:postview.php?user=$user && delete=success");
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
	<?php $active= basename($_SERVER['PHP_SELF'],".php"); include('phpAssets/sidebar.php');?>
    <div class="main-panel">
		<?php $head ='Post'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo "$pTitle By $firstName <span class='pull-right' style='color:gray;font-size:0.7em'>$pDate</span>";  ?></h4><br/>
                                <h6 class="title"><b>Category</b> - <?php echo $pCat;?></h6>								
                            </div>
                            <div class="content">
                                <form action='' method='post'>
                                    <div class="row">
										
                                        <div class="col-md-12">
											<center>
												<img src="<?php echo $pImage ?>" width="70%"/>
											</center>
										</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
											<?php echo $pContent;?>
                                        </div>										
                                    </div>
                                    <button type="submit" name='publish' class="btn btn-info btn-fill pull-right">Publish</button>
									<button type="submit" name='delete' class="btn btn-info btn-fill pull-right" style='margin-right:10px'>Delete</button>									
                                    <div class="clearfix"></div>
                                </form>
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
                                     <a href="#">
                                    <img class="avatar border-gray" src="<?php echo $pic;?>" alt="..."/>

                                      <h4 class="title"><?php echo $firstName ."&nbsp;". $lname;?><br />
                                         <small><?php echo $username;?></small>
                                      </h4>
                                    </a>
                                </div>
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
