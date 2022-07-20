<?php
    use PHPMailer\PHPMailer\PHPMailer;

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

    # LET USER REGISTER
    if (isset($_POST['sign'])) {
        # code...
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $confirm_password = $_POST['con-pass'];
        $encrypt_password = md5($password);

        # GENERATING VERIFICATION CODE
        $code = "1234567890ABCDEFGHIJ";
        $code = str_shuffle($code);
        $verify_code = substr($code, 0, 6);

        if ($password === $confirm_password) {
            # code...
            $data = $conn->query("SELECT id from customer_info WHERE email= '$email'");
            if($data->num_rows > 0) { 
                header('Location: access.php?mesg=User already exits, choose another email');
            }else {
                #INSERT INTO DATABASE
                $sql = "INSERT INTO customer_info (name, email, password, verify_code, verified_at)
                VALUES ('$name', '$email', '$encrypt_password', '$verify_code', NULL )";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['signedUP'] = '1';

                    require_once 'PHPMailer/Exception.php';
                    require_once 'PHPMailer/PHPMailer.php';
            
                    $mail = new PHPMailer();
                    $mail->addAddress($email, $name);
                    $mail->setFrom("chizzyB@gmail.com", "CHIZZYB COUTURE");
                    $mail->Subject = "EMAIL VERIFICATION";
                    $mail->isHTML(true);
                    $mail->Body = "
                    Hi, <br><br>
                    
                    <p> Your email verification code is <b>'. $verify_code .'</b> </p>
                    <br> 
            
                    Kind Regards,<br>
                    CHIZZYB.
                    ";
                    $mail->send();
                    if($mail->send()){
                        $msg = "Sign up Successful, Message sent to your email";
                        header('Location: verify.php');
                    }else{
                        header('Location: access.php?mesg=Error sending messge');
                    }
                } else {
                    header('Location: access.php?mesg=Sign up failed');
                }
            }

        }else{
            header('Location: access.php?mesg=your password does not match');
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

    <!-- LOGIN SECTION -->
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
    
    <!-- REGISTER SECTION -->
    <div id="register" class="access">
        <h2>SIGN UP</h2>
        <form action="access.php" class="access-form" method="post">
            <input type="email" name="email" class="control" placeholder="email" required>
            <input type="text" name="name" class="control" placeholder="name" required>
            <input type="password" name="password" class="control" placeholder="password" required>
            <input type="password" name="con-pass" class="control" placeholder="confirm password">
            <div class="mssg">
                <?php 
                    if (isset($_GET['mesg'])) {
                        echo $_GET['mesg']; 
                    }else {
                        echo "";
                    }            
                ?>
            </div>
            <input type="submit" name="sign" value="Sign Up" class="btn">
        </form>
        <a id="instead" href="">Login instead &#8594;</a>
    </div>

    <!--if GET request is for login(msg) show login section, if GET request is for register(mesg) show register section-->
    <?php
    
        if (isset($_GET['mesg'])) {
            ?>
            <script>
                // code for switching from login to sign up
                let login = document.querySelector("#login");
                let register = document.querySelector("#register");
                login.classList.remove("active");
                register.classList.add("active");
            </script>
            <?php
        } elseif (isset($_GET['msg'])) {
            ?>
            <script>
                let login = document.querySelector("#login");
                let register = document.querySelector("#register");
                login.classList.add("active");
                register.classList.remove("active");
            </script>
            <?php
        } else {
            ?>
            <script>
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
            <?php
        }
    ?>


    <!-- Javascript code and files/libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript">

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

    </script> -->

  </body>
</html>