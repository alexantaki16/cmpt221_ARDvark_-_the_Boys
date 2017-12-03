<?php

  #Modify the database
  function modifyDB($dbc, $id, $action){
    #Properly update the database based on the status chosen
    $query = "UPDATE stuff SET status = '".$action."' WHERE sid=".$id;

    #Store the results
    $results = mysqli_query( $dbc, $query);
  }

  #Displays all the admins in the databse
  function showAllAdmins($dbc){
    #Properly query into the users tables with the select command
    $query = "SELECT * FROM users";

    #Store the results
    $results = mysqli_query( $dbc, $query);

    if( $results ){
      # initialize table setup by displaying it
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='6'>Authorized Admins:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>Id:</b></td>";
      echo "<td><b>Username:</b></td>";
      echo "<td><b>First Name:</b></td>";
      echo "<td><b>Last Name:</b></td>";
      echo "<td><b>E-Mail:</b></td>";
      echo "<td><b>Registration Date:</b></td>";
      echo "</tr>";

      #gathers all of the data about the admin
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['uid']."</td>";
        echo "<td>".$row['username']."</td>";
        echo "<td>".$row['fname']."</td>";
        echo "<td>".$row['lname']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['reg_date']."</td>";
        echo "</tr>";
      }

      # finish displaying the table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      # free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will delete and admin from the users tables based on their ids.
  function deleteAdmin($dbc, $id){
    #Properly query into the users database to drop their id and then their information
    $query = 'DELETE FROM users WHERE uid = '.$id;

    #Store the results
    $results = mysqli_query( $dbc, $query);
  }

  #This function deletes a lost item from the database based on its ids
  function deleteLostItem($dbc, $id){
    #Properly query into the databse through delete command
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "lost" ';

    #Store the reuslts
    $results = mysqli_query( $dbc, $query);

  }

  #This function deletes the item from the database based on its id and status
  function deleteFoundItem($dbc, $id){
    #Properly query into the databse to it delete
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "found" ';

    #Store the reuslts
    $results = mysqli_query( $dbc, $query);
  }

  #This function returns the lost listing items
  function adminLostTable($dbc){
    #Properly query into the databse based on the status of the item
    $query = 'SELECT * FROM stuff WHERE status = "lost"';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #This if will initialize all of the table setup
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='8'>Lost Items:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>ID:</b></td>";
      echo "<td><b>Posted:</b></td>";
      echo "<td><b>Updated:</b></td>";
      echo "<td><b>Person's Name:</b></td>";
      echo "<td><b>E-Mail:</b></td>";
      echo "<td><b>Item Name:</b></td>";
      echo "<td><b>Category:</b></td>";
      echo "<td><b>Location:</b></td>";
      echo "</tr>";
      #This while will populate the table form above
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['sid']."</td>";
        echo "<td>".$row['create_date']."</td>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['pName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['itemName']."</td>";
        echo "<td>".$row['catagory']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "</tr>";
      }
      #Finish displaying the table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will display the found items based on their found status
  function adminFoundTable($dbc){
    #Properly query into the databade with the select command
    $query = 'SELECT * FROM stuff WHERE status = "found"';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Display the skeleton table that needs to be popluated
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='8'>Found Items:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>ID:</b></td>";
      echo "<td><b>Posted:</b></td>";
      echo "<td><b>Updated:</b></td>";
      echo "<td><b>Person's Name:</b></td>";
      echo "<td><b>E-mail:</b></td>";
      echo "<td><b>Item Name:</b></td>";
      echo "<td><b>Category:</b></td>";
      echo "<td><b>Location:</b></td>";
      echo "</tr>";

      #This while will populate the skeleton table above
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['sid']."</td>";
        echo "<td>".$row['create_date']."</td>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['pName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['itemName']."</td>";
        echo "<td>".$row['catagory']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "</tr>";
      }
      #Finish up the table display
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will add an admin to the database
  function insertIntoUsers($dbc, $fname, $lname, $email, $pass, $username) {
   #Properly query into the users table in createTables.sql
   $query = 'INSERT INTO users(fname, lname, email, pass, username, reg_date, admin) VALUES ("' . $fname . '", "' . $lname . '", "' . $email . '", "' . $pass . '", "' . $username . '", Now(), true )';

   #Store the results and return it to the databse
   $results = mysqli_query($dbc, $query);
   return $results;
  }

  # gives the complete table for one item
  function completeTable($dbc, $sid){
    #Properly query into the database based off of the id that auto-increments
    $query = 'SELECT * FROM stuff WHERE sid = "'.$sid.'"';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Use if statement to set up the skeleton table
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='9'>Item Details:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>Id:</b></td>";
      echo "<td><b>Posted:</b></td>";
      echo "<td><b>Updated:</b></td>";
      echo "<td><b>Person's Name:</b></td>";
      echo "<td><b>email:</b></td>";
      echo "<td><b>Item Name:</b></td>";
      echo "<td><b>Category:</b></td>";
      echo "<td><b>Location:</b></td>";
      echo "<td><b>Status:</b></td>";
      echo "</tr>";

      #Display the information received above
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
        echo "<tr>";
        echo "<td>".$row['sid']."</td>";
        echo "<td>".$row['create_date']."</td>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['pName']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['itemName']."</td>";
        echo "<td>".$row['catagory']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "</tr>";

      #Finish the table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will query the database and makes a full table
  function makeFullTable($dbc){
    #Properly query into database with select statement
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff ORDER BY update_date DESC';

    #Store results
    $results = mysqli_query( $dbc, $query);

    #This if will genereate the skeleton table that will be popluated below
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='4'>Items:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>Posted:</b></td>";
      echo "<td><b>Location:</b></td>";
      echo "<td><b>Status:</b></td>";
      echo "<td><b>Link:</b></td>";
      echo "</tr>";

      #Take all data and above if statement and populate the screen
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "<td>".$row['status']."</td>";
        $alink = '<A HREF=itemDescription.php?sid=' . $row['sid']  . '>' . $row['itemName'] . '</A>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo "</tr>";
      }
      #Finish the table
      echo "</table>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will use the lost items and update the table based on relevancy
  #The relevancy is based off of the least recent items put into the database
  function foundTable($dbc){
    #Properly query into database with the select statement
    $query = 'SELECT sid, itemName, bName, update_date, catagory FROM stuff WHERE status = "lost" ORDER BY update_date DESC';

    #Store results
    $results = mysqli_query( $dbc, $query);

    #Display table skeleton outline without any values
    echo "<table>";
    echo "<tr>";
    echo "<th colspan='5'>Found Items:</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><b>Item Name:</b></td>";
    echo "<td><b>Location:</b></td>";
    echo "<td><b>Posted:</b></td>";
    echo "<td><b>Category:</b></td>";
    echo "<td><b>Link:</b></td>";
    echo "</tr>";

    #Populate the table from above and properly fit it into the table
    while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
      echo "<tr>";
      echo "<td>".$row['itemName']."</td>";
      echo "<td>".$row['bName']."</td>";
      echo "<td>".$row['update_date']."</td>";
      echo "<td>".$row['catagory']."</td>";
      $alink = '<A HREF=itemDescription.php?sid=' . $row['sid']  . '>' . $row['itemName'] . '</A>' ;
      echo '<TD ALIGN=right>' . $alink . '</TD>' ;
      echo "</tr>";

    }
    #Finish the table table
    echo "</table>";

    #Free up space in memory
    mysqli_free_result($results);
  }
  #This function takes the lost table and sorts it based on relevancy
  #The relvancy is based on the least recent items input.
  function lostTable($dbc){
    #Properly query into the database with the select command
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff WHERE status = "found" ORDER BY update_date DESC';

    #Store the reuslts
    $results = mysqli_query( $dbc, $query);

    #Display the empty table with the column titles
    echo "<table>";
    echo "<tr>";
    echo "<th colspan='5'>Lost Items:</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><b>Item Name:</b></td>";
    echo "<td><b>Location:</b></td>";
    echo "<td><b>Posted:</b></td>";
    echo "<td><b>Category:</b></td>";
    echo "<td><b>Link:</b></td>";
    echo "</tr>";
    #Populate the skeleton table with the information the user gave us
    while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
      echo "<tr>";
      echo "<td>".$row['itemName']."</td>";
      echo "<td>".$row['bName']."</td>";
      echo "<td>".$row['update_date']."</td>";
      echo "<td>".$row['catagory']."</td>";
      $alink = '<A HREF=itemDescription.php?sid=' . $row['sid']  . '>' . $row['itemName'] . '</A>' ;
      echo '<TD ALIGN=right>' . $alink . '</TD>' ;
      echo "</tr>";

    }
    # finish the table setup
    echo "</table>";

    # free up space in memory
    mysqli_free_result($results);
  }

  # sterilize the users input
  function sterilize($input){
    return htmlspecialchars($input);
  }

  # this function makes sure the name is valid
  function valid_name($name){
    #Test each character and makes sure it's not a number
    for($i = 0; $i < strlen($name); $i++){
      if( is_numeric( $name[$i] ) ){
        return False;
      }
    }
    return True;
  }

  # This function makes sure the email is valid
  function valid_email($name){
    #Test each character and find an '@' symbol
    if(strpos($name, '@') !== false)
      return true;
    else
      return false;
  }

  #This function makes sure the username and password entered are valid
  function adminLogin($dbc, $username, $password){
      #Properly query into database through the select command
      $query = 'SELECT pass FROM users WHERE username="'.$username.'"';

      #Store results
      $results = mysqli_query( $dbc, $query);

      #If this if statement is true it will log us in, otherwise it will not allow us in
      if($results)
        $row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
      else
          return false;
      return ($row['pass'] == $password);


  }

  #This function will insert an item in the stuff table in createTables.sql
  function insertItem($dbc, $name, $eMail, $item, $itemType, $local, $date, $desc, $status){
    #Properly query into stuff table with insert into command
    $query = 'INSERT INTO stuff(pName, email, itemName, catagory, create_date, update_date, bName, description, status) VALUES ("'.$name.'","'.$eMail.'","'.$item.'","'.$itemType.'","'.$date.'","'.$date.'","'.$local.'","'.$desc.'","'.$status.'")';

    #return the results
    return $results = mysqli_query($dbc, $query);

  }

  #This function will delete items from the table
  function deleteFromTable($id){
    #Properly query into the database and delete and item based on its id
    $query = 'DELETE FROM stuff WHERE sid = '.$id;

    #Store the results
    $results = mysqli_query( $dbc , $query);

    return $results;
  }

  # This function will make the selection sticky and dynamic
  function buildingSelect($dbc, $local){
    #Properly query into the database by selecting the location id from the database
    $query = 'SELECT lid, name from location';

    #Store the results
    $results = mysqli_query($dbc, $query);

    #Display the location
    echo '<select name="location" id="location">';
    echo '<option selected value="selected">--Select--</option>';

    #This while loop simply makes sure every field that has been filled out stays filled out
    #In other words, this is the sticky portiion of the function
    while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
      if($local == $row){
        echo '<option selected="selected" value="'.$row['lid'].'">"'.$row['name'].'"</option>"';
      }
      else{
        echo '<option value="'.$row['lid'].'">"'.$row['name'].'"</option>"';
      }
    }
    echo '</select>';
  }

  #This function will get the admins name to be displayed
  function getAdminName($dbc, $username) {
    #Properly query into the database with the select command
    $query = 'SELECT fname FROM users WHERE username = "'.$username.'"';

    #Store the reuslts
    $results = mysqli_query( $dbc , $query);

    #Finish up the query and return the desired information to the html stream.
    $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);
    return $row['fname'];
  }
?>
