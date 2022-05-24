<?php
    session_start();
    function echoCategory($row) {
        echo  '<li class="nav-item">';
        echo      '<a class="nav-link ps-0" href="UserSearch.php?search_key=&category=1">'.$row[0].'</a>';
        echo  '</li>';
    }
?>
<section id="navbar">
    <nav class="navbar d-flex justify-content-between left-right-only-pad light-green">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars fa-2x"></i>
        </button>
        <a href="Index.php" class="navbar-logo dark-gray">
            <h1 class="navbar-logo-1">Bio &</h1>
            <h1 class="position-relative navbar-logo-2">Health</h1>
        </a>
        <?php
            
            if (basename($_SERVER["SCRIPT_FILENAME"]) == 'UserSearch.php') {
                echo "<form id='search_bar' class='form-inline d-flex flex-row search'>";
            }
            else if (basename($_SERVER["SCRIPT_FILENAME"]) == 'AdminSearch.php') {
                echo "<form id='search_bar' class='form-inline d-flex flex-row search'>";
            }
            else if (isset($_SESSION['role']) && $_SESSION['role'] == 'Administrator' ) {
                echo "<form id='search_bar' action='AdminSearch.php' method='get' class='form-inline d-flex flex-row search'>";
            }
            else  {
                echo "<form id='search_bar' action='UserSearch.php' method='get' class='form-inline d-flex flex-row search'>";
            }
            if (isset($_GET['search_key'])) {
                function validate($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $search_key = validate($_GET['search_key']);
                echo "<input name='search_key' id='search_key' class='form-control search-bar' type='text' placeholder='Search for a product' value='$search_key' onkeyup='updateShownKey()'>";
            }
            else {
                echo "<input name='search_key' id='search_key' class='form-control search-bar' type='text' placeholder='Search for a product' onkeyup='updateShownKey()'>";
            }
            echo "<button type='submit' class='search-button position-relative'><i class='fa-solid fa-magnifying-glass fa-lg dark-green'></i></button>";
            echo "</form>";
        ?>
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
                <?php
                    include "PHP_Back_End/db_connection.php"; 

                    if (isset($_SESSION['role']) && $_SESSION['role'] == 'Administrator') {
                        echo'<li class="nav-item">
                            <a class="nav-link ps-0" href="AdminPendingOrders.php?order_row=latest_delivery&order_type=ASC">Pending orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AdminNewProduct.php">Add products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="AdminSearch.php?search_key=">Edit products</a>
                        </li>';
                    }
                    else {
                        $sql = "SELECT name FROM category";

                        $res = $con->query($sql);
    
                        while ($row = mysqli_fetch_row($res)) {
                            echoCategory($row);
                        }
                    } 
                ?>
            </ul>
        </div>
    </div>
</section>

<hr class="big-hr m-0">