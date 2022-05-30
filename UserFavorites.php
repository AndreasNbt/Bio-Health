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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="JS/addToFavourites.js"></script>
    
</head>
<body class="grey-background d-flex flex-column min-vh-100">
    
    <?php include "Navbar.php";
        $product_ids = array();
        $products = array();
        $user_id = $_SESSION['ID'];

        include("PHP_Back_End/db_connection.php");

        $sql = "SELECT product.id, name, price, stock, image FROM product, user_favourites WHERE user_favourites.user_id='$user_id' AND product.id=user_favourites.product_id;";
        $res = $con->query($sql);
        
        while($row = mysqli_fetch_row($res)){
            $products[$row[0]]['id'] = $row[0];
            $products[$row[0]]['name'] = $row[1];
            $products[$row[0]]['price'] = $row[2];
            $products[$row[0]]['stock'] = $row[3];
            $products[$row[0]]['image'] = $row[4];
        }

        mysqli_close($con);

    ?>
    <br>

    <div class="container-fluid left-right-pad">
        <table style="margin:auto">
                <?php
                $index = 0;
                foreach( $products as $product){
                    if( $index === 0 || ($index % 3 === 0 ) ){
                        echo "<tr>";
                        $tr = true;
                    }
                    $index += 1;
                ?>
                <?php
                    $id = $product['id'];
                    echo "<td id='product$id' class='favorite-product'>"
                ?>
                    <a href="UserProductInfo.php?productID=<?php echo $product['id']; ?>"><img src="<?php echo $product['image']; ?>" style="width:100%"></a>
                    <h5>
                        <?php
                        $id = $product['id'];
                        echo "name: <span id='name$id'>".$product['name']."</span></br>";
                        echo "price: <span id='price$id'>".$product['price']."</span></br>";
                        echo "stock: <span id='stock$id'>".$product['stock']."</span></br>";
                        ?>
                    </h5>

                    <?php

                    $hidden = "";
                    if ($product['stock'] <= 0) {
                        $hidden = "hidden ";
                    }

                    $id = $product['id'];
                    $name = $product['name'];
                    $price = $product['price'];
                    $stock = $product['stock'];
                    $amount = 0;

                    include("PHP_Back_End/db_connection.php");

                    if (isset($_SESSION['ID']) and $_SESSION['role'] === "Customer") {
                        $user_id = $_SESSION['ID'];
                        $sql = "SELECT amount FROM cart_item WHERE product_id=$id AND user_id='$user_id';";
                        $res = $con->query($sql);
                        if (mysqli_num_rows($res) > 0) {
                            $amount = mysqli_fetch_row($res)[0];
                        }
                    }
                    $totalCost = $amount * $price;

                    mysqli_close($con);

                    echo "<button {$hidden}type='button' class='add-btn light-green' data-bs-toggle='modal' data-bs-target='#addToCartModal$id' onclick='saveValues(\"$id\")'>Add to cart</button>
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
                                  </div>";
                    echo "<button class='button sign-btn solid-border dark-green extra-spacing mt-3' style='width: 60%' onclick='removeFromFavorites(\"$id\")'>Remove</button>"
                    ?>
                </td>
                <?php if($tr){ 
                    "</tr>";
                    }
                } 
                ?>
        </table>

    </div>

    <?php 
        include "Footer.php";
    ?>

</body>
</html>