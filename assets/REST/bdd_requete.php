<?php
function db_connexion(bool $debug=false)
{
    // Connexion à la base de donnée.

    $pdo = new PDO('mysql:host=localhost:3306;dbname=covid_market;charset=utf8', 'root', '');


    // Activation du debugage de PDO.
    if ($debug === true) {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Renvoi de la resource de connexion.
    return $pdo;
}

function get_product_by_id(int $id)
{
    $pdo = db_connexion(true);

    $statment = $pdo->prepare("SELECT id_produit, nom_produit, quantite FROM produit WHERE id_categorie = :id");
    $statment->bindParam('id', $id, PDO::PARAM_INT);
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
        $id_categorie = (!empty($input['catorie']) && $input['categorie']) ? trim(htmlentities($input['categorie']))  : null;
        $sql = "UPDATE produit SET quantite = :quantite WHERE nom_produit = :nom";
        $statment = $pdo->prepare($sql);
        $statment->bindValue('nom', $nom_produit, PDO::PARAM_STR);
        // $statment->bindParam('categorie', $id_categorie, PDO::PARAM_INT);
        $statment->bindValue('quantite', $quantite, PDO::PARAM_INT);
        var_dump($nom_produit, $quantite);
        $status = $statment->execute();

        if ($status) {
            echo 'La quantité de ' . $nom_produit . ' à bien été mise à jour.';
        } else {
            echo 'Un problème est survenu lors de la mise à jour de ' . $nom_produit . '.';
        }
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $produits = get_product_by_id($_GET['id']);
    $produits = json_encode($produits);
    exit($produits);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    set_product_by_name($_POST);
    $produits = get_product_by_id($_POST['categorie']);
    $produits = json_encode($produits);
    exit($produits);
} else {

}
