
<body>
<section class="container col-12">
<div class="row">
<a name="" id="lol" class="far fa-arrow-alt-to-left" class="btn btn-primary left ml-4" href="./index.php" role="button"><</a> <h1 class="title" >Votre magasin</h1>
</div>
<br><br>
 <div>

 <form method="POST" action="#">
<h3 class="text-center">Categories : </h3>
  <select id="category" class="form-control mb-1 mt-1">
  <?php
require './dashboard/pdo_connexion.php';

// remplissage du select avec les categories 
$sql = "SELECT * FROM categorie";
    $resultat = $bdd->query( $sql );

    if ( !empty( $resultat ) ) {
        while ( $ligne = $resultat->fetch( PDO::FETCH_ASSOC ) ) {
            echo '<option  value="'.$ligne["id_categorie"].'">'.$ligne["nom_categorie"].'</option>';
          }
     }
  echo '</select>';

  //requete pour rechercher le magasin 
$magasin = "SELECT id_magasin FROM magasin WHERE coordinates ='[".$_GET['lon'].",".$_GET['lat']."]'";
$resultat = $bdd->query ( $magasin );

$id;
if ( !empty( $resultat ) ) {
  $id = $resultat->fetch( PDO::FETCH_ASSOC );
  
}
//nouvelle requete pour rechercher les produits du magasin 
$sql_donnees = "SELECT * FROM magasin WHERE id_magasin = '".$id['id_magasin']."'";
$resultat = $bdd->query ( $sql_donnees );
$donnees;
if ( !empty( $resultat ) ) {
  $donnees = $resultat->fetch( PDO::FETCH_ASSOC );
  
}

?>



<div>
            <table class="table">
              <thead>
                <tr>
                  <th>Produit</th>
                  <th>Quantité</th>
                </tr>
              </thead>
              <tbody id="produit_ajax">>

                

              </tbody>
            </table>
            <a name="" id="" class="btn btn-success" href="./dashboard.php" role="button">Retour menu</a>
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

