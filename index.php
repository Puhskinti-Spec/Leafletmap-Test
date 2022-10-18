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

<script>
    var mapOptions = {
        center: [10.6562, 122.94851],
        zoom: 10
    }

    var map = new L.map('map',mapOptions);

    var layer = new L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

    map.addLayer(layer);

    var markers = [];

/*     MARKERS
    var markers = [
        ["<p> University of Negros Occidental - Recoletos </p>", 10.6562, 122.94851],
        ["<p> Jollibee Bacolod Sum-ag </p>", 10.6031, 122.9203],
        ["<p> The Ruins </p>", 10.7093, 122.9826]];

    for (var i =0; i < markers.length;i++) {
        marker = L.marker ([markers[i][1], markers[i][2]]).bindPopup(markers[i][0])
        .addTo(map);
        marker.on('mouseover',function(ev) {
            ev.target.openPopup();
        });
    } */



</script>
<?php
    require_once 'classes/mapfunc.php';
    $addmarkers = new MapFunc();
    $addmarkers -> ShowMarkers();
?>
    
</body>
</html>