<?php

//Gets categories to show in select menu.
$selectCat = mysqli_query($connect, "SELECT cat_id,cat_name FROM category ORDER BY cat_id DESC LIMIT 5");
$fetchCat = mysqli_fetch_assoc($selectCat);

	
echo    "<div class='col-12 categories'>
				<center>
				
					<br/><h6>Categories</h6><br/>";
					
							do
							{
								$cat = $fetchCat['cat_name'];
								echo "<p><a href='#'>$cat</a></p>";
						
							}while($fetchCat = mysqli_fetch_assoc($selectCat));
							
					
echo 			"</center>
		</div>	
		<div class='footer-bar'>
			<div class='outer-container'>
				<div class='container-fluid'>
					<div class='row justify-content-between'>
						<div class='col-12 col-md-6'>
							<div class='footer-copyright'>
								<p>All rights reserved &copy; TiyanSoft.com <script>document.write(new Date().getFullYear());</script> </p>
							</div>
						</div>

						<div class='col-12 col-md-6'>
							<div class='footer-social'>
								<ul class='flex justify-content-center justify-content-md-end align-items-center'>
									<li><a href='#'><i class='fa fa-pinterest'></i></a></li>
									<li><a href='#'><i class='fa fa-facebook'></i></a></li>
									<li><a href='#'><i class='fa fa-twitter'></i></a></li>
									<li><a href='#'><i class='fa fa-dribbble'></i></a></li>
									<li><a href='#'><i class='fa fa-behance'></i></a></li>
									<li><a href='#'><i class='fa fa-linkedin'></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>";

?>