<?php

if (isset($_POST['deleteID'])) {
    $id = $_POST['deleteID'];
    deleteProduct($id);
}

function deleteProduct($id) {
    include("db_connection.php");

    $sql = "DELETE FROM product WHERE `product`.`id` = $id";
    $res = $con->query($sql);
    mysqli_close($con);
    return $res;
}