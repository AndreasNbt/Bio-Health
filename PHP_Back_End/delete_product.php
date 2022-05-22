<?php
include "search_functions.php";
if (isset($_GET['key']) and isset($_GET['id']) and isset($_GET['category']) and isset($_GET['order'])) {
    deleteProduct($_GET['id']);
    updateSearchResults($_GET['key'], $_GET['category'], $_GET['order'], 'admin');
}

function deleteProduct($id) {
    include("db_connection.php");
    $sql = "DELETE FROM product WHERE `product`.`id` = $id";
    $res = $con->query($sql);
    mysqli_close($con);
    return $res;
}
?>