<?php

session_start();
	
	//Gets the current user id from the url.
	$user = $_SESSION['user'];
	
//connected to database.
require_once("phpAssets/connect.php");


//Gets categories to show in select menu.
$select = mysqli_query($connect, "SELECT cat_id,cat_name FROM category");
$Sfetch = mysqli_fetch_assoc($select);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="userAssets/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="userAssets/css/font-awesome.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="userAssets/css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="userAssets/style.css">
</head>
<body>
<div class="outer-container">

	<?php $headPic='images/about-bg.jpg'; $active= basename($_SERVER['PHP_SELF'],".php"); require_once('phpAssets/userheader.php');?>
	
    <div class="container single-page about-page">
        <div class="row">
            <div class="col-12">
                <div class="content-wrap">
                    <header class="entry-header">
                        <div class="posted-date">
                            January 30, 2018
                        </div><!-- .posted-date -->

                        <h2 class="entry-title">Tiyan software development company</h2>

                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <img src="images/tiyan.png" alt="">
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. Donec accumsan justo nulla, sit amet varius urna laoreet vitae. Maecenas feugiat fringilla metus. Nullam semper ornare quam eu sagittis. Curabitur ornare sem eu dapibus rutrum. Sed lobortis eros ut sapien lobortis, euismod dignissim odio interdum. Integer finibus molestie tellus sit amet egestas. Aliquam ullamcorper magna in ipsum sollicitudin imperdiet consectetur vitae nunc. Maecenas vel erat et erat lobortis porttitor ac id diam. Cras in maximus lectus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>

                        <p>Pellentesque facilisis lorem sed orci rhoncus, non sagittis sem hendrerit. Nam rhoncus molestie felis, eget laoreet tortor sagittis ac. Pellentesque sapien nunc, vehicula ut tortor sed, gravida tristique magna. Praesent nec finibus est. Maecenas a purus auctor, varius ligula sed, ultricies lacus. Vestibulum erat eros, interdum ut finibus efficitur, efficitur sit amet sem. Proin sed imperdiet arcu, eget auctor turpis.</p>

                        <p>Nullam non nisi ut dolor pellentesque eleifend. Aliquam commodo vitae risus malesuada varius. Nulla ornare lacus eu elit sollicitudin varius. Nulla aliquet ornare massa id tempor. Sed luctus dui non turpis sodales, ac tristique risus consequat. Donec tincidunt mi a magna rhoncus dapibus. Integer ut lectus euismod, dignissim tortor sed, imperdiet nibh. Donec urna nisl, sodales tincidunt lorem sit amet, vestibulum commodo tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tempor ex sed iaculis vulputate. </p>
                    </div><!-- .entry-content -->

					
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .row -->		
    </div><!-- .container -->
</div><!-- .outer-container -->

<?php require_once("phpAssets/userfooter.php");?>

<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>

</body>
</html>