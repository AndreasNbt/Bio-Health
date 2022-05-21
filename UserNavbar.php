<section id="navbar">
        <nav class="navbar d-flex justify-content-between left-right-only-pad light-green">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars fa-2x"></i>
            </button>
            <a href="Index.php" class="navbar-logo dark-gray">
                <h1 class="navbar-logo-1">Bio &</h1>
                <h1 class="position-relative navbar-logo-2">Health</h1>
            </a>
            <form class="form-inline d-flex flex-row search" action="UserSearch.php" method="post">
                <input name="search_key" class="form-control search-bar" type="text" placeholder="Search for a product">
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
