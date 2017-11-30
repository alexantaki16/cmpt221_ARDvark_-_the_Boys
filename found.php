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
	<link rel="stylesheet" type="text/css" href="found.css">
		<!--Title-->
		<title>Limbo - Found Something?</title>
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
  					<li><a class="active" href="found.html">Found Something?</a></li>
  					<li><a href="lost.php">Lost Something?</a></li>
  					<li><a href="admin.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--text-->
				<h1>Found Something?</h1>
				<h2>Listing lost items with Limbo is as easy as it gets.<br/>Just fill out the following fields and the item<br/>will be posted to our campus-wide database!<br/></h2>
				<br/>
				<!--create found listing form-->
				<a href="found_listing.php">Create a Listing!</a>
				<br/>
				<br/>
				<!--Invisible Div for table-->
				<div class="table_div">
					<?php
            foundTable($dbc);
          ?>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>