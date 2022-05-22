<?php
include("db_connection.php");
include("search_functions.php");
if (isset($_GET['key']) and isset($_GET['category']) and isset($_GET['order'])) {
    updateSearchResults($_GET['key'], $_GET['category'], $_GET['order'], 'user');
}
mysqli_close($con);
?>
</body>