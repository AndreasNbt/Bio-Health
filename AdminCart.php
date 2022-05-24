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
  <script src="JS/navbar.js"></script>
</head>
<body onload="UpdateDropdown('1');" class="d-flex flex-column grey-background min-vh-100">


  <?php include "Navbar.php"; ?>
  <br>

  <div id="products" class="container-fluid left-right-pad">
    <div class="container-fluid">
      <section id="form">

        <?php
            $full_name = "";
            $email = "";
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

                $sql = "SELECT name, email, address, city, state, zip FROM billing_address WHERE order_id='$order_id'";
                $res = $con->query($sql);
                $billing = mysqli_fetch_row($res);
                $full_name = $billing[0];
                $email = $billing[1];
                $billing_address = $billing[2];
                $billing_city = $billing[3];
                $billing_state = $billing[4];
                $billing_zip = $billing[5];

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
              <h3>Billing address</h3>

              <label for="full_name"><i class="fa fa-user-o"></i> Full name</label>
              <?php echo "<input readonly title='full name containing only english letters and spaces' required type='text' id='full_name' value='$full_name' class='form-control'>" ?>

              <label for="email"><i class="fa fa-envelope-o"></i> Email</label>
              <?php echo "<input readonly title='valid email address' required type='text' id='email' value='$email' class='form-control'>" ?>

              <label for="billing_address"><i class="fa fa-address-card-o"></i> Address</label>
              <?php echo "<input readonly title='street address without special symbols' required type='text' id='billing_address' value='$billing_address' class='form-control'>" ?>

              <label for="billing_city"><i class="fa fa-building-o"></i> City</label>
              <?php echo "<input readonly title='valid city name' required type='text' id='billing_city' value='$billing_city' class='form-control'>" ?>

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

          <?php include "PHP_Back_End/admin_cart.php" ?>
        </div>
      </section>
    </div>
  </div>

  <?php 
    include "Footer.php";
  ?>


</body>
</html>