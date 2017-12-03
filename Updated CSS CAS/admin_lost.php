<?php
  session_start();
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("Location: login.php");
  }
  require("includes/connect_db.php");
  require("includes/tools.php");

  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){
    $id = $_POST['id'];
    deleteLostItem($dbc, $id);
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
	<link rel="stylesheet" type="text/css" href="lost_listing.css">
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
  					<li><a class="active" href="login.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<br/>
        <!--text-->
        <h1>Manage Lost Items</h1>
				<br/>
				<br/>
				<!--Red background Div-->
				<div class="table_div">
          <?php
            adminLostTable($dbc);
          ?>
					<br/>
					</div>
          <form action="admin_lost.php" method="POST">
            <br/>
    				<br/>
          <p>Type in the ID of the Item You Want to Delete: <input type="text" name="id" placeholder="1"/>
          <p> <input type="submit"></p>
          </form>
          <br/>
				<br/>
				<br/>
        <br/>
				<br/>
				<br/>
				</div>
			</div>

			</div>
			</div>
		</body>
	</html>
