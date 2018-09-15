<?php

session_start();
	
	//Gets the current user id from the url.
	$user = $_SESSION['user'];
	
if(!$user)
{
	header("Location:index.php");
}	

//connection to database is established
require_once("phpAssets/connect.php");


	
//Gets categories to show in select menu.
$select = mysqli_query($connect, "SELECT cat_id,cat_name FROM category");
$Sfetch = mysqli_fetch_assoc($select);


//Gets the Latest post of admin from database.
$query = mysqli_query($connect, "SELECT * FROM pages ORDER BY page_id DESC LIMIT 1");
$fetch = mysqli_fetch_assoc($query);

	$pageTitle = $fetch['p_title'];
	$pageContent = $fetch['p_content'];
	$pic = $fetch['pic'];
	$category = $fetch['p_category'];
	$date = $fetch['date'];


	
if(isset($_POST['title']))
{
	//Gets the data from user and inserts into post table.
	$title = $_POST['title'];
	$desc = $_POST['desc'];
	$pic = $_FILES['pic']['name'];
	$cat = $_POST['cat'];
	$date = $_POST['date'];
	move_uploaded_file($_FILES['pic']['tmp_name'],"images/".$pic);
	$dir = "images/".$pic;

	$query = mysqli_query($connect,"INSERT INTO posts(post_id, title, content, image, category, user_id, publish_date, status)
												VALUES(NULL, '$title', '$desc', '$dir', $cat, $user, '$date', 0)");
		
	if($query)
		header("Location:userIndex.php?success=done");
	else
		header("Location:userIndex.php?fail=done");


}


//Joined tables to get the required information.
$pQuery = "SELECT * FROM posts INNER JOIN usertable ON posts.user_id = usertable.user_id iNNER JOIN category ON posts.category = category.cat_id WHERE posts.status=1";
$res = mysqli_query($connect,$pQuery);
$pfetch = mysqli_fetch_assoc($res);
	
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
	
		<script src="js/alertify.min.js"></script>
		<link rel="stylesheet" href="css/alertify.core.css" />
		<link rel="stylesheet" href="css/alertify.custom.css" id="toggleCSS" />

	
	
</head>
<body>
<div class="outer-container">

<!-- page header and it's specific photo is included.-->
<?php $headPic='images/blog-bg.jpg'; $active= basename($_SERVER['PHP_SELF'],".php"); require_once('phpAssets/userheader.php');?>


    <div class="container single-page blog-page">
        <div class="row">
            <div class="col-12">
			
			
                <div class="content-wrap">
                    <header class="entry-header">
                        <div class="posted-date">
                            <?php echo $date;?>
                        </div><!-- .posted-date -->

                        <h2 class="entry-title"><?php echo $pageTitle;?></h2>

                    </header><!-- .entry-header -->

                    <figure class="featured-image">
                        <?php echo "<img src='$pic' width='100%' alt=''>"; ?>
                    </figure><!-- .featured-image -->

                    <div class="entry-content">
						<p><?php echo $pageContent;?></p>
                    </div><!-- .entry-content -->

                    <footer class="entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center" style='margin-top:-15px'>
                     
						<ul class="post-share flex align-items-center order-3 order-lg-1">
                            <label>Share</label>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul><!-- .post-share -->
	
                    </footer><!-- .entry-footer -->

                </div><!-- .content-wrap -->

			
			<!-- Shows the published posts -->	
				
				<?php
				
				do
				{	
				
					$pTitle = $pfetch['title'];
					$by = $pfetch['name'];
					$cat = $pfetch['cat_name'];
					$pImage = $pfetch['image'];
					$pContent = $pfetch['content'];
					$pDate = $pfetch['publish_date'];
				
				  echo "<div class='content-wrap'>
							<header class='entry-header'>

								<h2 class='entry-title'>$pTitle
								<span class='pull-right entry-title' style='color:gray;font-size:0.5em'>BY - $by</span>
								<span class='pull-left entry-title' style='color:gray;font-size:0.5em'>Category - $cat</span></h2>
								
							</header>

							<figure class='featured-image'>
								'<img src='$pImage' width='100%' alt='' style='margin-top:-25px'>'
							</figure>

							<div class='entry-content'>
								<p>$pContent</p>
							</div>

							<footer class='entry-footer flex flex-column flex-lg-row justify-content-between align-content-start align-lg-items-center' style='margin-top:-15px'>
								<div class='pull-left'>
									<ul class='post-share flex align-items-center order-3 order-lg-1'>
										<label>Share</label>
										<li><a href='#'><i class='fa fa-pinterest'></i></a></li>
										<li><a href='#'><i class='fa fa-linkedin'></i></a></li>
										<li><a href='#'><i class='fa fa-instagram'></i></a></li>
										<li><a href='#'><i class='fa fa-facebook'></i></a></li>
										<li><a href='#'><i class='fa fa-twitter'></i></a></li>
									</ul>
								</div>
								<div class='posted-date pull-right'>
									Posted on - $pDate
								</div>
							</footer>
					</div>";
				}while($pfetch = mysqli_fetch_assoc($res));?>
				
                <div class="content-area">
                    <div class="comments-form">
                        <div class="comment-respond">
                            <h3 class="comment-reply-title">Leave a post</h3>

                            <form action='' method='post' enctype='multipart/form-data' class="comment-form" style='margin-top:3%'>
								<input type="text" placeholder="Title" name="title">
                                <textarea rows="18" cols="6" placeholder="Messages" name="desc"></textarea>
								<input type="file" name="pic">
								<select name="cat">
									<option>--SELECT--</option>
									<?php 
										do
										{	
											$cat_name = $Sfetch['cat_name'];
											$cat_id = $Sfetch['cat_id'];
											echo "<option value='$cat_id'>$cat_name</option>";
										}while($Sfetch = mysqli_fetch_assoc($select));
									?>				
								</select>
								<input type="text" placeholder="date" name="date" id="autoDate">
                                <input type="submit" value="Post" style='cursor:pointer'>
                            </form><!-- .comment-form -->
                        </div><!-- .comment-respond -->
                    </div><!-- .comments-form -->
                </div><!-- .content-area -->
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

//Gets the current date 
var date = new Date();
var y = date.getFullYear();
var m = date.getMonth();
var d = date.getDay();
var h = date.getHours();
var min = date.getMinutes();
var s = date.getSeconds();
document.getElementById("autoDate").value = y + " - " + m + " - " + d + " / " + h + " : " + min + " : " + s;
		


function JSalert1(){
// success alert
alertify.alert("<span style='color:#228B22'><b>Success!</b> You have posted successfuly.</span>");
}
function JSalert2(){
// An error alert
alertify.alert("<span style='color:#DC143C'><b>Error</b>, Please try again!</span>");
}

</script>

<?php //alerts called.
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