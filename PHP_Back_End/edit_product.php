<?php

    session_start();
    include "db_connection.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = $_REQUEST['productID'];

    echo $_POST['product_image'];
    

    $productName = validate($_POST['product_name']);
    $productPrice = validate($_POST['product_price']);
    $productStock = validate($_POST['product_stock']);
    $productDescription = validate($_POST['product_description']);
    $productCategory = validate($_POST['product_category']);
    if (isset($_POST['product_image']) && validate($_POST['product_image']) != "") {
        $productImage = "sources/images/" . validate($_POST['product_image']);
    }
    else {
        $productImage = $_REQUEST['productImage'];
    }

    $getCategoryId = "SELECT id
                      FROM category
                      WHERE name = '$productCategory'";

    $res = $con->query($getCategoryId);
    $productCategoryID = mysqli_fetch_row($res)[0];


    $sql = "UPDATE product
            SET name='$productName', price=$productPrice, stock=$productStock, description='$productDescription', image='$productImage', category_id=$productCategoryID
            WHERE id=$id";

    $res = $con->query($sql);
    if ($res) {
        header("Location: ../Search.php?search_key=");
    }
    else {
        header("Location: ../Search.php?search_key=?error=problem updating data");
    }
?>