<?php 
require '../header-dashboard.php';
?>
<?php
session_start();
unset($_COOKIE);
session_destroy();
header ('location: ./connexion.php');
?>
