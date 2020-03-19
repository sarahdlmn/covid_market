<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
    <header class="p-3 mb-2 bg-dark text-white">
        <h1 text-success>CovidMarket</h1>
    </header>

<div id="page" class="d-flex justify-content-center">

    <div class="content">
        <section>

            <h2 class="text-success col align-self-center">Formulaire d'inscription</h2>
            <?php if( !empty( $success_msg ) ) { ?>
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
			<?php } ?>


		</section>
	</div>

</div>
