<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
$bdd = new PDO('mysql:host=localhost;dbname=covid_market', 'root', '' );

if ( !empty( $_POST['name'] ) ) die( 'expulse robot' );

if ( !empty( $_GET['id'] ) ) {
    $id = $_GET['id'];
} else {
    $id = $_SESSION['identifiant'];
}

$sql = "SELECT * FROM membres WHERE (identifiant='$id' OR mail='$id' )";
$resultat = $bdd->query( $sql );
if ( !empty( $resultat ) ) {
    $membre = $resultat->fetch();
    if ( !empty( $membre ) ) {
        $identifiant = $membre['identifiant'];
        $mail = $membre['mail'];
        $mdp = $membre['mdp'];
    }

    if ( !empty( $_POST ) ) {
        $identifiant = isset( $_POST['identifiant'] ) ? $_POST['identifiant'] : '' ;
        $mail = isset( $_POST['mail'] ) ? $_POST['mail'] : '';
        $pass = isset( $_POST['pass'] ) ? $_POST['pass'] : '';
        $pass2 = isset( $_POST['pass2'] ) ? $_POST['pass2'] : '';
        if ( $pass == $pass2 ) {
            if ( !empty( $nom ) && !empty( $prenom ) && !empty( $mail ) && !empty( $pass ) ) {
                $sql = "UPDATE `membres` SET `identifiant`='$identifiant', `mail`='$mail',`mdp`='$pass',`role`='magasin' WHERE (identifiant='$id' OR mail='$id' )";
                $resultat = $bdd->exec( $sql );
                if ( !empty( $resultat ) ) {
                    echo 'udpate ok';

                } else {
                    echo 'update fail';
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
    <form id='form' action='' method='post'>
        <?php echo !empty( $success_msg ) ? $success_msg : ( !empty( $msg_error ) ? $msg_error : '' );?>
        <input type='hidden' name='name' id='name' value='' placeholder='Magasin' />

        <?php echo !empty( $champs_obligatoire ) ? $champs_obligatoire : '' ;?>
        <br/>

        <div class="d-flex justify-content-center">
            <label><input type='text' name='identifiant' id='nom' value='' class="alert alert-success" role="alert"
                    placeholder='Votre identifiant' /><br/></label>
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