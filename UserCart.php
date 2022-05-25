<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Bio & Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/cartpage.css">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <script src="JS/cartpage.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body onload="updateCosts();updateSubtotal();updateTotal();" class="d-flex flex-column grey-background min-vh-100">

    <?php include "Navbar.php"; ?>
    <br>

<div id="products" class="container-fluid left-right-pad">
    <div class="container-fluid">
        <div class="row pt-4">
            <?php
            if (!isset($_SESSION['ID'])) {
                echoBackMessage("Please sign in or sign up to use your cart", "");
            }
            else {
                include("PHP_Back_End/db_connection.php");
                $sql = "SELECT id, product_id, amount FROM `cart_item` WHERE user_id=".$_SESSION['ID'].";";
                $res = $con->query($sql);
                mysqli_close($con);

                echo "<div class='col-8' style='padding-right: 100px'>
                    <h4 class='text-center pt-2' style='font-weight: bold'>Shopping cart</h4>
                    <hr class='border-2 border-top border-primary mb-4'>";

                while ($item = mysqli_fetch_row($res)) {
                    echocart_item($item[0], $item[1], $item[2]);
                }

                echoBackMessage("Looks like your cart is empty", "display: none");

                echo "</div>
                  <div class='col-4' style='padding-left: 100px;padding-top: 6%'>
                    <h4 class='text-center pt-2' style='font-weight: bold'>Pricing</h4>
    
                    <hr class='border-2 border-top border-primary'>
                    <div class='d-flex justify-content-between align-items-center py-4'>
                        <p style='margin: 0'>Subtotal:</p>
                        <p style='margin: 0'><span id='subtotal'></span>€</p>
                    </div>
                    <hr class='border-2 border-top border-primary'>
                    <div class='d-flex justify-content-between align-items-center py-4'>
                        <p style='margin: 0'>Shipping:</p>
                    </div>
                    <div class='d-flex justify-content-between align-items-center pb-4'>
                        <select class='form-select' id='shipping_type' onchange='updateTotal()'>
                            <option value='5.00|14'>Standard - 5.00€ (7-14 days)</option>
                            <option value='15.00|5'>Express - 15.00€ (3-5 days)</option>
                        </select>
                    </div>
                    <hr class='border-2 border-top border-primary'>
                    <div class='d-flex justify-content-between align-items-center py-4'>
                        <p style='margin: 0'>Total:</p>
                        <p style='margin: 0'><span id='total'></span>€</p>
                    </div>
                    <div class='d-flex justify-content-between align-items-center pb-4'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'>
                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                            <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                        </svg>
                        <p style='margin: 0'>V.A.T. included in all prices</p>
                    </div>
                    <hr class='border-2 border-top border-primary'>
                    <div class='d-flex justify-content-center align-items-center py-4'>
                        <button type='button' id='checkout_button' class='btn btn-outline-primary' style='padding: 10px 100px 10px 100px' onclick='updateShippingType()'>Proceed to checkout</button>
                    </div>
                  </div>";
            }

            function echocart_item($item_id, $product_id, $amount) {
                include("PHP_Back_End/db_connection.php");

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
              <div class='col-1'><img class='img-responsive rounded' src='$img' style='width: 100px;height: 100px' alt='Image of $name'></div>
              <div class='col-3'><a href='$linkToProductInfo'>$name<br/>(<span id='stock$item_id'>$stock</span> left in stock)</a></div>
              <div class='col-1'><input type='number' id='amountAddedToCart$item_id' class='form-control form-control-sm' min='1' max='$stock' style='width: 5rem' value='$amount' onchange='updateAmount(\"$item_id\"); updateCost(document.getElementById(\"amountAddedToCart$item_id\").value, $price, $stock, $item_id); updateSubtotal(); updateTotal()'/></div>
              <div class='col-1'><div class='d-flex' style='width: 50px'><span id='costAddedToCart$item_id'>$price</span>€</div></div>
                  <div class='col-1'> <button type='button' style='padding-right: 1.5rem;scale: 75%' class='btn-close float-end' onclick='removeFromCart(\"$item_id\");removeItem(\"$item_id\"); updateSubtotal(); updateTotal()'></button></div>   
              </div>
              <hr class='border-2 border-top border-primary mb-4'>
              <script>console.log(\"pushed\");item_ids.push(\"$item_id\");</script>
          </div>";
            }

            function echoBackMessage($message, $style) {
                echo "<div id='empty_message' style='$style'>
                        <div class='d-flex justify-content-center align-items-center'>
                            <p>$message</p>
                        </div>
                        <div class='d-flex justify-content-center align-items-center'>
                            <a href='Index.php'>
                                <button type='button' class='btn btn-outline-primary'>Back to shop</button>
                            </a>
                        </div>
                        <hr class='border-2 border-top border-primary my-4'>
                    </div>";
            }
            ?>
        </div>
    </div>
</div>

<?php 
    include "Footer.php";
?>

</body>
</html>