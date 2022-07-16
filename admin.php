<?php

    if(isset($_POST['submit'])) {
        $name = $_POST['username'];
        $password = $_POST['password'];


        if($name === "admin") {
            if($password === "chizzy") {
                header('Location: uploads_admin.php');
            }else {
                header('Location: admin.php?msg=password is not valid');
            }
        }else {
            header('Location: admin.php?msg=username is not valid');
        }


    }


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <title>CHIZZYB COUTURE | Admin</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/admin.css" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>

    <div class="container">
        <h1>Admin Login</h1>
        <form action="admin.php"  method="post" class="admin-form">
            <input type="text" name="username" placeholder="username" required>
            <input type="text" name="password" placeholder="password" required>
            <input type="submit" name="submit" class="btn" value="LOGIN">
            <div class="mssgg">
                <?php
                    if(isset($_GET['msg'])) {
                        echo $_GET['msg'];
                    }else {
                        echo "";
                    }

                ?>
            </div>
        </form>
    </div>

  </body>
</html>