<?php
  #This php script will start the session and check the login infor
  session_start();

  #Here is where the login info is being tested
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("Location: login.php");
  }

  #We must include these scripts so we can properly run the pages
  require("includes/connect_db.php");
  require("includes/tools.php");

  #This will allow us to delete an admin based on their ID
  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){
    $id = $_POST['id'];
    deleteFoundItem($dbc, $id);
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
	<link rel="stylesheet" type="text/css" href="found_listing.css">
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
        <h1>Manage Found Items</h1>
				<br/>
				<br/>
				<!--Red background Div-->
				<div class="table_div">
          <?php
            adminFoundTable($dbc);
          ?>
					<br/>
					</div>
          <!--This will use a simple text box that will delete the user based off of their ID that was input originally.-->
          <form action="admin_found.php" method="POST">\
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
