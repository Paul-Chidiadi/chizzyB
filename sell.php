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
    <title>CHIZZYB | SELL | PRODUCTS</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/access.css" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body></body>
</html>