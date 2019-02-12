//////////////////////// FONCTIONS DE CALLBACK //////////////////////
function onAjaxSearchCustomers(customers)
{
    var ul;
    var li;
   // création d'un élément ul
   ul = $('<ul>');
   
   
   //parcourir le tableau de clients nommé customers en paramètre
   customers.forEach(function(customer){
       
       // création d'un élément <li>
       li = $('<li>');
       
       // on remplit le contenu textuel de l'élément <li> avec le nom du client
       li.text(customer.customerName);
       
       
      // on insère l'élément <li> dans l'élément <ul>
      ul.append(li);
   });

    // insertion dans la section #results de la liste <ul>
    $('#results').html(ul);
}
