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
        <script src="JS/navbar.js"></script>
    </head>
    <body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100">
        
        <?php include "Navbar.php"; ?>
        <br>

        <?php
            if (isset($_GET['productID'])) {
                $id = $_GET['productID'];

                include("PHP_Back_End/db_connection.php");

                $sql = "SELECT name, price, stock, description, image, category_id FROM `product` WHERE id=$id;";
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

                mysqli_close($con);
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
                                Price: {$price}€ </br>
                                Stock: $stock";
                        ?>
                    </div>

                    <div class="d-flex justify-content-between light-green p-2">
                        <button id="addToCartBtn" class="add-btn light-green">Add to Cart</button>
                        <div class="d-flex">
                            <a class="nav-item nav-link nav-icon text-center dark-gray" href="UserCart.php"><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
                            <a class="nav-item nav-link nav-icon text-center dark-gray" href="UserFavorites.php"><i class="fa-solid fa-heart fa-2x"></i></a>
                        </div> 
                    </div>

                    <div class="mt-5"> 
                        <ul class="nav nav-tabs" id="myTab" >
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-bs-toggle="tab">Description</a>
                            </li>
                                <!--
                                <li class="nav-item">
                                    <a href="#ingredients" class="nav-link" data-bs-toggle="tab">Ingredients</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#nutritional" class="nav-link" data-bs-toggle="tab">Nutritional table </a>
                                </li>
                                -->
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