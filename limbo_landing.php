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
  					<li><a class="active" href="home.html">Home</a></li>
  					<li><a href="found_listing.php">Found Something?</a></li>
  					<li><a href="lost_listing.php">Lost Something?</a></li>
  					<li><a href="admin.html">Admin Login</a></li>
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
          <!--
					<table>
						<tr>
							<th colspan="4">Lost Items:</th>
						</tr>
  						<tr>
    						<td><b>Posted:</b></td>
   					  		<td><b>Location:</b></td>
    						<td><b>Status:</b></td>
    						<td><b>Link:</b></td>
  						</tr>
  						<tr>
    						<td>28 October 2017</td>
    						<td>Hancock Center</td>
    						<td>Lost</td>
    						<td>Ti-84 Calculator</td>
  						</tr>
  						<tr>
    						<td>25 October 2017</td>
    						<td>Dyson Building</td>
    						<td>Found</td>
    						<td>Grey Nike Sweatshirt</td>
  						</tr>
  						<tr>
  							 <td>26 October 2017</td>
    						 <td>Lowell Thomas</td>
    						 <td>Found</td>
    						 <td>Blue Brita Water Bottle</td>
  				  	 	</tr>
					</table>-->
				</div>
			</div>
			</div>
			
			
			</div>
		</body>
	</html>