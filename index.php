<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php 
	require_once "C:xampp\htdocs\Projects\PHP\Manage_Your_Shop\crud-oop-class.php";
	session_start();
	$obj = new database();

	if(isset($_POST['login']))
	{
		$email_login 	= $_POST['user_email'];
		$password_login = $_POST['user_password'];

		$checking_login = $obj->select("users","*",null,"user_email='$email_login'and user_password='$password_login'",null,null);
		$result = $obj->getResults();

		if($checking_login)
		{
			foreach ($result as list('user_first_name'=>$first_name,'user_last_name'=>$last_name)) {
				 $first_name;
				 $last_name;
			}
			$_SESSION['user_first_name'] = $first_name;
			$_SESSION['user_last_name']  = $last_name;

			header("Location: dashboard.php");
		}
		else
		{
			$failed = "alert('Failed to login!')";
				 echo '<script type ="text/JavaScript">';  
				 echo $failed;  
				 echo '</script>'; 
		}
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login!</title>
  </head>
  <body>
    <h1 class="bg-dark text-light text-center ">Manage Your Shop!</h1><hr>
    <div class="jumbotron">
 	 <h1 class="bg-secondary text-center text-light offset-3 col-sm-5">Login Form!</h1>
 	 <hr/>
 	 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="offset-3 col-sm-5">
		  <div class="form-group">
		    <label for="exampleInputPassword1">Email</label>
		    <input type="text" name="user_email" class="form-control" id="exampleInputPassword1" placeholder="Enter you email" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
  			title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" required>
		  </div>
		  
		  <button type="submit" name="login"class="btn btn-primary">Login</button>
	</form>

			<!-- <?php echo "<button class='btn-outline-dark bg-dark offset-5'><a class='text-success' href='USER/user_add.php'>Want to add new user? click here...</button>";
			?> -->
  
	 </div>
	 <b class="text-center offset-5 text-dark">&copy;<?php echo date("Y")?></b><br>
	<b class="text-center offset-4 text-dark">&copy; All Right Reserved by Rakibuzzaman Rid</b>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>