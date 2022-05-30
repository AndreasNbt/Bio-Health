<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Bio & Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/searchpage.css">
    <script src="JS/search.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JS/addToFavourites.js"></script>
</head>
<body class="grey-background d-flex flex-column min-vh-100">
    
    <?php include "Navbar.php"; ?>
    <br>

    <div class="container-fluid left-right-pad" style="padding-top: 2rem">
        <?php
            include("PHP_Back_End/db_connection.php");

            $user_id = $_SESSION['ID'];
            $sql = "SELECT product.id FROM product, user_favourites WHERE user_favourites.user_id='$user_id' AND product.id=user_favourites.product_id;";
            $res = $con->query($sql);

            mysqli_close($con);

            $empty_display = "none";
            if (mysqli_num_rows($res) <= 0) {
                $empty_display = "block";
            }
            echo "<div id='emptyMessage' style='display: $empty_display'>";
            echo "<div class='d-flex' style='flex-direction: column;padding: 0 20% 0 20%'>";
            echo "<h5 class='pt-5 py-1' style='text-align: center'>Looks like you have no favorite products yet. Let's check out some products.</h5>";
            echo "<hr class='border-2 border-top' style='border-color: #1f5014 !important;'>
                            <div class='text-center'><button type='button' class='btn btn-outline-primary' style='width: fit-content;font-size: 14px' onclick='window.location.href=\"http://localhost/Search.php?search_key=\"'>Back to products</button></div>";
            echo "</div>";
            echo "</div>";
        ?>
        <div id="products" class="grid-justify-content-evenly">
            <?php
            function echoUserProduct($id) {

                include("PHP_Back_End/db_connection.php");

                $sql = "SELECT name, FORMAT(price, 2), stock, image, category_id FROM `product` WHERE id=$id;";
                $res = $con->query($sql);
                $product = mysqli_fetch_row($res);
                $name = $product[0];
                $initial_price = $product[1];
                $stock = $product[2];
                $img = $product[3];
                $cat = $product[4];

                $sql = "SELECT icon FROM `category` WHERE id=$cat;";
                $res = $con->query($sql);
                $icon = mysqli_fetch_row($res)[0];
                $linkToProductInfo = "UserProductInfo.php"."?productID=$id";

                $offer_hidden = " hidden";
                $price = $initial_price;
                $offers_icon = "sources/images/category_icons/offers_icon.png";

                $name_col_width = "col-9";
                $price_col_width = "col-3 text-end pt-3";
                $res = $con->query("SELECT offer_percentage FROM offers WHERE product_id = $id");
                if (mysqli_num_rows($res) > 0) {
                    $percentage = mysqli_fetch_row($res)[0];
                    $price = number_format($initial_price - ($percentage/100)*$initial_price,2);
                    $offer_hidden = "";
                    $name_col_width = "col-7";
                    $price_col_width = "col-5 text-end pt-3";
                }

                $amount = 0;
                $hidden = "";
                if (isset($_SESSION['ID'])) {
                    $user_id = $_SESSION['ID'];
                    $sql = "SELECT amount FROM cart_item WHERE product_id=$id AND user_id='$user_id';";
                    $res = $con->query($sql);
                    if (mysqli_num_rows($res) > 0) {
                        $amount = mysqli_fetch_row($res)[0];
                    }
                }
                else {
                    $hidden = "hidden ";
                }
                $totalCost = $amount * $price;
                $totalCost = number_format($totalCost, 2);

                $new_products_icon_hidden = " hidden";
                $new_products_icon = "sources/images/category_icons/new_products_icon.png";
                $sql = "SELECT product_id FROM new WHERE product_id = $id";
                $res = $con->query($sql);
                if (mysqli_num_rows($res) > 0) {
                    $new_products_icon_hidden = "";
                }

                mysqli_close($con);

                echo "<div class='container-fluid' id='product$id' style='padding: 0'>
        
                        <!-- link and image -->
                        <a href='$linkToProductInfo'>
                            <img class='img-responsive rounded' src='$img' style='width: 250px;height: 250px' alt='Picture of $name'>
                        </a>
        
                        <!-- description and price -->
                        <div class='row'>
                            <div class='$name_col_width'>
                                <a href='$linkToProductInfo' style='font-size: 14px; word-break: break-word'>$name<br/>(<span id='stock$id'>$stock</span> left in stock)</a>
                            </div>
                            <div class='$price_col_width'>
                                <p class='product-info' style='font-size: 14px'><span$offer_hidden><span style='color:red;text-decoration:line-through'><span style='color:#212529'>{$initial_price}€</span></span>&nbsp</span><span id='price$id'>$price</span>€</p>
                            </div>
                        </div>
        
                        <!-- categories and cart button -->
                        <div class='row' style='padding-left: 0.75rem; padding-right: 0'>
                            <div class='col-auto d-flex flex-wrap align-items-center' style='padding-left: 0;padding-right: 0.25rem;padding-top: 0.25rem'>
                                <img class='img-responsive' src='$icon' style='width: 20px;height: 20px' alt='Product Name'>
                                <img$offer_hidden class='img-responsive ps-1' src='$offers_icon' style='width: 23px' alt='Product Name'>
                                <img$new_products_icon_hidden class='img-responsive ps-1' src='$new_products_icon' style='width: 23px' alt='Product Name'>
                            </div>
                            
                            <div class='col float-end'>
                                <div class='row'>
                                    <div class='d-flex flex-row-reverse'>
                                        <button type='button' class='btn btn-outline-danger float-end in-search ms-2' onclick='removeFromFavorites(\"$id\")'>Remove</button>
                                        <button {$hidden}type='button' class='btn btn-outline-primary btn-lg float-end' data-bs-toggle='modal' data-bs-target='#addToCartModal$id' onclick='saveValues(\"$id\")'>Add</button>
                                        <div class='modal fade' id='addToCartModal$id'>
                                               <div class='modal-dialog modal-lg'>
                                                   <div class='modal-content'>
                    
                                                       <div class='modal-header'>
                                                           <h3 class='modal-title' style='padding-left: 1.5rem'>Add $name to your cart</h3>
                                                           <button type='button' style='padding-right: 1.5rem' class='btn-close' data-bs-dismiss='modal'></button>
                                                       </div>
                    
                                                       <div class='modal-body'>
                                                           <div class='container-fluid'>
                                                               <div class='row'>
                                                                   <div class='col-6'>
                                                                       <p class='text-lg'>Product name: $name</p>
                                                                       <p class='text-lg'>Available stock: $stock</p>
                                                                       <p class='text-lg' style='font-weight: bold'>Cost: <span id='costAddedToCart$id'>{$totalCost}€</span></p>
                                                                   </div>
                    
                                                                   <div class='col-6'>
                                                                       <label class='form-label float-end text-lg' for='amountAddedToCart$id'>Amount to be added to cart:</label>
                                                                       <input type='number' id='amountAddedToCart$id' class='form-control float-end text-lg' min='0' max='$stock' style='width: 12.5rem' value='$amount' onchange='updateCost($id)'/>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                    
                                                       <div class='modal-footer'>
                                                           <button type='button' class='btn btn-outline-success text-lg' id='finishCartButton$id' data-bs-dismiss='modal' onclick='addToCart(\"$id\")'>Finish</button>
                                                           <button type='button' class='btn btn-outline-danger text-lg' data-bs-dismiss='modal' onclick='restoreValues(\"$id\")'>Cancel</button>
                                                       </div>
                    
                                                   </div>
                                               </div>
                                          </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
            while ($row = mysqli_fetch_array($res)) {
                echoUserProduct($row[0]);
            }
            ?>
        </div>
    </div>

    <?php 
        include "Footer.php";
    ?>

</body>
</html>