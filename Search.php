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
    <script src="JS/search.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#search_bar").bind('submit',function() {
                var key = $('#search_key').val().toString();
                var category = $('#category').val().toString();
                var order = $('#order').val().toString();
                updateURL(key, category, order);
                $.get('PHP_Back_End/search.php', {key:key, category:category, order:order}, function(data){
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
                updateURL(key, category, order);
                $.get('PHP_Back_End/search.php', {key:key, category:category, order:order}, function(data){
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
                updateURL(key, category, order);
                $.get('PHP_Back_End/search.php', {key:key, category:category, order:order}, function(data){
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
                updateURL(key, category, order);
                $.get('PHP_Back_End/search.php', {key:key, category:category, order:order}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
    </script>
</head>
<body class="grey-background d-flex flex-column min-vh-100">

<?php include "Navbar.php"; ?>

<br>

<div class="container-fluid left-right-pad">
    <!-- row with "Showing results for" message -->
    <div class="row pb-3 pt-2">
        <div class="col-auto d-flex align-items-end">
            <?php
                if (isset($_SESSION['role']) and $_SESSION['role'] === "Administrator") {
                    echo "<h5>Showing products currently in database:</h5>";
                }
                else if (!(isset($_SESSION['role'])) or $_SESSION['role'] === "Customer") {
                    echo "<h5>Showing results for '<span id='shown_key'></span>':</h5>
                          <script>updateShownKey()</script>";
                }
            ?>
        </div>

        <div class="col">
            <div class="row float-end">
                <div class="col-auto">
                    <label class="filter-sort-label">Show only:</label>
                    <select id="category" class="form-select">
                        <?php
                        include "PHP_Back_End/db_connection.php";

                        $category_value = 0;
                        if (isset($_GET['search_key']) and isset($_GET['category'])) {
                            $category_value = $_GET['category'];
                            echo "<option value='0'>Show All</option>";
                        } else {
                            echo "<option value='0' 'selected'>Show All</option>";
                        }
                        $selected_option = "";
                        if ($category_value === '-1') {
                            $selected_option = " selected";
                        }
                        echo "<option value='-1'$selected_option>Offers</option>";
                        $selected_option = "";
                        if ($category_value === '-2') {
                            $selected_option = " selected";
                        }
                        echo "<option value='-2'$selected_option>New Products</option>";

                        $sql = "SELECT id, name FROM `category`;";
                        $res = $con->query($sql);
                        while ($category = mysqli_fetch_array($res)) {
                            $value = $category[0];
                            $name = $category[1];
                            $selected_option = "";
                            if ($value === $category_value) {
                                $selected_option = " selected";
                            }
                            echo "<option value='$value'$selected_option>$name</option>";
                        }
                        mysqli_close($con);
                        ?>
                    </select>
                </div>

                <div class="col-auto">
                    <label class="filter-sort-label">Sort by:</label>
                    <select id="order" class="form-select">
                        <?php
                        $order_value = 0;
                        if (isset($_GET['search_key']) and isset($_GET['order'])) {
                            $order_value = $_GET['order'];
                        }
                        function echoOrderOption($value, $name, $selected_option) {
                            echo "<option value='$value'$selected_option>$name</option>";
                        }
                        ($order_value == 0)?echoOrderOption(0, "Unordered", " selected"):echoOrderOption(0, "Unordered", "");
                        ($order_value == 1)?echoOrderOption(1, "Price ascending", " selected"):echoOrderOption(1, "Price ascending", "");
                        ($order_value == 2)?echoOrderOption(2, "Price descending", " selected"):echoOrderOption(2, "Price descending", "");
                        ($order_value == 3)?echoOrderOption(3, "Stock ascending", " selected"):echoOrderOption(3, "Stock ascending", "");
                        ($order_value == 4)?echoOrderOption(4, "Stock descending", " selected"):echoOrderOption(4, "Stock descending", "");
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- container with all the products' images -->
    <div id="products" class="grid-justify-content-evenly">
        <?php
        include "PHP_Back_End/search_functions.php";
        if (isset($_GET['search_key'])) {
            $search_key = validate($_GET['search_key']);
            $category = 0;
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
            }
            $order = 0;
            if (isset($_GET['order'])) {
                $order = $_GET['order'];
            }
            if (isset($_SESSION['role']) and $_SESSION['role'] === "Administrator") {
                updateSearchResults($search_key, $category, $order, 'admin');
            }
            else if (!(isset($_SESSION['role'])) or $_SESSION['role'] === "Customer") {
                updateSearchResults($search_key, $category, $order, 'user');;
            }
        }
        ?>
    </div>
</div>

<?php
include "Footer.php";
?>

</body>
</html>