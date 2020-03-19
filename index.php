<?php

include './header.php';

switch ($action) {
    case 'log':
        include './connexion.php';
        break;
    
    default:
        include './maps/maps.php';
        break;
}

include './footer.php';

?>