<?php
# this function makes sure the name and is valid
function valid_name($name){
  for($i = 0; $i < strlen($name); $i++){
    if( is_numeric( $name[$i] ) ){
      return false;
    }
  }
  return true;
}
# This function makes sure the email is valid
function valid_email($name){
  if(strpos($a, '@') !== false)
    return true;
  else
    return false;
}
#PSEDUO
function adminLogin(){
  $query = 'SELECT username FROM users WHERE username = "caz", pass = "doctorwho112" AND confPass = "doctorwho112"';
}

function insertIntoTable($create_date, $room, $status, $description){
  $query = 'INSERT INTO stuff($create_date, $room, $status, $description)
  VALUES($dateFound, $locationFound, $status, $item)';
  echo "Thank you for your submission.  Your input has been processed!";
}

function deleteFromTable($create_date, $room, $status, $description){
  $query = 'DELETE FROM stuff($dateFound, $location, $status, $description)
  WHERE status = 'claimed'';
  echo "Thank you!  The item has been deleted from the table.";
}
