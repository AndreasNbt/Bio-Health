<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Cart - Bio & Health</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
  <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
  <link rel="stylesheet" href="CSS/navbar.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/admincartpage.css">
  <script src="JS/cartpage.js"></script>
</head>
<body class="d-flex flex-column grey-background min-vh-100">


  <?php include "Navbar.php"; ?>
  <br>

  <div id="products" class="container-fluid left-right-pad">
    <div class="container-fluid">
      <section id="form">

        <?php
            $full_name = "";
            $email = "";
            $phone_number = "";
            $billing_address = "";
            $billing_city = "";
            $billing_state = "";
            $billing_zip = "";
            $card_name = "";
            $card_number = "";
            $card_expiration_month = "";
            $card_expiration_year = "";
            $card_cvv = "";
            $shipping_address = "";
            $shipping_city = "";
            $shipping_state = "";
            $shipping_zip = "";

            if (isset($_GET['order_id'])) {
                include("PHP_Back_End/db_connection.php");
                $order_id = $_GET['order_id'];

                $sql = "SELECT name, email, phone_number, address, city, state, zip FROM billing_address WHERE order_id='$order_id'";
                $res = $con->query($sql);
                $billing = mysqli_fetch_row($res);
                $full_name = $billing[0];
                $email = $billing[1];
                $phone_number = $billing[2];
                $billing_address = $billing[3];
                $billing_city = $billing[4];
                $billing_state = $billing[5];
                $billing_zip = $billing[6];

                $sql = "SELECT name, number, exp_month, exp_year, cvv FROM payment_method WHERE order_id='$order_id'";
                $res = $con->query($sql);
                $payment_method = mysqli_fetch_row($res);
                $card_name = $payment_method[0];
                $card_number = $payment_method[1];
                $card_expiration_month = $payment_method[2];
                $card_expiration_year = $payment_method[3];
                $card_cvv = $payment_method[4];

                $sql = "SELECT address, city, state, zip FROM shipping_address WHERE order_id='$order_id'";
                $res = $con->query($sql);
                $shipping = mysqli_fetch_row($res);
                $shipping_address = $shipping[0];
                $shipping_city = $shipping[1];
                $shipping_state = $shipping[2];
                $shipping_zip = $shipping[3];

                mysqli_close($con);
            }
        ?>

        <div class="row pt-4">
          <div class="col-6" style="padding-right: 5rem">
            <div class="d-flex" style="flex-direction: column">
              <h3>Billing Address</h3>

              <label for="full_name"><i class="fa fa-user-o"></i> Full name</label>
              <?php echo "<input readonly title='full name containing only english letters and spaces' required type='text' id='full_name' value='$full_name' class='form-control'>" ?>

              <label for="email"><i class="fa fa-envelope-o"></i> Email</label>
              <?php echo "<input readonly title='valid email address' required type='text' id='email' value='$email' class='form-control'>" ?>

              <label for="phone_number"><i class="fa fa-mobile"></i> Phone number</label>
              <?php echo "<input readonly title='valid phone number' required type='text' id='phone_number' value='$phone_number' class='form-control'>" ?>

              <div class="row">
                  <div class="col-6 d-flex" style="flex-direction: column">
                      <label for="billing_address"><i class="fa fa-address-card-o"></i> Address</label>
                      <?php echo "<input readonly title='street address without special symbols' required type='text' id='billing_address' value='$billing_address' class='form-control'>" ?>
                  </div>
                  <div class="col-6 d-flex" style="flex-direction: column">
                      <label for="billing_city"><i class="fa fa-building-o"></i> City</label>
                      <?php echo "<input readonly title='valid city name' required type='text' id='billing_city' value='$billing_city' class='form-control'>" ?>
                  </div>
              </div>

              <div class="row">
                <div class="col-6 d-flex" style="flex-direction: column">
                  <label for="billing_state">State</label>
                  <?php echo "<input readonly title='valid state name (not necessarily US)' required type='text' id='billing_state' value='$billing_state' class='form-control'>" ?>
                </div>
                <div class="col-6 d-flex" style="flex-direction: column">
                  <label for="billing_zip">Zip code</label>
                  <?php echo "<input readonly title='valid zip code with 5 or 9 digits with or without a dash' required type='text' id='billing_zip' value='$billing_zip' class='form-control'>" ?>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6" style="padding-left: 5rem">
            <h3>Payment</h3>

            <label>Accepted Cards</label>
            <div class="icon-container">
              <a href="#">
                <i class="fa fa-cc-visa" style="color:navy;scale: 150%;padding-left: 8px;padding-right: 15px"></i>
              </a>
              <a href="#">
                <i class="fa fa-cc-amex" style="color:blue;scale: 150%;padding-right: 15px"></i>
              </a>
              <a href="#">
                <i class="fa fa-cc-mastercard" style="color:red;scale: 150%;padding-right: 15px"></i>
              </a>
              <a href="#">
                <i class="fa fa-cc-discover" style="color:orange;scale: 150%;padding-right: 15px"></i>
              </a>
            </div>

            <label for="card_name">Name on card</label>
            <?php echo "<input readonly title='valid card name' required type='text' id='card_name' value='$card_name' class='form-control'>" ?>

            <label for="card_number">Card number</label>
            <?php echo "<input readonly title='valid Visa, American Express, Master Card, Discover or Visa Master Card card number without dashes' required type='text' id='card_number' value='$card_number' class='form-control'>" ?>

            <label for="card_expiration_month">Expiration month</label>
            <?php echo "<input readonly title='a valid month name' required type='text' id='card_expiration_month' value='$card_expiration_month' class='form-control'>" ?>

            <div class="row">
              <div class="col-6 d-flex" style="flex-direction: column">
                <label for="card_expiration_year">Expiration year</label>
                <?php echo "<input readonly title='a valid year' required type='text' id='card_expiration_year' value='$card_expiration_year' class='form-control'>" ?>
              </div>
              <div class="col-6 d-flex" style="flex-direction: column">
                <label for="card_cvv">CVV</label>
                <?php echo "<input readonly title='valid 3 or 4 digit CVV number' required type='text' id='card_cvv' value='$card_cvv' class='form-control'>" ?>
              </div>
            </div>

          </div>
        </div>

        <div class="d-flex pt-4" style="flex-direction: column">
          <h3>Shipping Address</h3>
          <div class="row">
            <div class="col-4">
              <label for="shipping_address">Address</label>
              <?php echo "<input readonly title='street address without special symbols' type='text' id='shipping_address' value='$shipping_address' class='form-control'>" ?>
            </div>
            <div class="col-4">
              <label for="shipping_city">City</label>
              <?php echo "<input readonly title='valid city name' type='text' id='shipping_city' value='$shipping_city' class='form-control'>" ?>
            </div>
            <div class="col-2">
              <label for="shipping_state">State</label>
              <?php echo "<input readonly title='valid state name (not necessarily US)' type='text' id='shipping_state' value='$shipping_state' class='form-control'>" ?>
            </div>
            <div class="col-2">
              <label for="shipping_zip">Zip code</label>
              <?php echo "<input readonly title='valid zip code with 5 or 9 digits with or without a dash' type='text' id='shipping_zip' value='$shipping_zip' class='form-control'>" ?>
            </div>
          </div>
        </div>
      </section>

      <section id="cart">
        <div class="row pt-4">

          <?php
              include("PHP_Back_End/db_connection.php");
              $order_id = $_GET['order_id'];
              $sql = "SELECT id, product_id, amount FROM order_item WHERE order_id='$order_id';";
              $res = $con->query($sql);

              echo "<div class='col-8' style='padding-right: 5rem'>
              <h3>Shopping Cart</h3>
              <hr class='border-2 border-top border-primary mb-4'>";

              while ($item = mysqli_fetch_row($res)) {
                  echocart_item($item[0], $item[1], $item[2]);
              }

              $sql = "SELECT FORMAT(total_cost, 2), DATE_FORMAT(latest_delivery, '%e/%c/%Y'), datediff(latest_delivery, CURRENT_DATE) FROM `order` WHERE id='$order_id';";
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
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16' style='margin-right: 5px'>
                        <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                        <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                      </svg>
                      <p style='margin: 0'>Pending orders subtracted from stock</p>
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

                  $sql = "SELECT name, FORMAT(price, 2), stock, image FROM `product` WHERE id=$product_id;";
                  $res = $con->query($sql);
                  $product = mysqli_fetch_row($res);
                  $name = $product[0];
                  $initial_price = $product[1];
                  $stock = $product[2];
                  $img = $product[3];
                  $linkToEditProduct = "AdminEditProduct.php"."?productID=$product_id";

                  $price = $initial_price;
                  $res = $con->query("SELECT offer_percentage FROM offers WHERE product_id = $product_id");
                  if (mysqli_num_rows($res) > 0) {
                      $percentage = mysqli_fetch_row($res)[0];
                      $price = number_format($initial_price - ($percentage/100)*$initial_price,2);
                  }

                  mysqli_close($con);

                  $value = $amount * $price;
                  $value = number_format($value, 2);

                  echo "<div'>
                  <div class='row justify-content-between align-items-center'>
                      <div class='col-2'><img class='img-responsive rounded' src='$img' style='width: 100px;height: 100px' alt='Image of $name'></div>
                      <div class='col-3'><a href='$linkToEditProduct' style='word-break: break-word'>$name<br>($stock in stock)</a></div>
                      <div class='col-1'>Amount:&nbsp$amount</div>
                      <div class='col-2 text-center'>{$value}€</div>
                  </div>
                  <hr class='border-2 border-top border-primary mb-4'>";
              }
          ?>
        </div>
      </section>
    </div>
  </div>

  <?php 
    include "Footer.php";
  ?>


</body>
</html>