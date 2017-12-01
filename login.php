<!DOCTYPE html>
	<!--Sets HTML Language-->

    <?php
        require('includes/connect_db.php');
        require('includes/tools.php');

        session_start();
            
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ==true){
    header("Location: admin_quick.php");
}
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if (adminLogin($dbc, $user, $pass)) {
        $_SESSION['loggedin'] = true;
        header("Location: admin_quick.php");
    }else{
        echo "WRONG!";
        echo "<img src='Pictures/trumpWrong.gif'/>";
    }
}
?>


	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href="login.css">
		<!--Title-->
		<title>Limbo - Admin</title>
	</head>
		<!--body-->
		<body>
			<!--background DIV-->
			<div class="container">
			<!--image title-->
			<IMG class="title" src="Pictures/LimboLogo.png" alt="Limbo Logo">
			<!--invisible DIV-->
			<div class="container2">
				<!--Navgation Bar-->
				<ul>
  					<li><a href="limbo_landing.php">Home</a></li>
  					<li><a href="found.php">Found Something?</a></li>
  					<li><a href="lost.php">Lost Something?</a></li>
  					<li><a class="active" href="admin.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<br/>
				<br/>
				<br/>
				<!--Invisible Div for table-->
				<div class="table_div">
					<!--text-->
					<h1>Enter Your Username and Password:</h1>
					<br/>
					<br/>
					<!--sign in div-->
					<div class="sign_in">
						<!--username sign in textbox-->
						<form method="post" action="login.php">
                            <h2>Username:</h2>
                            <br/>
                            <input type="text" name="username"><br/>
                            <h2>Password:</h2>
                            <br/>
                            <input type="password" name="password"/><br/>
                            <br/>
                            <br/>
                            <input type="submit" value="Login"/>
                        </form>
					</div>
				</div>
			</div>
			</div>		
			</div>
		</body>
	</html>