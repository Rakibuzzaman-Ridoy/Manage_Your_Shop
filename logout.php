<?php 
	session_start();
	session_destroy();
	header("Location: ./login.php");
	// echo $_SESSION['user_first_name'];
	// echo $_SESSION['user_last_name'];
?>