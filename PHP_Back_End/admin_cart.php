<?php
include("PHP_Back_End/db_connection.php");
$order_id = $_GET['order_id'];
$sql = "SELECT id, product_id, amount FROM order_item WHERE order_id='$order_id';";
$res = $con->query($sql);


echo "<div class='col-8' style='padding-right: 5rem'>
          <h3>Shopping cart</h3>
          <hr class='border-2 border-top border-primary mb-4'>";

while ($item = mysqli_fetch_row($res)) {
    echocart_item($item[0], $item[1], $item[2]);
}

$sql = "SELECT total_cost, DATE_FORMAT(latest_delivery, '%e/%c/%Y'), datediff(latest_delivery, CURRENT_DATE) FROM `order` WHERE id='$order_id';";
$res = $con->query($sql);
$order = mysqli_fetch_row($res);
$total_cost =$order[0];
$latest_delivery = $order[1];
$days_left = $order[2];
mysqli_close($con);

echo "</div>
          <div class='col-4' style='padding-left: 5rem'>
                <h3>Pricing</h3>
    
                <hr class='border-2 border-top border-primary'>
                <div class='d-flex justify-content-between align-items-center py-4'>
                  <p style='margin: 0'>Delivery deadline:</p>
                  <p style='margin: 0'>$latest_delivery ({$days_left} days left)</p>
                </div>
                <hr class='border-2 border-top border-primary'>
                <div class='d-flex justify-content-between align-items-center py-4'>
                  <p style='margin: 0'>Total value:</p>
                  <p style='margin: 0'><span id='total'>$total_cost</span>€</p>
                </div>
                <div class='d-flex justify-content-between align-items-center pb-4'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'>
                    <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                    <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                  </svg>
                  <p style='margin: 0'>V.A.T. included in all values</p>
                </div>
                <hr class='border-2 border-top border-primary'>
                <div class='d-flex justify-content-center align-items-center py-4'>
                  <a href='AdminPendingOrders.php?order_row=latest_delivery&order_type=ASC'>
                    <button type='button' id='orders_button' class='btn btn-outline-primary' style='padding: 10px 100px 10px 100px'>Back to orders</button>
                  </a>
                </div>
          </div>";

function echocart_item($item_id, $product_id, $amount) {
    include("PHP_Back_End/db_connection.php");

    $sql = "SELECT name, price, stock, image FROM `product` WHERE id=$product_id;";
    $res = $con->query($sql);
    $product = mysqli_fetch_row($res);
    $name = $product[0];
    $price = $product[1];
    $stock = $product[2];
    $img = $product[3];
    $value = $amount * $price;
    $linkToEditProduct = "AdminEditProduct.php"."?productID=$product_id";
    mysqli_close($con);

    echo "<div'>
              <div class='row justify-content-between align-items-center'>
                  <div class='col-1'><img class='img-responsive rounded' src='$img' style='width: 100px;height: 100px' alt='Image of $name'></div>
                  <div class='col-2'><a href='$linkToEditProduct'>$name<br/>($stock left in stock)</a></div>
                  <div class='col-1'>Amount:&nbsp$amount</div>
                  <div class='col-2 text-center'>{$value}€</div>
              </div>
              <hr class='border-2 border-top border-primary mb-4'>";

    /*echo "<div>
              <div class='d-flex justify-content-between align-items-center'>
                <img class='img-responsive rounded' src='$img' style='width: 100px;height: 100px' alt='Image of $name'>
                <a href='$linkToEditProduct'>$name<br/>(<span>$stock</span> left in stock)</a>
                <div class='d-flex' style='width: 50px'>Amount: <span>$amount</span></div>
                <div class='d-flex' style='width: 50px'><span>$value</span>€</div>
              </div>
              <hr class='border-2 border-top border-primary mb-4'>
            </div>";*/
}