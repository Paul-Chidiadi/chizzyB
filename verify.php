<?php
    include 'conn.php';

    if (isset($_POST['verify'])) {
        # code...
        $email = $_POST['email'];
        $verify_code = $_POST['verify_code'];
        
        $data = $conn->query("SELECT id from customer_info WHERE email = '$email' and verify_code = '$verify_code'");
        if($data->num_rows > 0) {
            $sql = $conn->query("UPDATE customer_info SET verified_at = NOW() WHERE email = '$email' and verify_code = '$verify_code'"); 
            if ($sql) {
               header('Location: access.php');
            }else {
                header('Location: verify.php?msg=Verification not successful...');
            }
        }else { 
            header('Location: verify.php?msg=email doesnt not exist'); 
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
    <title>CHIZZYB | VERIFICATION</title>

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
        <h2>VERIFY EMAIL</h2>
        <form action="verify.php" class="access-form" method="post">
            <input type="email" name="email" class="control" placeholder="email">
            <input type="password" name="verify_code" class="control" placeholder="Enter verification code">
            <div class="mssg">
                <?php 
                    if (isset($_GET['msg'])) {
                        echo $_GET['msg']; 
                    }else {
                        echo "";
                    }            
                ?>
            </div>
            <input type="submit" name="verify" value="VERIFY EMAIL" class="btn">
        </form>
    </div>


  </body>
</html>