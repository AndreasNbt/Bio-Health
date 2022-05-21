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
    else if (amount < 1) {
        document.getElementById("amountAddedToCart" + id).value = 1
        document.getElementById("costAddedToCart" + id).innerHTML = price.toFixed(2).toString() + "€";
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

function clearSearchResults() {
    document.getElementById("products").innerHTML = "";
}