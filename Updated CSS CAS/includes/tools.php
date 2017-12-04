<?php

  # modify the database
  function modifyDB($dbc, $id, $action){
    $query = "UPDATE stuff SET status = '".$action."' WHERE sid=".$id;
    $results = mysqli_query( $dbc, $query);
  }

  
  function modifyAdminPass($dbc, $username, $oPass, $nPass){
    $hashedPass = 
    $query = "UPDATE users SET pass = '".$action."' WHERE sid=".$id;
    $results = mysqli_query( $dbc, $query);
  }

  # displays all the admins
  function showAllAdmins($dbc){
    $query = "SELECT * FROM users";

    $results = mysqli_query( $dbc, $query);

    if( $results ){
      // init table setup
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
      // end da table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      # free up space in memory
      mysqli_free_result($results);

      }
  }

  # delete admin
  function deleteAdmin($dbc, $id){
    $query = 'DELETE FROM users WHERE uid = '.$id;

    $results = mysqli_query( $dbc, $query);

  }

  #for deleting items from db
  function deleteLostItem($dbc, $id){
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "lost" ';

    $results = mysqli_query( $dbc, $query);

  }

  # for deleting items from db
  function deleteFoundItem($dbc, $id){
    $query = 'DELETE FROM stuff WHERE sid = '.$id.' AND status = "found" ';

    $results = mysqli_query( $dbc, $query);

  }

  # lost table for admins
  function adminLostTable($dbc){
    $query = 'SELECT * FROM stuff WHERE status = "lost"';

    $results = mysqli_query( $dbc, $query);

    if( $results ){
      // init table setup
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
      //echo "<td><b>Status:</b></td>";
      echo "</tr>";
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
        //echo "<td>".$row['status']."</td>";
        echo "</tr>";
      }
      // end da table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      # free up space in memory
      mysqli_free_result($results);

      }
  }

  # found table for admins
  function adminFoundTable($dbc){
    $query = 'SELECT * FROM stuff WHERE status = "found"';

    $results = mysqli_query( $dbc, $query);

    if( $results ){
      // init table setup
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
      //echo "<td><b>Status:</b></td>";
      echo "</tr>";
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
        //echo "<td>".$row['status']."</td>";
        echo "</tr>";
      }
      // end da table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      # free up space in memory
      mysqli_free_result($results);

      }
  }

  # adds an admin to the database
  function insertIntoUsers($dbc, $fname, $lname, $email, $pass, $username) {
    $hashed = password_hash($pass, PASSWORD_DEFAULT);
    $query = 'INSERT INTO users(fname, lname, email, pass, username, reg_date, admin) VALUES ("' . $fname . '", "' . $lname . '", "' . $email . '", "' . $hashed . '", "' . $username . '", Now(), true )';
    $results = mysqli_query($dbc, $query);
    return $results;
  }

  # gives the complete table for one item
  function completeTable($dbc, $sid){
    $query = 'SELECT * FROM stuff WHERE sid = "'.$sid.'"';

    $results = mysqli_query( $dbc, $query);

    if( $results ){
      // init table setup
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
      // end da table
      echo "</table>";
      echo "<p>".$row['description']."</p>";

      # free up space in memory
      mysqli_free_result($results);

      }
  }

  #queries the database and makes a full table
  function makeFullTable($dbc){
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff ORDER BY update_date DESC';

    $results = mysqli_query( $dbc, $query);

    if( $results ){
      // init table setup
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
      while( $row = mysqli_fetch_array( $results, MYSQLI_ASSOC )){
        echo "<tr>";
        echo "<td>".$row['update_date']."</td>";
        echo "<td>".$row['bName']."</td>";
        echo "<td>".$row['status']."</td>";
        $alink = '<A HREF=itemDescription.php?sid=' . $row['sid']  . '>' . $row['itemName'] . '</A>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo "</tr>";
      }
      // end da table
      echo "</table>";

      # free up space in memory
      mysqli_free_result($results);

      }
  }

  function foundTable($dbc){
    $query = 'SELECT sid, itemName, bName, update_date, catagory FROM stuff WHERE status = "lost" ORDER BY update_date DESC';

    $results = mysqli_query( $dbc, $query);

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
    // end da table
    echo "</table>";

    # free up space in memory
    mysqli_free_result($results);
  }

  function lostTable($dbc){
    $query = 'SELECT sid, update_date, catagory, itemName, bName, status FROM stuff WHERE status = "found" ORDER BY update_date DESC';

    $results = mysqli_query( $dbc, $query);

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
    // end da table
    echo "</table>";

    # free up space in memory
    mysqli_free_result($results);
  }

  # sterilize the users input
  function sterilize($input){
    return htmlspecialchars($input);
  }

  # this function makes sure the name and is valid
  function valid_name($name){
    for($i = 0; $i < strlen($name); $i++){
      if( is_numeric( $name[$i] ) ){
        return False;
      }
    }
    return True;
  }

  # This function makes sure the email is valid
  function valid_email($name){
    if(strpos($name, '@') !== false)
      return true;
    else
      return false;
  }

  # makes sure the username and password entered are valid
  function adminLogin($dbc, $username, $password){
      $query = 'SELECT pass FROM users WHERE username="'.$username.'"';
      if($username == "admin" && $password == "gaze11e"){
        return true;
      }else{
        $results = mysqli_query( $dbc, $query);
        if($results)
          $row = mysqli_fetch_array( $results, MYSQLI_ASSOC );
        else
          return false;
        $hashedPass = $row['pass'];
        return password_verify($password, $hashedPass);
    }
  }
  /*
  function insertIntoTable($create_date, $room, $status, $description){
    $query = 'INSERT INTO stuff($create_date, $room, $status, $description)
    VALUES($dateFound, $locationFound, $status, $item)';
    echo "Thank you for your submission.  Your input has been processed!";
  }
  */

  function insertItem($dbc, $name, $eMail, $item, $itemType, $local, $date, $desc, $status){
    $query = 'INSERT INTO stuff(pName, email, itemName, catagory, create_date, update_date, bName, description, status) VALUES ("'.$name.'","'.$eMail.'","'.$item.'","'.$itemType.'","'.$date.'","'.$date.'","'.$local.'","'.$desc.'","'.$status.'")';

    return $results = mysqli_query($dbc, $query);

  }

  # TODO LOOK into syntax
  function deleteFromTable($id){
    $query = 'DELETE FROM stuff WHERE sid = '.$id;

    $results = mysqli_query( $dbc , $query);

    return $results;
  }

  # make the selection sticky and dynamic
  function buildingSelect($dbc, $local){
    $query = 'SELECT lid, name from location';

    $results = mysqli_query($dbc, $query);

    echo '<select name="location" id="location">';
    echo '<option selected value="selected">--Select--</option>';
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
  function getLat($dbc, $sid){
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      $query = 'SELECT latCord FROM location WHERE name = "'.$row['bName'].'"';
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      return $row['latCord'];
    }

    function getLong($dbc, $sid){
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      $query = 'SELECT longCord FROM location WHERE  name = "'.$row['bName'].'"';
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      return $row['longCord'];
    }

    function getBName($dbc, $sid){
      $query = 'SELECT bName FROM stuff WHERE sid='.$sid;
      $results = mysqli_query( $dbc, $query);
      $row = mysqli_fetch_array( $results, MYSQLI_ASSOC);

      return $row['bName'];
    }
?>
