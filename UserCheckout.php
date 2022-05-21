<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Bio & Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="htxxtps://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/checkoutpage.css">
    <script src="JS/checkoutpage.js"></script>
    <script src="JS/navbar.js"></script>
</head>
</head>
<body class="d-flex flex-column min-vh-100 grey-background" onload="UpdateDropdown(localStorage.getItem('signed_in_status'));updateShippingAddress()">
   
    <?php include "UserNavbar.php"; ?>
    <br>

    <div id="form" class="container-fluid left-right-pad">
        <form method="post" action="UserOrderCompletion.php">
            <div class="row" style="padding: 2rem 20% 0 20%;">
                <div class="col-6">
                    <div class="d-flex" style="flex-direction: column">
                        <h3>Billing address</h3>

                        <label for="fname"><i class="fa fa-user-o"></i> Full name</label>
                        <input pattern="[a-zA-Z ]{1,}" title="full name containing only english letters and spaces" required type="text" id="fname" name="firstname" placeholder="John M. Doe" class="form-control">

                        <label for="email"><i class="fa fa-envelope-o"></i> Email</label>
                        <input pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" title="valid email address" required type="text" id="email" name="email" placeholder="email@example.com" class="form-control">

                        <label for="bil_adr"><i class="fa fa-address-card-o"></i> Address</label>
                        <input pattern="[A-Za-z0-9'\.\-\s\,]" title="street address without special symbols" required type="text" id="bil_adr" name="address" placeholder="542 W. 15th Street" class="form-control">

                        <label for="bil_city"><i class="fa fa-building-o"></i> City</label>
                        <input pattern="^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$" title="valid city name" required type="text" id="bil_city" name="city" placeholder="New York" class="form-control">

                        <div class="row">
                            <div class="col-6 d-flex" style="flex-direction: column">
                                <label for="bil_state">State</label>
                                <input pattern="^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$" title="valid state name (not necessarily US)" required type="text" id="bil_state" name="state" placeholder="NY" class="form-control">
                            </div>
                            <div class="col-6 d-flex" style="flex-direction: column">
                                <label for="bil_zip">Zip code</label>
                                <input pattern="(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)" title="valid zip code with 5 or 9 digits with or without a dash" required type="text" id="bil_zip" name="zip" placeholder="10001" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6">
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
                    <input pattern="^((?:[A-Za-z-'.]+ ?){1,5})$" title="valid card name" required type="text" id="cname" name="cardname" placeholder="John More Doe" class="form-control">

                    <label for="ccnum">Card number</label>
                    <input pattern="(^4[0-9]{12}(?:[0-9]{3})?$)|(^3[47][0-9]{13}$)|(^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$)|(^65[4-9][0-9]{13}|64[4-9][0-9]{13}|6011[0-9]{12}|(622(?:12[6-9]|1[3-9][0-9]|[2-8][0-9][0-9]|9[01][0-9]|92[0-5])[0-9]{10})$)|(^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$)"
                           title="valid Visa, American Express, Master Card, Discover or Visa Master Card card number without dashes" required type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" class="form-control">

                    <label for="expmonth">Expiration month</label>
                    <input pattern="([jJ][aA][nN][uU][aA][rR][yY])|([fF][eE][bB][rR][uU][aA][rR][yY])|([mM][aA][rR][cC][hH])|([aA][pP][rR][iI][lL])|([mM][aA][yY])|([jJ][uU][nN][eE])|([jJ][uU][lL][yY])|([aA][uU][gG][uU][sS][tT])|([sS][eE][pP][tT][eE][mM][bB][eE][rR])|([oO][cC][tT][oO][bB][eE][rR])|([nN][oO][vV][eE][mM][bB][eE][rR])|([dD][eE][cC][eE][mM][bB][eE][rR])"
                           title="a valid month name" required type="text" id="expmonth" name="expmonth" placeholder="September" class="form-control">

                    <div class="row">
                        <div class="col-6 d-flex" style="flex-direction: column">
                            <label for="expyear">Expiration year</label>
                            <input pattern="^[1-9]\d{3,}$" title="a valid year" required type="text" id="expyear" name="expyear" placeholder="2022" class="form-control">
                        </div>
                        <div class="col-6 d-flex" style="flex-direction: column">
                            <label for="cvv">CVV</label>
                            <input pattern="^[0-9]{3,4}$" title="valid 3 or 4 digit CVV number" required type="text" id="cvv" name="cvv" placeholder="123" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
            <div class="d-flex" style="padding: 0 20% 0 20%;flex-direction: column">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Shipping Address</h3>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="same_adr" checked onclick="updateShippingAddress()">
                        <label class="form-check-label">Same shipping address as billing</label>
                    </div>
                </div>
                <div id="ship_det" class="row" style="display: none">
                    <div class="col-4">
                        <label for="ship_adr">Address</label>
                        <input pattern="[A-Za-z0-9'\.\-\s\,]" title="street address without special symbols" type="text" id="ship_adr" name="address" placeholder="542 W. 15th Street" class="form-control">
                    </div>
                    <div class="col-4">
                        <label for="ship_city">City</label>
                        <input pattern="^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$" title="valid city name" type="text" id="ship_city" name="city" placeholder="New York" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="ship_state">State</label>
                        <input pattern="^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$" title="valid state name (not necessarily US)" type="text" id="ship_state" name="state" placeholder="NY" class="form-control">
                    </div>
                    <div class="col-2">
                        <label for="ship_zip">Zip code</label>
                        <input pattern="(^\d{5}$)|(^\d{9}$)|(^\d{5}-\d{4}$)" title="valid zip code with 5 or 9 digits with or without a dash" type="text" id="ship_zip" name="zip" placeholder="10001" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row align-items-center" style="padding: 0 20% 0 20%;">
                <div class="col-8">
                    <b>Total cost: <span id="pay_val">20.00</span>€</b>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-outline-primary" style="width: 100%">Place order</button>
                </div>
                <div class="col-2">
                    <a href="UserCart.php">
                        <button type="button" class="btn btn-outline-danger" style="width: 100%">Back to cart</button>
                    </a>
                </div>
            </div>
        </form>
    </div>

    <?php include "UserFooter.php"; ?>

    
</body>
</html>