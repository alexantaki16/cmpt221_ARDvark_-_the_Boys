<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
      header("Location: login.php");

}
  require("includes/connect_db.php");
  require("includes/tools.php");
        ?>

<!DOCTYPE html>
	<!--Sets HTML Language-->
	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href="login.css">
		<!--Title-->
		<title>Limbo</title>
	</head>
		<!--body-->
		<body>
			<!--background DIV-->
			<div class="container">
			<!--image title-->
			<IMG class="title" src="Pictures/LimboLogo.png" alt="Limbo Logo">
			<!--invisible DIV-->
			<div class="container2">
				<!--Navgation Bar-->
				<ul>
  					<li><a href="limbo_landing.php">Home</a></li>
  					<li><a href="found.php">Found Something?</a></li>
  					<li><a href="lost.php">Lost Something?</a></li>
  					<li><a class="active" href="admin_quick.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<br/>
				<br/>
				<br/>
				<!--Red background Div-->
				<div class="table_div">
					<!--text-->
					<h1>Welcome!</h1>
					<br/>
					<br/>
					<!--Quik Link Bar-->
					<div class="button">
						<a href="managing_users.php">Manage Users</a>
  						<a href="admin_lost.php">Manage Lost Items</a>
 					    <a href="admin_found.php">Manage Found Items</a>
  						<a href="#">Settings</a>
  						<a href="logout.php">Log Off</a>
					</div>
				</div>
			</div>

			</div>
			</div>
		</body>
	</html>
