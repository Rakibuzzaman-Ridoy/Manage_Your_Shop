<?php 
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{
	require_once ("C:xampp/htdocs/Projects/PHP/Manage_Your_Shop/crud-oop-class.php");
	$obj = new database();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>User List</title>
  </head>
  <body>
    <h1 class="bg-dark text-center text-light">Manage Your Shop!</h1>
    <hr/>
    <div class="jumbotron">
  		<h1 class="display-5 text-center text-light bg-secondary col-sm-6 offset-3">User List!</h1>
  		<hr/>
		<?php 
			$limit=4;
			$obj->select("users","*",null,null,null,$limit);
			$result = $obj->getResults();

			echo "<table border='5' cellpadding='10px' width='70%' class='offset-2 col-sm-8'>";
			  echo "<thead>
			  			<tr>
			  				<th class='bg-dark text-light text-center'>ID</th>
			  				<th class='bg-success text-dark text-center'>First Name</th>
			  				<th class='bg-primary text-light text-center'>Last Name</th>
			  				<th class='bg-warning text-dark text-center'>Email</th>
			  				<th class='text-center bg-danger text-dark'>Choose an Action<th/>
			  			</tr>
			  	    </thead>
			  ";
			  foreach ($result as list('user_id'=>$id,'user_first_name'=>$first_name,'user_last_name'=>$last_name,			'user_email'=>$email)) {
			  echo "<tbody>
						<tr>
							<td class='text-dark text-center '>$id</td>
							<td class='text-dark text-center '>$first_name</td>
							<td class='text-dark text-center '>$last_name</td>
							<td class='text-dark text-center '>$email</td>
							<td class='text-dark text-center '>
								<a href='user_update.php?id=$id'class='btn-outline-primary'>Update</a>
								<a href='user_delete.php?id=$id'class='btn-outline-danger'>Delete</a>
							</td>
						</tr>
					</tbody>";
			  }
			echo "</table>";
			echo $obj->pagination("users",null,null,$limit);

			echo "<button class='btn-outline-dark bg-dark text-light offset-5'><a class='text-success' href='user_add.php'>Want to add new user? click here...</button>";

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