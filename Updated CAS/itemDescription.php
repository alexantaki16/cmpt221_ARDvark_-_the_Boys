<!DOCTYPE html>
<?php
  require("includes/connect_db.php");
  require("includes/tools.php");
?>
	<!--Sets HTML Language-->
	<html lang="en-us">
	<!--Header-->
	<head>
	<!--Makes website responsive to device-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Link to Style Sheet-->
	<link rel="stylesheet" type="text/css" href="itemDescription.css">
		<!--Title-->
		<title>Limbo - Lost Something?</title>
    <!--Google Javascript link/initializer-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDw3M4ntouHWuN6CfphHM3Kzl1dT3B2n40&callback=initialize"
    async defer></script>

	</head>
		<!--body-->
		<body>
      <script>
function goBack() {
    window.history.back();
}
</script>
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
  					<li><a href="login.php">Admin Login</a></li>
				</ul>
			<!--Grey Background DIV-->
			<div class="first">
				<!--Text-->
				<h1>Your Item?</h1>
				<!--<h2>Finding items using Limbo is as easy as it gets!<br/>If you are looking for a lost item, browse the <br/>listings to see if your item is here. If you did not <br/>find your item you can create a listing <br/>to look for it!</h2>-->
				<br/>
				<br/>
				<!--Link to lost listing form-->
				<button onclick="goBack()">Go Back To Listings!</button>
				<br/>
				<br/>
				<!--Invisible Div for table-->
				<div class="table_div">
        <?php
					completeTable($dbc, $_GET['sid']);
        ?>
      </div>
      <br/>
      <br/>
      <!--Map DIV ID-->
          <div id="map"></div>
              <script>
              /*initializer function*/
                    function initialize() {
                    /*focuses the map on start up*/
                    var myOptions = {
                    /*focus coordinates*/
                        center: new google.maps.LatLng(41.7225,-73.9341),
                      /* initial zoom height*/
                        zoom: 15,
                      /*type of map initially displayed*/
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                     };
                     /*gets the information to render map*/
                        var map = new google.maps.Map(document.getElementById("map"), myOptions);
                     /* marker one*/
                      var marker = new google.maps.Marker({
                    /*postion of first marker, coordinates of place*/
                        position: new google.maps.LatLng(<?php echo getLat($dbc, $_GET['sid'])?>,<?php echo getLong($dbc, $_GET['sid']) ?>),
                      /*animation of marker*/
                        animation: google.maps.Animation.DROP,
                        map: map
                        });
                /*window for marker one*/
                      var infoWindow = new google.maps.InfoWindow({
                    /*information displayed in window, name of place*/
                        content: <?php echo "'".getBName($dbc, $_GET['sid'])."'"?>
                        });

                    /*click preferences for marker one*/
                      marker.addListener('click', function() {
                          infoWindow.open(map , marker);
                        });
                     }
                </script>
          </div>
        </div>

			</div>
			</div>
			</div>
		</body>
	</html>
