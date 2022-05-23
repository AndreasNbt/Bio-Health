<?php
function getCategoryQuery($category_id) {
    if ($category_id == 0) {
        return "";
    }
    else {
        return " AND category_id=".$category_id;
    }
}

function getOrderQuery($order_id) {
    if ($order_id == 0) {
        return "";
    }
    if ($order_id == 1 or $order_id == 2) {
        $cat = "price";
    }
    else {
        $cat = "stock";
    }
    if ($order_id == 1 or $order_id == 3) {
        $order = "ASC";
    }
    else {
        $order = "DESC";
    }
    return " ORDER BY ".$cat." ".$order;
}

function updateSearchResults($search_key, $category_id, $order_id, $user_type) {
    include("db_connection.php");
    $sql = "SELECT id FROM `product` WHERE name LIKE '%$search_key%'".getCategoryQuery($category_id).getOrderQuery($order_id).";";
    $res = $con->query($sql);
    while ($row = mysqli_fetch_array($res)) {
        if ($user_type === 'user') {
            echoUserProduct($row[0]);
        }
        else if ($user_type === 'admin') {
            echoAdminProduct($row[0]);
        }
    }
    mysqli_close($con);
}

function echoAdminProduct($id) {

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
    $linkToEditProduct = "AdminEditProduct.php"."?productID=$id";

    echo "<div id='product1' class='container-fluid' style='padding: 0'>

                <!-- link and image -->
                <a href='$linkToEditProduct'>
                    <img class='img-responsive rounded' src='$img' style='width: 250px;height: 250px' alt='Picture of $name'>
                </a>

                <!-- description and price -->
                <div class='row'>
                    <div class='col-auto'>
                        <a href='$linkToEditProduct' style='font-size: 14px'>$name<br/>($stock left in stock)</a>
                    </div>
                    <div class='col text-end pt-3'>
                        <p class='product-info' style='font-size: 14px'>{$price}€</p>
                    </div>
                </div>

                <!-- categories and cart button -->
                <div class='row' style='padding-left: 0.75rem; padding-right: 0'>
                    <div class='col-auto d-flex flex-wrap align-items-center' style='padding-left: 0;padding-right: 0.25rem'>
                        <img class='img-responsive' src='$icon' style='width: 20px;height: 20px' alt='Product Name'>
                    </div>

                    <div class='col float-end'>
                        <div class='row'>
                            <div class='d-flex flex-row-reverse'>
                                <button type='button' class='btn btn-outline-danger float-end in-search ms-2' data-bs-toggle='modal' data-bs-target='#deleteProduct$id'>Delete</button>
                                <a href='$linkToEditProduct'><button type='button' class='btn btn-outline-primary btn-lg float-end'>Edit</button></a>
                                <div class='modal fade' id='deleteProduct$id'>
                                    <div class='modal-dialog modal-lg'>
                                        <div class='modal-content'>

                                            <div class='modal-header'>
                                                <h3 class='modal-title' style='padding-left: 1.5rem'>Delete \"$name\" from the database?</h3>
                                                <button type='button' style='padding-right: 1.5rem' class='btn-close' data-bs-dismiss='modal'></button>
                                            </div>

                                            <div class='modal-body'>
                                                <div class='container-fluid'>
                                                    <div class='row'>
                                                        <p style='margin: 0'>Are you sure you want to delete the product \"$name\" from the database? It's data will be lost forever.</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-outline-success text-lg' data-bs-dismiss='modal' onclick='deleteProduct(\"$id\")'>Delete</button>
                                                <button type='button' class='btn btn-outline-danger text-lg' data-bs-dismiss='modal'>Cancel</button>
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

function echoUserProduct($id) {

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
    $linkToProductInfo = "UserProductInfo.php"."?productID=$id";

    $user_id = $_SESSION['ID'];
    $sql = "SELECT amount FROM cartitem WHERE product_id=$id AND user_id=$user_id;";
    $res = $con->query($sql);
    $amount = 0;
    if (mysqli_num_rows($res) > 0) {
        $amount = mysqli_fetch_row($res)[0];
    }
    $totalCost = $amount * $price;

    mysqli_close($con);

    echo "<div class='container-fluid' style='padding: 0'>

                <!-- link and image -->
                <a href='$linkToProductInfo'>
                    <img class='img-responsive rounded' src='$img' style='width: 250px;height: 250px' alt='Picture of $name'>
                </a>

                <!-- description and price -->
                <div class='row'>
                    <div class='col-auto'>
                        <a href='$linkToProductInfo' style='font-size: 14px'>$name<br/>(<span id='stock$id'>$stock</span> left in stock)</a>
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
                        <button type='button' class='btn btn-outline-primary btn-lg float-end' data-bs-toggle='modal' data-bs-target='#addToCartModal$id' onclick='saveValues(\"$id\")'>Add to cart</button>
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
                                                    <p class='text-lg'>Product name: <a href='$linkToProductInfo'>$name</a></p>
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
            </div>";
}
?>