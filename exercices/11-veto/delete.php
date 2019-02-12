<?php

$id = $_GET['id'];

// connexion BDD
require_once 'libraries/database.php';

// requête de type DELETE
deleteDog($id);

header('Location: index.php');
exit();