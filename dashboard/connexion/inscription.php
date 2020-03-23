
<?php

require '../pdo_connexion.php';

// explustion des robot qui on rempli le champ hidden
if ( !empty( $_POST['name'] ) ) die( 'robot' );

$msg_error;
if ( !empty( $_POST['mail'] ) ) {
    $mail = $_POST['mail'];
    $sql = "SELECT count AS nombre  FROM magasin WHERE identifiant='$mail'";
    $resultat = $bdd->query( $sql );
        if ( $resultat != 0 ) {
            $msg_error = "e-mail déjà utilisé";
        }
        
        if ( !empty( $_POST ) ) {
            $nom = isset( $_POST['nom'] ) ? $_POST['nom'] : '' ;
            $identifiant = isset( $_POST['mail'] ) ? $_POST['mail'] : '' ;
            $pass = isset( $_POST['pass'] ) ? $_POST['pass'] : '';
            $pass2 = isset( $_POST['pass2'] ) ? $_POST['pass2'] : '';
            if ( $pass == $pass2 ) {
                if ( !empty( $nom ) && !empty( $prenom ) && !empty( $mail ) && !empty( $pass ) ) {
                    $sql = "INSERT INTO `magasin`(`name`, `popup_content`, `identifiant`, `password`) VALUES ($nom,$nom,$identifiant,$pass)";
                    $resultat = $bdd->exec( $sql );
                    if ( !empty( $resultat ) ) {
                        echo 'inscription ok';
                        // header loc connexion ? ou pas ?
                    } else {
                        echo 'impossible de vous inscrire';
                    }
                } else {
                    $champs_obligatoire =  'Tous les champs sont OBLIGATOIRES';
                }
            } else {
                $password_different = 'Les mots de passe de sont différent';
            }
        }
    }
?>

<div>
    <form id='form' action='' method='POST'>
        <?php echo !empty( $success_msg ) ? $success_msg : ( !empty( $msg_error ) ? $msg_error : '' );?>
        <!-- champ de detection de robot -->
        <input type='hidden' name='name' id='name' value='' placeholder='Magasin' />

        <?php echo !empty( $champs_obligatoire ) ? $champs_obligatoire : '' ;?>
        <br/>

        <div class="d-flex justify-content-center">   
            <label><input type='text' name='nom' id='nom' value='' class="alert alert-success" role="alert"
                        placeholder='Nom de votre magasin' /><label><br/>
        </div>
        <div class="d-flex justify-content-center">   
            <label><input type='text' name='mail' id='mail' value='' class="alert alert-success" role="alert"
                        placeholder='Votre mail' /><label><br/>
        </div>
     
            <?php echo !empty( $mail_used ) ? $mail_used : '' ;?>

        <div class="d-flex justify-content-center">
            <label><input type='password' name='pass' id='pass' value='' class="alert alert-success" role="alert"
                    placeholder='Mot de passe' /></label>
            <br/>
        </div>

        <div class="d-flex justify-content-center">
            <label><input type='password' name='pass2' id='pass2' value='' class="alert alert-success" role="alert"
                    placeholder='Mot de passe indentique' /></label>
            <br/>
        </div>

        <?php echo !empty( $password_different ) ? $password_different : '' ;?>

        <div class="d-flex justify-content-center">
            <label><input type='submit' name='validation' value='Valider' id='' class="btn btn-success" /></label><br>
        </div>

    </form>
</div>