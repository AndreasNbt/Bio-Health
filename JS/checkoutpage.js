function updateOrderModal() {
    document.getElementById("modal_fname").innerHTML = document.getElementById("fname").value
    document.getElementById("modal_email").innerHTML = document.getElementById("email").value
    document.getElementById("modal_address").innerHTML = document.getElementById("ship_adr").value
    document.getElementById("modal_city").innerHTML = document.getElementById("ship_city").value
    document.getElementById("modal_state").innerHTML = document.getElementById("ship_state").value
    document.getElementById("modal_zip").innerHTML = document.getElementById("ship_zip").value
}