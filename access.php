<?php
 
    include 'conn.php';

    session_start();
    # if user is already logged in take them to the store already(sell.php)
    /*if(isset($_SESSION['loggedIN'])) {
        header('Location: sell.php');
        exit();
    }*/

    # LET USER LOGIN
    if (isset($_POST['log'])) {
        # code...
        $email = $_POST['email'];
        $password = $_POST['password'];

        $data = $conn->query("SELECT id from customer_info WHERE email='$email' AND password='$password'");
        if($data->num_rows > 0) {
            $_SESSION['loggedIN'] = '1';
            $_SESSION['email'] = $email; 
            header('Location: sell.php');
        }else {
            header('Location: access.php?msg=invalid username or password');
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
    <title>CHIZZYB | Login | Resgister</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/access.css" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>

    <!-- NAVIGATION BAR -->
    <div class="header">
        <div class="logo">CHIZZYB COUTURE</div>
        <a href="index.html" class="btn">Home &#8594;</a>
    </div>

    <div id="login" class="access active">
        <h2>LOGIN</h2>
        <form action="access.php" class="access-form" method="post">
            <input type="email" name="email" class="control" placeholder="email">
            <input type="password" name="password" class="control" placeholder="password">
            <a href="">Forgot Password &#8594;</a>
            <div class="mssg">
                <?php 
                    if (isset($_GET['msg'])) {
                        echo $_GET['msg']; 
                    }else {
                        echo "";
                    }            
                ?>
            </div>
            <input type="submit" name="log" value="LOGIN" class="btn">
        </form>
        <a id="new" href="">Create New Account &#8594;</a>
    </div>

    <div id="register" class="access">
        <h2>SIGN UP</h2>
        <form action="access.php" class="access-form" method="post">
            <input type="email" id="email" class="control" placeholder="email">
            <input type="password" id="password" class="control" placeholder="password">
            <input type="password" id="con-pass" class="control" placeholder="confirm password">
            <input type="button" name="sign" value="Sign Up" class="btn">
        </form>
        <a id="instead" href="">Login instead &#8594;</a>
    </div>

    <!-- Javascript code and files/libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">

        // code for switching from login to sign up
        let login = document.querySelector("#login");
        let register = document.querySelector("#register");
        let newAcc = document.querySelector("#new");
        let instead = document.querySelector("#instead");

        newAcc.addEventListener("click", (e) => {
        e.preventDefault();
        login.classList.remove("active");
        register.classList.add("active");
        });

        instead.addEventListener("click", (e) => {
        e.preventDefault();
        login.classList.add("active");
        register.classList.remove("active");
        });

    </script>

  </body>
</html>