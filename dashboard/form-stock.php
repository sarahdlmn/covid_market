

<?php
require './header-dashboard.php';
?>
<script src="../assets/js/stock.js" charset="utf-8"></script>

<form method="POST" action="#">
  <select id="category" class="form-control">
  <?php
require './pdo_connexion.php';
// remplissage du select avec requete sql
$sql = "SELECT * FROM categorie";
    $resultat = $bdd->query( $sql );

    if ( !empty( $resultat ) ) {
        while ( $ligne = $resultat->fetch( PDO::FETCH_ASSOC ) ) {
            echo '<option  value="'.$ligne["id_categorie"].'">'.$ligne["nom_categorie"].'</option>';
          }
     }

?>
  </select>
<div>
            <table class="table">
              <thead>
                <tr>
                  <th>Produit</th>
                  <th>Quantité</th>
                </tr>
              </thead>
              <tbody id="produit_ajax">

              </tbody>
            </table>
            <a name="" id="" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>
</div>
</form>
