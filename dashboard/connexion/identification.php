
<?php

define ( 'LOGIN', 'administrateur' );
define ( 'PASS', 'mdp' );

if( !empty( $_GET ) ) {

    $identifiant    = ( !empty( $_GET['identifiant'] ) ) ? $_GET['identifiant'] : '' ;
    $password       = ( !empty( $_GET['password'] ) ) ? $_GET['password'] : '' ;
 
  require '../pdo_connexion.php';

    if( $bdd ) {

        $sql = "SELECT count(*) AS nombre FROM magasin WHERE (identifiant = '$identifiant' AND password = '$password') ";

        $resultat = $bdd->query( $sql );

        if( $resultat ) {

            $membre = $resultat->fetchColumn();

            if( $membre != 1 ) {
                $error_message = 'Indentifiant/mot de passe incorrects';
                $success=false;
            } else {
                $success=true;
                $password = '';
            } 
            if( empty( $error_message ) ) {
              
                session_start();
                $_SESSION['identifiant'] = $identifiant;
                header('Location: ../dashboard.php');
            }

        }

    }
}
?>
<div id="page">
<div class="content">
    <section class="fomulaire">

        <form action="" method="GET">

        <?php 
        if( !empty( $error_message ) ) { ?>
            <div class="error-message"> <?php echo $error_message; ?></div>
        <?php }?>

        <div class="d-flex justify-content-center">
            <label for="identifiant">
                <input type="text" name="identifiant" placeholder="Identifiant" class="alert alert-success" role="alert"/>
            </label>
        </div>

        <div class="d-flex justify-content-center">
            <label for="mdp">
                <input type="password" name="password" placeholder="Mot de passe" class="alert alert-success" role="alert"/>
            </label>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-success">Connexion</button>
        </div>
        </form>
    </section>
</div>
</div>