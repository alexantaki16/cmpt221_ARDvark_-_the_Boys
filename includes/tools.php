<?php
  
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
    $query = 'INSERT INTO stuff(pName, email, itemName, catagory, create_date, update_date, lid, description, status) VALUES ("'.$name.'","'.$eMail.'","'.$item.'","'.$itemType.'","'.$date.'","'.$date.'","'.$local.'","'.$desc.'","'.$status.'")';
    
    return $results = mysqli_query($dbc, $query);
    
  }
  
  # TODO LOOK into syntax
  function deleteFromTable($id){
    $query = 'DELETE FROM stuff WHERE sid = '.$id;
    
    $results = mysqli_query( $dbc , $query);
    
    return $results;
  }
