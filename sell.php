<?php
    session_start();

    # if user is not logged in take them back to login page(access.php)
    if (!isset($_SESSION['loggedIN'])) {
        header('Location: access.php');
        exit();
    }
    $email = $_SESSION['email'];

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <title>CHIZZYB | STORE | PRODUCTS</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/sell.css" />
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
      <nav>
          <ul>
            <li class="list">
              <a href="">
                  <span class="icon"><i class='bx bx-home'></i></span>
                  <span class="text">HOME</span>
              </a>  
            </li>
            <li class="list">
                <a href="">
                  <span class="icon"><i class='bx bx-store' ></i></span>
                  <span class="text">PRODUCTS</span>
                </a>
            </li>
            <li class="list">
                <a href="">
                  <span class="icon"><i class='bx bx-message-alt-dots'></i></span>
                  <span class="text">CONTACTS</span>
                </a>
            </li>
            <li class="list">
                <a href="">
                  <span class="icon"><i class='bx bx-log-out-circle'></i></span>
                  <span class="text">LOGOUT</span>
                </a>
            </li>
            <div class="indicator"></div>
          </ul>
      </nav>
      <!-- menu button -->
      <div class="menubtn">
          <i class="bx bx-menu"></i>
      </div>
    </div>

    



  </body>
</html>