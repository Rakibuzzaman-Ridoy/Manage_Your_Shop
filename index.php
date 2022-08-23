<?php 
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{

?>
<h3>This is dashboard!</h3>
<button><a href="logout.php">Logout</a></button>

<?php 
	}else
	{
		header("Location: login.php");
	}
?>