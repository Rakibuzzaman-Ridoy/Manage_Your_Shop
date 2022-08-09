<?php 
	require_once ("crud-oop-class-store-product.php");
	$obj = new Database();

	if(isset($_POST['submit']))
	{
		$store_product_name 		= $_POST['store_product_name']; 
		$store_product_quantity 	= $_POST['store_product_quantity'];
		$store_product_entrydate 	= $_POST['store_product_entrydate'];

		$insert_store_product = $obj->insert("store_product",["store_product_name"=>$store_product_name,"store_product_quantity"=>$store_product_quantity,"store_product_entrydate"=>$store_product_entrydate ]);

		if($insert_store_product)
		{
			header("Location: store_product_list.php");
		}
		else
		{
			echo "<h2>Failed to insert store product!</h2>";
		}
	}

		
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Store Product</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Add New Store Product!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
    			 
				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Quantity</label>
				    <input type="text" name="store_product_quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Quantity" required>
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Entry Date</label>
				    <input type="date" name="store_product_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Entry Date" required>
				</div>

				<div class="form-group">
				 	<label for="exampleInputEmail1">Product Name</label>
				 	<select name="store_product_name" required>
				 		<?php 				 			
				 			$join = " right join product on store_product.store_product_name = product.product_id;";
							$obj->select("store_product","product.product_id,product.product_name",$join,null,null,null);
							$result = $obj->getResults();

							foreach ($result as list("product_id"=>$product_id,"product_name"=>$product_name))
							 {
							 	echo "<option value='$product_id'>$product_name</option >";
							 } 
				 		?>
				 	</select>
				 </div>

				  <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
			</form>
  		
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>