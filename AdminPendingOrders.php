<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders - Bio & Health</title>
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
    <script src="JS/completedorderspage.js"></script>
    <script src="JS/navbar.js"></script>
</head>
<body onload="UpdateDropdown('1')" class="grey-background d-flex flex-column min-vh-100">

    <?php include "AdminNavbar.php;" ?>
    <br>

    <div class="container-fluid left-right-pad" style="padding-top: 2rem">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Order Date</th>
                    <th>Latest Delivery</th>
                    <th>Total Cost</th>
                    <th>More Info</th>
                    <th>Fulfill Order</th>
                </tr>
                </thead>
                <tbody>
                <tr id="order1">
                    <td style="vertical-align: middle">AK32321</td>
                    <td style="vertical-align: middle">Mary</td>
                    <td style="vertical-align: middle">30/4/2022</td>
                    <td style="vertical-align: middle">15/5/2022</td>
                    <td style="vertical-align: middle">350.00$</td>
                    <td style="vertical-align: middle"><a href="AdminCart.php"><button type="button" class="btn btn-outline-primary">Details</button></a></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-outline-primary" onclick="deleteOrder(1)">Complete</button></td>
                </tr>
                <tr id="order2">
                    <td style="vertical-align: middle">AK32321</td>
                    <td style="vertical-align: middle">Mary</td>
                    <td style="vertical-align: middle">30/4/2022</td>
                    <td style="vertical-align: middle">15/5/2022</td>
                    <td style="vertical-align: middle">350.00$</td>
                    <td style="vertical-align: middle"><a href="AdminCart.php"><button type="button" class="btn btn-outline-primary">Details</button></a></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-outline-primary" onclick="deleteOrder(2)">Complete</button></td>
                </tr>
                <tr id="order3">
                    <td style="vertical-align: middle">AK32321</td>
                    <td style="vertical-align: middle">Mary</td>
                    <td style="vertical-align: middle">30/4/2022</td>
                    <td style="vertical-align: middle">15/5/2022</td>
                    <td style="vertical-align: middle">350.00$</td>
                    <td style="vertical-align: middle"><a href="AdminCart.php"><button type="button" class="btn btn-outline-primary">Details</button></a></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-outline-primary" onclick="deleteOrder(3)">Complete</button></td>
                </tr>
                <tr id="order4">
                    <td style="vertical-align: middle">AK32321</td>
                    <td style="vertical-align: middle">Mary</td>
                    <td style="vertical-align: middle">30/4/2022</td>
                    <td style="vertical-align: middle">15/5/2022</td>
                    <td style="vertical-align: middle">350.00$</td>
                    <td style="vertical-align: middle"><a href="AdminCart.php"><button type="button" class="btn btn-outline-primary">Details</button></a></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-outline-primary" onclick="deleteOrder(4)">Complete</button></td>
                </tr>
                <tr id="order5">
                    <td style="vertical-align: middle">AK32321</td>
                    <td style="vertical-align: middle">Mary</td>
                    <td style="vertical-align: middle">30/4/2022</td>
                    <td style="vertical-align: middle">15/5/2022</td>
                    <td style="vertical-align: middle">350.00$</td>
                    <td style="vertical-align: middle"><a href="AdminCart.php"><button type="button" class="btn btn-outline-primary">Details</button></a></td>
                    <td style="vertical-align: middle"><button type="button" class="btn btn-outline-primary" onclick="deleteOrder(5)">Complete</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include "AdminFooter.php"; ?>
    
</body>
</html>