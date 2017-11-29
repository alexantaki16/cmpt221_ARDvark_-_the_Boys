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
