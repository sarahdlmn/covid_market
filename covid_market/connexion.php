<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    
    <header class="p-3 mb-2 bg-dark text-white">
        <h1 >CovidMarket</h1>
    </header>

<div id="page">
    <div class="content d-flex justify-content-center">
        <section class="fomulaire">

            <h2 class="text-success col align-self-center">Formulaire de connexion</h2>
            <form action="" method="post">

           <!--  <?php 
            if( !empty( $error_message ) ) { ?>
                <div class="error-message"> <?php echo $error_message; ?></div>
            <?php }?> -->

            <div class="d-flex justify-content-center">
                <label for="identifiant">
                    <input type="text" name="identifiant" placeholder="Identifiant"/>
                </label>
            </div>

            <div class="d-flex justify-content-center">
                <label for="password">
                    <input type="password" name="password" placeholder="Mot de passe"/>
                </label>
            </div>

            <div class="d-flex justify-content-center">
                <label for="session"> Rester connecté
                    <input type="checkbox" name="sesion" id="session"/>
                </label>
            </div>

            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-success">Connexion</button>
            </div>

            </form>

        </section>
    </div>

</div>
