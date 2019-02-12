<?php


// Ajout d'un commentaire
    
   // var_dump($_POST);

// connexion à la BDD
require 'app/connexion.php';
    
// requête SQL - Ajout d'un nouveau commentaire
$sql = 'INSERT INTO Comment (Nickname, Contents, Created_At, Post_Id) 
        VALUES (?, ?, NOW(), ?)';
    
// prepare SQL
$query = $pdo->prepare($sql);

// execute SQL
// pas besoin de fetch car on emmène les infos du PHTML à la BDD
// le fetch est quand on va chercher de la BDD au PHTML
$nickname = $_POST['nickname'];
$contents = $_POST['contents'];
$postId = $_POST['postId'];



$query->execute([$nickname, $contents, $postId]);



// redirection vers la page de l'article
header('Location: show_post.php?articleId=' . $postId);
exit;