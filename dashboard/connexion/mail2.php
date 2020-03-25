<?php

    $expediteur='adressedetestmail@gmail.com';
    $email_to='adressedetestmail@gmail.com';
    $subject='Essai de message texte';
    $message='contenu du message (texte) : <strong>TEST</strong>';
    $headers='From: '.$expediteur. PHP_EOL;
    $headers.='Content-type:text/plain ;charset=utf-8'.PHP_EOL;
    
    if(mail($email_to,$subject,$message,$headers)){
        echo 'message envoyé';
    }else{
        echo 'erreur';
    }

?>

<?php
    // pour les spam
    $SpamErrorMessage="No websites URLs permitted";
    if (preg_match("/http/i", "$expediteur")) {echo "SpamErrorMessage";exit();}
    if (preg_match("/http/i", "$email_to")) {echo "SpamErrorMessage";exit();}
    if (preg_match("/http/i", "$message")) {echo "SpamErrorMessage";exit();}
    if ($anti_spam !=10) {echo "SpamErrorMessage";exit();}
?>

<div id="page">
    <div class="content d-flex justify-content-center"> 

        <section>
            <div>
                <label for="nom">
                    <input type="text" name="mail" id="mail" value="" placeholder="Votre mail" />
                </label>
            </div>
            
            <div class="d-flex justify-content-center"> 
                <label for="destinataire">
                    <input type="text" name="to" id="to" value="" placeholder="mail magasin" class="alert alert-success"/>
                </label>
            </div>

            <div class="d-flex justify-content-center"> 
                <label for="sujet">
                    <input type="text" name="sujet" id="sujet" value="" placeholder="Objet de votre message" />
                </label>
            </div>

            <div class="d-flex justify-content-center"> 
                <label for="message">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                </label>
            </div>

            <div class="d-flex justify-content-center"> 
                <input type="submit" name="envoyer" value="Envoyer" id="" />
            </div>
        </section>

    </div>
</div>