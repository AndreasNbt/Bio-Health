function deleteOrder(orderIndex) {
    document.getElementById("order" + orderIndex).remove()
}

function completeOrder(order_id) {
    $.get('PHP_Back_End/pending_orders.php', {order_id:order_id}, function(data){
        return false;
    });
    document.getElementById("order" + order_id).remove()
}

function updateOrders(order_row) {
    var order_type = document.getElementById(order_row).value;
    if (order_type === "ASC") {
        document.getElementById(order_row + "_sort_icon").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\" style=\"width: 12px; vertical-align: bottom; cursor: pointer\">" +
            "<!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->" +
            "<path d=\"M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224z\"/></svg>";
        document.getElementById(order_row).value = "DESC";
    }
    else if (order_type === "DESC") {
        document.getElementById(order_row + "_sort_icon").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\" style=\"width: 12px; vertical-align: top; cursor: pointer\">" +
            "<!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->" +
            "<path d=\"M311.9 335.1l-132.4 136.8C174.1 477.3 167.1 480 160 480c-7.055 0-14.12-2.702-19.47-8.109l-132.4-136.8C-9.229 317.8 3.055 288 27.66 288h264.7C316.9 288 329.2 317.8 311.9 335.1z\"/></svg>"
        document.getElementById(order_row).value = "ASC";
    }
    $.get('PHP_Back_End/pending_orders.php', {order_row:order_row, order_type:order_type}, function(data){
        $("#orders").html(data);
    });
    updateURL(order_row, order_type);
}

function updateURL(order_row, order_type){
    var ordersUrl = "AdminPendingOrders.php";
    var orderRowUrl = "?order_row=" + order_row;
    var orderTypeUrl = "&order_type=" + order_type;
    window.history.pushState("", "", ordersUrl + orderRowUrl + orderTypeUrl);
}