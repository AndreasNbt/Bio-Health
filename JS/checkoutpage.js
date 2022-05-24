function updateShippingAddress() {
    if (document.getElementById("same_address").checked) {
        document.getElementById("shipping_details").style.display = "none"
        document.getElementById("shipping_address").value = "";
        document.getElementById("shipping_city").value = "";
        document.getElementById("shipping_state").value = "";
        document.getElementById("shipping_zip").value = "";
        document.getElementById("shipping_address").required = false
        document.getElementById("shipping_city").required = false
        document.getElementById("shipping_state").required = false
        document.getElementById("shipping_zip").required = false
    }
    else {
        document.getElementById("shipping_details").style.display = "flex"
        document.getElementById("shipping_details").style.visibility = "none"
        document.getElementById("shipping_address").required = true
        document.getElementById("shipping_city").required = true
        document.getElementById("shipping_state").required = true
        document.getElementById("shipping_zip").required = true
    }
}