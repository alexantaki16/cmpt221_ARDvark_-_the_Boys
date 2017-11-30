<!-- 
Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley 
Prof: Casimer DeCusatis 
Date: 11/27/2017 
Assignment: Limbo 
File name: managing_users.php
-->

<!DOCTYPE html>
<?php
  //require('includes/connect_db.php');
  //require('includes/tools.php');
	$fname = '';
	$lname = '';
	$eMail = '';
	$date = '';
	$pass = '';
  $conPass = '';
  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){
    $fname = $_POST['fname'];

    $lname = $_POST['lname'];

	  $eMail = $_POST['eMail'];

    $date = $_POST['date'];

    $pass = $_POST['pass'];

    $conPass = $_POST['conPass'];

    echo "<h1>".$fname."</h1>";
    echo "<h1>".$lname."</h1>";
    echo "<h1>".$eMail."</h1>";
    echo "<h1>".$date."</h1>";
    echo "<h1>".$pass."</h1>";
    echo "<h1>".$conPass."</h1>";
  }
?>
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
  					<li><a href="home.html">Home</a></li>
  					<li><a href="found.html">Found Something?</a></li>
  					<li><a href="lost.html">Lost Something?</a></li>
  					<li><a href="admin.html">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Manage Users</h1>
				<h2>Managing your users is as easy as pie</h2>
			  <br/>
				<br/>
				<br/>
				<br/>
				<!--Contains the form information -->
				<div class="table_div">
          <form action="manage_users.php" method="POST">
            <p>First Name: <input type="text" name="fname" placeholder="Ex: John" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
            <p>Last Name: <input type="text" name="lname" placeholder="Ex: Smith" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
            <p>E-mail: <input type="text" name="eMail" placeholder="Ex: John.Smith1@marist,edu" value="<?php if(isset($_POST['"eMail'])) echo $_POST['"eMail']; ?>"></p>
            <!--<p>Date Found: <input type="datetime-local" name="date"> </p> -->
            <p>Password: <input type="text" name="pass" placeholder="Ex: he11oWorld" value="<?php if(isset($_POST['pass'])) echo $_POST['pass']; ?>"></p>
            <p>Confirm Password: <input type="text" name="conPass" placeholder="Ex: he11oWorld" value="<?php if(isset($_POST['conPass'])) echo $_POST['conPass']; ?>"></p>
            <p> <input type="submit"></p>
          </form>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>
