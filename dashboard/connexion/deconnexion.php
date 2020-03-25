<?php 
require '../header-dashboard.php';
?>
<!-- déconnexion et retour sur la connexion -->
<?php
session_start();
unset($_COOKIE);
session_destroy();
header ('location: ./connexion.php');
?>
