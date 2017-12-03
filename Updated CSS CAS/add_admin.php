<!-- Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley --
-- Prof: Casimer DeCusatis --
-- Date: 11/27/2017 --
-- Assignment: Limbo --
-- File name: found_listing.php --
-->
<!DOCTYPE html>
  <!--Use a php script to start the session and check the login information-->
  <?php
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
      header("Location: login.php");
    }

    #Require the connection to the database and the tools.php which houses the functions.
    require("includes/connect_db.php");
    require("includes/tools.php");

    #Initialize all variables
	  $fname = '';
    $lname = '';
	  $eMail = '';
	  $pass = '';
    $username = '';
	  $missing = False;
	  $invalid = False;

    #Request connect to the server and post the information that follows
    if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){

      #Post the first name and check whether it is missing or not
      $fname = $_POST['fname'];
		  if(empty($fname)){
			  $missing = True;
		  }

      #Post the last name and check whether it is missing or not
      $lname = $_POST['lname'];
		  if(empty($lname)){
			  $missing = True;
		  }

      #Post the email and check whether it is empty and/or valid
	    $eMail = $_POST['eMail'];
		  if(empty($eMail)){
			  $missing = True;
		  }else if(!(valid_email($eMail))){
		    $invalid = True;
		  }

      #Post the email the enter and have it hashed and then also check if it's missing value
      $pass = $_POST['pass'];
		  if(empty($pass)){
			  $missing = True;
		  }

      #Post the username and also check whether the username is empty or not
      $username = $_POST['username'];
		  if(empty($username)){
			  $missing = True;
		  }

      #Take of of the infomration and see if it is empty anywhere
		  if($missing){
        #If the missing variable is true then we know something wasn't filled
			  echo '<script type = "text/javascript">alert("You must fill out all fields!");</script>';
		  }
		  else if($invalid){
        #If the invalid variable is true then we know one of the valiation functions came back incorrectly and needs to be fixed
			  echo '<script type = "text/javascript">alert("One of your fields is not filled properly!");</script>';
		  }
		  else{
        #This will run if everything is good and queried properly
			  if(insertIntoUsers($dbc, $fname, $lname, $eMail, $pass, $username)){
				  echo "Your new admin has been successfully added into the system.";
			  }
        #If this statement is displayed then most likely the database isn't sourced, EasyPHP isn't up or something along those lines
			  else{
				  echo "<h1> You have encountered an unexpected error contact the almighty Cas for assistance </h1>";
			  }
	    }
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
      <script>
        //This function quickly allows you to return back to the preious page
        function goBack() {
          window.history.back();
        }
      </script>
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
				<h2>Managing your users is as easy as pie</br>
				<br/>
        <!--Link to lost listing form-->
        <button onclick="goBack()">Go Back To Admins!</button>
				<br/>
				<br/>
				<!--Contains the form information -->
				<div class="table_div">
          <!--This form will give us the text fields to type our responses and have a php function to insert it once the submit button is pressed-->
          <form action="add_admin.php" method="POST">
            <p>Username: <input type="text" name="username" placeholder="Ex: admin" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"></p>
            <p>First Name: <input type="text" name="fname" placeholder="Ex: John" value="<?php if(isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
            <p>Last Name: <input type="text" name="lname" placeholder="Ex: Smith" value="<?php if(isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
            <p>E-mail: <input type="text" name="eMail" placeholder="Ex: John.Smith1@marist,edu" value="<?php if(isset($_POST['eMail'])) echo $_POST['eMail']; ?>"></p>
            <p>Password: <input type="password" name="pass" placeholder="Ex: he11oWorld"></p>
            <p>Confirm Password: <input type="password" name="conPass" placeholder="Ex: he11oWorld"></p>
						<p><input type="submit"/></p>
          </form>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>
