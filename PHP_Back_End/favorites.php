<?php
session_start();
if (isset($_GET['action']) and isset($_GET['product_id']) and isset($_SESSION['ID'])) {
    include("db_connection.php");
    $user_id = $_SESSION['ID'];
    $product_id = $_GET['product_id'];
    if ($_GET['action'] === "add") {
        $sql = "INSERT INTO user_favourites(user_id, product_id) VALUES ('$user_id', $product_id);";
        $res = $con->query($sql);
        mysqli_close($con);
    }
    else if ($_GET['action'] === "rem") {
        $sql = "DELETE FROM user_favourites where user_id='$user_id' AND product_id=$product_id";
        $con->query($sql);
        mysqli_close($con);
    }
}

