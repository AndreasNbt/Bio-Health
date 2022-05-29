
<?php

    session_start();
    include ("db_connection.php");


    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $categoryName = validate($_POST['category']);
    $categoryImage = "sources/images/category_icons/" . $_POST['category_image'];


    $sql = "INSERT INTO category(name, icon)
            VALUES ('$categoryName', '$categoryImage')";

    $con->query($sql);
    $con -> close();
    header("Location: ../AdminNewProduct.php");

?>