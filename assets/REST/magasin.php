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

function get_magasin(int $magasin_id)
{
    $pdo = db_connexion(true);

    $statment = $pdo->prepare("SELECT * FROM magasin WHERE id_magasin = :id");
    $statment->bindParam('id', $magasin_id, PDO::PARAM_INT);
    $statment->execute();
    return $statment->fetch(PDO::FETCH_ASSOC);
}

function set_magasin(array $input) {
    $pdo = db_connexion(true);
    var_dump($_POST);
    if (isset($input['name']) && isset($input['popup']) && isset($input['horaire']) && isset($input['commentaires']) && isset($input['adresse'])) {
        $name = (!empty($input['name'])) ? trim($input['name']) : null;
        $popup_content = (!empty($input['popup'])) ? trim($input['popup']) : null;
        $horraire = (!empty($input['horaire'])) ? trim($input['horraire']) : null;
        $commentaires = (!empty($input['commentaires'])) ? trim($input['commentaires']) : null;
        $adresse = (!empty($input['adresse'])) ? trim($input['adresse']) : null;

        $sql="UPDATE magasin SET name = :name, popup_content = :popup_content, horaire = :horaire, commentaires = :commentaires, adresse = :adresse WHERE id_magasin = :id";
        $statment = $pdo->prepare($sql);
        $statment->bindValue('name', $name, PDO::PARAM_STR);
        $statment->bindValue('popup_content', $popup_content, PDO::PARAM_STR);
        $statment->bindValue('horaire', $horraire, PDO::PARAM_STR);
        $statment->bindValue('commentaires', $commentaires, PDO::PARAM_STR);
        $statment->bindValue('adresse', $adresse, PDO::PARAM_STR);
        $statment->bindValue('id', $_SESSION['identifiant'], PDO::PARAM_INT);
        $status = $statment->execute();

        if ($status) {
            echo 'La quantité de ' . $name . ' à bien été mise à jour.';
        } else {
            echo 'Un problème est survenu lors de la mise à jour de ' . $name . '.';
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $magasin = get_magasin($_SESSION['identifiant']);
    $magasin = json_encode($magasin);
    exit($magasin);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    set_magasin($_POST);
    $magasin = get_magasin($_SESSION['identifiant']);
    $magasin = json_encode($magasin);
    exit($magasin);
} else {

}
