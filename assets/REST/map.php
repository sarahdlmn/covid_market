<?php
session_start();

function db_connexion(bool $debug=false)
{
    // Connexion à la base de donnée.
    include '../../dashboard/pdo_connexion.php';

    // Activation du debugage de PDO.
    if ($debug === true) {
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Renvoi de la resource de connexion.
    return $bdd;
}

function set_coord(float $long, float $lat)
{
    $coord = '['.$long.','.$lat.']';
    $id = $_SESSION['identifiant'];

    $db = db_connexion(true);
    $sql = "UPDATE magasin SET coordinates = :coordinates WHERE id_magasin = :id";
    $statment = $db->prepare($sql);
    $statment->bindValue('coordinates', $coord, PDO::PARAM_STR);
    $statment->bindValue('id', $id, PDO::PARAM_INT);
    $status = $statment->execute();
}

var_dump($_POST);
if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    set_coord($_POST['long'], $_POST['lat']);
}
