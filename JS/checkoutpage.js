function updateShippingAddress() {
    console.log(document.getElementById("same_adr").checked)
    if (document.getElementById("same_adr").checked) {
        document.getElementById("ship_det").style.display = "none"
        document.getElementById("ship_adr").required = false
        document.getElementById("ship_city").required = false
        document.getElementById("ship_state").required = false
        document.getElementById("ship_zip").required = false
    }
    else {
        document.getElementById("ship_det").style.display = "flex"
        document.getElementById("ship_det").style.visibility = "none"
        document.getElementById("ship_adr").required = true
        document.getElementById("ship_city").required = true
        document.getElementById("ship_state").required = true
        document.getElementById("ship_zip").required = true
    }
}

function updateOrderModal() {
    document.getElementById("modal_fname").innerHTML = document.getElementById("fname").value
    document.getElementById("modal_email").innerHTML = document.getElementById("email").value
    document.getElementById("modal_address").innerHTML = document.getElementById("ship_adr").value
    document.getElementById("modal_city").innerHTML = document.getElementById("ship_city").value
    document.getElementById("modal_state").innerHTML = document.getElementById("ship_state").value
    document.getElementById("modal_zip").innerHTML = document.getElementById("ship_zip").value
}