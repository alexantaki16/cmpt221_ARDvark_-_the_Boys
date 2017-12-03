  <?php
    #Start the session
    session_start();

    #Destroy the database
    session_destroy();

    #Display the logout message
    echo 'You Have Been Successfully Logged Out. <a href="admin_quick.php">Go Back To Admin Login</a>';
  ?>
