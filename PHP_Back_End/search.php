<?php
    session_start();
    include("db_connection.php");
    include("search_functions.php");
    if (isset($_GET['key']) and isset($_GET['category']) and isset($_GET['order'])) {
        if (isset($_SESSION['role']) and $_SESSION['role'] === "Administrator") {
            updateSearchResults($_GET['key'], $_GET['category'], $_GET['order'], 'admin');
        }
        else if (!(isset($_SESSION['role'])) or $_SESSION['role'] === "Customer") {
            updateSearchResults($_GET['key'], $_GET['category'], $_GET['order'], 'user');
        }

    }
    else if (isset($_GET['product_id']) and isset($_GET['amount'])) {
        $product_id = $_GET['product_id'];
        $amount = $_GET['amount'];
        $user_id = $_SESSION['ID'];
        $sql = "SELECT id FROM cart_item WHERE product_id=$product_id AND user_id='$user_id';";
        $res = $con->query($sql);
        if (mysqli_num_rows($res) > 0) {
            $item_id = mysqli_fetch_row($res)[0];
            if ($amount == 0) {
                $sql = "DELETE FROM cart_item WHERE id=$item_id";
                $res = $con->query($sql);
            }
            else {
                $sql = "UPDATE cart_item SET amount=$amount WHERE id=$item_id;";
                $res = $con->query($sql);
            }
        }
        else if ($amount > 0) {
            $sql = "INSERT INTO cart_item (user_id, product_id, amount) VALUES ('$user_id', $product_id, $amount); ";
            $res = $con->query($sql);
        }
    }
    mysqli_close($con);
?>