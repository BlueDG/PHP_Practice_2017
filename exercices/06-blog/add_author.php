<?php

    /**
     * 1- tu crées le lien avec la BDD
     * 2- tu crées la page PHTML 
     * 3- tu fais le code Else permettant d'utiliser les données de la BDD et faisant le lien avec ta page PHTML
     * 4_ tu fais le code If permettant d'ajouter de nouvelles données à la BDD
    */
    
include 'app/connexion.php';


if( !empty($_POST) ){

$sql = 'INSERT INTO `Author`( `Lastname`, `Firstname` ) 
       VALUES (?,?)';
    

$query = $pdo->prepare($sql);

// en bleu c'est le name des balises phtml
$Lastname = $_POST['lastname'];
$Firstname = $_POST['firstname'];

// ce qu'il y a après les $ va remplacer les ? plus en haut
$query->execute([$Lastname, $Firstname]);



// Une fois que tout est ok => Redirection vers la page d'accueil (index.php)   
 header('Location: admin.php'); // ce système permet à l'internaute de ne pas tomber sur une page blanche (représentant notre code php)
 exit; // on termine le script pour éviter que PHP continue de tourner non stop
    
    
}


else {
    
    // choix du template spécifique à la page du formulaire
    $template = 'add_author';
    
    // Inclusion du fichier de template principal (commun à toutes les pages du site)
    include 'views/layout.phtml';
    
}










