<?php

//sets session and gets the user id.
session_start();
$user = $_SESSION['user'];


//connected to database.
$con = include("phpAssets/connect.php");

//joined tables pages and category to get the required information.
$query = "SELECT * FROM pages INNER JOIN category ON pages.p_category = category.cat_id";
$res = mysqli_query($connect,$query);
$fetch = mysqli_fetch_assoc($res);


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Pages list</title>

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

	<!-- Page sidebar is included. -->
	<?php $active= basename($_SERVER['PHP_SELF'],".php"); include('phpAssets/sidebar.php');?>
    <div class="main-panel">
		
		<!-- page header is included. -->
		<?php $head ='Pages'; include('phpAssets/header.php');?>
		
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Created pages <a href='addpage.php?user=<?php echo $user;?>'><span class='pull-right' style='font-size:0.8em;color:green'>Add page +</span></a></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>ID</th>
                                    	<th>Page title</th>
                                    	<th>content</th>
                                    	<th>category</th>
                                    	<th>image</th>										
										<th>Status</th>
										<th>date</th>
										
                                    </thead>
                                    <tbody>
										<?php	
											//loop for extract and show the information.
											do{
												$id = $fetch['page_id'];
												$title = $fetch['p_title'];
												$pic = $fetch['pic'];
												$content = $fetch['p_content'];
												$cat = $fetch['cat_name'];
												$date = $fetch['date'];
											
												
											echo "<tr>
													<td>$id</td>
													<td style='text-overflow:ellipsis'>$title</td>
													<td style='text-overflow:ellipsis'>$content</td>
													<td>$cat</td>
													<td><img src='$pic' width='80px' height='80px' alt='page image'></td>
													<td>";	if($fetch['status']==1){ echo $status = "Published";} else {echo $status = "Draft";}
												echo "</td>".
													"<td>$date</td>".

												"</tr>";
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
			<!-- Page footer is included. -->
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
