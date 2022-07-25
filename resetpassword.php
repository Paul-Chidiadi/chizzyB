<?php
    include 'conn.php';
    require_once 'function.php';

    if (isset($_GET['email']) && isset($_GET['token'])) {

        $email = $_GET['email'];
        $token = $_GET['token'];

        $sql = $conn->query("SELECT id FROM customer_info WHERE email='$email' AND token='$token' AND
            token<>'' AND tokenExpire > NOW()");
        if ($sql->num_rows > 0) {

            # generate new password
            $newpassword = generateDigits(7);
            # encrypt new password
            $encrypt_password = password_hash($newpassword, PASSWORD_BCRYPT);
            # $encrypt_password = md5($newpassword);--> another way of hashing password.
            $conn->query("UPDATE customer_info SET token='nil', password='$encrypt_password' WHERE email='$email'");

            echo "Your new password is <b>$newpassword<b> <br> 
            <a href='access.php'>Click here to LOGIN</a>";
        }else {
            header('Location: access.php');
        }
    } else {
        header('Location: access.php');
        exit();
    }




?>