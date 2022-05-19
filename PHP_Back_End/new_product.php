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
        $sql = "SELECT * 
                FROM user_credentials
                WHERE (user_credentials.Email = '$email_or_username' 
                    OR user_credentials.Username = '$email_or_username')
                    AND user_credentials.Password = '$password' ";

        $res = $con->query($sql);

        if (mysqli_num_rows($res) === 1 ){

            $row = mysqli_fetch_row($res);

            $_SESSION['ID'] = $row[0];
            $_SESSION['Username'] = $row[2];
                
            $con -> close();
            header("Location: ../Index.php");
        }
        else {
            header("Location: ../UserSignIn.php?error=User not found");
            exit();
        }
    }
    
?>