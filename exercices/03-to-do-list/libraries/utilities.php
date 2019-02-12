<?php


// 1° définition des constantes pour les tâches 

define('TASK_TITLE',    0);
define('TASK_DESCRIPTION',  1);
define('TASK_DATE',     2);
define('TASK_PRIORITY',     3);
define('FILE_PATH',     'tasks.csv');

// permet de charger les tâches du fichier csv au sein d'un tableau


// 2° 

function loadTasks(){
    // 1.2) aller chercher les lignes dans le ficher csv et l'ouvrir
    $fichier = fopen('tasks.csv', 'r');
    // 1.2) lire les lignes une à une (les placer dans un tableau)
    $lignes = [];
    // fegetcsv retransmet les infos sous forme de tableau 
    while(($ligne = fgetcsv($fichier)) != false){ // tant que j'ai de l'info récupérée par fget, je continue de remplir le tableau $lignes. si c'est fini et en gros false, on arrete la boucle.
        $lignes[] = $ligne;
    }
    
    fclose($fichier); // on ferme de façon à ce que l'application ou site puisse être exploité par plusieurs internautes.
    
    return $lignes; // En JS tu mets returns
}



/* FAIRE UNE CONSTANTE histoire de remplacer une position (0 par exemple) par un nom

// En JavaScript et PHP
const TAUX_TVA = 20.0;

// En PHP ONLY
define('TAUX_TVA', 20.0);

// Utilisation
$montantTVA = $montantHT * TAUX_TVA / 100;
*/

/**
 * Permet d'ajouter une tâche dans le fichier CSV
 * 
 * @param string $title Le titre de la tâche
 * @param string $description La description de la tâche
 * @param string $date La date d'échéance de la tâche
 * @param string $priority La priorité de la tâche
*/
function addTask($title, $description, $date, $priority){
    // Ouvrir en écriture le fichier tasks.csv avec la fonction fopen()
        $file = fopen('tasks.csv', 'a');
        
        // Ecrire dans le fichier une ligne supplémentaire avec les données récupérées du formulaire au format CSV
        
        // On prépare les données à enregistrer dans un tableau 
        $taskData = [
            $title,
            $description,
            $date,
            $priority
        ];
        //on ajoute ici des paramètres à cette fonction pour qu'elle sache ce qu'est $title etc
        
        // On écrit au format CSV dans le fichier $file les données de la tâche $taskData
        fputcsv($file, $taskData);
        
        // Fermer le fichier
        fclose($file);
}



// permet de supprimer une tâche dans le fichier csv
// @param int $taskNumber Le numéro de la tâche à supprimer

function deleteTask($taskNumber){
    // 2.1) Récupérer l'ensemble des tâches du fichier
    $tasks = loadTasks();
    // 2.2) Vider le fichier
    $file = fopen('tasks.csv', 'w');
    fclose($file);
    // 2.3) Ré-écrire toutes les tâches sauf celle supprimée par l'internaute
    foreach($tasks as $index => $task){
        if($index != $taskNumber){
            addTask($task[TASK_TITLE], $task[TASK_DESCRIPTION], $task[TASK_DATE], $task[TASK_PRIORITY]);
        }
    }
}

?>