<!DOCTYPE html>
  <?php
    require("includes/connect_db.php");
    require("includes/tools.php");
  ?>
	<!--Sets HTML Language-->
	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href="limbo_landing.css">
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
  					<li><a class="active" href="limbo_landing.php">Home</a></li>
  					<li><a href="found.php">Found Something?</a></li>
  					<li><a href="lost.php">Lost Something?</a></li>
  					<li><a href="login.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<h1>Welcome to Limbo!</h1>
				<h2>Limbo is the largest and most comprehensive <br/>lost and found database for all of Marist College. <br/> If you lost it, we have it!</h2>
				<br/>
				<br/>
				<br/>
				<br/>
				<div class="table_div">
          <?php 
            makeFullTable($dbc);
          ?>
				</div>
			</div>
			</div>
			
			
			</div>
		</body>
	</html>
