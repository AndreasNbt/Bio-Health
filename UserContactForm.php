<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Bio & Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <link href="htxxtps://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap"
        rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="stylesheet" href="CSS/contactpage.css">
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <link rel="stylesheet" href="CSS/new_product.css">
    <script src="JS/navbar.js"></script>
</head>


<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100 grey-background">

    <?php 
        include "PHP_Back_End/db_connection.php";
        session_start();

        include "UserNavbar.php"; 

        $userId = $_SESSION['ID'];

        $sql = "SELECT Full_Name
                FROM userinfo
                WHERE User_ID = '$userId'";
        
        $res = $con->query($sql);
        $fullName = mysqli_fetch_row($res)[0];

        $sql = "SELECT email
                FROM users
                WHERE user_id = '$userId'";
        
        $res = $con->query($sql);
        $email = mysqli_fetch_row($res)[0];

        $con->close();
   ?>

    <section class="main-section">
        <div class="main-container row text-center" style="margin-right: 0">
            <div class="solid-border col-8 mb-5 container big-container">
                <div class="d-flex justify-content-center py-3">
                    <h1 class="dark-green extra-spacing header-text m-0">Contact Us</h1>
                </div>
                <hr class="hr-border m-0">

                <form id="form" action="UserContactFormCompletion.php" method="post">
                    <div>
                        <div class="field d-flex flex-column">
                            <label for="name" class="product_label text-start">Your Name</label>
                            <input type="text" id="name" class="product-input-field form-control" name="name" value="<?php echo $fullName ?>" required>
                        </div>

                        <div class="field d-flex flex-column">
                            <label for="email" class="product_label text-start">Email</label>
                            <input type="email" id="email" class="product-input-field form-control" name="email" value="<?php echo $email ?>" required>
                        </div>

                        <div class="field d-flex flex-column">
                            <label for="topic" style="--bs-gutter-x: 0">Topic:</label>
                            <select class="form-control form-select text-start" id="topic" name="topic">
                                <option value="transactionProblem">Problem with a transaction</option>
                                <option value="missingOrder">Order is missing</option>
                                <option value="questionAboutStock">Question about a product's stock</option>
                                <option value="other">Other</option>
                            </select>                    
                        </div>   

                        <div class="field d-flex flex-column">
                            <label for="message" class="product_label text-start">Enter your message below:</label>
                            <textarea  id="message" class="product-input-area form-control" name="message" required></textarea>
                        </div>
                    </div>

                    <button class="button sign-btn solid-border dark-green extra-spacing mt-4" style="margin-bottom: 1.5rem" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <br>

    <?php 
        include "Footer.php";
    ?>
</body>

</html>