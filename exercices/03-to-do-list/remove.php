<?php

require 'libraries/utilities.php';

// 1) Récupération des informations du POST
$toRemove = $_POST['toRemove'];


$tasks = loadTasks();

$file = fopen('tasks.csv', 'w');
fclose($file);

foreach($tasks as $index => $task) {
    if(in_array($index, $toRemove) == false){
        addTask($task[TASK_TITLE], $task[TASK_DESCRIPTION], $task[TASK_DATE], $task[TASK_PRIORITY]);
    }
}

header('Location: index.php');
exit();
