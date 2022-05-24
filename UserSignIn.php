<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Bio&Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <script src="JS/navbar.js"></script>

</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100">

    <?php include "Navbar.php"; ?>
    <br>

    <section class="main-section">
        <div action="sign_in.php" onsubmit="localStorage.setItem('signed_in_status', '1');" class="main-container">
            <div class="container-fluid d-flex flex-row justify-content-center text-center" >
                <div class="solid-border col-6 container big-container">

                    <div class="d-flex justify-content-center py-1">
                        <h1 class="dark-green extra-spacing header-text mb-0">Sign in to Bio&Health</h1>
                    </div>
                    <hr class="hr-border m-0">

                    <br>


                    <h5 class="dark-green header-text m-0 py-2">With your account</h5>
                    <form action="PHP_Back_End/sign_in.php" method="post">
                        <div class="input-icons text-center">
                            <i class="fa-solid fa-lg fa-envelope icon big-icon"></i>
                            <input type="text" class="input-field" placeholder="Email or username" name="email_or_username" required>
                            <br>
                            <i class="fa-solid fa-lg fa-lock icon big-icon"></i>
                            <input type="password" class="input-field" placeholder="Password" name="password" required>
                            <br>
                            <a href="#" class="forgot-password text-decoration-none dark-green">Forgot your password?</a>
                        </div>
                        <br>
                        <button class="button sign-btn solid-border bot-margin dark-green my-3" type="submit">Sign in</button>
                    </form>
                    <h5 class="dark-green header-text pt-5" style="margin-top: 50px";>With your Socials</h5>

                    <div class="social-icons mx-0 my-1">
                        <a href="https://facebook.com" class="dark-green"><i class="fa-brands fa-facebook fa-2x social"></i></a>
                        <a href="https://instagram.com" class="dark-green"><i class="fa-brands fa-instagram fa-2x social"></i></a>
                        <a href="https://google.com" class="dark-green"><i class="fa-brands fa-google fa-2x social"></i></a>
                        <a href="https://twitter.com" class="dark-green"><i class="fa-brands fa-twitter fa-2x social"></i></a>
                    </div>

                    
                    <br>
                </div>
                <div class="solid-border col-3 container small-container">
                    <div class="logo mt-3">
                        <a href="#"><img src="sources/images/bioandhealthlogo.png" width="128" height="128" alt="Logo"></a>
                    </div>
                    <h2 class="dark-green header-text my-5">Don't have an account?</h2>
                    <h6 class="fill-text mx-0">Don't worry, you can sign up with the button below</h6>
                    <div class="mt-5">
                        <a href="UserSignUp.php" class="button sign-btn2 dark-green extra-spacing solid-border" >Sign Up</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br>

    <?php 
        include "Footer.php";
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>