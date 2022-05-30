function removeFromFavorites(product_id) {
    $.get('PHP_Back_End/favorites.php', {product_id:product_id}, function(data){
        return false;
    });
    document.getElementById("product" + product_id).remove();
}

$(function(){
    'use strict'

    $('#add-to-favourites').click( function(ev ){
        ev.preventDefault();
        let product_id = $( this ).attr('data-product-id');

        $.ajax({
            url: "http://localhost/UserProductInfo.php?productID="+ product_id,
            type: 'POST',
            data: {
                action: 'add_to_favourites',
            }
            
        }).done(function(){
            alert("ok2");
        });
    })

});