<?php


    // démarrage de la session
    session_start();

    $message = 'La blanquette est bonne.';

    echo('<h1>Page A</h1>');
    echo('<p>' . $message . '</p>');
    
    
    // technique 1: possibilité d'afficher le message dans l'url du navigateur
    //echo('<a href="pageB.php?message='.urlencode($message).'">Page B</a>');
    
    // sauf que la technique get demande de répéter manuellement le processus pour chacune des pages
    
    // technique 2 : les sessions
    
    
    // pars de droite à gauche
    // on met la blanquette dans la variable
    // on met la variable dans la session comportant l'étiquette message (puis voir B)
    
    // On stocke en session à la clé 'message' le contenu de la variable $message
    $_SESSION['message'] = $message;
    
    