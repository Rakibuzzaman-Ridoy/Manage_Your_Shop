<?php 
	require_once ("crud-oop-class.php");
	$obj = new Database();
	
    if(isset($_GET['id']))
    {
    	$getId = $_GET['id'];

    	$obj->select("category","*",null,"category_id=$getId",null,null);
    	$result = $obj->getResults();
    	
    	foreach ($result as list("category_entrydate"=>$date,"category_id"=>$id,"category_name"=>$name)) {
    		 $id ;
    		 $name ;
    		 $date;
    		 
    	}
    }

    if(isset($_POST['category_name']) && isset($_POST['category_entrydate']) && isset($_POST['category_id']))
    {
    	$new_category_name = $_POST['category_name'];
    	$new_category_entrydate = $_POST['category_entrydate'];
    	$new_category_id = $_POST['category_id'];

    	$update = $obj->update("category",["category_name"=>$new_category_name,"category_entrydate"=>$new_category_entrydate],"category_id=$new_category_id");

    	if($update)
    	{
    		header("Location: category_list.php");
    	}
    	else
    	{
    		echo "Failed to Update Data!";
    	}

    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Update Category</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-success text-center text-light offset-4 col-sm-4">Update Category List!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-3 col-sm-6">
				 <div class="form-group">
				    <label for="exampleInputEmail1">Category Name</label>
				    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" required value="<?php echo $name?>">
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Category Entry Date</label>
				    <input type="date" name="category_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Entry Date" required value="<?php echo $date?>">
				</div>

				 <div class="form-group">
				    <input type="text" name="category_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Id" required value="<?php echo $id?>" hidden>
				</div>

				  <button type="submit" name="submit" class="btn btn-outline-danger">Update</button>
			</form>
  		
	</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>