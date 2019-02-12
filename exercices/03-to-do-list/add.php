<?php

require 'libraries/utilities.php';

// Si le formulaire a été soumis (càd si le tableau $_POST n'est PAS vide)

  

        // Récupérer les données
    
  if(empty($_POST) == false){ // on check si la boite aux lettre est vide. on récupère si le formulaire est vide ou pas. 
  
  /*
         * Récupération des informations dans le formulaire.
         *
         *
         * PHP fournit une variable $_POST qui permet de lire les données d'un formulaire :
         *
         * Exemple HTML :
         * <input type="text" name="nom">
         * <select name="age">
         *   <option value="20">Vingt ans</option>
         *   <option value="30">Trente ans</option>
         * </select>
         *
         * $_POST['nom'] vaudra le champ de formulaire ayant pour attribut HTML name 'nom'.
         * $_POST['age'] vaudra l'option sélectionnée (20 ou 30) dans le champ de formulaire
         *               ayant pour attribut HTML 'age'.
         */
                        
                        
                        // 1) On recupere les données du formulaire via $_POST
                        
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    
    // pour la date on doit récupérer par contre 3 champs du formulaire que l'on regroupe en une chaine de caractères au format US yyyy-mm-dd
    
    $date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
        
       
       
       
       
      
       
       
                        // 2) enregistrement et ecriture des données 
                        // Enregistrer les données dans un fichier au format CSV
                        
        

        
        addTask($title, $description, $date, $priority);
       
        
        
        
        /* Ouvrir en écriture le fichier tasks.csv avec la fonction fopen()
        $file = fopen('tasks.csv', 'a');
        
        // Ecrire dans le fichier une ligne supplémentaire avec les données récupérées du formulaire au format CSV
        
        // On prépare les données à enregistrer dans un tableau 
        $taskData = [
            $title,
            $description,
            $date,
            $priority
        ];
        
        // On écrit au format CSV dans le fichier $file les données de la tâche $taskData
        fputcsv($file, $taskData);
        
        // Fermer le fichier
        fclose($file);
        
} */ // en commentaire car déplacé en fonction 
        
        
     
}        
        
//////////////          //  3) REDIRECTION POUR RENVOYER LINTERNAUTE SUR LINDEX ET LE TABLEAU EN GROS POUR EVITER DE SE PRENDRE LA PAGE BLANCHE DE ADD

header('location: index.php'); // ici on le redirige vers index.php
exit; // On quitte le script PHP en cours puisqu'on part vers une autre page
