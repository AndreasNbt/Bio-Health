<?php
session_start();
include("db_connection.php");

$order_id = strtoupper(uniqid());
$user_id = $_SESSION['ID'];
$order_date = date('Y-m-d');
$latest_delivery =

$sql = "SELECT cost, max_delivery_time FROM shipping WHERE user_id=$user_id";
$res = $con->query($sql);
$shipping = mysqli_fetch_row($res);
$shipping_cost = $shipping[0];
$shipping_max_delivery_time = $shipping[1];
$total_cost = $_POST['total_cost'];

$sql = "INSERT INTO `order` (id, user_id, order_date, latest_delivery, total_cost, completed) VALUES ('$order_id', $user_id, '$order_date', DATE_ADD('$order_date', INTERVAL $shipping_max_delivery_time DAY), $total_cost, 0);";
$res = $con->query($sql);

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$billing_address = $_POST['billing_address'];
$billing_city = $_POST['billing_city'];
$billing_state = $_POST['billing_state'];
$billing_zip = $_POST['billing_zip'];

$sql = "INSERT INTO billing_address (order_id, name, email, address, city, state, zip) VALUES ('$order_id', '$full_name', '$email', '$billing_address', '$billing_city', '$billing_state', '$billing_zip');";
$res = $con->query($sql);

$res = $con->query("SELECT Full_Name, City, Address, State, Zip_Code, Phone_Number
                    FROM user_info
                    WHERE User_ID = $user_id");

$row = mysqli_fetch_row($res);
if (!isset($row[0])) {
    $res = $con->query("UPDATE user_info 
                        SET Full_Name = '$full_name'
                        WHERE User_ID = $user_id");
}
if (!isset($row[1])) {
    $res = $con->query("UPDATE user_info 
                        SET City = '$billing_city'
                        WHERE User_ID = $user_id");
}
if (!isset($row[2])) {
    $res = $con->query("UPDATE user_info 
                        SET Address = '$billing_address'
                        WHERE User_ID = $user_id");
}
if (!isset($row[3])) {
    $res = $con->query("UPDATE user_info 
                        SET State = '$billing_state'
                        WHERE User_ID = $user_id");
}
if (!isset($row[4])) {
    $res = $con->query("UPDATE user_info 
                        SET Zip_Code = '$billing_zip'
                        WHERE User_ID = $user_id");
}
/*if (!isset($row[5])) {
    $res = $con->query("UPDATE user_info 
                        SET Phone_Number = '$billing_phone'
                        WHERE User_ID = $id");
}*/


$card_name = $_POST['card_name'];
$card_number = $_POST['card_number'];
$card_expiration_month = $_POST['card_expiration_month'];
$card_expiration_year = $_POST['card_expiration_year'];
$card_cvv = $_POST['card_cvv'];

$sql = "INSERT INTO payment_method (order_id, name, number, exp_month, exp_year, cvv) VALUES ('$order_id', '$card_name', '$card_number', '$card_expiration_month', $card_expiration_year, $card_cvv);";
$res = $con->query($sql);

$shipping_address = $billing_address;
if (!($_POST['shipping_address'] === "")) $shipping_address = $_POST['shipping_address'];
$shipping_city = $billing_city;
if (!($_POST['shipping_city'] === "")) $shipping_address = $_POST['shipping_city'];
$shipping_state = $billing_state;
if (!($_POST['shipping_state'] === "")) $shipping_address = $_POST['shipping_state'];
$shipping_zip = $billing_zip;
if (!($_POST['shipping_zip'] === "")) $shipping_zip = $_POST['shipping_zip'];

$sql = "INSERT INTO shipping_address (order_id, address, city, state, zip) VALUES ('$order_id', '$shipping_address', '$shipping_city', '$shipping_state', '$shipping_zip')";
$res = $con->query($sql);

$sql = "SELECT product_id, amount FROM cart_item WHERE user_id=$user_id";
$res = $con->query($sql);
while ($item = mysqli_fetch_row($res)) {
    $product_id = $item[0];
    $amount = $item[1];
    $sql = "INSERT INTO order_item (order_id, product_id, amount) VALUES ('$order_id', $product_id, $amount)";
    echo $sql;
    $con->query($sql);
}

$sql = "SELECT product_id, amount FROM cart_item WHERE user_id=$user_id";
$res = $con->query($sql);
while ($item = mysqli_fetch_row($res)) {
    $product_id = $item[0];
    $amount_bought = $item[1];
    $sql = "UPDATE product SET stock=stock-$amount_bought WHERE id=$product_id;";
    $con->query($sql);
}

$sql = "DELETE FROM cart_item WHERE user_id=$user_id";
$res = $con->query($sql);

mysqli_close($con);

header("Location: ../UserOrderCompletion.php?order_id=$order_id");