<?php

include("db_connection.php");

############## Make the mysql connection ###########

$search_key = $_POST['value'];
$sql = "SELECT * FROM product WHERE name LIKE '%$search_key%'";
$res = $con->query($sql);

while ($row = mysqli_fetch_row($res)) {
    echoProduct($row[0]);
}

function updateSearchResults($search_key) {
    echo "<script>clearSearchResults()</script>";

    include("db_connection.php");

    $sql = "SELECT id, name FROM `product` WHERE name LIKE '%$search_key%';";
    $res = $con->query($sql);

    while ($row = mysqli_fetch_array($res))
    {
        echoProduct($row[0]);
    }

    mysqli_close($con);
}

function echoProduct($id) {

    include("db_connection.php");

    $sql = "SELECT name, price, stock, image, category_id FROM `product` WHERE id=$id;";
    $res = $con->query($sql);
    $product = mysqli_fetch_row($res);
    $name = $product[0];
    $price = $product[1];
    $stock = $product[2];
    $img = $product[3];
    $cat = $product[4];

    $sql = "SELECT icon FROM `category` WHERE id=$cat;";
    $res = $con->query($sql);
    $icon = mysqli_fetch_row($res)[0];

    mysqli_close($con);

    echo "<div class='container-fluid' style='padding: 0'>

                <!-- link and image -->
                <a href='../UserProductInfo.php'>
                    <img class='img-responsive rounded' src='$img' style='width: 250px;height: 250px' alt='Product Name'>
                </a>

                <!-- description and price -->
                <div class='row'>
                    <div class='col-auto'>
                        <a href='../UserProductInfo.php' style='font-size: 14px'>$name<br/>(<span id='stock$id'>$stock</span> left in stock)</a>
                    </div>
                    <div class='col text-end pt-3'>
                        <p class='product-info' style='font-size: 14px'><span id='price$id'>$price</span>€</p>
                    </div>
                </div>

                <!-- categories and cart button -->
                <div class='row' style='padding-left: 0.75rem; padding-right: 0'>
                    <div class='col-auto d-flex flex-wrap align-items-center' style='padding-left: 0;padding-right: 0.25rem'>
                        <img class='img-responsive' src='$icon' style='width: 20px;height: 20px' alt='Product Name'>
                    </div>

                    <div class='col float-end'>
                        <button type='button' class='btn btn-outline-primary btn-lg float-end' data-bs-toggle='modal' data-bs-target='#addToCartModal$id'>Add to cart</button>
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
                                                    <p class='text-lg'>Product name: <a href='../UserProductInfo.php'>$name</a></p>
                                                    <p class='text-lg'>Available stock: $stock</p>
                                                    <p class='text-lg' style='font-weight: bold'>Cost: <span id='costAddedToCart$id'>{$price}€</span></p>
                                                </div>

                                                <div class='col-6'>
                                                    <label class='form-label float-end text-lg' for='amountAddedToCart$id'>Amount to be added to cart:</label>
                                                    <input type='number' id='amountAddedToCart$id' class='form-control float-end text-lg' min='1' max='$stock' style='width: 12.5rem' value='1' onchange='updateCost($id)'/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-outline-success text-lg' id='finishCartButton$id' data-bs-dismiss='modal'>Finish</button>
                                        <button type='button' class='btn btn-outline-danger text-lg' data-bs-dismiss='modal'>Cancel</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
}
?>
</body>