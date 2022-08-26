<div class="container-fluid border-bottom border-success"><!--top bar-->
			<div class="row">
				<div class="col-sm-9">
					<h1 class="offset-6 text-center border-bottom border-bold">Manage Your Shop!</h1>	
					<?php
						date_default_timezone_set("ASIA/DHAKA");
						echo "<b class='offset-1 text-info'>" . date('D-M-Y').' Time: '.date("h:i:sa")."</b>";
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