<?php
# this function makes sure the name is valid
function valid_name($name){
  for($i = 0; $i < strlen($name); $i++){
    if( is_numeric( $name[$i] ) ){
      return false;
    }
  }
  return true;
}

function valid_email($name){
  if($name contains '@'){
    return true;
  }else{
    return false;
  }
}
?>
