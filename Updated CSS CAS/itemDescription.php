<!DOCTYPE html>

  <?php
    #This script will give us access to the necessary php scripts.
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
	<link rel="stylesheet" type="text/css" href="itemDescription.css">
		<!--Title-->
		<title>Limbo - Lost Something?</title>
	</head>
		<!--body-->
		<body>
      <script>
        //This will allow us to go back to the previous page incase the item you chose wasn't the one you thought.
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
  					<li><a href="login.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Your Item?</h1>
				<!--<h2>Finding items using Limbo is as easy as it gets!<br/>If you are looking for a lost item, browse the <br/>listings to see if your item is here. If you did not <br/>find your item you can create a listing <br/>to look for it!</h2>-->
				<br/>
				<br/>
				<!--Link to lost listing form-->
				<button onclick="goBack()">Go Back To Listings!</button>
				<br/>
				<br/>
				<!--Invisible Div for table-->
				<div class="table_div">
        <?php
          #This will allow us to complete the table
					completeTable($dbc, $_GET['sid']);
        ?>
				</div>
			</div>
			</div>
			</div>
		</body>
	</html>
