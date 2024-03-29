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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body class="grey-background d-flex flex-column min-vh-100">

    <?php include "Navbar.php"; ?>
    <br>

    <div class="container-fluid left-right-pad" style="padding-top: 2rem">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <?php
                            function echoHeader($headerName, $order_row) {
                                $value = "DESC";
                                $arrow_dir = "up";
                                if (isset($_GET['order_row']) and isset($_GET['order_type'])) {
                                    if ($_GET['order_row'] === "$order_row") {
                                        if ($_GET['order_type'] === "DESC") {
                                            $value = "ASC";
                                            $arrow_dir = "down";
                                        }
                                    }
                                }
                                echo "$headerName"."\n";
                                echoArrow("$order_row", $value, $arrow_dir);
                            }

                            function echoArrow($sort_row, $value, $arrow_dir) {
                                echo "<input hidden id='$sort_row' value='$value'>";
                                echo "<span id='{$sort_row}_sort_icon' onclick='updateOrders(\"$sort_row\")'>";
                                if ($arrow_dir === "up") {
                                    echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' style='width: 12px; vertical-align: bottom; cursor: pointer'>
                                              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                              <path d='M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224z'/>
                                          </svg>";
                                }
                                else if ($arrow_dir === "down") {
                                    echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 320 512' style='width: 12px; vertical-align: top; cursor: pointer'>
                                              <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                              <path d='M311.9 335.1l-132.4 136.8C174.1 477.3 167.1 480 160 480c-7.055 0-14.12-2.702-19.47-8.109l-132.4-136.8C-9.229 317.8 3.055 288 27.66 288h264.7C316.9 288 329.2 317.8 311.9 335.1z'/>
                                          </svg>";
                                }
                                echo "</span>";
                            }
                        ?>
                        <th>
                            <?php echoHeader("Order ID", "id"); ?>
                        </th>
                        <th>
                            <?php echoHeader("User ID", "user_id"); ?>
                        </th>
                        <th>
                            <?php echoHeader("Order Date", "order_date"); ?>
                        </th>
                        <th>
                            <?php echoHeader("Latest Delivery", "latest_delivery"); ?>
                        </th>
                        <th>
                            <?php echoHeader("Total Cost", "total_cost"); ?>
                        </th>
                        <th>More Info</th>
                        <th>Fulfill Order</th>
                    </tr>
                </thead>
                <tbody id="orders">
                    <?php include "PHP_Back_End/pending_orders.php" ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
        include "Footer.php";
    ?>
    
</body>
</html>