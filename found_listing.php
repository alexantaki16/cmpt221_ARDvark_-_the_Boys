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
  					<li><a href="home.html">Home</a></li>
  					<li><a class="active" href="found.html">Found Something?</a></li>
  					<li><a href="lost.html">Lost Something?</a></li>
  					<li><a href="admin.html">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Found Something?</h1>
				<h2>Listing lost items with Limbo is as easy as it gets.</br>Just fill out the following fields and the item</br>will be posted to our campus-wide database!</h2>
				<br/>
				<br/>
				<br/>
				<br/>
				<!--Contains the form information -->
				<div class="table_div">
					<form action="found_listing.php" method="POST">
            <p>Your Name: <input type="text" name="yourName" placeholder="Ex: John Smith" value="<?php if(isset($_POST['yourName'])) echo $_POST['yourName']; ?>"></p>
            <p>E-Mail: <input type="text" name="E-Mail" placeholder="Ex: John.Smith1@marist.edu" value="<?php if(isset($_POST['E-Mail'])) echo $_POST['E-Mail']; ?>"></p>
            <p>Name of Item: <input type="text" name="nameOfItem" placeholder="Ex: TI-84 Krogulator" value="<?php if(isset($_POST['nameOfItem'])) echo $_POST['nameOfItem']; ?>"></p>
            <p>Catagory: 
              <select name="Catagory" id="Catagory">
                <option selected value="selected">--Select--</option>
                <option value="Clothes">Clothes</option>
                <option value="Electronics">Electronics</option>
                <option value="School Supplies">School Supplies</option>
                <option value="Personal Items">Personal Items</option>
                <option value="Other">Other</option>
              </select>
            </p>
            <p>Location Found:
               <select name="Location Found" id="Location Found">
                <option selected value="selected">--Select--</option>
                <option value="Bryne House">Bryne House</option>
                <option value="Cannavino Library">Cannavino Library</option>
                <option value="Champagnat Hall">Champagnat Hall</option>
                <option value="Chapel">Chapel</option>
                <option value="Cornell Boathouse">Cornell Boathouse</option>
                <option value="Donnelly Hall">Donnelly Hall</option>
                <option value="Dyson Center">Dyson Center</option>
                <option value="Fern Tor">Fern Tor</option>
                <option value="Fontaine Hall">Fontaine Hall</option>
                <option value="Foy Townhouses">Foy Townhouses</option>
                <option value="Lower Fulton Townhouses">Lower Fulton Townhouses</option>
                <option value="Upper Fulton Townhouses">Upper Fulton Townhouses</option>
                <option value="Greystone">Greystone</option>
                <option value="Hancock Center">Hancock Center</option>
                <option value="Kieran Gatehouse">Kieran Gatehouse</option>
                <option value="Kirk House">Kirk House</option>
                <option value="Leo Hall">Leo Hall</option>
                <option value="Longview Park">Longview Park</option>
                <option value="Lowell Thomas Communication Center">Lowell Thomas Communication Center</option>
                <option value="Lower Townhouses">Lower Townhouses</option>
                <option value="Marian Hall">Marian Hall</option>
                <option value="Marist Boathouse">Marist Boathouse</option>
                <option value="McCann Center">McCann Center</option>
                <option value="Mid-Rise Hall">Mid-Rise Hall</option>
                <option value="North Campus Housing Complex">North Campus Housing Complex</option>
                <option value="St. Ann's Hermitage">St. Ann's Hermitage</option>
                <option value="St. Peter's">St. Peter's</option>
                <option value="Science and Allied Health Building">Science and Allied Health Building</option>
                <option value="Sheahan Hall">Sheahan Hall</option>
                <option value="Steel Plant Studios and Gallery">Steel Plant Studios and Gallery</option>
                <option value="Dennis J. Murray Student Ceneter/Music Building">Dennis J. Murray Student Ceneter/Music Building</option>
                <option value="Lower West Cedar Townhouses">Lower West Cedar Townhouses</option>
                <option value="Upper West Cedar Townhouses">Upper West Cedar Townhouses</option>
                
                <option value="Other">Other</option>
              </select>
            </p>
            <p>Date Found: <input type="datetime-local" name="date"> </p>
            <h4>Description of Item:</h4><textarea rows="10" cols="50" placeholder="Ex: TI-84 Graphing Calculator. Yellow and gray casing with clear battery case. Scuffs on side of calculator."></textarea>
            <p> <input type="submit"></p>
          </form>
				</div>
						
						
			</div>
			
			
		
			</div>
			
			
			</div>
		</body>
	</html>