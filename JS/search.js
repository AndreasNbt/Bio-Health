var previous_amount;
var previous_cost;

function saveValues(product_id) {
    previous_amount = document.getElementById("amountAddedToCart" + product_id).value;
    previous_cost = document.getElementById("costAddedToCart" + product_id).innerHTML;
}

function restoreValues(product_id) {
    document.getElementById("amountAddedToCart" + product_id).value = previous_amount;
    document.getElementById("costAddedToCart" + product_id).innerHTML = previous_cost;
}

function addToCart(product_id) {
    var amount = document.getElementById("amountAddedToCart" + product_id).value;
    $.get('PHP_Back_End/search.php', {product_id:product_id, amount:amount}, function(data){
        return false;
    });
}

function updateCost(id) {
    amount = parseFloat(document.getElementById("amountAddedToCart" + id).value);
    price = parseFloat(document.getElementById("price" + id).innerHTML);
    stock = parseInt(document.getElementById("stock" + id).innerHTML);
    if (isNaN(amount)) {
        document.getElementById("costAddedToCart" + id).innerHTML = "amount must be an integer";
        document.getElementById("finishCartButton"  + id).disabled = true
    }
    else if (amount > stock || !Number.isInteger(amount) && (Math.ceil(amount) >= stock)) {
        document.getElementById("amountAddedToCart" + id).value = stock
        document.getElementById("costAddedToCart" + id).innerHTML = (stock * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + id).disabled = false
    }
    else if (amount < 0) {
        document.getElementById("amountAddedToCart" + id).value = 0
        document.getElementById("costAddedToCart" + id).innerHTML = "0.00€";
        document.getElementById("finishCartButton" + id).disabled = false
    }
    else if (!Number.isInteger(amount) && (Math.ceil(amount) < stock)) {
        document.getElementById("amountAddedToCart" + id).value = Math.ceil(amount)
        document.getElementById("costAddedToCart" + id).innerHTML = (Math.ceil(amount) * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + id).disabled = false
    }
    else {
        document.getElementById("costAddedToCart" + id).innerHTML = (amount * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + id).disabled = false
    }
}

function updateShownKey() {
    document.getElementById('shown_key').innerHTML = document.getElementById('search_key').value;
}

function updateURL(search_key, category_id, order_id){
    var searchUrl = "Search.php?search_key=" + search_key;
    var categoryUrl = (category_id > 0)?("&category=" + category_id):("");
    var orderUrl = (order_id > 0)?("&order=" + order_id):("");
    window.history.pushState("", "", searchUrl + categoryUrl + orderUrl);
}

function deleteProduct(id) {
    var key = $('#search_key').val().toString();
    var category = $('#category').val().toString();
    var order = $('#order').val().toString();
    $.get('PHP_Back_End/delete_product.php', {key:key, id:id, category:category, order:order}, function(data){
        $("#products").html(data);
    });
}