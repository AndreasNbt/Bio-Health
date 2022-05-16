<section id="navbar">
    <nav class="navbar d-flex justify-content-between left-right-only-pad light-green">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <a href="AdminIndex.php" class="navbar-logo dark-gray">
            <h1 class="navbar-logo-1">Bio &</h1>
            <h1 class="position-relative navbar-logo-2">Health</h1>
        </a>
        <form class="form-inline d-flex flex-row search" action="AdminSearch.php">
            <input class="form-control search-bar" type="text" placeholder="Search for a product">
            <button type="submit" class="search-button position-relative"><i class="fa-solid fa-magnifying-glass fa-lg dark-green"></i></button>
        </form>
        <div class="navbar-nav d-flex flex-row justify-content-between">
            <div class="dropdown">
                <a class="nav-item nav-link nav-icon text-center dark-gray" style="margin-right: 0" href="#"><i class="fa-solid fa-user-gear fa-2x"></i></a>
                <div class="dropdown-content">
                    <a class="signedout" href="UserSignIn.html">Sign in</a>
                    <a class="signedout" href="UserSignUp.html">Create an account</a>
                    <a class="signedin" href="UserAccountInfo.html">Account Information</a>
                    <a class="signedin" onclick="localStorage.setItem('signed_in_status', '0');UpdateDropdown(0)" href="Index.php">Log out</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="container-fluid left-right-only-pad light-green m-0">
            <ul id="categories" class="nav">
                <li class="nav-item">
                    <a class="nav-link ps-0" href="AdminPendingOrders.php">Pending orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AdminNewProduct.php">Add products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AdminSearch.php">Edit products</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<hr class="big-hr m-0">