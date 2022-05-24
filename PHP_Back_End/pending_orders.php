<?php

include("db_connection.php");

if (isset($_GET['order_id'])) {
    $sql = "SELECT * FROM `order` WHERE id=".$_GET['order_id']." AND completed=false";
    $res = $con->query($sql);
    if (mysqli_num_rows($res) > 0) {
        $sql = "UPDATE `order` SET completed=true WHERE id=".$_GET['order_id'].";";
        $res = $con->query($sql);
    }
    mysqli_close($con);
}
else if (isset($_GET['order_row']) and isset($_GET['order_type'])) {
    updateOrders($_GET['order_row'], $_GET['order_type']);
}
else {
    updateOrders("latest_delivery", "ASC");
}

function updateOrders($order_row, $order_type) {
    include("db_connection.php");

    $sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='biohealth' AND `TABLE_NAME`='order';";
    $res = $con->query($sql);

    $order_column_names = array();
    while ($order_column_name = mysqli_fetch_row($res)) {
        $order_column_names[] = $order_column_name[0];
    }

    $sql_order_row = "";
    $sql_order_type = "";
    if (in_array($order_row, $order_column_names) and !($order_row === "completed")) {
        $sql_order_row = " ORDER BY $order_row";
        if ($order_type === "ASC" or $order_type == "DESC") {
            $sql_order_type = " $order_type";
        }
    }

    $sql = "SELECT id FROM `order` WHERE completed=false".$sql_order_row.$sql_order_type.";";
    $res = $con->query($sql);
    mysqli_close($con);

    while ($order = mysqli_fetch_row($res)) {
        echoOrder($order[0]);
    }
}

function echoOrder($order_id) {

    include("db_connection.php");

    $sql = "SELECT user_id,  DATE_FORMAT(order_date, '%e/%c/%Y'), DATE_FORMAT(latest_delivery, '%e/%c/%Y'), total_cost FROM `order` WHERE id='$order_id';";
    $res = $con->query($sql);
    if (mysqli_num_rows($res) > 0) {
        $order = mysqli_fetch_row($res);
        $user_id = $order[0];
        $order_date = $order[1];
        $latest_delivery = $order[2];
        $total_cost = $order[3];

        $linkToOrderDetails = "AdminCart.php?order_id=".$order_id;

        mysqli_close($con);

        echo "<tr id='order$order_id'>
                    <td style='vertical-align: middle'>$order_id</td>
                    <td style='vertical-align: middle'>$user_id</td>
                    <td style='vertical-align: middle'>$order_date</td>
                    <td style='vertical-align: middle'>$latest_delivery</td>
                    <td style='vertical-align: middle'>{$total_cost}€</td>
                    <td style='vertical-align: middle'><a href='$linkToOrderDetails'><button type='button' class='btn btn-outline-primary'>Details</button></a></td>
                    <td style='vertical-align: middle'><button type='button' class='btn btn-outline-primary' onclick='completeOrder(\"$order_id\")'>Complete</button></td>
                </tr>";
    }
}