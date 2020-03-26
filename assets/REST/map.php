<?php
session_start();

/**
 * Renvoi une instance de la classe PDO.
 *
 * @return PDO
 */
function db_connexion(bool $debug=false)
{
    // Inclusion de la connexion à la base de donnée.
    include '../../dashboard/pdo_connexion.php';

    // Activation du debugage de PDO.
    if ($debug === true) {
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Renvoi de la resource de connexion.
    return $bdd;
}

/**
 * Modifie les coordonnées d'un magasin.
 * @param float $long Longitute du magasin.
 * @param float $lat Latitude du magasin.
 *
 * @return void
 */
function set_coord(float $long, float $lat)
{
    // Formatage des coordonnée pour enregistrement dans la base de donnée.
    $coord = '[' . $long . ',' . $lat . ']';
    $id = (int)$_SESSION['id_magasin'];

    // Connexion à la base de donnée.
    $db = db_connexion(true);

    // Modification des coordonées du magasin actuellement connecté.
    $statment = $db->prepare(
        "UPDATE magasin SET coordinates = :coordinates WHERE id_magasin = :id"
    );
    $statment->bindValue('coordinates', $coord, PDO::PARAM_STR);
    $statment->bindValue('id', $id, PDO::PARAM_INT);
    $status = $statment->execute();
}

// Vérifie si des informations ont été transmise en POST.
if (isset($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifie si les informations attendu on bien été reçus.
    if (isset($_POST['long']) && isset($_POST['lat'])) {
        // Modifie les coordonées du magasin de la session actuelle.
        set_coord($_POST['long'], $_POST['lat']);
    }
}
