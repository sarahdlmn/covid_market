 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
    <header class="p-3 mb-2 bg-dark text-white">
        <h1>CovidMarket</h1>
    </header>

<div id="page" class="d-flex justify-content-center">

    <div class="content">
        <section>

            <h2 class="text-success col align-self-center">Formulaire d'inscription</h2>

            <!-- <?php if( !empty( $success_msg ) ) { ?>
                <h2><?php echo $success_msg; ?></h2>
            <?php } else { ?>
                <form action="" method="post">

                    <?php if( !empty( $error_msg ) ) { ?>
                        <p><?php echo $error_msg; ?></p>
                    <?php }?>
                    

                    <?php if( !empty($message_identifiant) ) { echo($message_identifiant); } ?>
                    <div class="d-flex justify-content-center">
                        <label for="identifiant"> 
                            <input type="text" name="identifiant" id="identifiant" value="" placeholder="Identifiant">
                        </label>
                    </div>

                    <?php if( !empty($message_nom) ) { echo($message_nom); } ?>
                    <div class="d-flex justify-content-center">
                        <label for="nom">
                            <input type="text" name="nom" id="nom" value="" placeholder="Votre nom">
                        </label>
                    </div>

                    <?php if( !empty($message_prenom) ) { echo($message_prenom); } ?>
                    <div class="d-flex justify-content-center">
                        <label for="prenom">
                            <input type="text" name="prenom" id="prenom" value="" placeholder="Votre prénom">
                        </label>
                    </div>

                    <?php if( !empty($message_mail) ) { echo($message_mail); } ?>
                    <div class="d-flex justify-content-center">
                        <label for="mail">
                            <input type="text" name="mail" id="sujet" placeholder="Adresse mail">
                        </label>
                    </div>
                    
                    <?php if( !empty($message_password) ) { echo($message_password); } ?>
                    <div class="d-flex justify-content-center">
                        <label for="password">
                            <input type="password" name="password" placeholder="Mot de passe">
                        </label>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-success">Inscription</button>
                    </div>

				</form>
			<?php } ?> -->


		</section>
	</div>

</div>


<?php
$bdd = new PDO( 'mysql:host=qnyjgz2k.epizy.com;dbname=epiz_25324985_recyclune', 'epiz_25324985', 'WfQdbXsqySsij' );

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
        $nom = $membre['nom'];
        $prenom = $membre['prenom'];
        $mail = $membre['mail'];
        $mdp = $membre['mdp'];
    }

    if ( !empty( $_POST ) ) {
        $identifiant = isset( $_POST['identifiant'] ) ? $_POST['identifiant'] : '' ;
        $nom = isset( $_POST['nom'] ) ? $_POST['nom'] : '' ;
        $prenom = isset( $_POST['prenom'] ) ? $_POST['prenom'] : '';
        $mail = isset( $_POST['mail'] ) ? $_POST['mail'] : '';
        $pass = isset( $_POST['pass'] ) ? $_POST['pass'] : '';
        $pass2 = isset( $_POST['pass2'] ) ? $_POST['pass2'] : '';
        if ( $pass == $pass2 ) {
            if ( !empty( $nom ) && !empty( $prenom ) && !empty( $mail ) && !empty( $pass ) ) {
                $sql = "UPDATE `membres` SET `identifiant`='$identifiant',`nom`='$nom',`prenom`='$prenom',`mail`='$mail',`mdp`='$pass',`role`='membre' WHERE (identifiant='$id' OR mail='$id' )";
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
        <input type='hidden' name='name' id='name' value='' placeholder='Votre nom' />

        <?php echo !empty( $champs_obligatoire ) ? $champs_obligatoire : '' ;?>
        <br/>

        <div class="d-flex justify-content-center">
            <label><input type='text' name='identifiant' id='nom' value='' class="alert alert-success" role="alert"
                    placeholder='Votre identifiant' /><br/></label>
        </div>

        <div class="d-flex justify-content-center">
            <label><input type='text' name='nom' id='nom' value='' class="alert alert-success" role="alert"
                    placeholder='Votre nom' /><br/></label>
        </div>

        <div class="d-flex justify-content-center">
            <label><input type='text' name='prenom' id='prenom' value='' class="alert alert-success" role="alert"
                    placeholder='Votre prénom' /></label><br>
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