
<section class="col-12"> 
<div id="mapid" class="col-12">
<script language="javascript" >
    var magasins = [{
    "type":"Feature",
    "properties": {
        "ID": 1,
        "name":"auchant",
        "popupContent":"Auchan Tomblaine"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.221531,48.686275]
    }
    
},
{
    "type":"Feature",
    "properties": {
        "ID": 2,
        "name":"aldi",
        "popupContent":"Aldi Tomblaine"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.219547,48.684658]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 3,
        "name":"auchanl",
        "popupContent":"Auchan Lobau"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.198744,48.680994]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 4,
        "name":"corae",
        "popupContent":"Cora Essey"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.243782,48.703979]
    }


},
{
    "type":"Feature",
    "properties": {
        "ID": 5,
        "name":"corah",
        "popupContent":"Cora Houdemont"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.185713,48.640396]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 6,
        "name":"lidlt",
        "popupContent":"Lidl Tomblaine"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.216191,48.684829]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 7,
        "name":"match",
        "popupContent":"Match Saint Max"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.213511,48.701634]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 8,
        "name":"monoprix",
        "popupContent":"Monoprix Nancy Centre"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.181327,48.688024]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 9,
        "name":"carrefour",
        "popupContent":"Carrefour Nancy"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.179257,48.695952]
    }

},
{
    "type":"Feature",
    "properties": {
        "ID": 10,
        "name":"leclerc",
        "popupContent":"Leclerc Nancy"
    },
    "geometry": {
        "type":"Point",
        "coordinates": [6.196569,48.695001]
    }
}
];
        
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
    
                var myLayer = L.geoJSON().addTo(mymap);
                myLayer.addData(magasins);
                L.geoJSON(magasins, {
                    onEachFeature: onEachFeature
                }).addTo(mymap).on('click', function(e) {
                       window.location.replace('./index.php?lat='+e.latlng['lat']+'&lon='+e.latlng['lng']);
});               
            </script>
 </div>
</div>
</section>

