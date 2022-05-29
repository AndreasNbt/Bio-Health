<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Info - Bio & Health</title>
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
        <link rel="stylesheet" href="CSS/searchpage.css">
        <script src="JS/search.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="JS/addToFavourites.js"></script>
    </head>
    <body class="d-flex flex-column min-vh-100">
        
        <?php include "Navbar.php"; ?>
        <br>

        <?php
            $id = "";
            $name = "";
            $price = "";
            $stock = "";
            $desc = "";
            $img = "";
            $cat = "";
            $icon = "";

        $amount = 0;
        $totalCost = 0;
        $hidden = "";
            if (isset($_GET['productID'])) {
                $id = $_GET['productID'];

                include("PHP_Back_End/db_connection.php");

                $sql = "SELECT name, FORMAT(price, 2), stock, description, image, category_id FROM `product` WHERE id=$id;";
                $res = $con->query($sql);
                $product = mysqli_fetch_row($res);
                $name = $product[0];
                $price = $product[1];
                $stock = $product[2];
                $desc = $product[3];
                $img = $product[4];
                $cat = $product[5];

                $sql = "SELECT icon FROM `category` WHERE id=$cat;";
                $res = $con->query($sql);
                $icon = mysqli_fetch_row($res)[0];

                if (isset($_SESSION['ID']) and $_SESSION['role'] === "Customer") {
                    $user_id = $_SESSION['ID'];
                    $sql = "SELECT amount FROM cart_item WHERE product_id=$id AND user_id=$user_id;";
                    $res = $con->query($sql);
                    if (mysqli_num_rows($res) > 0) {
                        $amount = mysqli_fetch_row($res)[0];
                    }
                }
                else {
                    $hidden = "hidden ";
                }
                $totalCost = $amount * $price;

                mysqli_close($con);
                echo implode(',',$_POST);

                if( isset( $_POST['action'] ) ){
                    include("PHP_Back_End/db_connection.php");
                    if( $_POST['action'] === 'add_to_favourites' ){
                        echo "done";
                    $sql = "INSERT INTO user_favourites (user_id, product_id)
                    VALUES ( $user_id, $id);";
                    $res = $con->query( $sql);
                    mysqli_close($con);
                    }
                }
            }
        ?>
        <section id="product-info">
            <div class="container-fluid d-flex flex-row justify-content-between left-right-only-pad" style="height:100%">

                <div class="col col-sm-5">
                    <?php
                        echo "<img src='$img' alt='Product Picture' title='$name' style='height: 500px'>
                              <div class='pb-5'>
                                  <img src='$icon' style='width:50px'>
                              </div>";
                    ?>
                </div>
                
                <div class="col col-sm-6 d-flex flex-column justify-content-center">
                    <div class="d-flex flex-column" >
                        <?php
                          echo "<h5 style='font-weight: bold'>$name</h5>
                                <p>
                                    Price: <span id='price$id'>$price</span>€</br>
                                    Stock: <span id='stock$id'>$stock</span>
                                </p>";
                        ?>
                    </div>

                    <div class="d-flex justify-content-between light-green p-2">
                        <?php
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
                                       </div>";
                        ?>
                    </div>
                    <div class="d-flex">
                        <?php
                            if (isset($_SESSION['ID']) and $_SESSION['role'] === "Customer") {
                                echo "<a class='nav-item nav-link nav-icon text-center dark-gray' href='UserCart.php'><i class='fa-solid fa-cart-shopping fa-2x'></i></a>
                                      <a class='nav-item nav-link nav-icon text-center dark-gray' href=''><i id='add-to-favourites' class='fa-solid fa-heart fa-2x' data-product-id='". $id ."'></i></a>";
                            }
                        ?>
                    </div>

                    <div>
                        <ul class="nav nav-tabs" id="myTab" >
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-bs-toggle="tab">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content" style="border-top:2px solid green">
                            <div class="tab-pane fade show active" id="description">
                                 <?php
                                    echo "$desc";
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php 
            include "Footer.php";
        ?>
    
        
    </body>
</html>