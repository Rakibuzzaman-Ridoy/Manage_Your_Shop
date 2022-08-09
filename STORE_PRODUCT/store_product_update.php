<?php 
	require_once ("crud-oop-class-store-product.php");
	$obj = new Database();
		if(isset($_GET['id']))
		{		 			
			$getId = $_GET['id'];
			$join = " inner join product on store_product.store_product_name = product.product_id";
	
			$obj->select("store_product","*",$join,"store_product_id=$getId",null,null);
			$result = $obj->getResults();
			foreach ($result as list("store_product_id"=>$store_product_id,
									 "store_product_name"=>$store_product_name,
									 "store_product_entrydate"=>$store_product_entrydate,
									 "store_product_quantity"=>$store_product_quantity,
									 "product_id"=>$product_id))
			{
								
				/*echo "<br>".*/$spID = $store_product_id;
				/*echo "<br>".*/$spQ = $store_product_quantity;
				/*echo "<br>".*/$spendate = $store_product_entrydate;
				//$spID = $store_product_id;
				/*echo "<br>".*/$pID = $product_id;
			}
		}

		if(isset($_POST['submit']))
		{
			$new_store_product_id = $_POST['store_product_id'];
		 	$new_store_product_name = $_POST['store_product_name'];
		 	$new_store_product_quantity = $_POST['store_product_quantity'];
		 	$new_store_product_entrydate = $_POST['store_product_entrydate'];

		 	$store_product_update = $obj->update("store_product",["store_product_name"=>$new_store_product_name,"store_product_quantity"=>$new_store_product_quantity,"store_product_entrydate"=>$new_store_product_entrydate],"store_product_id=$new_store_product_id");

		 	if($store_product_update)
		 	{
		 		header("Location: store_product_list.php");
			}
		 	else
		 	{
		 		echo "Failed to Update store product!";
		 	}

		}
					
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Store Product Update</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Update Store Product!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
    			 <div class="form-group">
				    <!-- <label for="exampleInputEmail1">Product Id</label> -->
				    <input type="text" name="store_product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Id" required value="<?php echo $spID;?>" hidden>
				 </div>

				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Quntity</label>
				    <input type="text" name="store_product_quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code" required value="<?php echo $spQ;?>">
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Entry Date</label>
				    <input type="date" name="store_product_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Entry Date" required value="<?php echo $spendate;?>">
				</div>

				 <div class="form-group">
				 	<label for="exampleInputEmail1">Product Name</label>
					<select name="store_product_name">
						 <?php
				 			$getId = $_GET['id'];
							$join = " inner join product on store_product.store_product_name = product.product_id";
						    $obj->select("store_product","*",$join,null,null,null);
							$result = $obj->getResults();

							foreach ($result as list(/*"store_product_name"=>$store_product_name,*/"product_id"=>$product_id,"product_name"=>$product_name))
							{
						?>
							<option value='<?php echo $store_product_name ?>' <?php if($store_product_name == $product_id){ echo 'selected';}?>><?php echo $product_name ?></option>
						<?php 
							}
						?> 
					</select>
				 </div>
				
				  <button type="submit" name="submit" class="btn btn-outline-success">Update</button>
			</form>
			<a href="store_product_list.php" class="btn-outline-success">Want to view all the store product? Click here...</a><br>
  		<b class="text-center offset-5 ">&copy; All Right Reserved by Rakibuzzaman Rid</b>
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
