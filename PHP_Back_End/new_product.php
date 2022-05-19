<?php

    session_start();
    include ("db_connection.php");


    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $productName = validate($_POST['product_name']);
    $productDescription = validate($_POST['product_description']);
    $productCategory = validate($_POST['product_category']);
    $productPrice = validate($_POST['product_price']);
    $productStock = validate($_POST['product_stock']);
    $productImage = validate($_POST['product_image']);

    if (empty($productName)) {
        header("Location: ../AdminNewProduct.php?error=Product name is required");
         exit();
    }
    else if (empty($productCategory)) {
        header("Location: ../AdminNewProduct.php?error=Category is required");
        exit();
    }
    else {
        $getCategoryId = "SELECT id
                          FROM category
                          WHERE name = '$productCategory'";

        $res = $con->query($getCategoryId);
        
        $productCategoryID = mysqli_fetch_row($res);
        print_r($productCategoryID);

        $sql = "INSERT INTO product(name, description, price, stock, image, category_id)
                VALUES ('$productName', '$productDescription', $productPrice, $productStock, '$productImage', $productCategoryID[0])";

        $con->query($sql);
        $con -> close();
        header("Location: ../AdminIndex.php");
    }
?>