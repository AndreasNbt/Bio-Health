
<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "bio_health";

$con = mysqli_connect($sname, $uname, $password, $db_name);

if (!$con) {
    echo "Connection failed!";
}
