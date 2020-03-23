<section class="row">
    <?php
    $marqueur=false;
    if(!empty($_POST['vrai'])){
           $marqueur = true;
    }
    if(!empty($_POST['faux'])){
        $marqueur = false;
    }

    if ($marqueur){
        echo '<div class="col-6">';
        include 'maps-side.php';
        echo '</div>';
        echo '<div id="mapid" class="col-6">';}
    else{
        echo '<div id="mapid" class="col-12">';
    }
 ?>

<script language="javascript" >
        $.get('../REST/chargement_carte.php',function (data) {
        var magasins = JSON.parse(data);

            var mymap = L.map('mapid').setView([48.6833, 6.2], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYWxleHljZiIsImEiOiJjazd5anZ4cGIwMnQ0M2ZwOWp5ZmM4eW05In0.5l3noRduV0z5a0XCPbTsfA'
        }).addTo(mymap);
        function onEachFeature(feature, layer) {
                    
                    if (feature.properties && feature.properties.popupContent) {
                        layer.bindPopup(feature.properties.popupContent);
                    }
                }

                var myLayer = L.geoJSON().addTo(mymap);
                myLayer.addData(magasins);
                L.geoJSON(magasins, {
                    onEachFeature: onEachFeature
                }).addTo(mymap);


            </script>
 </div>
<br>
<form action="#" method="post">
<input type="submit" name="vrai" value="Avec Marqueur"><br>
<input type="submit" name="faux" value="Sans Marqueur">
</form>
</div>
</section>
