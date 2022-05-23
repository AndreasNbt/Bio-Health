<?php
    if (isset($_GET['item_id']) and isset($_GET['amount'])) {
        include("db_connection.php");
        $item_id = $_GET['item_id'];
        $amount = $_GET['amount'];
        $sql = "SELECT id FROM `cartitem` WHERE id=$item_id;";
        if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
            $sql = "UPDATE `cartitem` SET amount=$amount WHERE id=$item_id;";
            $res = $con->query($sql);
        }
        mysqli_close($con);
    }
    else if (isset($_GET['item_id'])) {
        include("db_connection.php");
        $item_id = $_GET['item_id'];
        $sql = "SELECT id FROM `cartitem` WHERE id=$item_id;";
        if (mysqli_num_rows(mysqli_query($con,$sql)) > 0) {
            $sql = "DELETE FROM cartitem WHERE id=$item_id;";
            $res = $con->query($sql);
        }
        mysqli_close($con);
    }
    else {
        include("db_connection.php");
        $user_id = 2;
        $sql = "SELECT id, product_id, amount FROM `cartitem` WHERE user_id=".$a = $_SESSION['ID'].";";
        $res = $con->query($sql);
        mysqli_close($con);
        while ($item = mysqli_fetch_row($res)) {
            echoCartItem($item[0], $item[1], $item[2]);
        }
    }

    function echoCartItem($item_id, $product_id, $amount) {
        include("db_connection.php");

        $sql = "SELECT name, price, stock, image FROM `product` WHERE id=$product_id;";
        $res = $con->query($sql);
        $product = mysqli_fetch_row($res);
        $name = $product[0];
        $price = $product[1];
        $stock = $product[2];
        $img = $product[3];
        $linkToProductInfo = "UserProductInfo.php"."?productID=$product_id";
        mysqli_close($con);

        echo "<div id='item$item_id'>
                    <div class='row justify-content-between align-items-center'>
                        <div class='col-1'><img class='img-responsive rounded' src='$img' style='width: 100px;height: 100px' alt='Image of $name' onload='item_ids.push(\"$item_id\");'></div>
                        <div class='col-3'><a href='$linkToProductInfo'>$name<br/>(<span id='stock$item_id'>$stock</span> left in stock)</a></div>
                        <div class='col-1'><input type='number' id='amountAddedToCart$item_id' class='form-control form-control-sm' min='1' max='$stock' style='width: 5rem' value='$amount' onchange='updateAmount(\"$item_id\"); updateCost(document.getElementById(\"amountAddedToCart$item_id\").value, $price, $stock, $item_id); updateSubtotal(); updateTotal()'/></div>
                        <div class='col-1'><div class='d-flex' style='width: 50px'><span id='costAddedToCart$item_id'>$price</span>€</div></div>
                        <div class='col-1'> <button type='button' style='padding-right: 1.5rem;scale: 75%' class='btn-close float-end' onclick='removeFromCart(\"$item_id\");removeItem(\"$item_id\"); updateSubtotal(); updateTotal()'></button></div>   
                    </div>
                    <hr class='border-2 border-top border-primary mb-4'>
                </div>";
    }