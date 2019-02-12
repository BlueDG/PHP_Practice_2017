<?php

     session_start();

    echo('<h1>Page C</h1>');
    
    
    $message = $_SESSION['message'];
    
    echo('<p>Message récupéré en session : ' . $message . '</p>');