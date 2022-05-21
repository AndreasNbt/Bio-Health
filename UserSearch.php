<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Bio & Health</title>
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
    <script src="JS/searchpage.js"></script>
    <script src="JS/navbar.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $("#search_bar").bind('submit',function() {
                var key = $('#search_key').val().toString();
                var category = $('#category').val().toString();
                var order = $('#order').val().toString();
                $.get('PHP_Back_End/product_search.php', {key:key, category:category, order:order}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
        $(function() {
            $("#search_key").bind('keyup',function() {
                var key = $('#search_key').val().toString();
                var category = $('#category').val().toString();
                var order = $('#order').val().toString();
                $.get('PHP_Back_End/product_search.php', {key:key, category:category, order:order}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
        $(function() {
            $("#category").bind('change',function() {
                var key = $('#search_key').val().toString();
                var category = $('#category').val().toString();
                var order = $('#order').val().toString();
                $.get('PHP_Back_End/product_search.php', {key:key, category:category, order:order}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
        $(function() {
            $("#order").bind('change',function() {
                var key = $('#search_key').val().toString();
                var category = $('#category').val().toString();
                var order = $('#order').val().toString();
                $.get('PHP_Back_End/product_search.php', {key:key, category:category, order:order}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
    </script>
</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="grey-background d-flex flex-column min-vh-100">

<?php include "UserNavbar.php"; ?>

<br>

<div class="container-fluid left-right-pad">
    <!-- row with "Showing results for" message -->
    <div class="row pb-3 pt-2">
        <div class="col-auto d-flex align-items-end">
            <h5>Showing results for "<span id="shown_key"></span>":</h5>
            <script>updateShownKey()</script>
        </div>

        <div class="col">
            <div class="row float-end">
                <div class="col-auto">
                    <label class="filter-sort-label">Show only:</label>
                    <select id="category" class="form-select">
                        <option value="0">Show all</option>
                        <option value="1">Vegan</option>
                        <option value="2">Gluten Free</option>
                        <option value="3">Snacks</option>
                        <option value="4">Personal Care</option>
                        <option value="5">Pastries & Confectionery</option>
                        <option value="6">Spreads</option>
                    </select>
                </div>

                <div class="col-auto">
                    <label class="filter-sort-label">Sort by:</label>
                    <select id="order" class="form-select">
                        <option value="0">Unordered</option>
                        <option value="1">Price ascending</option>
                        <option value="2">Price descending</option>
                        <option value="3">Stock ascending</option>
                        <option value="4">Stock descending</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- container with all the products' images -->
    <div id="products" class="grid-justify-content-evenly">
        <?php if (isset($_GET['search_key'])) {
            include "PHP_Back_End/product_search.php";
            $search_key = validate($_GET['search_key']);
            updateSearchResults($search_key, 0, 0);
        }?>
    </div>
</div>

<?php include "UserFooter.php"; ?>

</body>
</html>