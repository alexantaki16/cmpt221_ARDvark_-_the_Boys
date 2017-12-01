<!--
This PHP script front-ends linkyprints.php with a login page.
Originally created By Ron Coleman.
Revision history:
Who	Date		Comment
RC  07-Nov-13   Created.
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	#The next two variables will take and validate the input
	$lname = $_POST['lname'] ;

    $sid = validate($lname) ;

    if($sid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('tools.php', $sid);
}
?>
<!-- Get inputs from the user. -->
<h1>Presidents login</h1>
<form action="presidents_login.php" method="POST">
<table>
<tr>
<td>Last Name:</td><td><input type="text" name="lname"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>


Presidents_login_tools.php

	<!--
This file contains PHP login helper functions.
Orginally created by Ron Coleman.
History:
Who	Date		Comment
RC	 7-Nov-13	Created.
-->
<?php
# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Loads a specified or default URL.
function load( $page = 'limbo_landing.php', $num = -1 )
{
  # Begin URL with protocol, domain, and current directory.
  $url = 'http://' . $_SERVER[ 'HTTP_HOST' ] . dirname( $_SERVER[ 'PHP_SELF' ] ) ;

  # Remove trailing slashes then append page name to URL and the print id.
  $url = rtrim( $url, '/\\' ) ;
  $url .= '/' . $page . '?num=' . $num;

  # Execute redirect then quit.
  session_start( );

  header( "Location: $url" ) ;

  exit() ;
}

# Validates the print name.
# Returns -1 if validate fails, and >= 0 if it succeeds
# which is the primary key id.
function validate($sid = '')
{
    global $dbc;

    if(empty($prname))
      return -1 ;

    # Make the query
    $query = "SELECT sid FROM stuff WHERE sid='" . $sid . "'" ;
    show_query($query) ;

    # Execute the query
    $results = mysqli_query( $dbc, $query ) ;
    check_results($results);

    # If we get no rows, the login failed
    if (mysqli_num_rows( $results ) == 0 )
      return -1 ;

    # We have at least one row, so get the frist one and return it
    $row = mysqli_fetch_array($results, MYSQLI_ASSOC) ;

    $sid = $row [ 'sid' ] ;

    return intval($sid) ;
}
?>
