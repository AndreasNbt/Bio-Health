<?php

    session_start();
    include ("db_connection.php");

    if (isset($_POST['email_or_username']) &&  isset($_POST['password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        

        $email_or_username = validate($_POST['email_or_username']);
        $password = validate($_POST['password']);

        if (empty($email_or_username)) {
            header("Location: ../UserSignUp.php?error=Email is required");
            exit();
        }
        else if (empty($password)) {
            header("Location: ../UserSignUp.php?error=Password is required");
            exit();
        }
        else {

            $sql = "SELECT * 
                    FROM user_credentials
                    WHERE (user_credentials.Email = '$email_or_username' 
                        OR user_credentials.Username = '$email_or_username')
                        AND user_credentials.Password = '$password' ";

            $res = $con->query($sql);

            if (mysqli_num_rows($res) === 1 ){

                $row = mysqli_fetch_row($res);

                $_SESSION['ID'] = $row[0];
                $_SESSION['Username'] = $row[2];
                
                $con -> close();
                header("Location: ../Index.php");
            }
            else {
                header("Location: ../UserSignIn.php?error=User not found");
                exit();
            }
        }
    } 
    else {
        header("Location: ../UserSignIn.php");
        exit();
    }

?>