<form method="POST" action="#">
  <select name="category">

  <?php

$bdd = new PDO( 'mysql:host=localhost;dbname=covid', 'root', '' );

$sql = "SELECT * FROM categorie";
    $resultat = $bdd->query( $sql );
    var_dump($resultat);
    if ( !empty( $resultat ) ) {
        while ( $ligne = $resultat->fetch( PDO::FETCH_ASSOC ) ) {
            echo '<option value="'.$ligne["id_categorie"].'">'.$ligne["nom_categorie"].'</option>' ; } } 

?>

 
  </select>
</form>