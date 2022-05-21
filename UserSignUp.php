<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Bio&Health</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alegreya&family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <link href="http://fonts.cdnfonts.com/css/sensei" rel="stylesheet">
    <link rel="stylesheet" href="CSS/Sign Up-In.css">
    <link rel="stylesheet" href="CSS/navbar.css">
    <script src="https://kit.fontawesome.com/61e165c770.js" crossorigin="anonymous"></script>
    <script src="JS/general.js"></script>
    <script src="JS/navbar.js"></script>
    
</head>
<body onload="UpdateDropdown(localStorage.getItem('signed_in_status'))" class="d-flex flex-column min-vh-100">

    <?php include "UserNavbar.php"; ?>
    <br>

    <section class="main-section" >
        <div class="main-container">
            <div class="container-fluid d-flex justify-content-center text-center" >
                <div class="solid-border col-6 container big-container">
                    <div class="text-center py-1">
                        <h1 class="dark-green extra-spacing header-text mb-0">Create an account</h1>
                    </div>
                    <hr class="hr-border m-0">

                    <h5 class="dark-green header-text pt-4">With your Email</h5>
                    <form action="PHP_Back_End/sign_up.php" method="post" onsubmit="localStorage.setItem('signed_in_status', '1');">
                        <div class="input-icons text-center">
                            <i class="fa-solid fa-envelope icon"></i>
                            <input type="text" class="input-field" placeholder="Email" name="email" required>
                            <br>
                            <i class="fa-solid fa-user icon"></i>
                            <input type="text" class="input-field" placeholder="Username" name="username" required>
                            <br>
                            <i class="fa-solid fa-lock icon"></i>
                            <input type="password" class="input-field" placeholder="Password" name="password" required>
                            <br>
                            <i class="fa-solid fa-lock icon"></i>
                            <input type="password" class="input-field" placeholder="Confirm Password" name="confirm-password" required>
                            <br>
                        </div>

                        <button class="button sign-btn solid-border dark-green extra-spacing mt-3" type="submit" name="sign-up-submit">Sign Up</button>
                    </form>

                    <h5 class="dark-green header-text pt-2 mt-5">With your Socials</h5>

                    <div class="social-icons my-1">
                        <a href="https://facebook.com" class="dark-green"><i class="fa-brands fa-facebook fa-2x social"></i></a>
                        <a href="https://instagram.com" class="dark-green"><i class="fa-brands fa-instagram fa-2x social"></i></a>
                        <a href="https://google.com" class="dark-green"><i class="fa-brands fa-google fa-2x social"></i></a>
                        <a href="https://twitter.com" class="dark-green"><i class="fa-brands fa-twitter fa-2x social"></i></a>
                    </div>

                </div>
                <div class="solid-border col-3 container small-container">

                    <div class="logo mt-3">
                        <a href="#"><img src="sources/images/bioandhealthlogo.png" width="128" height="128" alt="Logo"></a>
                    </div>
                    <h2 class="dark-green header-text my-5">Already have an account?</h2>
                    <h6 class="fill-text">You can sign in with the button below</h6>
                    <div class="mt-5">
                        <a href="UserSignIn.php" class="button sign-btn2 dark-green extra-spacing solid-border" >Sign In</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <br>

    <?php include "UserFooter.php"; ?>


    <!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


