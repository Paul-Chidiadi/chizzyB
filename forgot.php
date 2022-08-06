<?php
    use PHPMailer\PHPMailer\PHPMailer;

    include 'conn.php';
    require_once 'function.php';

    if (isset($_POST['forgot'])) {
        # code...
        $email = $_POST['email'];

        $sql = $conn->query("SELECT id FROM customer_info WHERE email= '$email'");
        if ($sql->num_rows > 0) {
            $token = generateDigits(10);
            $conn->query("UPDATE customer_info SET token='$token', tokenExpire=DATE_ADD(NOW(),
             INTERVAL 5 MINUTE) WHERE email='$email'");
            
            require_once 'PHPMailer/Exception.php';
            require_once 'PHPMailer/PHPMailer.php';
    
            $mail = new PHPMailer();
            $mail->addAddress($email, $name);
            $mail->setFrom("chizzyBcouture@gmail.com", "CHIZZYB COUTURE");
            $mail->Subject = "RESET PASSWORD";
            $mail->isHTML(true);
            $mail->Body = "
            Hi, <br><br>
            
            In order to reset your password, please click the link below<br>
            <a href='chizzyB.com/resetpassword.php?email=$email&token=$token'>
                chizzyB.com/resetpassword.php?email=$email&token=$token
            </a> <br><br> 

            Kind Regards,<br>
            CHIZZYB.
            ";
            $mail->send();
            if($mail->send()){
                header('Location: forgot.php?msg=Check your mail inbox!');
            }else{
                header('Location: forgot.php?msg=Error sending messge, try again!');
            }

        }else {
            header('Location: forgot.php?msg=Email does not exist, check your input');
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
    <title>CHIZZYB | FORGOT PASSWORD</title>

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

        <!-- FORGOT SECTION -->
        <div class="access active">
        <h2>FORGOT PASSWORD</h2>
        <form action="forgot.php" class="access-form" method="post">
            <input type="email" name="email" class="control" placeholder="email" required>
            <div class="mssg">
                <?php 
                    if (isset($_GET['msg'])) {
                        echo $_GET['msg']; 
                    }else {
                        echo "";
                    }            
                ?>
            </div>
            <input type="submit" name="forgot" value="send" class="btn">
        </form>
    </div>



  </body>


</html>