<?php


require 'libraries/utilities.php';

// 1) recup du numb de la tâche dans le GET

$taskNumber = $_GET['taskNumber'];

// 2) Suppression de la tâche en question

// 2.1) Récupérer l'ensemble des tâches du fichier

//$tasks = loadTasks();// déplacé en fonction deleteTask.



/*/ 2.2) Vider le fichier

$file = fopen('tasks.csv', 'w');
fclose($file);

// 2.3) Ré-écrire toutes les tâches sauf celle supprimée par l'internaute

foreach($tasks as $index => $task){
    if($index != $taskNumber){
        addTask($task[TASK_TITLE], $task[TASK_DESCRIPTION], $task[TASK_DATE], $task[TASK_PRIORITY]);
    }
}*/ // en commentaire car déplacé dans une fonction deleteTask.


deleteTask($taskNumber);

// 3) Redirection vers la liste des tâches (index.php)

header('Location: index.php');
exit();