<!-- Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley --
-- Prof: Casimer DeCusatis --
-- Date: 11/27/2017 --
-- Assignment: Limbo --
-- File name: found_listing.php --
-->
<!DOCTYPE html>
<?php
  session_start();
  if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
    header("Location: login.php");
  }

  require("includes/connect_db.php");
  require("includes/tools.php");

  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){
    $id = $_POST['id'];
    deleteAdmin($dbc, $id);
  }
?>
	<!--Sets HTML Language-->
	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href= "managing_users.css">
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
				<!--Text-->
				<h1>Manage Users</h1>
      	<br/>
				<br/>
        <a href="add_admin.php">Create a New Admin!</a>
        <br/>
        <br/>
				<!--Contains the form information -->
				<div class="table_div">
        <?php
          showAllAdmins($dbc);
        ?>
				</div>
        <form action="managing_users.php" method="POST">
          <br/>
          <br/>
          <p>Type in the ID of the Admin You Want to Remove: <input type="text" name="id" placeholder="1"/>
          <p> <input type="submit"></p>
        </form>
			</div>
			</div>
			</div>
		</body>
	</html>
