// ici sont les gestionnaires d'événements

function onKeyUpSearch()
{
    var search;
    // console.log('onKeyUpSearch');
    
    search = $('#search').val();
    // On pourait faire aussi : search = $(this).val();
    
    console.log(search);
    
    // Envoyer une requête AJAX (méthode http GET) côté serveur vers un fichier PHP qui fera la recherche en BDD
    
    $.getJSON(
        'search-customers.php',  // Url ciblée, le fichier vers lequel on envoie la requête http
        {data: search},          // Données transmises 
        onAjaxSearchCustomers    // Fonction de callback
    );
        
}