<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

<label for="">Pour etre visible sur la carte indiquer votre position : </label>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>

   <div id="mapid" style="height: 200; width:500"></div>

   <script >
   var map = L.map('mapid').setView([48.6833, 6.2], 13);

   L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiYWxleHljZiIsImEiOiJjazd5anZ4cGIwMnQ0M2ZwOWp5ZmM4eW05In0.5l3noRduV0z5a0XCPbTsfA'
}).addTo(map);

map.on('click', function(ev) {
    alert("Coordonée : " + ev.latlng);
    $.post('../assets/REST/map.php', {
        'lat': ev.latlng['lat'],
        'long': ev.latlng['lng']
    }, function(data) {
        console.log(data);
    });
    console.log(ev.latlng['lat']);
    console.log(ev.latlng['lng']);
});




console.log(ev.latlng);
</script>
