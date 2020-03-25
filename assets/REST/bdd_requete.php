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

function get_product_by_id(int $categorie_id, int $magasin_id)
{
    $pdo = db_connexion(true);

    $statment = $pdo->prepare("SELECT produit.nom_produit, a_produit_magasin.quantite FROM produit INNER JOIN a_produit_magasin ON a_produit_magasin.id_produit = produit.id_produit INNER JOIN magasin ON magasin.id_magasin = a_produit_magasin.id_magasin AND a_produit_magasin.id_magasin = magasin.id_magasin WHERE produit.id_categorie = :id_categorie AND magasin.id_magasin = :id_magasin");
    $statment->bindParam('id_categorie', $categorie_id, PDO::PARAM_INT);
    $statment->bindParam('id_magasin', $magasin_id, PDO::PARAM_INT);
    $statment->execute();
    return $statment->fetchAll(PDO::FETCH_ASSOC);
}

function get_product_by_name(string $nom) {
    $pdo = db_connexion(true);

    $statment = $pdo->prepare("SELECT nom_produit, quantite FROM produit WHERE nom_produit = :nom");
    $statment->bindParam('nom', $nom, PDO::PARAM_STR);
    $statment->execute();
    return $statment->fetchAll(PDO::FETCH_ASSOC);
}

function set_product_by_name(array $input) {
    $pdo = db_connexion(true);

    if (isset($input['nom']) && isset($input['quantite']) && $input['categorie']) {
        $nom_produit = (!empty($input['nom'])) ? trim($input['nom']) : null;
        $quantite = (!empty($input['quantite'])) ? (int)trim(htmlentities($input['quantite'])) : null;
        $id_categorie = (!empty($input['categorie']) && $input['categorie']) ? trim(htmlentities($input['categorie']))  : null;
        $sql = "SELECT id_produit FROM produit WHERE nom_produit = :nom";
        $statment = $pdo->prepare($sql);
        $statment->bindValue('nom', $nom_produit, PDO::PARAM_STR);
        $status = $statment->execute();
        $id = $statment->fetch(PDO::FETCH_ASSOC);
        $statment->closeCursor();

        $sql="UPDATE a_produit_magasin SET quantite = :quantite WHERE id_produit = :id";
        $statment = $pdo->prepare($sql);
        $statment->bindValue('quantite', $quantite, PDO::PARAM_INT);
        $statment->bindValue('id', $id['id_produit'], PDO::PARAM_INT);
        $status = $statment->execute();

        if ($status) {
            echo 'La quantité de ' . $nom_produit . ' à bien été mise à jour.';
        } else {
            echo 'Un problème est survenu lors de la mise à jour de ' . $nom_produit . '.';
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $produits = get_product_by_id($_GET['id_categorie'], $_SESSION['identifiant']);
    $produits = json_encode($produits);
    exit($produits);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    set_product_by_name($_POST);
    $produits = get_product_by_id($_POST['categorie']);
    $produits = json_encode($produits);
    exit($produits);
} else {

}
