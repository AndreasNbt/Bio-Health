function deleteProduct(id) {
    var key = $('#search_key').val().toString();
    var category = $('#category').val().toString();
    var order = $('#order').val().toString();
    $.get('PHP_Back_End/delete_product.php', {key:key, id:id, category:category, order:order}, function(data){
        $("#products").html(data);
    });
}