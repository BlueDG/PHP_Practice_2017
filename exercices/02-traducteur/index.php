<?php


// traitement

// var_dump($_POST);


/**
     * Fonction translate
     * Traduit un mot de l'anglais vers le français ou inversement
     * @param $word string : le mot à traduire 
     * @param $direction string : le sens de traduction "toEnglish" ou "toFrench"
     * @return string|false 
     */ 

function translate($word, $direction/* ça c'est un paramètre donc rien à voir avec l'autre $direction*/) 
// cette fonction traduit dans la bonne direction et prend en compte le mot à traduire
{
    // création du dictionnaire = stockage des mots anglais et français. une base de données
    $dictionary = [
            // clef => valeur c'est au choix que ce soit le FR ou ANG
            'cat' => 'chat',
            'dog' => 'chien',
            'boat' => 'bateau',
            'house' => 'maison',
            'book' => 'livre',
            'shoe' => 'chaussure',
            'mansion' => 'manoir',
            'fish' => 'poisson'
        ];
        
        
        // On teste le sens de traduction avec un switch
        switch($direction){  
            
        //si on traduit du FR vers l'ANG 
        case 'toEnglish':
        // chercher le mot dans les valeurs du tableau $dictionary et retrouver la clef correspondante
        return array_search($word, $dictionary);
    
        //si on traduit de l'ANG vers le FR
        case 'toFrench':
        // chercher le mot dans les clés du tableau $dictionary et retrouver la valeur associée
            if(array_key_exists($word, $dictionary)){
                    return $dictionary[$word]; // le return arrete la fonction, le switch tout ça
            }
            return false;
        }
    
    
        // retourner le résultat de la traduction
    
    
    // Utiliser les fonctions de recherche PHP : in_array(), array_key_exists(), array_search()
}

// est-ce que le formulaire a été rempli et soumis par l'internaute?
// Si oui, le tableau $_POST sera rempli avec les données du formulaire
// Sinon $_POST sera un tableau vide

// la valeur c'est ce que l'internaute tape. pas nos données préenregistrées


/*if(empty($_POST) == false){ // si le tab n'est pas vide
    
}*/


// initialisation du sens de traduction
$direction = 'toFrench';
$message = null;


// Est-ce que la clé 'direction' existe dans le tableau $_POST ?
 if (array_key_exists('direction', $_POST)){ 
     
     // Si oui, on récupère la valeur associée
     $direction /* variable php, aucun lien avec les autres directions. */ = $_POST['direction' /*le même que celui ligne 26*/];
 }

// Est-ce que la clé 'direction' existe dans le tableau $_POST ?
if (array_key_exists('word', $_POST)){ 
     
     // Si oui, on récupère la valeur associée
     $word = $_POST['word'];
     
     // on a récupéré le mot à traduire, il faut maintenant le traduire avec une petite fonction translate
     $translatedWord = translate($word, $direction);
     
     /*var_dump($translatedWord);*/
     
     // si le mot traduit est different de false, c'est que le mot a bien été trouvé dans le dico
     if($translatedWord != false){
         $message ="Le mot '$word' se traduit par '$translatedWord'";
     }
     else{
         $message ="Le mot '$word' n'existe pas dans ce dictionnaire";
     }
     
     // construction du message à afficher à l'internaute
     
 }



























include 'index.phtml';