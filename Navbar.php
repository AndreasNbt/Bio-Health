<?php
    session_start();
    function echoNavCategory($row) {
        echo  '<li class="nav-item">';
        echo  '<a class="nav-link ps-0" href="Search.php?search_key=&category=1">'.$row[0].'</a>';
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
            $onkeyup_attribute = "";
            if (basename($_SERVER["SCRIPT_FILENAME"]) == 'Search.php') {
                echo "<form id='search_bar' class='form-inline d-flex flex-row search'>";
                if (!(isset($_SESSION['role'])) or $_SESSION['role'] === "Consumer") {
                    $onkeyup_attribute = " onkeyup='updateShownKey()'";
                }
            }
            else {
                echo "<form id='search_bar' action='Search.php' method='get' class='form-inline d-flex flex-row search'>";
            }
            if (isset($_GET['search_key'])) {
                function validate($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $search_key = validate($_GET['search_key']);
                echo "<input name='search_key' id='search_key' class='form-control search-bar' type='text' placeholder='Search...' value='$search_key'$onkeyup_attribute>";
            }
            else {
                echo "<input name='search_key' id='search_key' class='form-control search-bar' type='text' placeholder='Search...'$onkeyup_attribute>";
            }
            echo "<button type='submit' class='search-button position-relative'><i class='fa-solid fa-magnifying-glass fa-lg dark-green'></i></button>";
            echo "</form>";
        ?>
        <div class="navbar-nav d-flex flex-row justify-content-between">
            <div class="dropdown">
                <a class="nav-item nav-link nav-icon text-center dark-gray me-1" href="#"><i class="fa-solid fa-user-gear fa-2x"></i></a>
                <div class="dropdown-content">
                    <?php
                        if (isset($_SESSION['ID']) and isset($_SESSION['role'])) {
                            echo "<a href='UserAccountInfo.php'>Account Information</a>";
                            echo "<a href='PHP_Back_End/sign_out.php'>Log out</a>";
                        }
                        else {
                            echo "<a href='UserSignIn.php'>Sign in</a>";
                            echo "<a href='UserSignUp.php'>Create an account</a>";
                        }
                    ?>
                </div>
            </div>
            <?php
            if (isset($_SESSION['ID']) and isset($_SESSION['role'])) {
                if ($_SESSION['role'] === "Customer"){
                    echo "<a class='nav-item nav-link nav-icon text-center dark-gray' href='UserCart.php'><i class='fa-solid fa-cart-shopping fa-2x'></i></a>";
                    echo "<a class='nav-item nav-link nav-icon text-center dark-gray' href='UserFavorites.php'><i class='fa-solid fa-heart fa-2x'></i></a>";
                }
            }
            ?>
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
                            <a class="nav-link" href="Search.php?search_key=">Edit products</a>
                        </li>';
                    }
                    else {
                        $sql = "SELECT name FROM category";

                        $res = $con->query($sql);
    
                        while ($row = mysqli_fetch_row($res)) {
                            echoNavCategory($row);
                        }
                    } 
                ?>
            </ul>
        </div>
    </div>
</section>

<hr class="big-hr m-0">