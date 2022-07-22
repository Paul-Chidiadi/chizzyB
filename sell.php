<?php
  include 'conn.php';
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
              <a href="#home">
                  <span class="icon"><i class='bx bx-home'></i></span>
                  <span class="text">HOME</span>
              </a>  
            </li>
            <li class="list">
                <a href="#products">
                  <span class="icon"><i class='bx bx-store' ></i></span>
                  <span class="text">PRODUCTS</span>
                </a>
            </li>
            <li class="list">
                <a href="#contact">
                  <span class="icon"><i class='bx bx-message-alt-dots'></i></span>
                  <span class="text">CONTACT</span>
                </a>
            </li>
            <li class="list">
                <a href="logout.php">
                  <span class="icon"><i class='bx bx-log-out-circle'></i></span>
                  <span class="text">LOGOUT</span>
                </a>
            </li>
            <li class="list">
                <a href="cart.php">
                  <span class="icon"><i class='bx bx-cart'></i></i></span>
                  <span class="text">CART</span>
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

    <!-- MAIN BODY -->
    <div class="main">

      <!-- HOME SECTION -->
      <div id="home" class="row">
        <div class="col-1">
          <h1>Give Your Wardrobe <br> A New Style!</h1>
          <small>A smart look isn't always about expensive cloths. <br>It's about making
            the right choice. Wearing the right  <br>cloths makes the greatness!
          </small>
          <a href="#products" class="btn">Explore now &#8594;</a>
        </div>
        <div class="col-2">
          <img src="imgs/cart.jpg" alt="">
        </div>
      </div>

       <!-- PRODUCT SECTION -->
      <div id="products" class="products">
        <div class="title">FEATURED PRODUCTS</div>
        <div  class="roww">
          <div class="small">
            <?php
              $sql = $conn->query("SELECT * FROM goods LIMIT 3");
              if($sql->num_rows > 0) {
                while($data = $sql->fetch_array()) {
                  echo "
                  <div class='col'>
                    <img src='". $data['image_url']. "'>
                    <div class='star'>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star-half' ></i>
                      <i class='bx bx-star'></i>
                    </div>
                    <div class='name'>". $data['name']. "</div>
                    <div class='price'>". $data['price']. "</div>
                    <small class='detail'>". $data['detail']. "</small>
                  </div> 
                  ";
                }
              }else {
                echo "
                <div class='small'>
                 <p>No product available yet!</p>
                </div>                
                ";
              }
            ?>
          </div>
          <div class="small">
            <?php
              $sql = $conn->query("SELECT * FROM goods LIMIT 3");
              if($sql->num_rows > 0) {
                while($data = $sql->fetch_array()) {
                  echo "
                  <div class='col'>
                    <img src='". $data['image_url']. "'>
                    <div class='star'>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star'></i>
                      <i class='bx bxs-star-half' ></i>
                      <i class='bx bx-star'></i>
                    </div>
                    <div class='name'>". $data['name']. "</div>
                    <div class='price'>". $data['price']. "</div>
                    <small class='detail'>". $data['detail']. "</small>
                  </div> 
                  ";
                }
                
              }else {
                echo "
                <div class='small'>
                 <p>No product available yet!</p>
                </div>                
                ";
              }
            ?>
          </div>

        </div>
      </div>



    </div>





  </body>
</html>