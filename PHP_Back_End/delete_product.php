<?php
if (isset($_GET['deleteID']) and isset($_GET['hidden_search_key'])) {
    $id = $_GET['deleteID'];
    $search_key = $_GET['hidden_search_key'];
    deleteProduct($id);
    header("Location: ../AdminSearch.php?search_key=$search_key");
    exit();
}

function deleteProduct($id) {
    include("db_connection.php");

    $sql = "DELETE FROM product WHERE `product`.`id` = $id";
    $res = $con->query($sql);
    mysqli_close($con);
    return $res;
}