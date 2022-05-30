<?php

    session_start();
    include "db_connection.php";

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $username = validate($_POST['username']);
    $password = validate($_POST['password']);
    
    if (empty($email)) {
        header("Location: ../UserSignUp.php?error=Email is required");
        exit();
    }
    else if (empty($username)) {
        header("Location: ../UserSignUp.php?error=Username is required");
        exit();
    }
    else if (empty($password)) {
        header("Location: ../UserSignUp.php?error=Password is required");
        exit();
    }

    $id = $_SESSION['ID'];

    $sql = "UPDATE user 
            SET email = '$email', username = '$username', password = '$password'
            WHERE user_id = '$id'";

    $res = $con->query($sql);
    $con -> close();

    if ($res) {
        echo "Data updated";
        header("Location: ../Index.php");
    }
    else {
        echo "There was a problem updating the data, please try later";
        header("Location: ../UserAccountManagement.php?error=problem updating data");
    }
    
?>