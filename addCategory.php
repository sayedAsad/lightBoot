<?php

//Session started.
session_start();

//Gets user id by session.
$user = $_SESSION['user'];

//Checks if session is used.
if(!$user)
{
	header("Location:index.php");
}

//Connected to database.
$con = include("phpAssets/connect.php");

//user details is required.
$query = "SELECT * FROM usertable";
$res = mysqli_query($connect,$query);
$fetch = mysqli_fetch_assoc($res);


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
	<?php $active= basename($_SERVER['PHP_SELF'],".php"); include('phpAssets/sidebar.php');?>
    <div class="main-panel">
		<?php $head ='Users'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Users list</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Name</th>
                                    	<th>Last name</th>
                                    	<th>Job title</th>
                                    	<th>email</th>
										<th>Status</th>
                                    </thead>
                                    <tbody>
										<?php	
											
											do{
												$id = $fetch['user_id'];
												$name = $fetch['name'];
												$lastname=$fetch['last_name'];
												$job = $fetch['job_title'];
												$email = $fetch['email'];
												$status =$fetch['status'];
											echo "<tr>
													<td>$id</td>
													<td><a href='user.php?user=$id'>$name</a></td>
													<td>$lastname</td>
													<td>$job</td>
													<td>$email</td>
													<td>$status</td>
												</tr>";
											}while($fetch = mysqli_fetch_assoc($res));
										?>
                                    </tbody>
                                </table>

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

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
