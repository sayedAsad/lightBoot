<?php
session_start();
	
	//Gets the current user id from the url.
	$user = $_SESSION['user'];
	

//connected to database.
require_once("phpAssets/connect.php");


//Gets categories to show in select menu.
$select = mysqli_query($connect, "SELECT cat_id,cat_name FROM category");
$Sfetch = mysqli_fetch_assoc($select);


//extracts user details from database.
$query = "SELECT * FROM contact INNER JOIN usertable ON contact.user_id=usertable.user_id WHERE usertable.user_id=$user";
$res = mysqli_query($connect,$query);
$fetch = mysqli_fetch_assoc($res);


//Gets form values and inserts into contact table.
if(isset($_POST['mess']))
{
	$mess = $_POST['mess'];
	$date = $_POST['date'];
	
	$insert = mysqli_query($connect, "INSERT INTO contact(con_id, user_id, message, date)
													VALUES(NULL, $user, '$mess', '$date')");

}

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

	<!-- Page header and it's specific photo is included. -->
  <?php $headPic='images/contact-bg.jpg'; $active= basename($_SERVER['PHP_SELF'],".php"); require_once('phpAssets/userheader.php');?>
 
    <div class="container single-page contact-page">
        <div class="row">
            <div class="col-12 col-lg-9">
                <div class="content-wrap">
                    <header class="entry-header">
                        <h2 class="entry-title">Contact me or just say HI</h2>

                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vel tortor facilisis, volutpat nulla placerat, tincidunt mi. Nullam vel orci dui. Suspendisse sit amet laoreet neque. Fusce sagittis suscipit sem a consequat. Proin nec interdum sem. Quisque in porttitor magna, a imperdiet est. Donec accumsan justo nulla, sit amet varius urna laoreet vitae. Maecenas feugiat fringilla metus. Nullam semper ornare quam eu sagittis. Curabitur ornare sem eu dapibus rutrum. Sed lobortis eros ut sapien lobortis, euismod dignissim odio interdum. Integer finibus molestie tellus sit amet egestas. Aliquam ullamcorper magna in ipsum sollicitudin imperdiet consectetur vitae nunc. Maecenas vel erat et erat lobortis porttitor ac id diam. </p>
                    </div><!-- .entry-content -->

                    <div class="contact-page-social">
                        <ul class="flex align-items-center">
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div><!-- .header-bar-social -->

                    <form class="contact-form" action='' method='post'>
                        <input type="text" disabled value="<?php echo $fetch['name'];?>" placeholder="Name">
                        <input type="email" disabled value="<?php echo $fetch['email'];?>" placeholder="Email">
                        <textarea rows="18" name='mess' value="" cols="6" placeholder="Messages"></textarea>
                        <input type="text"  name='date' id='autoDate' placeholder="date">
						<input type="submit" value="Send" style='cursor:pointer'>
                    </form><!-- .contact-form -->
                </div><!-- .content-wrap -->
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .outer-container -->

<?php require_once("phpAssets/userfooter.php");?>


<script type='text/javascript' src='userAssets/js/jquery.js'></script>
<script type='text/javascript' src='userAssets/js/swiper.min.js'></script>
<script type='text/javascript' src='userAssets/js/custom.js'></script>

</body>
	
<script>	

//Gets the current date.
var date = new Date();
var y = date.getFullYear();
var m = date.getMonth();
var d = date.getDay();
var h = date.getHours();
var min = date.getMinutes();
var s = date.getSeconds();
document.getElementById("autoDate").value = y + " - " + m + " - " + d + " / " + h + " : " + min + " : " + s;
	
	
</script>
</html>