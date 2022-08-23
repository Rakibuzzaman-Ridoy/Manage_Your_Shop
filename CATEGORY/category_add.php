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
		$category_name = $_POST['category_name'];
		$category_entrydate = $_POST['category_entrydate'];

		$insert = $obj->insert("category",["category_name"=>$category_name,"category_entrydate"=>$category_entrydate]);
		if($insert)
		{
			header("Location: category_list.php");
		}
		else
		{
			echo "Failed to insert Data!";
		}
	}


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Add Category</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
    	<h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Add New Category!</h1><hr>
    	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
				 <div class="form-group">
				    <label for="exampleInputEmail1">Category Name</label>
				    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name" required>
				 </div>


				 <div class="form-group">
				    <label for="exampleInputEmail1">Category Entry Date</label>
				    <input type="date" name="category_entrydate" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Entry Date" required>
				</div>

				  <button type="submit" name="submit" class="btn btn-outline-danger">Submit</button>
			</form>
			<?php echo "<button class='btn-outline-dark bg-dark offset-5'><a class='text-success' href='category_list.php'>Want to see category list? click here...</button>";
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
?>
