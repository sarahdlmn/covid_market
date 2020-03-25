<?php
require '../pdo_inscription.php';

// envoie du mail pour activer le compte avec un lien
    $sujet = "Activation de votre compte utilisateur";
    $message = "Pour valider votre inscription, merci de cliquer sur le lien suivant :";
    $message .= "http://" . $_SERVER["SERVER_NAME"];
    $message .= "/activer-compte-utilisateur.php?id="
                                            
    if(!mail($_POST["mail"], $sujet, $message))
    {
        $message = "Une erreur est survenue lors de l'envoi du mail d'activation";
        $message .= "Veuillez contacter l'administrateur afin d'activer votre compte";
    }
    else
    {
        // Message de confirmation
        $message = "Votre compte a été créer";
        $message .= "Un email vient de vous être envoyer afin de l'activer";
    }
 