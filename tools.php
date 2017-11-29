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


function create_user($name){
  $query = 'INSERT INTO users(fname, lname, email, pass)
    VALUES ("' . $fname . '" , "' . $lname . '" , "' . $email . '" , "' . $pass . '" )'; 
}


// #Create new admin
// function newAdmin($){
//   $query = 'INSERT INTO users(admin) 
//             WHERE users(uid) == $uid'
// }

?> 