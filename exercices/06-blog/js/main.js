

//////////////////////////////// DEFINITION DES FUNCTIONS ///////////////////////////////////

function onClickRemoveAuthor()
{
     var authorId;
     
     // dans un gestionnaire d'événement, le mot clef this représente l'élémént qui a déclenché l'événement
     // dans la fonction onClickRemoveAuthor, this représente le lien de suppression d'auteur qui a été cliqué
     // ici le data id est la balise créé en admin.phtml
     // ce data id vaut quelque chose grâce à l'utilisation d'une balise PHP <?= $author['Id']; ?>
     authorId = $(this).data('id');

    // Envoi d'une requête AJAX avec la méthode http POST vers le fichier delete_author.php en lui transmettant 
    // l'id de l'auteur à supprimer
    $.post(
        'delete_author.php',  // Url de la cible  
        {authorId: authorId}, // Données transmises au fichier php (id de l'auteur à supprimer)
        onAjaxRemoveAuthor    // Fonction de callback appelée par jQuery lors de la réception de la réponse http
    );
}


function onAjaxRemoveAuthor(authorId)
{
    console.log(' ID Auteur supprimé : ' + authorId);
    // Supprimer la ligne correspondant à l'auteur supprimé en BDD
    // CAD la balise TR dans le tableau
    // DONC comment supprimer une balise à l'aide JQUERY?
    // donc on va dans la foreach retoucher des trucs
    // il va falloir selectionner le tr. donc on lui donne un iD propre.
    // pour ce faire on copie colle la balise php <?= $author['Id']; ?> dans le tr
    $('#author-28' + authorId).remove();
    
}

//////////////////////////////// INSTRUCTIONS EXECUTEES AU CHARGEMENT DE LA PAGE ///////////////////////////////////

// AJAX via JQUERY 
$(function(){
    
    $('.remove-author').on('click', onClickRemoveAuthor);
});