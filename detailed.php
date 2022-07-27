<?php
  include 'conn.php';
    session_start();

    # if user is not logged in take them back to login page(access.php)
    if (!isset($_SESSION['loggedIN'])) {
        header('Location: access.php');
        exit();
    }
    $email = $_SESSION['email'];
    $images = $_SESSION['image'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <title>CHIZZYB | PRODUCTS DETAIL</title>

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
              <a href="sell.php#home">
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
                <a href="sell.php#contact">
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
    </div>

    <!-- MAIN BODY -->
    <div class="main">


        <!-- PRODUCT DETAIL -->
        <div class="row">
            <div class="row-2">
                <img src="<?php echo $images;?>" alt="">
            </div>
            <div class="row-2">
                <div class='star'>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half' ></i>
                    <i class='bx bx-star'></i>
                </div>
                <!-- get product detail where image is the image variable collected from SESSION -->
                <?php
                    $sql = $conn->query("SELECT * FROM goods WHERE image_url='$images'");
                    while($data = $sql->fetch_array()) {
                        $name = $data['name'];
                        $price = $data['price'];
                        $detail = $data['detail'];
                    }
                ?>
                <div class='name'><?php echo $name;?></div>
                <div class='price'><?php echo $price;?></div>
                <label>Product Detail</label>
                <small class='detail'><?php echo $detail;?></small>
                <select class="select">
                    <option value="">Select Size</option>
                    <option value="XXL">XXL</option>
                    <option value="XL">XL</option>
                    <option value="Large">Large</option>
                    <option value="Medum">Medium</option>
                    <option value="Small">Small</option>
                </select>
                <input class="qty" type="number" value="1">
                <a href="cart.php" class="btn">Add to cart &#8594;</a>

            </div>
        </div>

        <!-- PRODUCT SECTION -->
        <div id="products" class="products">
            <div class="title">RELATED PRODUCTS</div>
            <div  class="roww">
            <div class="small">
                <?php
                $sql = $conn->query("SELECT * FROM goods LIMIT 3 OFFSET 3");
                if($sql->num_rows > 0) {
                    while($data = $sql->fetch_array()) {
                    echo "
                    <div class='col'>
                        <img id='images' src='". $data['image_url']. "'>
                        <div class='star'>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star'></i>
                            <i class='bx bxs-star-half' ></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class='name'>". $data['name']. "</div>
                        <div class='price'>". $data['price']. "</div>
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


        <!-- FOOTER -->
        <footer id="footer" class="foot">
            <div class="row">
                <div class="author">
                    <p class="copyright-text">© ChizzyB COUTURE</p>
                    <div class="credits">Designed by paulchidiadi@gmail.com</div>
                </div>

                <div class="foot-nav">
                    <ul class="list">
                        <li class="list-item">
                            <a href="sell.php#home">Home</a>
                        </li>

                        <li class="list-item">
                            <a href="#products">Products</a>
                        </li>

                        <li class="list-item">
                            <a href="sell.php#contact">Contact</a>
                        </li>

                        <li class="list-item">
                            <a href="cart.php">Cart</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>


    </div>

  </body>
</html>