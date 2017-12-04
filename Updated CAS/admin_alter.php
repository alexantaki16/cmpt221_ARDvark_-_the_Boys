<!-- Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley --
-- Prof: Casimer DeCusatis --
-- Date: 11/27/2017 --
-- Assignment: Limbo --
-- File name: found_listing.php --
-->
<!DOCTYPE html>
<?php

  require("includes/connect_db.php");
  require("includes/tools.php");
  $username = '';
  $oPass = '';
  $nPass = '';
  $missing = False;

  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){

    $username = $_POST['username'];
    if(empty($username)){
      $missing = True;
    }

    $oPass = $_POST['oPass'];
    if(empty($oPass)){
      $missing = True;
    }

    $nPass = $_POST['nPass'];
    if(empty($nPass)){
      $missing = True;
    }

		if($missing){
			echo '<script type = "text/javascript">alert("You must fill out all fields!");</script>';
		}
		else{
			if(modifyAdminPass($dbc, $username, $oPass, $nPass)){
				echo "Your admin password has been successfully updated into the system.";
			}
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
				<h1>Change Password</h1>
				<br/>
        <!--Link to lost listing form-->
        <button onclick="goBack()">Go Back To Admins!</button>
				<br/>
				<br/>
				<!--Contains the form information -->
				<div class="table_div">
          <form action="admin_alter.php" method="POST">
            <p>Username: <input type="text" name="username" placeholder="Ex: caz.decustatis" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>"></p>
            <p>Old Password: <input type="password" name="oPass" placeholder="Ex: he11oWorld"></p>
            <p>New Password: <input type="password" name="nPass" placeholder="Ex: goodbyeworld"></p>
						<p><input type="submit"/></p>
          </form>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>
