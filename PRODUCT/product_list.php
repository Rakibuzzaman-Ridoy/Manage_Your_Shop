<?php 
	require_once ("crud-oop-class-product.php");
	$obj = new Database();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Product List</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Product List!</h1><hr>
    	<?php 
    		$limit = "5";
    		$join = "category ON product.product_category = category.category_id ";
    		$obj->select("product","*",$join,null,null,$limit);
    		$result = $obj->getResults();
    		echo "<table border='5' cellpadding='10px' width = '70%' class='offset-2 col-sm-8'>
					<thead>
						<tr>
							<th class='bg-dark text-light text-center'>Product ID</th>
							<th class='bg-success text-dark text-center'>Product Name</th>
							<th class='bg-danger text-dark text-center'>Product Category</th>
							<th class='bg-warning text-dark text-center'>Product Code</th>
							<th class='bg-primary text-light text-center'>Product Entry Date</th>
							<th class='text-center bg-warning text-dark'>Choose an Action<th/>
						</tr>
					</thead>
					";
				foreach ($result as list("product_id"=>$product_id,
																	"product_name"=>$product_name,
																	"product_category"=>$product_category,
																	"product_code"=>$product_code,
																	"product_entrydate"=>$product_entrydate,
																	"category_id"=>$category_id,
																	"category_name"=>$category_name,
																	"category_entrydate"=>$category_entrydate)) {
				echo "<tbody>
						<tr>
							<td class='text-dark text-center '>$product_id</td>
							<td class='text-dark text-center '>$product_name</td>
							<td class='text-dark text-center '>$category_name</td>
							<td class='text-dark text-center '>$product_code</td>
							<td class='text-dark text-center '>$product_entrydate</td> 
							<td class='text-dark text-center '>
								<a href='product_update.php?id=$product_id'class='btn-outline-primary'>Edit</a>
								<a href='#'class='btn-outline-danger'>Delete</a>
							</td>
						</tr>
					</tbody>";
			}
			echo "</table>";

    		echo $obj->pagination("product",$join,null,$limit);

    		echo "<a href='product_add.php' class='btn-outline-success'>Want to add new product? CLick here...</a>";
    	?>
    	<b class="text-center offset-2">&copy; All Right Reserved by Rakibuzzaman Rid</b>
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>