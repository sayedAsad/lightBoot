<?php

$user = $_SESSION['userID'];

echo "<div class='sidebar' data-color='purple' data-image='assets/img/sidebar-5.jpg'>

    	<div class='sidebar-wrapper'>
            <div class='logo'>
                <a href='' class='simple-text'>
                    Tiyan
                </a>
            </div>

            <ul class='nav'>
                <li class='";
					if($active=="dashboard")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    
					<a href='dashboard.php?user=$user'>
                        <i class='pe-7s-graph'></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
				<li class='";
					if($active=="userview" || $active=="user")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    <a href='userview.php?user=$user'>
                        <i class='pe-7s-user'></i>
                        <p>User Profile</p>
                    </a>
                </li>
                
				<li class='";
					if($active=="pages" || $active=="addpage")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    <a href='pages.php?user=$user'>
                        <i class='pe-7s-note2'></i>
                        <p>Pages</p>
                    </a>
                </li>
                
				<li class='";
					if($active=="postview" || $active=="posts")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    <a href='postview.php?user=$user'>
                        <i class='pe-7s-news-paper'></i>
                        <p>Posts</p>
                    </a>
                </li>
				<li class='";
					if($active=="message")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    <a href='message.php?user=$user'>
                        <i class='pe-7s-bell'></i>
                        <p>Messages</p>
                    </a>
                </li>
                              
			   <li class='";
					if($active=="categoryList" || $active=="category")
					{
						echo 'active';
					}
					else
					{
						echo '';
					}
					echo "'>
                    <a href='categoryList.php?user=$user'>
                        <i class='pe-7s-science'></i>
                        <p>Category</p>
                    </a>
                </li>

            </ul>
    	</div>
    </div>";
?>