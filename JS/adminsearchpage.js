function deleteProduct(id) {
    var key = $('#search_key').val().toString();
    var category = $('#category').val().toString();
    var order = $('#order').val().toString();
    $.get('PHP_Back_End/delete_product.php', {key:key, id:id, category:category, order:order}, function(data){
        $("#products").html(data);
    });
}

function updateURL(search_key, category_id, order_id){
    var searchUrl = "AdminSearch.php?search_key=" + search_key;
    var categoryUrl = (category_id > 0)?("&category=" + category_id):("");
    var orderUrl = (order_id > 0)?("&order=" + order_id):("");
    window.history.pushState("", "", searchUrl + categoryUrl + orderUrl);
}