
<?php


echo	"<header class='site-header'>
			<div class='container'>
				<div class='row'>
					<div class='col-12'>
						<div class='site-branding flex flex-column align-items-center'>
							<h1 class='site-title'><a href='index.php' rel='home'>TiyanSoft</a></h1>
							<p class='site-description'>Personal Blog</p>
						</div>

						<nav class='site-navigation'>

							<ul class='flex-lg flex-lg-row justify-content-lg-center align-content-lg-center'>
								<li class='current-menu-item'><a href='userIndex.php'>";
								if($active=='userIndex')
								{
									echo "<span style='color:#3B5998'>Home</span>";
								}
								else
								{
									echo "home";
								}
								echo "</a></li>
								
								<li><a href='about.php'>";
								
								if($active=='about')
								{
									echo "<span style='color:#3B5998'>About us</span>";
								}
								else
								{
									echo "About us";
								}
								echo "</a></li>
								
								<li><a href='contact.php'>";
								if($active=='contact')
								{
									echo "<span style='color:#0067a7'>contact</span>";
								}
								else
								{
									echo "contact";
								}
								echo "</a></li>
								<li><a href='logout.php?user=$user'>log out</a></li>							
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</header>";

echo	"<div class='container-fluid'>
			<div class='row'>
				<div class='col-12'>
					<div class='page-header flex justify-content-center align-items-center' style=\"background-image: url('$headPic')\">
						<h1>The Story</h1>
					</div>
				</div>
			</div>

        <div class='container'>
            <div class='row'>
                <div class='offset-lg-9 col-lg-3'>
                    <a href='#'>
                        <div class='yt-subscribe'>
                            <img src='images/yt-subscribe.png' alt='Youtube Subscribe'>
                            <h3>Subscribe</h3>
                            <p>To my Youtube Channel</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>";

	
?>