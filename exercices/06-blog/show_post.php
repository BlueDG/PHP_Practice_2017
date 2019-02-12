<?php




// Afficher les erreurs à l'écran
ini_set('display_errors', 1);

// Reporte toutes les erreurs PHP
error_reporting(E_ALL);

require 'app/connexion.php'; // Connexion à la BDD
require 'utilities.php';     // Fonctions utilitaires

// on check si tout est okay dans l'URL. A faire à chaque ETAPE GET
// on efface manuellement des trucs et on prépare selon, les messages d'erreur
// cela permet de personnaliser l'affichage d'une erreur aux yeux de l'internaute à la place d'un affichage PHP orange 
// Validation du paramètre de chaîne de requête 'postId'
// ! = si c'est pas faux
if( !checkParamUrl('articleId')){ 
    
    echo "Problème avec l'identifiant de l'article.";
    exit;
}




// traitement

// récupération de l'ID de chaque article présent dans leur propre URL 
$articleId = $_GET['articleId']; // le postId en bleu est celui présent dans l'URL de la page des articles (car fonction de $_Get)
// Ce terme en bleu fut crée lorsque l'on a crée le lien href dans phtml

// connexion 
// avec inclusion de dépendance (de fichiers dont dépend notre script).
// en gros tu compartimentes, tu mets un lien vers un autre php qui contient un code que tu réutiliseras
/*include 'app/connexion.php';*/
// tu peux aussi remplacer include par require
    

// requête SQL 
// Sélection d'un article particulier en fonction de son identifiant (champ Id)
$sql = 'SELECT Post.Id AS Article_Id, Title, Contents, Created_At, Firstname, Lastname
        FROM Post
        INNER JOIN Author ON Post.Author_Id = Author.Id
        WHERE Post.Id = ?';
        
/* préparer requête SQL
$query = $pdo->prepare($sql);

// executer requête
$query->execute([$articleId]); // ici c'est ce qu'on a récupéré avec le $_GET

// Récupérer les résultats
$article = $query->fetch(PDO::FETCH_ASSOC); // un fetch simple va relever une ligne certes mais toutes les données de cette ligne*/

$db = new Database();

$article = $db->queryOne($sql, [$articleId]);


/* **************************************************************************** */
// sélection des commentaires associés à l'article affiché


// Requête SQL pour récupérer les commentaires d'un article
$sql = "SELECT `Nickname`, `Contents`, `Created_At` 
        FROM `Comment` 
        WHERE `Post_Id` = ?";

// préparer requête SQL
$query = $pdo->prepare($sql);

// executer requête
$query->execute([$articleId]); // ici c'est ce qu'on a récupéré avec le $_GET
// le $article va remplacer le ? et donc indiquer le numéro spécifique de l'article visé.
// il y a un numéro Id par article

// Récupérer les résultats
$comments = $query->fetchAll();

// 5. Vérification du résultat avec la fonction var_dump()
// var_dump($comments);





// choix du template spécifique à la page d'un article
$template = 'show_post';
// Inclusion du fichier de template principal (commun à toutes les pages du site)
include 'views/layout.phtml';