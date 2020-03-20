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
    <div>
        <section class="fomulaire">

            <div  class="text-success d-flex justify-content-center">
                <h2>Formulaire de connexion</h2>
            </div>
<?php

if ( !empty( $_POST ) ) {
    $identifiant = !empty( $_POST['identifiant'] ) ? $_POST['identifiant']:'';
    $mdp = !empty( $_POST['mdp'] )? $_POST['mdp']:'';
    $stay_connected = !empty( $_POST['connexion'] ) ? $_POST['connexion']:'';

    $expiration = 0;

    $expiration = !empty( $stay_connected ) ? time()+60*60 : 0;
   
    $bdd = new PDO( 'mysql:host=qnyjgz2k.epizy.com;dbname=epiz_25324985_recyclune', 'epiz_25324985', 'WfQdbXsqySsij' );


        if($bdd){
            $sql="SELECT count(*) AS nombre FROM membres WHERE (identifiant='$identifiant' OR mail='$identifiant') AND (mdp='$mdp')";
            
            $resultat=$bdd->query($sql);

            if(!empty($resultat)){
                $membre=$resultat->fetchColumn();
                
                if($membre!=1){
                    $error_msg="identifiant/mot de passe invalide";  
                    $success=0;
                }
                else{
                    $success=1;
                    $mdp='';
                }
            $sql="INSERT INTO log (login, mdp, success, date_tentative, ip) VALUES (:login, :mdp, :success, :date_tentative, :ip)";
           $requete= $bdd-> prepare($sql);

           $requete-> execute([
            'login'=>$identifiant,
           'mdp'=>$mdp,
           'success'=>$success,
           'date_tentative'=>date('Y-m-d H:i:s'),
           'ip'=>$_SERVER['REMOTE_ADDR']]);


            if(empty ($error_msg)){

                session_start();
                $_SESSION['identifiant'] = $identifiant;
                $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
                header('location: ../tbd/tdb.php');
            }
        }
    }
    unset($bdd);
}

?>
<div id="main">
    <div id="box">
        <?php 
        if(!empty($error_msg)){?>
        <div class="error-message"><?php echo $error_msg; ?></div>
        <?php } ?>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="d-flex justify-content-center">
                <input type="text" id="identifiant" name="identifiant" placeholder="identifiant"></br>
            </div>

            <div class="d-flex justify-content-center">
                <input type="password" name="mdp" id="mdp" placeholder="mot de passe"></br>
            </div>

            <div class="d-flex justify-content-center">
                <input type="checkbox" name="session" id="session" value="session" /> Rester connecté<br />
            </div>
            
            <div class="d-flex justify-content-center">
                <input type="submit" name="connexion" id="connexion" value="connexion" class="btn btn-success">
            </div>
        </form>
    </div>
</div>