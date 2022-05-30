function removeFromFavorites(product_id) {
    $.get('PHP_Back_End/favorites.php', {action:'rem', product_id:product_id}, function(data){
        return false;
    });
    document.getElementById("product" + product_id).remove();
    if (document.getElementById("products").innerHTML.trim() === "") {
        document.getElementById("emptyMessage").style.display = "block";
    }

}

function addRemFav(product_id) {
    if (document.getElementById("heart_type").value === "empty") {
        $.get('../PHP_Back_End/favorites.php', {action:'add', product_id:product_id}, function(data){
            return false;
        });
        document.getElementById("heart_icon").innerHTML = "<i id='add-to-favourites' onclick='addRemFav(" + product_id + ")' class='fa-solid fa-heart fa-2x' data-product-id=" + product_id + "></i>" + "<input hidden id='heart_type' value='full'>"
    }
    else if (document.getElementById("heart_type").value === "full") {
        $.get('../PHP_Back_End/favorites.php', {action:'rem', product_id:product_id}, function(data){
            return false;
        });
        document.getElementById("heart_icon").innerHTML = "<i id='add-to-favourites' onclick='addRemFav(" + product_id + ")' class='fa-regular fa-heart fa-2x' data-product-id=" + product_id + "></i>" + "<input hidden id='heart_type' value='empty'>"
    }
}