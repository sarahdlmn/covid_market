<?php

include './header.php';
if ( isset($_GET['lat']) && isset($_GET['lon'] )) {
    require './maps/details.php';
} else{
require './maps/maps.php';
}
include './footer.php';

?>