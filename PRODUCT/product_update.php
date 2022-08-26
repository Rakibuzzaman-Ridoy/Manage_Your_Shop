<?php  
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{
	require_once ("C:xampp/htdocs/Projects/PHP/Manage_Your_Shop/crud-oop-class.php");
	$obj = new Database();

	if(isset($_GET['id']))
	{
		$getId = $_GET['id'];
		//echo "<pre>";
		$join = "category ON product.product_category = category.category_id ";
    	$obj->select("product","*",$join,"product_id=$getId",null,null);
    	$result = $obj->getResults();
    	//print_r($result);
    	foreach ($result as list("product_id"=>$product_id,
								 "product_name"=>$product_name,
								 "product_category"=>$product_category,
								 "product_code"=>$product_code,
								 "product_entrydate"=>$product_entrydate,
								 "category_id"=>$category_id,
								 "category_name"=>$category_name,
								 "category_entrydate"=>$category_entrydate)) 
    						{
						    	$product_id;
						    	$product_name;
						    	$product_category;
						    	$product_code;
						    	$product_entrydate;
						    	$category_id;
						     	$category_name;
						    	$category_entrydate;
    						}
	}

	if(isset($_POST['submit']))
	{
		$new_product_id = $_POST['product_id'];
		$new_product_name = $_POST['product_name'];
		$new_product_code = $_POST['product_code'];
		$new_product_category = $_POST['product_category'];
		$new_product_entrydate = $_POST['product_entrydate'];

		$update_product = $obj->update("product",["product_name"=>$new_product_name,"product_category"=>$new_product_category,"product_code"=>$new_product_code,"product_entrydate"=>$new_product_entrydate],"product_id=$new_product_id");

		if($update_product)
		{
			header("Location: product_list.php");
		}
		else
		{
			echo "Failed to update Product Info!";
		}
		
	}
	
				 	
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

    <title>List of Product!</title>
  </head>
  <body>
    <div class="container bg-light">
		<div>
			<div class="container-fluid border-bottom border-success"><!--top bar-->
				<div class="row">
					<div class="col-sm-9">
						<h1 class="offset-6 text-center border-bottom border-bold">Manage Your Shop!</h1>	
						<?php
							date_default_timezone_set("ASIA/DHAKA");
							echo "<b class='offset-1 text-info'>" . date('D-M-Y').' Time: '.date("h:i:sa")."</b>";
						?>
					</div>
					<div class="col-sm-3">
					<br>
					<button class="btn btn-outline-success text-light offset-7  btn-sm">
							<a href='logout.php' class="text-success text-decoration-none">Logout</a>
						</button>
						<?php 
							echo "<p>  Login as <b>".$_SESSION['user_first_name']." ".$_SESSION['user_last_name']."</b></p>";
						?>	
					</div>
			</div>
		</div><!--end top bar-->

		<div class="container-fluid"><!--body-->
			<div class="row">

					<div class="col-sm-3 bg-light p-0 m-0"><!--Start of left bar-->
						<h4 class="bg-success text-dark px-2 py-1">Category</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href='../CATEGORY/category_add.php' class="text-dark text-decoration-none">Add Category<a>
							</li>
							<li class=" list-group-item list-group-item-success p-1 m-1">
								<a href='../CATEGORY/category_list.php' class="text-dark text-decoration-none">List of Category<a>
							</li>
						</ul>


						<h4 class="bg-success text-dark px-2 py-1">Product</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href='../PRODUCT/product_add.php' class="text-dark text-decoration-none">Add Product<a>
							</li>
							<li class=" list-group-item list-group-item-success p-1 m-1">
								<a href='../PRODUCT/product_list.php' class="text-dark text-decoration-none">List of Product<a>
							</li>
						</ul>



						<h4 class="bg-success text-dark px-2 py-1">Store Product</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href='../STORE_PRODUCT/store_product_add.php' class="text-dark text-decoration-none">Add Store Product<a>
							</li>
							<li class=" list-group-item list-group-item-success p-1 m-1">
								<a href='../STORE_PRODUCT/store_product_list.php' class="text-dark text-decoration-none">List of Store Product<a>
							</li>
						</ul>

						<h4 class="bg-success text-dark px-2 py-1">Spend Product</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href='../SPEND_PRODUCT/spend_product_add.php' class="text-dark text-decoration-none">Add Spend Product<a>
							</li>
							<li class=" list-group-item list-group-item-success p-1 m-1">
								<a href='../SPEND_PRODUCT/spend_product_list.php' class="text-dark text-decoration-none">List of Spend Product<a>
							</li>
						</ul>

						<h4 class="bg-success text-dark px-2 py-1">User Portion</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href="../USER/user_add.php" class="text-decoration-none text-dark">Add User</a>
							</li>
							<li class="list-group-item list-group-item-success p-1 m-1 ">
							<a href="../USER/user_list.php" class="text-decoration-none text-dark">User's List</a>
							</li>
						</ul>


						<h4 class="bg-success text-dark px-2 py-1">Report Portion</h4>
						<ul class="list-group">
							<li class="list-group-item list-group-item-success p-1 m-1 ">
								<a href='../report.php' class="text-dark text-decoration-none">Request Report<a>
						</ul>
				</div><!--End of left bar-->

				<div class="col-sm-9 border-left border-success p-4"><!--Start of right body Row-->
					<div class="jumbotron"><!--Start of Product Update Page-->
						<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Update Product!</h1><hr>
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
								<div class="form-group">
									<!-- <label for="exampleInputEmail1">Product Id</label> -->
									<input type="text" name="product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Id" required value="<?php echo $product_id?>" hidden>
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Product Name</label>
									<input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" required value="<?php echo $product_name?>">
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Product Code</label>
									<input type="text" name="product_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code" required value="<?php echo $product_code?>">
								</div>


								<div class="form-group">
									<label for="exampleInputEmail1">Product Entry Date</label>
									<input type="date" name="product_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Entry Date" required value="<?php echo $product_entrydate?>">
								</div>

								<div class="form-group">
									<label for="exampleInputEmail1">Product Category</label>
									<select name="product_category">
										<?php 				 			
											$getId = $_GET['id'];
											$join = "category ON product.product_category = category.category_id ";
											$obj->select("product","*",$join,null,null,null);
											$result = $obj->getResults();

											foreach ($result as list("category_id"=>$category_id,"category_name"=>$category_name))
											{
										?>
												<option value='<?php echo $category_id ?>' <?php if($category_id == $product_category){ echo 'selected';}?>><?php echo $category_name ?></option>
										<?php 
											}
										?>
										?>
									</select>
								</div>
								
								<button type="submit" name="submit" class="btn btn-outline-success">Update</button>
							</form>
							<?php echo "<button class='btn-outline-dark bg-dark offset-4'><a class='text-success' href='product_list.php'>Want to see product list? click here...</a></button>";
							?>
					</div><!--End of Product Update Page-->
				</div><!--end of right body Row-->
			</div>
		</div><!--end body-->
		<div class="container-fluid border-top border-success p-2 text-dark p-0 m-0"><!--bottom bar-->
			<b class="text-center offset-6 ">&copy;  2021-<?php echo date("Y")?></b><br>
			<b class="text-center offset-5 ">&copy; All Right Reserved by Rakibuzzaman Rid</b>
			<div class="offset-6 col-sm-1 text-success">
				<a href="https://github.com/Rakibuzzaman-Ridoy" class="text-decoration-none text-dark">
					<i class="fa-brands fa-github"></i>
					
				</a>
			</div>
		</div><!--end bottom bar-->
	
	</div><!--end of container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
	}
	else{
		header("Location: ../login.php");
	}
?>