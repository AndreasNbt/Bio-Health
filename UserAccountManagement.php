<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Info - Bio&Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/sign.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/new_product.css">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    
</head>

<body class="d-flex flex-column min-vh-100">
    
    <?php 
    
     include "PHP_Back_End/db_connection.php";
     include "Navbar.php"; 

     $userId = $_SESSION['ID'];

     $sql = "SELECT email, username, password
             FROM user
             WHERE user_id = '$userId'";
    
     $res = $con->query($sql);
     $row = mysqli_fetch_row($res);

     $email = $row[0];
     $username = $row[1];
     $password = $row[2];

     $con->close();
    ?>
    <br>

    <section class="main-section">
        <div class="main-container row text-center" style="margin: 0">
            <div class="solid-border col-8 container big-container fit">
                <div class="d-flex justify-content-center py-1">
                    <h1 class="dark-green extra-spacing header-text m-0">Account Information</h1>
                </div>
                <hr class="hr-border m-0">
                <?php
                    echo'<form action="PHP_Back_End/account_info.php" method="post">
                        <div>
                            <div class="field d-flex flex-column">
                                <label for="product_name" class="product_label">Email</label>
                                <input type="text" id="product_name" class="account-input text-center" name="email" value="'.$email.'">
                            </div>
                            <div class="field d-flex flex-column">
                                <label for="product_name" class="product_label">Username</label>
                                <input type="text" id="product_name" class="account-input text-center" name="username" value="'.$username.'">
                            </div>
                            <div class="field d-flex flex-column">
                                <label for="product_name" class="product_label">Password</label>
                                <input type="text" id="product_name" class="account-input text-center" name="password" value="'.$password.'">
                            </div>
                            
                        </div>'
                ?>
                    <button class="button sign-btn submit solid-border dark-green extra-spacing mt-4" type="submit" style="margin-bottom: 1.5rem">Save changes</button>
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

