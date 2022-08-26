<?php 
	session_start();
	$first_name=$_SESSION['user_first_name'];
 	$last_name=$_SESSION['user_last_name'];

 	if(!empty($first_name) && !empty($last_name))
 	{
	require_once ("C:xampp/htdocs/Projects/PHP/Manage_Your_Shop/crud-oop-class.php");
	$obj = new Database();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Report View!</title>
  </head>
  <body id="outprint">
    <div class="container bg-light">
        <div class="container-fluid border-bottom border-success"><!--top bar-->
                <div class="row">
                    <div class="col-sm-9">
                        <h1 class="offset-4 bg-success  text-light text-center border-bottom border-bold">
                            <a href='dashboard.php' class="text-light text-decoration-none">Manage Your Shop!</a>
                        </h1>	
                                                
                        <a href="dashboard.php">
                            <i class="fa-solid fa-house text-success offset-1 fa-2x"></i>
                        </a>
                        <a href="report.php">
                            <i class="fa-solid fa-arrow-left text-success fa-2x"></i>
                        </a>
                        <i class="fa-solid text-dark fa-skull-crossbones fa-2x"></i>
                        
                        <?php
                            date_default_timezone_set("ASIA/DHAKA");
                            echo "<b class='offset-4 text-dark'>" . date('D-M-Y').' Time: '.date("h:i:sa")."</b>";
                        ?>
                    </div>
                    <div class="col-sm-3">
                    <br>
                    <button class="btn btn-outline-success text-light offset-7  btn-sm">
                            <a href='logout.php' class="text-success text-decoration-none">Logout</a>
                        </button>
                        <?php 
                            echo "<p>  Login as <b>".$_SESSION['user_first_name']." ".$_SESSION['user_last_name']."</b></p>";
                        ?>	
                </div>
            </div>
        </div>

    
        <div class="jumbotron">
        <!-- Store Product Report! -->
    	<h1 class="bg-dark text-danger text-center offset-3 col-sm-6">Store Product Report!</h1>
        
    	<?php 
    		 if(isset($_POST['product_name']))
             {
                 $productName = $_POST['product_name'];
    
                 //Showing Product Name
                 $productNameTop = $obj->select("product","*",null,"product_id=$productName",null,null);
                 $result = $obj->getResults();
                 foreach($result as list("product_id"=>$id,"product_name"=>$name))
                 {
                    echo "<h4 class=' bg-success text-dark text-center col-sm-4 offset-4'>Product Name: $name</h4>";
                 }

                 //Show Store Product Details
                 $productName = $_POST['product_name'];
                 $obj->select("store_product","*",null,"store_product_name=$productName",null,null);
                 $result2 = $obj->getResults();
                 echo "<table border='5' cellpadding='10px' width='70%'class='col-sm-6 offset-3'>
                 <thead>
                    <tr>
                        <th class='text-center text-dark bg-warning'>Store Amount</th>
                        <th class='text-center text-dark bg-info'>Store Date</th>
                    </tr>
                 </thead>";


                 foreach($result2 as list("store_product_id"=>$id,"store_product_id"=>$name,"store_product_quantity"=>
                 $quantity,"store_product_entrydate"=>$entrydate))
                 {
                    echo "<tbody>
                            <tr>
                            <td class='text-dark text-center '>$quantity</td>
							<td class='text-dark text-center '>$entrydate</td>
                            </tr>
					      </tbody>";
                 }
                echo "</table>";
                echo "";
           
             }
			?>
            <br><br>
            <!-- Spend Product Report -->
    	<h1 class="bg-dark text-center text-danger offset-3 col-sm-6">Spend Product Report!</h1>
        
    	<?php 
    		 if(isset($_POST['product_name']))
             {
                 $productName = $_POST['product_name'];
    
                 //Showing Product Name
                 $productNameTop = $obj->select("product","*",null,"product_id=$productName",null,null);
                 $result = $obj->getResults();
                 foreach($result as list("product_id"=>$id,"product_name"=>$name))
                 {
                    echo "<h4 class=' bg-success text-dark text-center col-sm-4 offset-4'>Product Name: $name</h4>";
                 }

                 //Show Spend Product Details
                 $productName = $_POST['product_name'];
                 $obj->select("spend_product","*",null,"spend_product_name=$productName",null,null);
                 $result = $obj->getResults();
                 echo "<table border='5' cellpadding='10px' width='70%'class='col-sm-6 offset-3'>
                 <thead>
                    <tr>
                        <th class='text-center text-dark bg-warning'>Spend Amount</th>
                        <th class='text-center text-dark bg-info'>Store Date</th>
                    </tr>
                 </thead>";


                 foreach($result as list("spend_product_quantity"=>$quantity,"spend_product_entrydate"=>$entrydate))
                 {
                    echo "<tbody>
                            <tr>
                            <td class='text-dark text-center '>$quantity</td>
							<td class='text-dark text-center '>$entrydate</td>
                            </tr>
					      </tbody>";
                 }
                echo "</table>";
             }
			?>
            <br><br>
            <button class="printMe text-center offset-5 btn-outline-info bg-dark">Want to print report? Click here...</button>
	    </div>
    </div>
   
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
    <script>
        $('.printMe').click(function(){
            $("#outprint").print();
        });
    </script>

  </body>
</html>
<b class="text-center offset-6 text-dark">&copy;<?php echo date("Y")?></b><br>
	<b class="text-center offset-5 text-dark">&copy; All Right Reserved by Rakibuzzaman Rid</b>
    <?php
	}
	else{
		header("Location: login.php");
	}
?>