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

  $name = '';
  $eMail = '';
  $item = '';
  $itemType = '';
  $local = '';
  $date = '';
  $desc = '';
  $missing = False;
  $invalid = False;
  
  if($_SERVER[ 'REQUEST_METHOD' ] == 'POST'){

    $name = $_POST['yourName'];
    if(empty($name)){
      $missing = True;
    }
    
    # checks if the user has entered in an email
	  $eMail = $_POST['E-Mail'];
    if(empty($eMail)){
      $missing = True;
    }
    else if(!(valid_email($eMail))){
      $invalid = True;
    }
    
    # checks if the item name box is empty
    $item = $_POST['nameOfItem'];
    if(empty($item)){
      $missing = True;
    }
    
    # checks if the user has entered in a item type
    $itemType = $_POST['catagory'];
    if("--Select--" == $itemType){
      $missing = True;
    }
    
    # checks if users entered in a location
    $local = $_POST['location'];
    if("--Select--" == $local){
      $missing = True;
    }
    
    # date has built in require
    $date = $_POST['date'];
    
    # missing description of item
    $desc = $_POST['desc'];
    if(empty($desc)){
      $missing = True;
    }

    # user did not fill out all of the fields
    if($missing){
      echo '<script type="text/javascript">alert("You must fill out all fields!");</script>';
    }
    # checks if anything is invalid
    else if($invalid){
      echo '<script type="text/javascript">alert("One of your fields is invalid!");</script>';
    }
    # all of the fields have been filled out
    else{
      if(insertItem($dbc, $name, $eMail, $item, $itemType, $local, $date, $desc, "found")){
        echo "Your item has sucessfully been added into the system.";
      }
      else{
        echo "<h1>You have encounted an error please contact the admin at kr0gAdmin@limbo.gov </h1>";
      }
    }
    /*
    echo "<h1>".$name."</h1>";
    echo "<h1>".$eMail."</h1>";
    echo "<h1>".$item."</h1>";
    echo "<h1>".$itemType."</h1>";
    echo "<h1>".$local."</h1>";
    echo "<h1>".$date."</h1>";
    echo "<h1>".$desc."</h1>";
    */
    
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
  					<li><a href="limbo_landing.php">Home</a></li>
  					<li><a class="active" href="found.php">Found Something?</a></li>
  					<li><a href="lost.php">Lost Something?</a></li>
  					<li><a href="admin.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Found Something?</h1>
				<h2>Listing lost items with Limbo is as easy as it gets.</br>Just fill out the following fields and the item</br>will be posted to our campus-wide database!</h2>
				<br/>
				<br/>
        <a href="found.php">Return to found!</a>
				<br/>
				<br/>
				<!--Contains the form information -->
				<div class="table_div">
          <span style="text-align: center;" id="errors">Fill out this form. * means required</span>
					<form action="found_listing.php" method="POST">
            <p>Your Name: <input type="text" name="yourName" placeholder="Ex: John Smith" value="<?php if(isset($_POST['yourName'])) echo $_POST['yourName']; ?>"> *</p>
            <p>E-Mail: <input type="text" name="E-Mail" placeholder="Ex: John.Smith1@marist.edu" value="<?php if(isset($_POST['E-Mail'])) echo $_POST['E-Mail']; ?>"> *</p>
            <p>Name of Item: <input type="text" name="nameOfItem" placeholder="Ex: TI-84 Krogulator" value="<?php if(isset($_POST['nameOfItem'])) echo $_POST['nameOfItem']; ?>"> *</p>
            <p>Catagory: 
              <select name="catagory" id="catagory">
                <option selected value="selected">--Select--</option>
                <option <?php if($itemType=='Clothes') echo 'selected="selected"' ?> value="Clothes">Clothes</option>
                <option <?php if($itemType=='Electronics') echo 'selected="selected"' ?> value="Electronics">Electronics</option>
                <option <?php if($itemType=='School Supplies') echo 'selected="selected"' ?> value="School Supplies">School Supplies</option>
                <option <?php if($itemType=='Personal Items') echo 'selected="selected"' ?> value="Personal Items">Personal Items</option>
                <option <?php if($itemType=='Other') echo 'selected="selected"' ?> value="Other">Other</option>
              </select>
            * </p>
            <p>Location Found:
              <select name="location" id="location">
                <option selected value="selected">--Select--</option>
                <option <?php if($local=='Bryne House') echo 'selected="selected"' ?> value="Bryne House">Bryne House</option>
                <option <?php if($local=='Cannavino Library') echo 'selected="selected"' ?> value="Cannavino Library">Cannavino Library</option>
                <option <?php if($local=='Champagnat Hall') echo 'selected="selected"' ?> value="Champagnat Hall">Champagnat Hall</option>
                <option <?php if($local=='Chapel') echo 'selected="selected"' ?> value="Chapel">Chapel</option>
                <option <?php if($local=='Cornell Boathouse') echo 'selected="selected"' ?> value="Cornell Boathouse">Cornell Boathouse</option>
                <option <?php if($local=='Donnelly Hall') echo 'selected="selected"' ?> value="Donnelly Hall">Donnelly Hall</option>
                <option <?php if($local=='Dyson Center') echo 'selected="selected"' ?> value="Dyson Center">Dyson Center</option>
                <option <?php if($local=='Fern Tor') echo 'selected="selected"' ?> value="Fern Tor">Fern Tor</option>
                <option <?php if($local=='Fontaine Hall') echo 'selected="selected"' ?> value="Fontaine Hall">Fontaine Hall</option>
                <option <?php if($local=='Foy Townhouses') echo 'selected="selected"' ?> value="Foy Townhouses">Foy Townhouses</option>
                <option <?php if($local=='Lower Fulton Townhouses') echo 'selected="selected"' ?> value="Lower Fulton Townhouses">Lower Fulton Townhouses</option>
                <option <?php if($local=='Upper Fulton Townhouses') echo 'selected="selected"' ?> value="Upper Fulton Townhouses">Upper Fulton Townhouses</option>
                <option <?php if($local=='Greystone') echo 'selected="selected"' ?> value="Greystone">Greystone</option>
                <option <?php if($local=='Hancock Center') echo 'selected="selected"' ?> value="Hancock Center">Hancock Center</option>
                <option <?php if($local=='Kieran Gatehouse') echo 'selected="selected"' ?> value="Kieran Gatehouse">Kieran Gatehouse</option>
                <option <?php if($local=='Kirk House') echo 'selected="selected"' ?> value="Kirk House">Kirk House</option>
                <option <?php if($local=='Leo Hall') echo 'selected="selected"' ?> value="Leo Hall">Leo Hall</option>
                <option <?php if($local=='Longview Park') echo 'selected="selected"' ?> value="Longview Park">Longview Park</option>
                <option <?php if($local=='Lowell Thomas Communication Center') echo 'selected="selected"' ?> value="Lowell Thomas Communication Center">Lowell Thomas Communication Center</option>
                <option <?php if($local=='Lower Townhouses') echo 'selected="selected"' ?> value="Lower Townhouses">Lower Townhouses</option>
                <option <?php if($local=='Marian Hall') echo 'selected="selected"' ?> value="Marian Hall">Marian Hall</option>
                <option <?php if($local=='Marist Boathouse') echo 'selected="selected"' ?> value="Marist Boathouse">Marist Boathouse</option>
                <option <?php if($local=='McCann Center') echo 'selected="selected"' ?> value="McCann Center">McCann Center</option>
                <option <?php if($local=='Mid-Rise Hall') echo 'selected="selected"' ?> value="Mid-Rise Hall">Mid-Rise Hall</option>
                <option <?php if($local=='North Campus Housing Complex') echo 'selected="selected"' ?> value="North Campus Housing Complex">North Campus Housing Complex</option>
                <option <?php if($local=="St. Ann's Hermitage") echo 'selected="selected"' ?> value="St. Ann's Hermitage">St. Ann's Hermitage</option>
                <option <?php if($local=="St. Peter's") echo 'selected="selected"' ?> value="St. Peter's">St. Peter's</option>
                <option <?php if($local=='Science and Allied Health Building') echo 'selected="selected"' ?> value="Science and Allied Health Building">Science and Allied Health Building</option>
                <option <?php if($local=='Sheahan Hall') echo 'selected="selected"' ?> value="Sheahan Hall">Sheahan Hall</option>
                <option <?php if($local=='Steel Plant Studios and Gallery') echo 'selected="selected"' ?> value="Steel Plant Studios and Gallery">Steel Plant Studios and Gallery</option>
                <option <?php if($local=='Dennis J. Murray Student Ceneter/Music Building') echo 'selected="selected"' ?> value="Dennis J. Murray Student Ceneter/Music Building">Dennis J. Murray Student Ceneter/Music Building</option>
                <option <?php if($local=='Lower West Cedar Townhouses') echo 'selected="selected"' ?> value="Lower West Cedar Townhouses">Lower West Cedar Townhouses</option>
                <option <?php if($local=='Upper West Cedar Townhouses') echo 'selected="selected"' ?> value="Upper West Cedar Townhouses">Upper West Cedar Townhouses</option>
                
                <option <?php if($local=='Other') echo 'selected="selected"' ?> value="Other">Other</option>
              </select>
            * </p>
            <p>Date Found: <input type="datetime-local" name="date" required> *</p>
            <h4>Description of Item: *</h4><textarea name="desc" id="desc" rows="10" cols="50" placeholder="Ex: TI-84 Graphing Calculator. Yellow and gray casing with clear battery case. Scuffs on side of calculator." ><?php if(!empty($desc)) echo $desc ?></textarea>
            <p> <input type="submit"></p>
          </form>
				</div>
						
						
			</div>
			
			
		
			</div>
			
			
			</div>
		</body>
	</html>
