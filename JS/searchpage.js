function updateCost(amount, price, stock, element_index) {
    amount = parseFloat(amount)
    if (isNaN(amount)) {
        document.getElementById("costAddedToCart" + element_index).innerHTML = "amount must be an integer"
        document.getElementById("finishCartButton"  + element_index).disabled = true
    }
    else if (amount > stock || !Number.isInteger(amount) && (Math.ceil(amount) >= stock)) {
        document.getElementById("amountAddedToCart" + element_index).value = stock
        document.getElementById("costAddedToCart" + element_index).innerHTML = (stock * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + element_index).disabled = false
    }
    else if (amount < 1) {
        document.getElementById("amountAddedToCart" + element_index).value = 1
        document.getElementById("costAddedToCart" + element_index).innerHTML = price.toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + element_index).disabled = false
    }
    else if (!Number.isInteger(amount) && (Math.ceil(amount) < stock)) {
        document.getElementById("amountAddedToCart" + element_index).value = Math.ceil(amount)
        document.getElementById("costAddedToCart" + element_index).innerHTML = (Math.ceil(amount) * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + element_index).disabled = false
    }
    else {
        document.getElementById("costAddedToCart" + element_index).innerHTML = (amount * price).toFixed(2).toString() + "€";
        document.getElementById("finishCartButton" + element_index).disabled = false
    }
}