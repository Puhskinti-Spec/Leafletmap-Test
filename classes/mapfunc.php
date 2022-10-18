<?php
    require_once 'connection.php';
    class MapFunc{
        private $desc;
        private $latitude = 0.00;
        private $longitude = 0.00;
        private $pass = 0;

        public function ShowMarkers(){
        $success = mysqli_connect('localhost', 'root', '','leafletmap');
		$result = mysqli_query($success, "SELECT * FROM markers_var");
        $rows = mysqli_num_rows($result);
        $this->desc = "";
        while ($row = mysqli_fetch_assoc($result)) {
            $out = array_values($row);
            echo "<p>" . json_encode($out) . "</p>";





                echo "<script>
                markers.push(".json_encode($out).");
                for (var i =0; i < markers.length;i++) {
                    marker = L.marker ([parseFloat(markers[i][1]), parseFloat(markers[i][2])]).bindPopup(markers[i][0])
                    .addTo(map);
                    marker.on('mouseover',function(ev) {
                    ev.target.openPopup();
                    });
                }
                </script>";
        }
	}
}
?>