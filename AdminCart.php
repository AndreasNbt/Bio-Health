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
<body onload="UpdateDropdown('1');updateCosts();updateSubtotal(); updateTotal();" class="d-flex flex-column grey-background min-vh-100">


  <?php include "AdminNavbar.php"; ?>
  <br>

  <div id="products" class="container-fluid left-right-pad">
    <div class="container-fluid">
      <section id="form">
        <div class="row pt-4">
          <div class="col-6" style="padding-right: 5rem">
            <div class="d-flex" style="flex-direction: column">
              <h3>Billing address</h3>

              <label for="fname"><i class="fa fa-user-o"></i> Full name</label>
              <input readonly title="full name containing only english letters and spaces" required type="text" id="fname" name="firstname" value="John M. Doe" class="form-control">

              <label for="email"><i class="fa fa-envelope-o"></i> Email</label>
              <input readonly title="valid email address" required type="text" id="email" name="email" value="email@example.com" class="form-control">

              <label for="bil_adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input readonly title="street address without special symbols" required type="text" id="bil_adr" name="address" value="542 W. 15th Street" class="form-control">

              <label for="bil_city"><i class="fa fa-building-o"></i> City</label>
              <input readonly title="valid city name" required type="text" id="bil_city" name="city" value="New York" class="form-control">

              <div class="row">
                <div class="col-6 d-flex" style="flex-direction: column">
                  <label for="bil_state">State</label>
                  <input readonly title="valid state name (not necessarily US)" required type="text" id="bil_state" name="state" value="NY" class="form-control">
                </div>
                <div class="col-6 d-flex" style="flex-direction: column">
                  <label for="bil_zip">Zip code</label>
                  <input readonly title="valid zip code with 5 or 9 digits with or without a dash" required type="text" id="bil_zip" name="zip" value="10001" class="form-control">
                </div>
              </div>
            </div>
          </div>

          <div class="col-6" style="padding-left: 5rem">
            <h3>Payment</h3>

            <label for="fname">Accepted Cards</label>
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

            <label for="cname">Name on card</label>
            <input readonly title="valid card name" required type="text" id="cname" name="cardname" value="John More Doe" class="form-control">

            <label for="ccnum">Card number</label>
            <input readonly title="valid Visa, American Express, Master Card, Discover or Visa Master Card card number without dashes" required type="text" id="ccnum" name="cardnumber" value="1111-2222-3333-4444" class="form-control">

            <label for="expmonth">Expiration month</label>
            <input readonly title="a valid month name" required type="text" id="expmonth" name="expmonth" value="September" class="form-control">

            <div class="row">
              <div class="col-6 d-flex" style="flex-direction: column">
                <label for="expyear">Expiration year</label>
                <input readonly title="a valid year" required type="text" id="expyear" name="expyear" value="2022" class="form-control">
              </div>
              <div class="col-6 d-flex" style="flex-direction: column">
                <label for="cvv">CVV</label>
                <input readonly title="valid 3 or 4 digit CVV number" required type="text" id="cvv" name="cvv" value="123" class="form-control">
              </div>
            </div>

          </div>
        </div>

        <div class="d-flex pt-4" style="flex-direction: column">
          <h3>Shipping Address</h3>
          <div id="ship_det" class="row">
            <div class="col-4">
              <label for="ship_adr">Address</label>
              <input readonly title="street address without special symbols" type="text" id="ship_adr" name="address" value="542 W. 15th Street" class="form-control">
            </div>
            <div class="col-4">
              <label for="ship_city">City</label>
              <input readonly title="valid city name" type="text" id="ship_city" name="city" value="New York" class="form-control">
            </div>
            <div class="col-2">
              <label for="ship_state">State</label>
              <input readonly title="valid state name (not necessarily US)" type="text" id="ship_state" name="state" value="NY" class="form-control">
            </div>
            <div class="col-2">
              <label for="ship_zip">Zip code</label>
              <input readonly title="valid zip code with 5 or 9 digits with or without a dash" type="text" id="ship_zip" name="zip" value="10001" class="form-control">
            </div>
          </div>
        </div>
      </section>

      <section id="cart">
        <div class="row pt-4">
          <div class="col-8" style="padding-right: 5rem">

            <h3>Shopping cart</h3>
            <hr class="border-2 border-top border-primary mb-4">

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span>1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span>1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span>1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span>1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span>1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

            <div>
              <div class="d-flex justify-content-between align-items-center">
                <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name">
                <a href="AdminEditProduct.php">Product Name<br/>(<span id="stock1">1000</span> left in stock)</a>
                <input readonly type="text" class="form-control form-control-sm" style="width: 3rem" value="1"/>
                <div class="d-flex" style="width: 50px"><span>1.00</span>€</div>
              </div>
              <hr class="border-2 border-top border-primary mb-4">
            </div>

          </div>
          <div class="col-4" style="padding-left: 5rem">
            <h3>Pricing</h3>

            <hr class="border-2 border-top border-primary">
            <div class="d-flex justify-content-between align-items-center py-4">
              <p style="margin: 0">Subtotal:</p>
              <p style="margin: 0"><span id="subtotal">6.00</span>€</p>
            </div>
            <hr class="border-2 border-top border-primary">
            <div class="d-flex justify-content-between align-items-center py-4">
              <label for="shipping_type">Shipping:</label>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-4">
              <input readonly required type="text" id="shipping_type" name="shipping type" value="Standard - 5.00€ (7-14 days)" class="form-control">
            </div>
            <hr class="border-2 border-top border-primary">
            <div class="d-flex justify-content-between align-items-center py-4">
              <p style="margin: 0">Total:</p>
              <p style="margin: 0"><span id="total">11.00</span>€</p>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-4">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
              </svg>
              <p style="margin: 0">V.A.T. included in all prices</p>
            </div>
            <hr class="border-2 border-top border-primary">
            <div class="d-flex justify-content-center align-items-center py-4">
              <a href="AdminPendingOrders.php">
                <button type="button" id="orders_button" class="btn btn-outline-primary" style="padding: 10px 100px 10px 100px">Back to orders</button>
              </a>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php include "AdminFooter.php"; ?>


</body>
</html>