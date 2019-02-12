<?php


/**
 * Execute une requête de selection avec plusieurs résultats
 * une fonction pour ne pas répéter les requêtes non stop
 * 
 * parfois il y aura pas de $params, car parfois dans execute on ne met rien dans les parenthèses
 * il est optionnel
 * car c'est vide quand on ne remplace pas un ? par un truc
 * quand y a pas de ?, cad quand on on ajoute pas d'infos mais quand on récupère seulement des infos générales
 * alors on utilise la valeur par défaut = []
 * ce [] par défaut rend le paramètre optionnel
 * 
 * 
 * le mot clef array devant le $params l'oblige à être un tableau
 * 
 */

/*function queryAll($sql, array $params = [])
{
    // connexion
    require 'app/connexion.php';
    
    // Préparation la requête à exécuter
    $query = $pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
    
    
    // Retour des résultats de la requête
    return $query->fetchAll();
}*/



/**
 * Exécute une requête de sélection avec UN SEUL résultat
 * Là on récupère de la BDD uniquement un élément
 * 
 * Remarques :
 *  - le mot clé 'array' devant le paramètre $params oblige ce paramètre ) être un tableau 
 *  - le = [] attribut une valeur par défaut au paramètre $params et rend ce paramètre optionnel
 * 
 * @param string $sql : la requête SQL à exécuter
 * @param array $params : le tableau de valeurs qui sera passé en paramètre de la méthode execute de PDO
 * 
 * @return array : le résultat de la requête SQL
 */ 

/*function queryOne($sql, array $params = [])
{
  // connexion
    require 'app/connexion.php';
    
    // Préparation la requête à exécuter
    $query = $pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
    
    
    // Retour des résultats de la requête
    return $query->fetch();  
}*/

/**
 * Exécute une requête d'action
 * Là on envoie vers la BDD, que ce soit du UPDATE ou du INSERT INTO
 * 
 * Remarques :
 *  - le mot clé 'array' devant le paramètre $params oblige ce paramètre ) être un tableau 
 *  - le = [] attribut une valeur par défaut au paramètre $params et rend ce paramètre optionnel
 * 
 * @param string $sql : la requête SQL à exécuter
 * @param array $params : le tableau de valeurs qui sera passé en paramètre de la méthode execute de PDO
 * 
 * @return array : le résultat de la requête SQL
 */ 
/*function sendToBdd($sql, array $params = [])
{
    // Connexion à la BDD
    require 'app/connexion.php';
    
    // Préparation la requête à exécuter
    $query = $pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
}*/


/**
 * Exécute une requête d'action (insertion, mise à jour, suppression, etc)
 * 
 * Remarques :
 *  - le mot clé 'array' devant le paramètre $params oblige ce paramètre ) être un tableau 
 *  - le = [] attribut une valeur par défaut au paramètre $params et rend ce paramètre optionnel
 * 
 * @param string $sql : la requête SQL à exécuter
 * @param array $params : le tableau de valeurs qui sera passé en paramètre de la méthode execute de PDO
 * 
 * @return array : le résultat de la requête SQL
 */ 
 
/*function executeSql($sql, array $params = [])
{
    // Connexion à la BDD
    require 'app/connexion.php';
    
    // Préparation la requête à exécuter
    $query = $pdo->prepare($sql);
    
    // Exécution de la requête avec les paramètres éventuels
    $query->execute($params);
}*/






/**
 * vérifie la validité d'un paramètre dans la chaine de requête GET 
 * 
 * Retourne false si il y a un souci avec le paramètre
 * Sinon elle retourne true
 * 
*/

function checkParamUrl($param)
{
    // return fait que la fonction t'apporte son résultat
    return(
    
    // Si le paramètre postId n'existe pas dans la chaîne de requête
    array_key_exists($param, $_GET)
    
    // et si le paramètre existe mais n'a pas de valeur. isset = y a t-il une valeur (un chiffre)
    && isset($_GET[$param])
    
    // et bien si le paramètre n'est pas un entier
    && ctype_digit($_GET[$param])
    );
}