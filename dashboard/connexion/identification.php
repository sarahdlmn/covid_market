
<?php

if( !empty( $_GET ) ) {

    $identifiant    = ( !empty( $_GET['identifiant'] ) ) ? $_GET['identifiant'] : '' ;
    $password       = ( !empty( $_GET['password'] ) ) ? $_GET['password'] : '' ;


  require '../pdo_connexion.php';

// connexion magasin
        $sql = "SELECT * FROM magasin WHERE (identifiant = '$identifiant' AND password = '$password') ";

        $resultat = $bdd->query( $sql );

        if( $resultat ) {

            $magasin = $resultat->fetch();

            if( $magasin == null) {
                $error_message = 'Indentifiant/mot de passe incorrects';

            }

            if( empty( $error_message ) ) {
                session_start();
                $_SESSION['id_magasin'] = $magasin['id_magasin'];
                $_SESSION['identifiant'] = $identifiant;
                $_SESSION['nom'] = $magasin['name'];
                header('Location: ../dashboard.php');
            }

        }
}
?>
<div id="page">
<div class="content">
    <section class="fomulaire">


        <form action="" method="get">


        <?php
        if( !empty( $error_message ) ) { ?>
            <div class="error-message"> <?php echo $error_message; ?></div>
        <?php }?>

        <div class="d-flex justify-content-center">
            <label for="identifiant">

                <input type="text" name="identifiant" placeholder="E-Mail" class="alert alert-success" role="alert"/>
            </label>
        </div>

        <div class="d-flex justify-content-center">
            <label for="mdp">
                <input type="password" name="password" placeholder="Mot de passe" class="alert alert-success" role="alert"/>
            </label>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Connexion</button>
        </div>
        </form>
    </section>
</div>
</div>
