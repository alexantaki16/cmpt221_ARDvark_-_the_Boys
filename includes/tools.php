<?php
  
  #queries the database and makes a full table
  function makeFullTable($dbc){
    $query = 'SELECT update_date, catagory, itemName, bName, status FROM stuff ORDER BY update_date DESC';
    
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
        //echo "<td>".$row[;
        echo "</tr>";

      }
      // end da table
      echo "</table>";
      
      # free up space in memory
      mysqli_free_result($results);

      }
  }
  
  function foundTable($dbc){
    $query = 'SELECT itemName, bName, update_date, catagory FROM stuff WHERE status = "lost" ORDER BY update_date DESC';
    
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
      
      // link echo "<td>".$row['catagory']."</td>";
      echo "</tr>";

    }
    // end da table
    echo "</table>";
      
    # free up space in memory
    mysqli_free_result($results);
  }
    // end da table
    echo "</table>";
      
    # free up space in memory
    mysqli_free_result($results);
  }
  
  function lostTable($dbc){
    $query = 'SELECT update_date, catagory, itemName, bName, status FROM stuff WHERE status = "found" ORDER BY update_date DESC';
    
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
      echo "<td>".$row['update_date']."</td>";
      echo "<td>".$row['bName']."</td>";
      echo "<td>".$row['catagory']."</td>";
      echo "<td>".$row['itemName']."</td>";
      // link echo "<td>".$row['catagory']."</td>";
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
  function adminLogin($username, $password){
    
    $query = 'SELECT pass FROM users WHERE username = '.$username;    
    
    $results = mysqli_query( $dbc , $query );
    
    $row = mysqli_fetch_array( $results , MYSQLI_ASSOC );
    
    return password_verify($password, $row['pass']);
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
