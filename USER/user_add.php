<?php 
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{
	require_once ("C:xampp/htdocs/Projects/PHP/Manage_Your_Shop/crud-oop-class.php");
	$obj = new database();

	if(isset($_POST['submit']))
	{
		$user_firstName = $_POST['user_first_name'];
		$user_lastName  = $_POST['user_last_name'];
		$user_email     = $_POST['user_email'];
		$user_password  = $_POST['user_password'];

		$insert = $obj->insert("users",["user_first_name"=>$user_firstName,"user_last_name"=>$user_lastName,"user_email"=>$user_email ,"user_password"=>$user_password]);

		if($insert)
		{
			header("Location: user_list.php");
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

    <title>Add User</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
 	 <h1 class="bg-secondary text-center text-light offset-3 col-sm-6">Add New User!</h1>
 	 <hr/>
 	 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-2 col-sm-8">
		  <div class="form-group">
		    <label for="exampleInputEmail1">User's First Name</label>
		    <input type="text" name="user_first_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter first name" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">User's Last Name</label>
		    <input type="text" name="user_last_name" class="form-control" id="exampleInputPassword1" placeholder="Enter last name" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="text" name="user_email" class="form-control" id="exampleInputPassword1" placeholder="Enter you email" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
  			title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		  </div>
		  
		  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
	</form>

			<?php echo "<button class='btn-outline-dark bg-dark offset-5'><a class='text-success' href='user_list.php'>Want to see user list? click here...</button>";
			?>
  
	 </div>
	 <b class="text-center offset-6 text-dark">&copy;<?php echo date("Y")?></b><br>
	<b class="text-center offset-5 text-dark">&copy; All Right Reserved by Rakibuzzaman Rid</b>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
	}
?>