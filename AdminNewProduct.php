<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload new product - Bio&Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/new_product.css">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <script src="JS/navbar.js"></script>

</head>
<body onload="UpdateDropdown('1')" class="d-flex flex-column min-vh-100">

    <?php include "AdminNavbar.php"; ?>
    <br>

    <section class="main-section">
        <div class="main-container text-center main">
                <div class="solid-border col-2 d-flex flex-column container small-container right-margin p-0">

                    <div class="text-center py-1 align-items-center header">
                        <h1 class="dark-green header-text m-0">Categories</h1>
                    </div>
                    
                    <hr class="hr-border m-0">

                    <div class="d-flex flex-column flex-grow-1 text-start px-4 py-3 my-1">
                        <div class="category px-2">
                            <a href="" class="c-link">Category 1</a>
                        </div>
                        <div class="category px-2 py-1">                           
                            <a href="" class="c-link">Category 1</a>
                        </div>
                        <div class="category px-2 py-1">                            
                            <a href="" class="c-link">Category 1</a>
                        </div>
                        <div class="category px-2 py-1">                
                            <a href="" class="c-link">Category 1</a>
                        </div>
                        <div class="category px-2 py-1">                            
                            <a href="" class="c-link">Category 1</a>
                        </div>
                    </div>

                    <hr class="hr-border m-0">  

                    <div class="add text-start py-3 my-1">
                        <a href=""><i class="fa-solid fa-plus category-icon"></i></a>
                        <a href="" class="c-link add-link ">Add a new category</a>
                    </div>
                </div> 

                <div class="solid-border col-8 container big-container">

                    <div class="d-flex justify-content-center py-1">
                        <h1 class="dark-green extra-spacing header-text m-0">Add a new product</h1>
                    </div>
                    <hr class="hr-border m-0">

                    <form action="PHP_Back_End/new_product.php" method="post">
                        <div>
                            <div class="field d-flex flex-column">
                                <label for="product_name" class="product_label text-start">Product Name</label>
                                <input type="text" id="product_name" class="product-input-field form-control" name="product_name" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="product_description" class="product_label text-start">Description</label>
                                <textarea type="text" id="product_description" class="product-input-area form-control" name="product_description" required></textarea>
                            </div>
                            
                            <div class="field d-flex flex-column">
                                <label for="product_category" class="product_label text-start">Category</label>
                                <input type="text" id="product_category" class="product-input-field small form-control" name="product_category" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="product_price" class="product_label text-start">Price</label>
                                <input type="number" id="product_price" class="product-input-field small form-control" name="product_price" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="product_stock" class="product_label text-start">Stock</label>
                                <input type="number" id="product_stock" class="product-input-field small form-control" name="product_stock" required>
                            </div>
                            
                            <div class="field d-flex flex-column">
                                <label for="product_image" class="product_label text-start">Image</label>
                                <input type="file" id="product_image" class="product-input-field p-0" name="product_image" required>
                            </div>
                            
                        </div>

                        <div class="d-flex justify-content-evenly">
                            <button class="button sign-btn submit solid-border dark-green extra-spacing my-3" type="submit">Submit</button>
                            <button class="button sign-btn submit red-solid-border danger-red extra-spacing my-3" type="button" onclick="document.getElementById('form').reset();location.href='AdminIndex.php'">Cancel</button>
                        </div>
                    </form>
                </div>
        </div>
    </section>

    <br>
    <?php 
        include "Footer.php";
    ?>


    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>