let items = []

function updateCosts() {
    for (let i = 0 ; i < items.length ; i++) {
        let index = items[i].charAt(items[i].length - 1)
        updateCost(parseFloat(document.getElementById('amountAddedToCart' + index.toString()).value), parseFloat(document.getElementById("costAddedToCart" + index.toString()).innerHTML), parseFloat(document.getElementById("stock" + index.toString()).innerHTML), index)
    }
}

function updateTotal() {
    document.getElementById("total").innerHTML = (parseFloat(document.getElementById("subtotal").innerHTML) + parseFloat(document.getElementById("shipping_type").value)).toFixed(2)
}

function updateSubtotal() {
    if (items.length === 0) {
        document.getElementById("empty_message").style.display = "inline"
        document.getElementById("checkout_button").disabled = true;
    }
    else if (document.getElementById("checkout_button").disabled === true) {
        document.getElementById("checkout_button").disabled = false;
    }
    let subtotal = 0
    for (let i = 0 ; i < items.length ; i++) {
        subtotal += parseFloat(document.getElementById(items[i]).innerHTML)
    }
    document.getElementById("subtotal").innerHTML = subtotal.toFixed(2)
}

function removeItem(elementIndex) {
    let i = items.indexOf("costAddedToCart" + elementIndex)
    items.splice(i, 1)
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
        console.log("costAddedToCart" + element_index)
        document.getElementById("costAddedToCart" + element_index).innerHTML = (amount * price).toFixed(2);
    }
}