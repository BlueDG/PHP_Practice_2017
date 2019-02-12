<?php

     session_start();


    echo('<h1>Page B</h1>');
    
    // technique 1 via get 
    //$message = $_GET['message'];
    
    //echo('<p>Message transmis via url (techn get): ' . $message . '</p>');
    
    
    // on prend cette session et on la met dans une variable comportant ici le même nom que l'autre (histoire de savoir de quoi on parle)
    // on fait un echo et on affiche le contenu de cette variable
    
    
    // technique 2 session
    $message = $_SESSION['message'];
    
    echo('<p>Message récupéré en session : ' . $message . '</p>');