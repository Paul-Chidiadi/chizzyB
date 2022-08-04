<?php
  include 'conn.php';
    session_start();

    # if user is not logged in take them back to login page(access.php)
    if (!isset($_SESSION['loggedIN'])) {
        header('Location: access.php');
        exit();
    }
    $email = $_SESSION['email'];

    #received product id from sell.php and use as reference to get product from database
    if(isset($_GET['id'])) {
        $my_id = $_GET['id'];
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

        <!-- get product detail where id is the id variable collected from sell.php using GET method -->
        <?php
            $sql = $conn->query("SELECT * FROM goods WHERE id='$my_id'");
            while($data = $sql->fetch_array()) {
                $images = $data['image_url'];
                $name = $data['name'];
                $price = $data['price'];
                $detail = $data['detail'];
            }
        ?>


        <!-- PRODUCT DETAIL -->
        <div class="row">
            <div class="row-2">
                <img id="img" src="<?php echo $images;?>" alt="">
            </div>
            <div class="row-2">
                <div class='star'>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star'></i>
                    <i class='bx bxs-star-half' ></i>
                    <i class='bx bx-star'></i>
                </div>
                <div id="name" class='name'><?php echo $name;?></div>
                <div id="price" class='price'><?php echo $price;?></div>
                <label>Product Detail</label>
                <small class='detail'><?php echo $detail;?></small>
                <select id="size" class="select">
                    <option value="">Select Size</option>
                    <option value="XXL">XXL</option>
                    <option value="XL">XL</option>
                    <option value="Large">Large</option>
                    <option value="Medum">Medium</option>
                    <option value="Small">Small</option>
                </select>
                <input class="qty" type="number" value="1">
                <input type="text" id="ided" class="select" value="Product_id: <?php echo $my_id;?>" readonly>
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
                        <a href='detailed.php?id=". $data['id']. "' class='btn'>See more</a>
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

    <!-- Javascript code and files/libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <script src="javaScript/storage.js"></script>

  </body>
</html>