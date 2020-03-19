<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php

    if( !empty( $_POST ) ) {

        $identifiant = !empty($_POST['identifiant']) ? $_POST['identifiant'] : '';
        $nom = !empty($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = !empty($_POST['prenom']) ? $_POST['prenom'] : '';
        $mail = !empty($_POST['mail']) ? $_POST['mail'] : '';
        $password = !empty($_POST['password']) ? $_POST['password'] : '';

        if( empty($identifiant) ) {
            $message_identifiant = 'L\'identifiant est obligatoire';
        }
        if( empty($nom) ) {
            $message_nom = 'Le nom est obligatoire';
        }
        if( empty($prenom) ) {
            $message_prenom = 'Le prénom est obligatoire';
        }
        if( empty($mail) ) {
            $message_mail = 'Le mail est obligatoire';
        }
        if( empty($password) ) {
            $message_password = 'Le mot de passe est obligatoire';
        }

                $bdd = new PDO( 'mysql:host=localhost;dbname=covid_market', 'root', '' );

                $sql = "SELECT * FROM membres WHERE
                    identifiant = '$identifiant' OR mail = '$mail' ";

                $resultat = $bdd->query( $sql );
                
                if( $resultat ) {

                    $membres = $resultat->fetchAll( PDO::FETCH_ASSOC );

                    if( count( $membres ) == 0 ) {
                        
                        $success_msg = 'Votre inscription a été prise en compte';
                        $sql = "INSERT INTO membres 
                            (identifiant, nom, prenom, mail, mdp, role)
                        VALUES 
                            ( '$identifiant', '$nom', '$prenom', '$mail', '$password', 'Membre' )";
                        $resultat = $bdd->exec( $sql );
                        if( $resultat ) {
                            $success_msg = 'Votre inscription a été prise en compte';
                        } else {
                            die('Pb insertion');
                        }
                    } else {
                        $error_msg = 'Identifiant ou mail déjà utilisé';
                    }
                }

                unset ( $bdd );

    }

?>

<?php include './template-parts/header.php'; ?>

<div id="page">

    <div class="content">
        <section>

            <?php if( !empty( $success_msg ) ) { ?>
                <h2><?php echo $success_msg; ?></h2>
            <?php } else { ?>
                <form action="" method="post">

                    <?php if( !empty( $error_msg ) ) { ?>
                        <p><?php echo $error_msg; ?></p>
                    <?php }?>
                    

                    <?php if( !empty($message_identifiant) ) { echo($message_identifiant); } ?>
                    <label for="identifiant"> Identifiant 
                        <input type="text" name="identifiant" id="identifiant" value="" placeholder="Identifiant">
                    </label>

                    <?php if( !empty($message_nom) ) { echo($message_nom); } ?>
                    <label for="nom">Nom 
                        <input type="text" name="nom" id="nom" value="" placeholder="Votre nom">
                    </label>

                    <?php if( !empty($message_prenom) ) { echo($message_prenom); } ?>
                    <label for="prenom">Prénom 
                        <input type="text" name="prenom" id="prenom" value="" placeholder="Votre prénom">
                    </label>

                    <?php if( !empty($message_mail) ) { echo($message_mail); } ?>
                    <label for="mail">Mail 
                        <input type="text" name="mail" id="sujet" placeholder="Adresse mail">
                    </label>

                    <?php if( !empty($message_password) ) { echo($message_password); } ?>
                    <label for="password">Mot de passe 
                        <input type="password" name="password" placeholder="Mot de passe">
                    </label>
                    
                    <!-- <input type="submit" name="validation" value="Valider"> -->
                    <button type="button" class="btn btn-success btn-lg btn-block">Déconnexion</button>

				</form>
			<?php } ?>


		</section>
	</div>

</div>


<?php include './template-parts/footer.php'; ?>