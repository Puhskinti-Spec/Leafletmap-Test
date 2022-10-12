<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Leaflet Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
     integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>
</head>
<body>
<style>
#map { height: 180px; }
</style>

<div id="map" style = "width:900px; height:500px"></div>
<?php
    $success = mysqli_connect('localhost', 'root', '','leafletmap');
    // $user = 'root';
    // $password = '';
    // $db = 'leafletmap';
    // $host = 'localhost';
    // $port = 3306;

    // $link = mysqli_init();
    // $success = mysqli_real_connect(
    // $link,
    // $host,
    // $user,
    // $password,
    // $db,
    // $port
    // );

    if (!$success) {
        echo "<p>Error connecting to MySQL:" . mysqli_connect_error() . "</p>";
    }
    else {
        echo "<p>Success Connecting</p>";
    }
    
    $sql = mysqli_query($success,"SELECT info, latitude, longitude fROM markers_var");
    $locationinfo = array();

    while ($row_loc = mysqli_fetch_assoc($sql))
    $locationinfo[] = $row_loc;
    $markers = array_keys($locationinfo);
    $js_array = json_encode($markers);
    echo '<script> 
    var markers = ['. $js_array . '];
     </script>'
?>

<script>
    var mapOptions = {
        center: [10.6562, 122.94851],
        zoom: 10
    }

    var map = new L.map('map',mapOptions);

    var layer = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    map.addLayer(layer);

    //MARKERS
    // var markers = [
    //     ["<p> University of Negros Occidental - Recoletos </p>", 10.6562, 122.94851],
    //     ["<p> Jollibee Bacolod Sum-ag </p>", 10.6031, 122.9203],
    //     ["<p> The Ruins </p>", 10.7093, 122.9826]];

    for (var i =0; i < markers.length;i++) {
        marker = L.marker ([markers[i][1], markers[i][2]]).bindPopup(markers[i][0])
        .addTo(map);
        marker.on('mouseover',function(ev) {
            ev.target.openPopup();
        });
    }



</script>
    
</body>
</html>
