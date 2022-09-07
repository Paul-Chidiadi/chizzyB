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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHIZZYB | CART</title>

    
    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/sell.css?<?php echo time(); ?>" />
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
 

    <!-- show cart items -->
    <div class="rowt">
      <table>
        <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Size</th>   
            <th>Subtotal</th>
            <th>R/A</th>
          </tr> 
        </thead>
        <tbody id="body">
            <!-- javaScript generated elements with data from IndexDB local storage database goes in here -->
        </tbody>
      </table>     
    </div>
    <div class="total">
      <table>
        <tr>
          <td>Subtotal</td>
          <td id="sub">$0</td>
        </tr>
        <tr>
          <td>Tax</td>
          <td id="tax">$0</td>
        </tr>
        <tr>
          <td>Total</td>
          <td id="total">$0</td>
        </tr>
      </table>
    </div>
    <!-- checkout button -->
    <form action="pay.php" method="post">
      <input type="hidden" id="email" name="order_email" value="<?php echo $email;?>">
      <input type="hidden" id="products_id" name="order_product">
      <input type="hidden" id="products_info" name="order_productInfo">
      <input type="hidden" id="price" name="order_total">
      <input type="submit" id="check" name="order_send" class="botn" value="Proceed to checkout">
    </form>
    
    
    <!-- PRODUCT SECTION -->
    <div id="products" class="products">
        <div class="title">MORE PRODUCTS</div>
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

  <!-- Javascript code and files/libraries -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://checkout.flutterwave.com/v3.js" ></script>
  <script src="javaScript/receive.js"></script>

</body>
</html>