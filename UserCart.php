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
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/cartpage.css">
    <script src="JS/cartpage.js"></script>
    <script src="JS/navbar.js"></script>
</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'));updateCosts();updateSubtotal();updateTotal();" class="d-flex flex-column grey-background min-vh-100">

    <?php include "UserNavbar.php"; ?>
    <br>

<div id="products" class="container-fluid left-right-pad">
    <div class="container-fluid">
        <div class="row pt-4">
            <div class="col-8" style="padding-right: 100px">

                <h4 class="text-center pt-2" style="font-weight: bold">Shopping cart</h4>
                <hr class="border-2 border-top border-primary mb-4">

                <div id="item1">
                    <div class="d-flex justify-content-between align-items-center">
                        <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name" onload="items.push('costAddedToCart1')">
                        <a href="UserProductInfo.php">Product Name<br/>(<span id="stock1">1000</span> left in stock)</a>
                        <input type="number" id="amountAddedToCart1" class="form-control form-control-sm" min="1" max="1000" style="width: 5rem" value="1" onchange="updateCost(document.getElementById('amountAddedToCart1').value, 1, 1000, 1); updateSubtotal(); updateTotal()"/>
                        <div class="d-flex" style="width: 50px"><span id="costAddedToCart1">1.00</span>€</div>
                        <button type="button" style="padding-right: 1.5rem;scale: 75%" class="btn-close" data-bs-dismiss="modal" onclick="removeItem('1'); updateSubtotal(); updateTotal()"></button>
                    </div>
                    <hr class="border-2 border-top border-primary mb-4">
                </div>

                <div id="item2">
                    <div class="d-flex justify-content-between align-items-center">
                        <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name" onload="items.push('costAddedToCart2')">
                        <a href="UserProductInfo.php">Product Name<br/>(<span id="stock2">1000</span> left in stock)</a>
                        <input type="number" id="amountAddedToCart2" class="form-control form-control-sm" min="1" max="1000" style="width: 5rem" value="1" onchange="updateCost(document.getElementById('amountAddedToCart2').value, 2, 1000, 2); updateSubtotal(); updateTotal()"/>
                        <div class="d-flex" style="width: 50px"><span id="costAddedToCart2">2.00</span>€</div>
                        <button type="button" style="padding-right: 1.5rem;scale: 75%" class="btn-close" data-bs-dismiss="modal" onclick="removeItem('2'); updateSubtotal(); updateTotal()"></button>
                    </div>
                    <hr class="border-2 border-top border-primary mb-4">
                </div>

                <div id="item3">
                    <div class="d-flex justify-content-between align-items-center">
                        <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name" onload="items.push('costAddedToCart3')">
                        <a href="UserProductInfo.php">Product Name<br/>(<span id="stock3">1000</span> left in stock)</a>
                        <input type="number" id="amountAddedToCart3" class="form-control form-control-sm" min="1" max="1000" style="width: 5rem" value="1" onchange="updateCost(document.getElementById('amountAddedToCart3').value, 3, 1000, 3); updateSubtotal(); updateTotal()"/>
                        <div class="d-flex" style="width: 50px"><span id="costAddedToCart3">3.00</span>€</div>
                        <button type="button" style="padding-right: 1.5rem;scale: 75%" class="btn-close" data-bs-dismiss="modal" onclick="removeItem('3'); updateSubtotal(); updateTotal()"></button>
                    </div>
                    <hr class="border-2 border-top border-primary mb-4">
                </div>

                <div id="item4">
                    <div class="d-flex justify-content-between align-items-center">
                        <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name" onload="items.push('costAddedToCart4')">
                        <a href="UserProductInfo.php">Product Name<br/>(<span id="stock4">1000</span> left in stock)</a>
                        <input type="number" id="amountAddedToCart4" class="form-control form-control-sm" min="1" max="1000" style="width: 5rem" value="1" onchange="updateCost(document.getElementById('amountAddedToCart4').value, 4, 1000, 4); updateSubtotal(); updateTotal()"/>
                        <div class="d-flex" style="width: 50px"><span id="costAddedToCart4">4.00</span>€</div>
                        <button type="button" style="padding-right: 1.5rem;scale: 75%" class="btn-close" data-bs-dismiss="modal" onclick="removeItem('4'); updateSubtotal(); updateTotal()"></button>
                    </div>
                    <hr class="border-2 border-top border-primary mb-4">
                </div>

                <div id="item5">
                    <div class="d-flex justify-content-between align-items-center">
                        <img class="img-responsive rounded" src="https://picsum.photos/200" style="width: 100px;height: 125px" alt="Product Name" onload="items.push('costAddedToCart5');">
                        <a href="UserProductInfo.php">Product Name<br/>(<span id="stock5">1000</span> left in stock)</a>
                        <input type="number" id="amountAddedToCart5" class="form-control form-control-sm" min="1" max="1000" style="width: 5rem" value="1" onchange="updateCost(document.getElementById('amountAddedToCart5').value, 5, 1000, 5); updateSubtotal(); updateTotal()"/>
                        <div class="d-flex" style="width: 50px"><span id="costAddedToCart5">5.00</span>€</div>
                        <button type="button" style="padding-right: 1.5rem;scale: 75%" class="btn-close" data-bs-dismiss="modal" onclick="removeItem('5'); updateSubtotal(); updateTotal()"></button>
                    </div>
                    <hr class="border-2 border-top border-primary mb-4">
                </div>

                <div id="empty_message" style="display: none">
                    <div class="d-flex justify-content-center align-items-center">
                        <p>Looks like your cart is empty</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-primary" onclick="history.back()">Back to shop</button>
                    </div>
                    <hr class="border-2 border-top border-primary my-4">
                </div>

            </div>
            <div class="col-4" style="padding-left: 100px;padding-top: 6%">
                <h4 class="text-center pt-2" style="font-weight: bold">Pricing</h4>

                <hr class="border-2 border-top border-primary">
                <div class="d-flex justify-content-between align-items-center py-4">
                    <p style="margin: 0">Subtotal:</p>
                    <p style="margin: 0"><span id="subtotal"></span>€</p>
                </div>
                <hr class="border-2 border-top border-primary">
                <div class="d-flex justify-content-between align-items-center py-4">
                    <p style="margin: 0">Shipping:</p>
                </div>
                <div class="d-flex justify-content-between align-items-center pb-4">
                    <select class="form-select" id="shipping_type" onchange="updateTotal()">
                        <option value="5.00">Standard - 5.00€ (7-14 days)</option>
                        <option value="15.00">Express - 15.00€ (3-5 days)</option>
                    </select>
                </div>
                <hr class="border-2 border-top border-primary">
                <div class="d-flex justify-content-between align-items-center py-4">
                    <p style="margin: 0">Total:</p>
                    <p style="margin: 0"><span id="total"></span>€</p>
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
                    <a href="UserCheckout.php">
                        <button type="button" id="checkout_button" class="btn btn-outline-primary" style="padding: 10px 100px 10px 100px">Proceed to checkout</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php include "UserFooter.php"; ?>


</body>
</html>