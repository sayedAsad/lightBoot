<?php

//Session is started.
session_start();
$user = $_SESSION['user'];

//connected to database.
require_once('phpAssets/connect.php');


if(isset($_POST['cat_name']))
{
	$name = $_POST['cat_name'];
	$slug = $_POST['slug'];
	$status = $_POST['status'];

	$query = mysqli_query($connect, "INSERT INTO category(cat_id,cat_name,slug,status) 
											VALUES(NULL, '$name', '$slug', '$status')");
		if($query)
			header("Location:category.php?success=done");
		else
			header("Location:category.php?fail=done");
}
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
		<?php $head ='Categories'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Category</h4>
                            </div>
                            <div class="content">
                                <form action='' method='post'>
                                    <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Name</label>
												<input type="text" name='cat_name' class="form-control" placeholder="Category Name">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>slug</label>
												<input type="text" name='slug' class="form-control" placeholder="Category Slug">
											</div>
										</div>
									</div>
                                    <div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label>Status</label>
												<select class="form-control" name='status'>
													<option value=''>--SELECT--</option>
													<option value='1'>One</option>
													<option value='0'>Zero</option>
												</select>
											</div>
										</div>
									</div>									
										<br/>
										<button type="submit" class="btn btn-info btn-fill">Create</button>
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
function JSalert1(){
// successful submition of form
alertify.alert("<span style='color:#228B22'><b>Success!</b> Category created successfuly.</span>");
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
