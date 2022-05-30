<?php
session_start();
if (isset($_GET['item_id']) and isset($_GET['amount'])) {
    include("db_connection.php");
    $item_id = $_GET['item_id'];
    $amount = $_GET['amount'];
    $sql = "SELECT id FROM cart_item WHERE id=$item_id;";
    if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
        $sql = "UPDATE cart_item SET amount=$amount WHERE id=$item_id;";
        $res = $con->query($sql);
    }
    mysqli_close($con);
}
else if (isset($_GET['item_id'])) {
    include("db_connection.php");
    $item_id = $_GET['item_id'];
    $sql = "SELECT id FROM `cart_item` WHERE id=$item_id;";
    if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
        $sql = "DELETE FROM cart_item WHERE id=$item_id;";
        $res = $con->query($sql);
    }
    mysqli_close($con);
}
else if (isset($_POST['cost']) and isset($_POST['max_delivery_time'])) {
    include("db_connection.php");
    $user_id = $_SESSION['ID'];
    $cost = $_POST['cost'];
    $max_delivery_time = $_POST['max_delivery_time'];
    $sql = "INSERT INTO shipping (user_id, cost, max_delivery_time) VALUES ('$user_id', $cost, $max_delivery_time) ON DUPLICATE KEY UPDATE cost=$cost, max_delivery_time=$max_delivery_time;";
    $res = $con->query($sql);
    mysqli_close($con);
}
