<?php  
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{
	require_once ("C:xampp/htdocs/Projects/PHP/Manage_Your_Shop/crud-oop-class.php");
	$obj = new Database();

	if(isset($_POST['submit']))
	{
		$product_name = $_POST['product_name'];
		$product_category = $_POST['product_category'];
		$product_code = $_POST['product_code'];
		$product_entrydate = $_POST['product_entrydate'];

		$insert_product = $obj->insert("product",["product_name"=>$product_name,"product_category"=>$product_category,"product_code"=>$product_code,"product_entrydate"=>$product_entrydate]);

		if($insert_product)
		{
			header("Location: product_list.php");
		}
		else
		{
			echo "Product Info has not been inserted to the Database!";
		}

	}
				 	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Add New Product!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Name</label>
				    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" required>
				 </div>

				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Code</label>
				    <input type="text" name="product_code" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code" required>
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Entry Date</label>
				    <input type="date" name="product_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Entry Date" required>
				</div>

				<div class="form-group">
				 	<label for="exampleInputEmail1">Product Category</label>
				 	<select name="product_category">
				 		<?php 				 			
							$obj->select("category","*",null,null,null,null);
							$result = $obj->getResults();

							foreach ($result as list("category_id"=>$category_id,"category_name"=>$category_name))
							 {
							 	echo "<option value='$category_id'>$category_name</option >";
							 } 
				 		?>
				 	</select>
				 </div>

				  <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
			</form>
			<?php echo "<button class='btn-outline-dark bg-dark offset-5'><a class='text-success' href='product_list.php'>Want to see product list? click here...</button>";
			?>
  		
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<b class="text-center offset-6 text-dark">&copy;<?php echo date("Y")?></b><br>
	<b class="text-center offset-5 text-dark">&copy; All Right Reserved by Rakibuzzaman Rid</b>
<?php
	}
	else{
		header("Location: ../login.php");
	}
?>