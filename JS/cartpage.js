let item_ids = []

function updateShippingType() {
    var shipping_select = document.getElementById("shipping_type");
    var cost = shipping_select.options[shipping_select.selectedIndex].value.split("|")[0];
    var max_delivery_time = shipping_select.options[shipping_select.selectedIndex].value.split("|")[1];
    $.post('PHP_Back_End/edit_cart.php', {cost:cost, max_delivery_time:max_delivery_time}, function(data){
        window.location = "UserCheckout.php";
    });
}

function updateAmount(item_id) {
    amount = document.getElementById('amountAddedToCart' + item_id).value;
    $.get('PHP_Back_End/edit_cart.php', {item_id:item_id, amount:amount}, function(data){
        return false;
    });
}

function removeFromCart(item_id) {
    $.get('PHP_Back_End/edit_cart.php', {item_id:item_id}, function(data){
        return false;
    });
}

function updateCosts() {
    for (let i = 0 ; i < item_ids.length ; i++) {
        updateCost(parseFloat(document.getElementById('amountAddedToCart' + item_ids[i].toString()).value), parseFloat(document.getElementById("costAddedToCart" + item_ids[i].toString()).innerHTML), parseFloat(document.getElementById("stock" + item_ids[i].toString()).innerHTML), item_ids[i])
    }
}

function updateTotal() {
    document.getElementById("total").innerHTML = (parseFloat(document.getElementById("subtotal").innerHTML) + parseFloat(document.getElementById("shipping_type").value)).toFixed(2)
}

function updateSubtotal() {
    if (item_ids.length === 0) {
        document.getElementById("empty_message").style.display = "inline"
        document.getElementById("checkout_button").disabled = true;
    }
    else if (document.getElementById("checkout_button").disabled === true) {
        document.getElementById("checkout_button").disabled = false;
    }
    let subtotal = 0
    for (let i = 0 ; i < item_ids.length ; i++) {
        subtotal += parseFloat(document.getElementById("costAddedToCart" + item_ids[i]).innerHTML)
    }
    document.getElementById("subtotal").innerHTML = subtotal.toFixed(2)
}

function removeItem(elementIndex) {
    var index = item_ids.indexOf(elementIndex);
    if (index !== -1) {
        item_ids.splice(index, 1);
    }
    document.getElementById("item" + elementIndex).remove()
}

function updateCost(amount, price, stock, element_index) {
    amount = parseFloat(amount)
    if (amount > stock || !Number.isInteger(amount) && (Math.ceil(amount) >= stock)) {
        document.getElementById("amountAddedToCart" + element_index).value = stock
        document.getElementById("costAddedToCart" + element_index).innerHTML = (stock * price).toFixed(2);
    }
    else if (amount < 1) {
        document.getElementById("amountAddedToCart" + element_index).value = 1
        document.getElementById("costAddedToCart" + element_index).innerHTML = price.toFixed(2);
    }
    else if (!Number.isInteger(amount) && (Math.ceil(amount) < stock)) {
        document.getElementById("amountAddedToCart" + element_index).value = Math.ceil(amount)
        document.getElementById("costAddedToCart" + element_index).innerHTML = (Math.ceil(amount) * price).toFixed(2);
    }
    else {
        document.getElementById("costAddedToCart" + element_index).innerHTML = (amount * price).toFixed(2);
    }
}