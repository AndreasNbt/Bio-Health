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
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/new_product.css">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <script src="JS/general.js"></script>
    <script src="JS/navbar.js"></script>
    
</head>

<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100">
    
    <?php 
    
     include "PHP_Back_End/db_connection.php";
     session_start();

     include "UserNavbar.php"; 

     $userId = $_SESSION['ID'];

     $sql = "SELECT Full_Name, City, Address, State, Zip_Code, Phone_Number
             FROM userinfo
             WHERE User_ID = '$userId'";
     
     $res = $con->query($sql);
     $row = mysqli_fetch_row($res);

     $fullName = "";
     $city = "";
     $address = "";
     $state = "";
     $zipCode = "";
     $phoneNumber = "";

     if ($row) {
        $fullName = $row[0];
        $city = $row[1];
        $address = $row[2];
        $state = $row[3];
        $zipCode = $row[4];
        $phoneNumber = $row[5];
     }

     $con->close();
    ?>
    <br>

    <section class="main-section">
        <div class="main-container row text-center" style="margin: 0">
            <div class="solid-border col-8 container big-container">
                <div class="d-flex justify-content-center py-1">
                    <h1 class="dark-green extra-spacing header-text m-0">Account Information</h1>
                </div>
                <hr class="hr-border m-0">

               
                <?php
                    echo'<form action="PHP_Back_End/account_info.php" method="post">
                        <div>
                            <div class="field d-flex flex-column">
                                <label for="product_name" class="product_label">Full Name</label>
                                <input type="text" id="product_name" class="account-input text-center" name="full_name" value="'.$fullName.'" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="city" class="product_label">City</label>
                                <input type="text" id="city" class="account-input text-center" name="city" value="'.$city.'" required>
                            </div>
                                    
                            <div class="field d-flex flex-column">
                                <label for="address" class="product_label">Address</label>
                                <input type="text" id="address" class="account-input text-center" name="address" value="'.$address.'" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="state" class="product_label">State</label>
                                <input type="text" id="state" class="account-input text-center" name="state" value="'.$state.'" required>
                            </div>

                            <div class="field d-flex flex-column">
                                <label for="zip_code" class="product_label">Zip Code</label>
                                <input type="number" id="zip_code" class="account-input text-center" name="zip_code" value="'.$zipCode.'" required>
                            </div>
                                    
                            <div class="field d-flex flex-column">
                                <label for="phone_number" class="product_label">Phone Number</label>
                                <input type="number" id="phone_number" class="account-input text-center" name="phone_number" value="'.$phoneNumber.'" required>
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

