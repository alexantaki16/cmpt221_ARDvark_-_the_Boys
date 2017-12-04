<?php

  #This function will update the database by querying it and changing the status of an object
  function modifyDB($dbc, $id, $action){
    $query = "UPDATE stuff SET status = '".$action."' WHERE sid=".$id;
    $results = mysqli_query( $dbc, $query);
  }

 #This function will allow the user to change their password, but only an admin can do this
 function modifyAdminPass($dbc, $username, $oPass, $nPass){
    #This will use a built in hash function to hash our admins passwords
    $hashedPass = PASSWORD_HASH($oPass, PASSOWRD_DEFAULT);
   
    #Properly query this into the databse by updating the old password with the new one
    $query = "UPDATE users SET pass = '".$hashedPass."' WHERE username='".$username"'";
   
    #Store the results
    $results = mysqli_query( $dbc, $query);
  }

  #This function will show all of the admins in the database.
  function showAllAdmins($dbc){
    
    #This will access all of the users from the users table.
    $query = "SELECT * FROM users";

    #This will store the results.
    $results = mysqli_query( $dbc, $query);

    #Used to test the success of the query.  It will display the skeleton outline of the table
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='4'>Items:</th>";
      echo "</tr>";
      echo "<tr>";
      echo "<td><b>Id:</b></td>";
      echo "<td><b>Username:</b></td>";
      echo "<td><b>first name:</b></td>";
      echo "<td><b>last name:</b></td>";
      echo "<td><b>E-mail:</b></td>";
      echo "<td><b>Registration Date:</b></td>";
      echo "</tr>";
      
      #This while loop will display the row when there is a new row being used.
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
      #This will end the table and finish up displaying it
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will delete an admin from the users table.
  #It is done based off of the id from the admin.
  function deleteAdmin($dbc, $id){
    
    #Properly query into the database
    $query = 'DELETE FROM users WHERE uid = '.$id;

    #Store the results
    $results = mysqli_query( $dbc, $query);
  }

  #This will delete lost items from the databse based on their status
  function deleteLostItem($dbc, $id){
    
    #Properly query the database by deleting the item from the stuff table
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "lost" ';

    #Store the reuslts
    $results = mysqli_query( $dbc, $query);
  }

  #This will delete a found item from the database based on their idea
  function deleteFoundItem($dbc, $id){
    
    #This will delete the item from the found table based on its id and status
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "found" ';

    #This will store the results
    $results = mysqli_query( $dbc, $query);

  }

  #This function will build the lost table.
  function adminLostTable($dbc){
    
    #Properly query into the database based on the status of the item
    $query = 'SELECT * FROM stuff WHERE status = "lost"';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Sets up the skeleton table that will be populated down below.
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<td><b>Id:</b></td>";
      echo "<td><b>Posted:</b></td>";
      echo "<td><b>Updated:</b></td>";
      echo "<td><b>Person's Name:</b></td>";
      echo "<td><b>email:</b></td>";
      echo "<td><b>Item Name:</b></td>";
      echo "<td><b>Category:</b></td>";
      echo "<td><b>Location:</b></td>";
      echo "</tr>";
      
      #This will populate and display the skeleton table from above
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

  #This function will populate the found database
  function adminFoundTable($dbc){
    
    #Properly querty the databse based on the status of the object
    $query = 'SELECT * FROM stuff WHERE status = "found"';
    
    #Store the result
    $results = mysqli_query( $dbc, $query);

    #Create the skeleton outline of the table that will be popluated from the code below.
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='4'>Items:</th>";
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
      echo "</tr>";
      
      #This will actually populate the skeleton outline from above.
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

  #This function will insert the new users information into the users table
  function insertIntoUsers($dbc, $fname, $lname, $email, $pass, $username) {
    
    #This will hash the users password
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    
    #Properly query into the users table and give it the values the user gave us
    $query = 'INSERT INTO users(fname, lname, email, pass, username, reg_date, admin) VALUES ("' . $fname . '", "' . $lname . '", "' . $email . '", "' . $hashed . '", "' . $username . '", Now(), true )';
    
    #Store and return the results
    $results = mysqli_query($dbc, $query);
    return $results;
  }

  #This function will complete the table based on their id
  function completeTable($dbc, $sid){
    
    #Properly query into the stuff table based on their id
    $query = 'SELECT * FROM stuff WHERE sid = "'.$sid.'"';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Used to display the success of the query and creates a skeleton for the code below
    if( $results ){
      echo "<table>";
      echo "<tr>";
      echo "<th colspan='4'>Items:</th>";
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
      
      #This will actually populate the skeleton table mentioned above
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

  #This function will select the id from the user and display the table based on relevancy.
  function makeFullTable($dbc){
    
    #Properly query into the database to input the values
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff ORDER BY update_date DESC';
    
    #Store results
    $results = mysqli_query( $dbc, $query);

    #Used as a skeleton and then displays the success of the query
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
      
      #This will populate the skeleton table from above and then update as each row generates
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "<td>".$row['status']."</td>";
        $alink = '<A HREF=itemDescription.php?sid=' . $row['sid']  . '>' . $row['itemName'] . '</A>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo "</tr>";
      }
      
      #Finish displaying the table
      echo "</table>";

      #Free up space in memory
      mysqli_free_result($results);
      }
  }

  #This function will create a found table portion of the databse
  function foundTable($dbc){
    
    #Properly query into the table by using the select command and categorizing them based on date
    $query = 'SELECT sid, itemName, bName, update_date, catagory FROM stuff WHERE status = "lost" ORDER BY update_date DESC';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Display the information to show a sucessfull query and generate a skeleton table
    echo "<table>";
    echo "<tr>";
    echo "<th colspan='4'>Items:</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><b>Item Name:</b></td>";
    echo "<td><b>Location:</b></td>";
    echo "<td><b>Posted:</b></td>";
    echo "<td><b>Category:</b></td>";
    echo "<td><b>Link:</b></td>";
    echo "</tr>";

    #With each new row, populate the next row
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
    #Finish displaying the table
    echo "</table>";

    #Free up space in memory
    mysqli_free_result($results);
  }

  #This function will generate the lost table.
  function lostTable($dbc){
    
    #Properly query ito the lost table by using the select command and ording by the time
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff WHERE status = "found" ORDER BY update_date DESC';

    #Store the results
    $results = mysqli_query( $dbc, $query);

    #Generate a skeleton outline of the table and update each row below
    echo "<table>";
    echo "<tr>";
    echo "<th colspan='4'>Items:</th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td><b>Item Name:</b></td>";
    echo "<td><b>Location:</b></td>";
    echo "<td><b>Posted:</b></td>";
    echo "<td><b>Category:</b></td>";
    echo "<td><b>Link:</b></td>";
    echo "</tr>";
    #This while loop will populate each row.  Every new input will be displayed as its own new row
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
    #Finish displaying the table
    echo "</table>";

    #Free up space in memory
    mysqli_free_result($results);
  }

  #Sterilize the users input
  function sterilize($input){
    
    #Return input that can not harm the database
    return htmlspecialchars($input);
  }

  #This function makes sure the name is valid
  function valid_name($name){
    
    #Test each character and make sure it is not a number
    for($i = 0; $i < strlen($name); $i++){
      if( is_numeric( $name[$i] ) ){
        return False;
      }
    }
    return True;
  }

  # This function makes sure the email is valid
  function valid_email($name){
    #Test is the email comatins an '@' symbol or not
    if(strpos($name, '@') !== false)
      return true;
    else
      return false;
  }

  #Makes sure the username and password entered are valid
  function adminLogin($dbc, $username, $password){
    
      #Properly query into the database by using the select command and taking the proper infomration
      $query = 'SELECT pass FROM users WHERE username="'.$username.'"';
    
      #Test is the user is the super admin, otherwise, test if it is any other user.
      if($username == "admin" && $password == "gaze11e"){
        return true;
      }else{
        $results = mysqli_query( $dbc, $query);
        if($results)
          $row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
        else
          return false;
        #The above else statemnt will only run if the user is not in the database or the information is incorrect
        
        #Hash the password and return it to be verified to grant access to the site
        $hashedPass = $row['pass'];
        return password_verify($password, $hashedPass);
    }
  }
 
  #This function will insert an item into the database
  function insertItem($dbc, $name, $eMail, $item, $itemType, $local, $date, $desc, $status){
    
    #Properly query into the database by inserting the info into the users table
    $query = 'INSERT INTO stuff(pName, email, itemName, catagory, create_date, update_date, bName, description, status) VALUES ("'.$name.'","'.$eMail.'","'.$item.'","'.$itemType.'","'.$date.'","'.$date.'","'.$local.'","'.$desc.'","'.$status.'")';

    #Return the result
    return $results = mysqli_query($dbc, $query);
  }

  #This function will delete an item from the table based on its id
  function deleteFromTable($id){
    
    #Properly query into the database and delete an item based on the id
    $query = 'DELETE FROM stuff WHERE sid = '.$id;
    
    #Store the result
    $results = mysqli_query( $dbc , $query);
    
    #Return the results
    return $results;
  }

  #This function will make the selection sticky and dynamic
  function buildingSelect($dbc, $local){
    
    #Properly query into the database based on the location id
    $query = 'SELECT lid, name from location';

    #Store the results
    $results = mysqli_query($dbc, $query);
    
    #Will genereate a skeleton table for the page and will be popluated below
    echo '<select name="location" id="location">';
    echo '<option selected value="selected">--Select--</option>';
    
    #This while loop will generate new rows as each input is given in the forms
    while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
      if($local == $row){
        #Display the selected value
        echo '<option selected="selected" value="'.$row['lid'].'">"'.$row['name'].'"</option>"';
      }
      else{
        echo '<option value="'.$row['lid'].'">"'.$row['name'].'"</option>"';
      }
    }

    #Finish the selection
    echo '</select>';
  }
  
  #This function gets the latitude coordinates for the Google Map API
  function getLat($dbc, $sid){
    
      #Properly query into the database by using the select command and the id
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
    
      #Store the results
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);
    
      #Properly query again but select the lat cord from the database and connect it through database
      $query = 'SELECT latCord FROM location WHERE name = "'.$row['bName'].'"';
    
      #Store the results
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      #Return the lat coordinates
      return $row['latCord'];
    }

    #This function gets the longitutde coordinates
    function getLong($dbc, $sid){
      
      #Properly query into the databse by using the select command and the ids
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
      
      #Store the results
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);
      
      #Properly query into the databse again and select the longitude coords from the databse
      $query = 'SELECT longCord FROM location WHERE  name = "'.$row['bName'].'"';
      
      #Store the results
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      #Return the longitutude coords
      return $row['longCord'];
    }

    #This function will get the building name and store it
    function getBName($dbc, $sid){
      
      #Properly query into the database by using the select command and the id
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
      
      #Store the results
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);
      
      #return the building name
      return $row['bName'];
    }
?>
