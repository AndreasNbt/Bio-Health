
<?php

    session_start();
    include "db_connection.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $full_name = validate($_POST['full_name']);
    $city = validate($_POST['city']);
    $address = validate($_POST['address']);
    $state = validate($_POST['state']);
    $zip_code = validate($_POST['zip_code']);
    $phone_number = validate($_POST['phone_number']);


    $id = $_SESSION['ID'];

    $sql = "UPDATE user_information  
            SET Full_Name = '$full_name', City = '$city', Address = '$address', State = '$state',
                Zip_Code = '$zip_code', Phone_Number = '$phone_number'
            WHERE User_ID = $id";   

    $res = $con->query($sql);
    $con -> close();

    if ($res) {
        echo "Data updated";
        header("Location: ../Index.php");
    }
    else {
        echo "There was a problem updating the data, please try later";
        header("Location: ../UserAccountInfo.php?error=problem updating data");
    }
    
?>