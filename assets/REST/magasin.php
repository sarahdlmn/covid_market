<?php
session_start();

/**
 * Renvoi une instance de la classe PDO.
 *
 * @return PDO
 */
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

/**
 * Formate une liste de magasin pour qu'ils soit compatibles avec l'API Mapbox.
 * @param int $magasin_id Identifiant unique du magasin.
 *
 * @return array
 */
function get_magasin_by_id(int $magasin_id)
{
    // Connexion à la base de donnée.
    $pdo = db_connexion(true);

    // Récupération du magasin possèdant l'identifiant unique $id.
    $statment = $pdo->prepare("SELECT * FROM magasin WHERE id_magasin = :id");
    $statment->bindParam('id', $magasin_id, PDO::PARAM_INT);
    $statment->execute();

    return $statment->fetch(PDO::FETCH_ASSOC);
}

/**
 * Modification des informations du magasin de la session coutante..
 * @param int $magasin_id Identifiant unique du magasin.
 *
 * @return array
 */
function set_magasin(array $input) {
    // Connexion à la base de donnée.
    $pdo = db_connexion(true);

    // Vérifie que les données attendue ont bien été reçus.
    if (
        isset($input['name']) &&
        isset($input['popup']) &&
        isset($input['horaire']) &&
        isset($input['commentaires']) &&
        isset($input['adresse'])
    ) {
        // Vérification sur les valeurs.
        $name = (!empty($input['name'])) ? trim($input['name']) : null;
        $popup_content = (!empty($input['popup'])) ? trim($input['popup']) : null;
        $horaire = (!empty($input['horaire'])) ? trim($input['horaire']) : null;
        $commentaires = (!empty($input['commentaires'])) ? trim($input['commentaires']) : null;
        $adresse = (!empty($input['adresse'])) ? trim($input['adresse']) : null;
        $id = (int)$_SESSION['id_magasin'];

        // Modification dans la base de donnée des informations de magasin.;
        $statment = $pdo->prepare(
            "UPDATE magasin SET name = :name, popup_content = :popup_content, horaire = :horaire, commentaires = :commentaires, adresse = :adresse WHERE id_magasin = :id"
        );
        $statment->bindValue('name', $name, PDO::PARAM_STR);
        $statment->bindValue('popup_content', $popup_content, PDO::PARAM_STR);
        $statment->bindValue('horaire', $horaire, PDO::PARAM_STR);
        $statment->bindValue('commentaires', $commentaires, PDO::PARAM_STR);
        $statment->bindValue('adresse', $adresse, PDO::PARAM_STR);
        $statment->bindValue('id', $id, PDO::PARAM_INT);
        $status = $statment->execute();

        // if ($status) {
        //     echo 'La quantité de ' . $name . ' à bien été mise à jour.';
        // } else {
        //     echo 'Un problème est survenu lors de la mise à jour de ' . $name . '.';
        // }
    }
}


// Vérifie le type d'action attendu en fonction de la méthode de la requête.
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Vérifie que l'ont à bien reçus un identifiant pour le magasin.
    if (isset($_GET['id_magasin'])) {
        // Récupération des informations du magasin dont l'identifiant est égale à "$_GET['identifiant']".
        $magasin = get_magasin_by_id((int)$_GET['magasin_id']);
    } else {
        $magasin = get_magasin_by_id((int)$_SESSION['id_magasin']);
    }
    // Formatage tableau contenant les informations du magasin en JSON pour la récupèration en AJAX..
    $magasin = json_encode($magasin);
    exit($magasin);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Modifie les informations du magasin.
    set_magasin($_POST);

    // Récupération des nouvelles informations du magasin.
    $magasin = get_magasin_by_id($_SESSION['id_magasin']);
    $magasin = json_encode($magasin);
    exit($magasin);
}

// Lundi : 8h00 à 12h00  14h00 à 19h00
// Mardi : 8h00 à 12h00  14h00 à 19h00
// Mercredi : 8h00 à 12h00  14h00 à 19h00
// Jeudi : 8h00 à 12h00  14h00 à 19h00
// Vendredi : 8h00 à 12h00  14h00 à 19h00
// Samedi : 8h00 à 12h00  14h00 à 19h00
