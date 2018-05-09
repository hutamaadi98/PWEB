<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 600px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
	  function initMap() {
        var uluru = {lat: -7.257472, lng: 112.752088};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: uluru
        });
		
		
		
<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "bg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM universitas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
     ?>
	 var <?php echo $row['id'] ?> ={lat:<?php echo $row['y'] ?>,lng:<?php echo $row['x'] ?>}
        var marker_<?php echo $row['id'] ?> = new google.maps.Marker({
          position: <?php echo $row['id'] ?>,
		  icon:"<?php echo $row['id'] ?>.png",
          map: map
        });
		
	var infowindow_<?php echo $row['id'] ?> = new google.maps.InfoWindow({
    content: "<?php echo $row['nama']."<br>".$row['alamat']."<br><img src='".$row['foto']."'>";  ?>"
  });
  marker_<?php echo $row['id'] ?>.addListener('click', function() {
    infowindow_<?php echo $row['id'] ?>.open(map, marker_<?php echo $row['id'] ?>);
  });	
		
	 <?php
    }
}
$conn->close();
?>
		
		
		
		
		
		
		
		
		
		
	
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYVKOc1CT5gBzF3h-q0usekNcAtpZYBa8&callback=initMap">
    </script>
  </body>
</html>