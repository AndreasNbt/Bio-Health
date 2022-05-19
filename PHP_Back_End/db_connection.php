
<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "biohealth";

$con = mysqli_connect($sname, $uname, $password, $db_name);

if (!$con) {
    echo "Connection failed!";
}
