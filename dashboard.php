<?php 
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Manage Your Shop!</title>
  </head>
  <body>
    <div class="container bg-light">
		<div>
			<?php
				include "BAR/topbar.php"; //This is topbar!
			?>
		</div><!--end top bar-->

		<div class="container-fluid"><!--body-->
			<div class="row">
				<?php
					include "BAR/leftbar.php"; //This is left bar!
				?>
				<div class="col-sm-9 border-left border-success p-4"><!--Start of right body Row-->
					<div class="row border-bottom p-3"><!--Start of body Row first portion-->
						<div class="col-sm-3 text-success">
							<a href="CATEGORY/category_add.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-folder-plus fa-6x text-success"></i>
								<p><b>Add Categogy </b></p>
							</a>
						</div>
						<div class="col-sm-3 text-success">
							<a href="CATEGORY/category_list.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-folder-open fa-6x text-success"></i>
								<p><b>List of Category</b></p>
							</a>
						</div>

						<div class="col-sm-3 text-success">
							<a href="PRODUCT/product_add.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-box-open fa-6x text-success"></i>
								<p><b>Add Product</b></p>
							</a>
						</div>

						<div class="col-sm-3 text-success">
							<a href="PRODUCT/product_list.php" class="text-decoration-none text-dark">
							<i class="fa-solid fa-clipboard-list fa-6x text-success"></i>
								<p><b>List of Product</b></p>
							</a>
						</div>
					</div><!--End of body Row first portion-->


					<div class="row border-bottom p-4"><!--Start of body Row 2nd portion-->
						<div class="col-sm-3 text-success">
							<a href="STORE_PRODUCT/store_product_add.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-cart-plus fa-6x text-success"></i>
								<p><b>Add Store Product </b></p>
							</a>
						</div>
						<div class="col-sm-3 text-success">
							<a href="STORE_PRODUCT/store_product_list.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-list fa-6x text-success"></i>
								<p><b>List of Store Product</b></p>
							</a>
						</div>

						<div class="col-sm-3 text-success">
							<a href="SPEND_PRODUCT/spend_product_add.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-cart-plus fa-6x text-success"></i>
								<p><b>Add Spend Product</b></p>
							</a>
						</div>

						<div class="col-sm-3 text-success">
							<a href="SPEND_PRODUCT/spend_product_list.php" class="text-decoration-none text-dark">
							<i class="fa-solid fa-rectangle-list fa-6x text-success"></i>
								<p><b>List of Spend Product</b></p>
							</a>
						</div>
					</div><!--End of body Row 2nd portion-->
					
					
					<div class="row p-4"><!--Start of body Row 3rd portion-->
						<div class="col-sm-3 text-success">
							<a href="USER/user_add.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-person fa-6x text-success"></i>
								<p><b>Add User </b></p>
							</a>
						</div>
						<div class="col-sm-3 text-success">
							<a href="USER/user_lsit.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-users fa-6x text-success"></i>
								<p><b>List of User</b></p>
							</a>
						</div>

						<div class="col-sm-3 text-success">
							<a href="report.php" class="text-decoration-none text-dark">
								<i class="fa-solid fa-print fa-6x text-success"></i>
								<p><b>Check Report</b></p>
							</a>
						</div>
					</div><!--End of body Row 3rd portion-->

				</div><!--end of right body Row-->
			</div>
		</div><!--end body-->
		<div class="continer-fluid">
			<?php
				include "BAR/bottombar.php"; //This is Bottom Bar!
			?>
		</div>

	</div><!--end of container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>