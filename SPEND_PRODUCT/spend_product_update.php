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
			$join = " product on spend_product.spend_product_name = product.product_id";
	
			$obj->select("spend_product","*",$join,"spend_product_id=$getId",null,null);
			$result = $obj->getResults();
			foreach ($result as list("spend_product_id"=>$spend_product_id,
									 "spend_product_name"=>$spend_product_name,
									 "spend_product_entrydate"=>$spend_product_entrydate,
									 "spend_product_quantity"=>$spend_product_quantity,
									 "product_id"=>$product_id))
			{
								
				$spndID   = $spend_product_id;
				$spndQ    = $spend_product_quantity;
				$spnddate = $spend_product_entrydate;
				$sndpID   = $product_id;
			}
		}
		if(isset($_POST['submit']))
		{
			$new_spend_product_id = $_POST['spend_product_id'];
		 	$new_spend_product_name = $_POST['spend_product_name'];
		 	$new_spend_product_quantity = $_POST['spend_product_quantity'];
		 	$new_spend_product_entrydate = $_POST['spend_product_entrydate'];

		 	$spend_product_update = $obj->update("spend_product",["spend_product_name"=>$new_spend_product_name,"spend_product_quantity"=>$new_spend_product_quantity,"spend_product_entrydate"=>$new_spend_product_entrydate],"spend_product_id=$new_spend_product_id");

		 	if($spend_product_update)
		 	{
		 		header("Location: spend_product_list.php");
			}
		 	else
		 	{
		 		echo "Failed to Update spend product!";
		 	}

		}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Spend Product Update</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Update Spend Product!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
    			 <div class="form-group">
				    <!-- <label for="exampleInputEmail1">Product Id</label> -->
				    <input type="text" name="spend_product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Id" required value="<?php echo $spndID;?>" hidden>
				 </div>

				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Quntity</label>
				    <input type="text" name="spend_product_quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Code" required value="<?php echo $spndQ;?>">
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Product Entry Date</label>
				    <input type="date" name="spend_product_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Entry Date" required value="<?php echo $spnddate;?>">
				</div>

				 <div class="form-group">
				 	<label for="exampleInputEmail1">Product Name</label>
					<select name="spend_product_name">
						 <?php
				 			$getId = $_GET['id'];
							$join = " product on spend_product.spend_product_name = product.product_id";
						    $obj->select("spend_product","*",$join,null,null,null);
							$result = $obj->getResults();

							foreach ($result as list("product_id"=>$product_id,"product_name"=>$product_name))
							{
						?>
							<option value='<?php echo $spend_product_name ?>' <?php if($spend_product_name == $product_id){ echo 'selected';}?>><?php echo $product_name ?></option>
						<?php 
							}
						?> 
					</select>
				 </div>
				
				  <button type="submit" name="submit" class="btn btn-outline-success">Update</button>
			</form>
			<?php echo "<button class='btn-outline-dark bg-dark offset-5'><a class='text-success' href='spend_product_list.php'>Want to see spend product list? click here...</button>";
			?>
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <b class="text-center offset-6 text-dark">&copy;<?php echo date("Y")?></b><br>
	<b class="text-center offset-5 text-dark">&copy; All Right Reserved by Rakibuzzaman Rid</b>
  </body>
</html>
<?php
	}
	else{
		header("Location: ../login.php");
	}
?>