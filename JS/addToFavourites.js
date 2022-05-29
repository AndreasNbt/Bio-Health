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