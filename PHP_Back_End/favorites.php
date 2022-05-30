<?php
session_start();
if (isset($_GET['product_id']) and isset($_SESSION['ID']) and isset($_SESSION['role']) and $_SESSION['role'] === 'Customer') {
    include "db_connection.php";

    $user_id = $_SESSION['ID'];
    $product_id = $_GET['product_id'];

    $sql = "DELETE FROM user_favourites where user_id=$user_id AND product_id=$product_id";
    $con->query($sql);
    mysqli_close($con);
}
