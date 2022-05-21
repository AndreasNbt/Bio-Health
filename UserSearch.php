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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="grey-background d-flex flex-column min-vh-100">

    <?php include "PHP_Back_End/product_search.php"; ?>

    <?php include "UserNavbar.php"; ?>
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
            <?php if (isset($_POST['search_key'])) {

                function validate($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                $search_key = validate($_POST['search_key']);
                updateSearchResults($search_key);
            }?>
        </div>
    </div>

    <?php include "UserFooter.php"; ?>

</body>
</html>