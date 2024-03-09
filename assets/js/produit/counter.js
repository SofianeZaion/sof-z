
//$('.counter-plus').click(function (e) {
    // let qty = $(e.currentTarget).siblings('#qty');
    //let qtyValue = parseInt(qty.val()) + 1
    //if (qtyValue >= 99) {
  //      qtyValue = 99
    //}
    //qty.val(qtyValue)
//});
//$('.counter-moins').click(function (e) {
  //  let qty = $(e.currentTarget).siblings('#qty');
    //let qtyValue = parseInt(qty.val()) - 1
    //if (qtyValue < 0) {
      //  qtyValue = 0
    //}
    //qty.val(qtyValue)
//});
//


// Gestion de l'incrémentation de la quantité
$('.counter-plus').click(function (e) {
    // Récupération de l'élément "qty" associé au bouton cliqué
    let qty = $(e.currentTarget).siblings('#qty');
    
    // Récupération de la valeur actuelle de la quantité et ajout de 1
    let qtyValue = parseInt(qty.val()) + 1;
    
    // Vérification si la nouvelle quantité dépasse la limite de 99
    if (qtyValue >= 99) {
        qtyValue = 99; // Limite la quantité à 99
    }
    
    // Mise à jour de la valeur de la quantité dans l'élément "qty"
    qty.val(qtyValue);
});

// Gestion de la décrémentation de la quantité
$('.counter-moins').click(function (e) {
    // Récupération de l'élément "qty" associé au bouton cliqué
    let qty = $(e.currentTarget).siblings('#qty');
    
    // Récupération de la valeur actuelle de la quantité et soustraction de 1
    let qtyValue = parseInt(qty.val()) - 1;
    
    // Vérification si la nouvelle quantité est inférieure à 0
    if (qtyValue < 0) {
        qtyValue = 0; // Limite la quantité à 0
    }
    
    // Mise à jour de la valeur de la quantité dans l'élément "qty"
    qty.val(qtyValue);
});