
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="../assets/js/stock.js"></script>

<form method="POST" action="#">
  <select id="category" class="form-control">
  
  <?php

require './pdo_connexion.php';

// remplissage du select avec requete sql
$sql = "SELECT * FROM categorie";
    $resultat = $bdd->query( $sql );
    var_dump($resultat);
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
                 <!-- modification du dom par jquery & ajax                -->

              <tr><td scope="row"><label for="">produit Test</label> </td><td><div class="form-group">
                <input type="number" min="0"
                  class="form-control" name="" id="">
              </div>
              </td></tr>

              </tbody>
            </table>
            <input type="submit" class="btn btn-success" name="" value="Enregistrer" />
</div>
</form>
