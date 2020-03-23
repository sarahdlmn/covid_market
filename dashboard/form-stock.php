
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="../assets/js/stock.js"></script>



<form method="POST" action="#">
  <select id="category">
  
  <?php

$bdd = new PDO('mysql:host=localhost; dbname=covid_market', 'root', '' );

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
              </tbody>
            </table>
            <input type="submit" name="" value="Enregistrer" />
</div>



  </select>
</form>

