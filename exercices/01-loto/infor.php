<?php


    // traitements PHP
    // ici uniquement du PHP
    // le fichier .php est le chef. c'est lui qui sera appelé dans le navigateur (jamais le phtml)
    
    // ne jamais oublier le ; en php
    
    // pas besoin d'utiliser de var ou let en php, on les déclare direct
    // elles commencent par contre par le signe $
    
    $title = 'bonjour PHP!'; // types de bases : string, int, float, bool
    
    $entier = 12;
    $flottant = 10.20;
    
    // Opérateurs : + - * / ++ -- % (modulo: reste de la division entière)
    
    // Conditions 
    // opérateurs de comparaison : == != < > <= >=
    // opérateurs logiques : && (et) || (ou)
    
    if(/* condition */ $entier > 0)
    {
        
    }
    
    if(/* condition */ $flottant < 20)
    {
        
    } elseif(/* condition */ $flottant < 50){
        
    } else {
        
    }
    
    // boucle for
    
    for($index = 0; $index < 10 ; $index++)
    {
        
    }
    
    
    // boucle while
    
    while(/* condition d'entrée */ $index < 10)
    {
        $index++;
    }
    
    do {
        
    } while(/* condition d'entrée */ $index < 10);
    
    
    
    // affichage (code HTML)
    include 'index.phtml'; // signifie qu'on inclue une autre resource
    
    
    // les tableaux
    
    $tab1 = [];
    $tab2 = [10,15,14,18,4];
    
    // autre façon JS pour un tableau : var tab = new Array();
    
    $tab3 = array();
    $tab4 = array(10,15,14,18,4);
    
    
    // pour debug
    // en JS on utilise la console.log qui fait partie du navigateur
    // en php on n'est pas côté client mais côté serveur donc:
    
    var_dump($tab2);
    // pour une case spécifique
    var_dump($tab2[0]);
    
    
    // ajouter un élément au bout d'un tableau
    $tab1[]= 'valeur';
    $tab2[]= 10;
    
    // Boucle foreach
    foreach($tab4 as $item){
        var_dump($item);
    }
    
    // alternative a la boucle foreach
    
    
    
    
    
  /* 
  
    **** js ****
    en JS les tableaux sont des objets de la classe Array
    
    var tab = [];
    var.push(54);
    
  */
  
    // en PHP un tableau est un tableau, non un objet
    
    array_push($tab3, 58);
    
    // la classe, c'est la catégorie de l'objet. maison = objet de la catégorie habitation par ex.
    // tab est un objet de la classe array
    // tout est objet en JS
    
    // pas de balise fermante php ici pour éviter les erreurs
    
    /* ******************************************************************  /
    
    
    // définition d'une fonction 
    // c'est comme une machine, un robot qui fera un travail spécifique.
    */
    
    function addition($nombre1, $nombre2) // cette ligne est ce qu'on appelle la signature de la fonction
    {
        // corps de la fonction
        $resultat = $nombre1 + $nombre2;
        
        return $resultat;
    }
    
    // methode 1
    var_dump(addition(14,18)); // echo ou var_dump
    
    // methode 2
    $res = addition(14,18);
    var_dump($res);
    
    
    /********************************/
    
    // on peut donner des parametres par défault
    // comme
    function soustraction($nombre1, $nombre2 = 0)
    {
        
    };
    
    /* */
    
    // switch permet d'éviter de devoir répéter les elseif
    // quand on teste la valeur d'une variable, qu'on répéte, il est plutôt cool ou préférable d'utiliser switch
    
    $age = 17
    
    if($age == 20 || $age == 10){
        $message = 'vous avez vingt ans ou dix ans';
    } elseif($age == 33){
        $message = "vous avez l'âge du christ"; 
    } elseif($age == 79){
        $message = "vous avez 79 ans"; 
    }
    
    
    switch($age){
        case 20:
        case 10:
            $message = "vous avez vingt ans ou dix ans";
            break; // permet de sortir du switch car sinon il va continuer de checker tous les autres case
            
        case 79:
            $message = "vous avez 79 ans";
            break;
        
        // cas par défaut effectué par php si aucun autre cas n'a été exécuté
        default: 
            $message = "..."
    }
    
    
    // les tableaux associatifs
    
    
    $tabAssoc = [];
    $tabAssoc["clef1"] = "valeur1";
    $tabAssoc["clef2"] = "valeur2"; // fin d'une instruction donc ;
    $tabAssoc["clef3"] = "valeur3";
    
    $tabAssoc2 = [
        "key1" => "value1",
        "key2" => "value2",
        "key3" => "value3"
        ];
        
    
    $personne = [
        // clef à gauche et => ici valeur
        "prenom" => "Alfred", // séparer par virgules dans tableau
        "nom" => "Dupont",
        "age" => 38
        ];
        
    var_dump($personne["prenom"] . ' ' . $personne["nom"] . "a" . $personne["age"] . "ans.");
    
    
    echo '<ul>';
    
    foreeach($personne as $key => $value){
        
        echo"<li>$key : $value</li>"
    }
    
    echo '</ul>';
    
    
    
    
    
    