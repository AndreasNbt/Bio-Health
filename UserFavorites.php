<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorites - Bio & Health</title>
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
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <script src="JS/search.js"></script>
    
</head>
<body class="grey-background d-flex flex-column min-vh-100">
    
    <?php include "Navbar.php";
        $product_ids = array();
        $products = array();
        $user_id = $_SESSION['ID'];

        include("PHP_Back_End/db_connection.php");

        

        // echo $user_id;   
        $sql = "SELECT product_id FROM user_favourites
                WHERE user_id = $user_id";
        $res = $con->query($sql);

        while($row = mysqli_fetch_row($res)){
            $product_ids[] = $row[0]; 
        }
        
        
        $values = '('.implode( ',', $product_ids ).')';
    
        $sql = "SELECT id, name, price, image FROM product WHERE id IN $values";

        $res = $con->query($sql);
        
        while($row = mysqli_fetch_row($res)){
            $products[$row[0]]['id'] = $row[0];
            $products[$row[0]]['name'] = $row[1];
            $products[$row[0]]['price'] = $row[2];
            $products[$row[0]]['image'] = $row[3]; 
        }

        mysqli_close($con);

    ?>
    <br>

    <div class="container-fluid left-right-pad">
        <table style="margin:auto">
                <?php
                $index = 0;
                foreach( $products as $product){
                    if( $index === 0 || ($index % 3 === 0 ) ){
                        echo "<tr>";
                        $tr = true;
                    }
                    $index += 1;
                ?>
                <td class="favorite-product">
                    <a href="UserProductInfo.php?product_id=<?php echo $product['id']; ?>"><img src="<?php echo $product['image']; ?>" style="width:100%"></a>
                    <h5>
                        <?php echo $product['name'] . "Price: " . $product['price'] . "EUR"; ?>
                    </h5>
                    <button class="button sign-btn solid-border dark-green extra-spacing mt-3" style="width: 60%">Add to Cart</button>
                    <button class="button sign-btn solid-border dark-green extra-spacing mt-3" style="width: 60%">Remove</button>
                </td>
                <?php if($tr){ 
                    "</tr>";
                    }
                } 
                ?>
        </table>

    </div>

    <?php 
        include "Footer.php";
    ?>

</body>
</html>