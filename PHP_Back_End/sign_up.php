
<?php

    session_start();
    include ("db_connection.php");

    if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm-password'])) {

        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = validate($_POST['email']);
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);
        $confpassword = validate($_POST['confirm-password']);

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
        else if ($password != $confpassword) {
            header("Location: ../UserSignUp.php?error=Passwords do not match");
            exit();
        }
        else {

            $sql = "SELECT * 
                    FROM users
                    WHERE users.email = '$email'
                        OR users.username = '$username' ";

            $res = $con->query($sql);

            if (mysqli_num_rows($res) === 0 ){
                $sql = "INSERT INTO users(email, username, password, role)
                        VALUES ('$email', '$username', '$password', 2)";
                
                $con->query($sql);

                $get_last_row = "SELECT *  
                                 FROM users
                                 WHERE user_id = (SELECT max(user_id) FROM users)";

                $res = $con -> query($get_last_row);
                $row = mysqli_fetch_row($res);

                echo "Successfully signed up!";
                
                $_SESSION['ID'] = $row[0];
                $_SESSION['Username'] = $row[1];

                
                $id = $_SESSION['ID'];
                $sql2 = "INSERT INTO userinfo(User_ID)
                            VALUES ('$id')";

                $con->query($sql2);

                $con -> close();
                header("Location: ../Index.php");
            }
            else {
                header("Location: ../UserSignUp.php?error=User already exists");
                exit();
            }
        }
    } 
    else {
        header("Location: ../UserSignUp.php");
        exit();
    }

?>