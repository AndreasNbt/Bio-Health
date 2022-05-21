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
                var value = $('#search_key').val();
                console.log(value)
                $.post('PHP_Back_End/product_search.php', {value:value}, function(data){
                    $("#products").html(data);
                });
                return false;
            });
        });
    </script>
</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="grey-background d-flex flex-column min-vh-100">

<section id="navbar">
    <nav class="navbar d-flex justify-content-between left-right-only-pad light-green">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <a href="Index.php" class="navbar-logo dark-gray">
            <h1 class="navbar-logo-1">Bio &</h1>
            <h1 class="position-relative navbar-logo-2">Health</h1>
        </a>
        <form id="search_bar" action="" class="form-inline d-flex flex-row search">
            <input name="search_key" id="search_key" class="form-control search-bar" type="text" placeholder="Search for a product">
            <button type="submit" class="search-button position-relative"><i class="fa-solid fa-magnifying-glass fa-lg dark-green"></i></button>
        </form>
        <div class="navbar-nav d-flex flex-row justify-content-between">
            <div class="dropdown">
                <a class="nav-item nav-link nav-icon text-center dark-gray" href="#"><i class="fa-solid fa-user-gear fa-2x"></i></a>
                <div class="dropdown-content">
                    <a class="signedout" href="UserSignIn.php">Sign in</a>
                    <a class="signedout" href="UserSignUp.php">Create an account</a>
                    <a class="signedin" href="UserAccountInfo.php">Account Information</a>
                    <a class="signedin" onclick="localStorage.setItem('signed_in_status', '0');UpdateDropdown(0)" href="PHP_Back_End/sign_out.php">Log out</a>
                </div>
            </div>
            <a class="nav-item nav-link nav-icon text-center dark-gray" href="UserCart.php"><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
            <a class="nav-item nav-link nav-icon text-center dark-gray" href="UserFavorites.php"><i class="fa-solid fa-heart fa-2x"></i></a>
        </div>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="container-fluid left-right-only-pad light-green m-0">
            <ul id="categories" class="nav">
                <li class="nav-item">
                    <a class="nav-link ps-0" href="UserSearch.php">Dairy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Vegan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Fruits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Vegetables</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Sugar free</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Gluten free</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="UserSearch.php">Miscellaneous</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<hr class="big-hr m-0">

<br>

<div class="container-fluid left-right-pad">
    <!-- row with "Showing results for" message -->
    <div class="row pb-3 pt-2">
        <div class="col-auto d-flex align-items-end">
            <h5>Showing results for "Search keyword":</h5>
        </div>

        <div class="col">
            <div class="row float-end">
                <div class="col-auto">
                    <label class="filter-sort-label">Show only:</label>
                    <select class="form-select">
                        <option value="/">Show all</option>
                        <option value="/">Dairy</option>
                        <option value="/">Vegan</option>
                        <option value="/">No salt</option>
                    </select>
                </div>

                <div class="col-auto">
                    <label class="filter-sort-label">Sort by:</label>
                    <select class="form-select">
                        <option value="/">Featured</option>
                        <option value="/">Popular</option>
                        <option value="/">Price ascending</option>
                        <option value="/">Price descending</option>
                        <option value="/">Stock ascending</option>
                        <option value="/">Stock descending</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- container with all the products' images -->
    <div id="products" class="grid-justify-content-evenly">

    </div>
</div>

<?php include "UserFooter.php"; ?>

</body>
</html>