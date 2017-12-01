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
	<link rel="stylesheet" type="text/css" href="lost.css">
		<!--Title-->
		<title>Limbo - Lost Something?</title>
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
  					<li><a href="admin.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Your Item?</h1>
				<!--<h2>Finding items using Limbo is as easy as it gets!<br/>If you are looking for a lost item, browse the <br/>listings to see if your item is here. If you did not <br/>find your item you can create a listing <br/>to look for it!</h2>-->
				<br/>
				<br/>
				<!--Link to lost listing form-->
				<a href="limbo_landing.php">Return to home!</a>
				<br/>
				<br/>
				<!--Invisible Div for table-->
				<div class="table_div">
        <?php
					completeTable($dbc, $_GET['sid']);
        ?>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>