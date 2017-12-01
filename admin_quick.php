<?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
header("Location: login.php");
}

        ?>

<!DOCTYPE html>
	<!--Sets HTML Language-->
	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href="admin_quick.css">
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
  					<li><a href="home.html">Home</a></li>
  					<li><a href="found.html">Found Something?</a></li>
  					<li><a href="lost.html">Lost Something?</a></li>
  					<li><a class="active" href="admin.html">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<br/>
				<br/>
				<br/>
				<!--Red background Div-->
				<div class="table_div">
					<!--text-->
					<h1>Welcome, Admin!</h1>
					<br/>
					<br/>
					<!--Quik Link Bar-->
					<div class="button">
						<a href="#">Manage Users</a>
  						<a href="admin_lost.html">Manage Lost Items</a>
 					    <a href="admin_found.html">Manage Found Items</a>
  						<a href="#">Settings</a>
  						<a href="logout.php">Log Off</a>
					</div>
				</div>		
			</div>
			</div>
			</div>
		</body>
	</html>