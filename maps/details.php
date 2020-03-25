<script src="./assets/js/detail.js" charset="utf-8"></script>
<body>
<?php
require './dashboard/pdo_connexion.php';

//requete pour rechercher le magasin 
$magasin = "SELECT * FROM magasin WHERE coordinates ='[".$_GET['lon'].",".$_GET['lat']."]'";
$resultat = $bdd->query ( $magasin );

$id;
if ( !empty( $resultat ) ) {
  $id = $resultat->fetch( PDO::FETCH_ASSOC );
  session_start();
  $_SESSION['identifiant'] = $id;
  
}
//nouvelle requete pour rechercher les produits du magasin 
$sql_donnees = "SELECT * FROM magasin WHERE id_magasin = '".$id['id_magasin']."'";
$resultat = $bdd->query ( $sql_donnees );
$donnees;
if ( !empty( $resultat ) ) {
  $donnees = $resultat->fetch( PDO::FETCH_ASSOC );
}

?>
<section class="container col-12">
<div class="row" >
<a name=""  href="./index.php" role="button"  class="col-2" ><img src="./assets/img/arrow.PNG" id="lol" alt="<<<"></a>
 <h1 class="col-8 mt-2" ><?php echo $id['popup_content']?></h1>
</div>
<br><br>
 <div>

 <form method="POST" action="#">
<h3 class="text-center">Categories : </h3>
  <select id="category" class="form-control mb-1 mt-1">
  <option  value="" selected>Veuillez selectionner une catégorie</option>';
  <?php


// remplissage du select avec les categories 
$sql = "SELECT * FROM categorie";
    $resultat = $bdd->query( $sql );

    if ( !empty( $resultat ) ) {
        while ( $ligne = $resultat->fetch( PDO::FETCH_ASSOC ) ) {
            echo '<option  value="'.$ligne["id_categorie"].'">'.$ligne["nom_categorie"].'</option>';
          }
     }
  echo '</select>';



?>

<div>
            <table class="table">
              <thead>
                <tr>
                  <th>Produit</th>
                  <th>Quantité</th>
                </tr>
              </thead>
              <tbody id="produits_list">

                

              </tbody>
            </table>

</div>
</form>

    <form id='form' action='' method='post'>
     
  
    <div class="row">
    <div class="form-row">
     <div class="col-xs-12 col-sm-12 ">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label ">Horaires d'ouverture : </label>
        <div class="col-12">
        <textarea name="textarea" rows="8" class="texty" cols="30" value=""><?php echo $donnees['horaire']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>
  
    <div class="row">
  <div class="form-row">
     <div class="col-sm-12  col-12 col-xs-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12  col-12 col-form-label ">Commentaires : </label>
        <div class="col-12">
        <textarea name="textarea" rows="3" class="texty" cols="30"><?php echo $donnees['commentaires']; ?></textarea>
        </div>
      </div>
    </div>
  </div>
  </div>
    
  <div class="row">
  <div class="form-row">
     <div class="col-sm-12 col-xs-12">
      <div class="form-group row">
        <label for="i1" class="col-xs-12 col-sm-12 col-12 col-form-label ">Adresse : </label>
        <div class="col-12">
        <textarea name="textarea" rows="2" class="texty" cols="30"><?php echo $donnees['adresse']; ?></textarea>
        </div>
      </div>
    </div>
    </div>
    </div>

</form>
 </div>
 </section>
</div>

