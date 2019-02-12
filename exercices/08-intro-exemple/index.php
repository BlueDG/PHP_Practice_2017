<?php

    // Inclusion des dépendances
    include 'Personne.php';
    
    $personne1 = new Personne();
    
    
    // en JS on ajoute un point pour la methode mais c'est une flèche en mode PHP
    $personne1->prenom = 'Alfred';
    
    
    // tentative d'attribuer une valeur à la propriété nom. => php fait ERROR et me dit non car private
    //$personne1->nom = 'Dupont';
    
    
    // utilisation de la méthode setNom créé dans la classe Personne
    // un méthode qui ne peut être utilisée qu'à Personne()
    $personne1->setNom('Dupont');
    
    
    // Appel de la méthode quelEstVotreNom() sur l'objet $personne1 et envoi du résultat au client
    echo $personne1->quelEstVotreNom();
    
    
    $personne1->setAge(28);
    echo$personne1->quelEstVotreÂge();
    

    // Appel de la méthode anniversaire() sur l'objet $personne1
    $personne1->anniversaire();
    
    // Appel de la méthode quelEstVotreAge() sur l'objet $personne1 et envoi du résultat au client
    echo $personne1->quelEstVotreAge();
    
    
    var_dump($personne1);