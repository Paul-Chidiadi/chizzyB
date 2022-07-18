<?php
    include 'conn.php';

    # CODE FOR UPLOADING PRODUCTS INTO DATABASE
    if (isset($_POST['submit'])) {
        # code...
        $name = $_POST['prodname'];
        $price = $_POST['prodprice'];
        $detail = $_POST['proddetails'];

        # product image
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allow = array('jpg', 'jpeg', 'png', 'pdf');

        if (strlen($detail) <= 220) {
            # code...
            if(in_array($fileActualExt, $allow)) {
                if($fileError === 0) {
                    if($fileSize <= 1000000) {
                        $fileNewName = uniqid('IMG-', true).".".$fileActualExt;
                        $fileDestination = 'uploads_admin/'.$fileNewName;
    
                        # Insert  all data into Database
                        $sql = "INSERT INTO goods (name, price, detail, image_url) 
                        VALUES ('$name', '$price', '$detail', '$fileDestination')";
                        if (mysqli_query($conn, $sql)) {
                            # making sure image file  is inserted into database before moving it into its folder on the disk
                            move_uploaded_file($fileTmpName, $fileDestination);
                            header('Location: uploads_admin.php?msg=Data uploaded successfully...#upload');
                        } else {
                            header('Location: uploads_admin.php?msg=Data upload failed...#mssgg');
                        }
                    }else{
                        header('Location: uploads_admin.php?msg=Image file is too large...#upload');
                    }
                }else{
                    header('Location: uploads_admin.php?msg=Error uploading your image, check image and try again!#upload');
                }
            }else{
                header('Location: uploads_admin.php?msg=The image type is not accepted...#upload');
            }
        }else {
            header('Location: uploads_admin.php?msg=Detail message is too long...#upload');
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
    <title>CHIZZYB COUTURE | Admin</title>

    <!--MAin CSS file-->
    <link rel="stylesheet" href="css/admin.css" />
    <!--BOXICONS CSS-->
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet"/>
  </head>
  <body>

    <div class="bodyy">
        <!-- NAVIGATION BAR -->
        <div class="header">
            <div class="logo">CHIZZYB COUTURE</div>
            <nav>
                <ul>
                    <li>
                        <a href="index.html">HOME</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="#upload">UPLOAD</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">ACADEMY</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="#order">ORDERS</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">BLOG</a>
                        <div class="indicator"></div>
                    </li>
                </ul>
            </nav>
            <!-- menu button -->
            <div class="menubtn">
                <i class="bx bx-menu"></i>
            </div>
        </div>

        <div class="body">

            <!-- drop down side bar -->
            <div class="drop">
                <ul>
                    <li>
                        <a href="index.html">HOME</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="#upload">UPLOAD</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">ACADEMY</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="#order">ORDERS</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">BLOG</a>
                        <div class="indicator"></div>
                    </li>
                </ul>
            </div>

            <!-- UPLOAD -->
            <div id="upload" class="sec-head">
                <div class="title">UPLOAD</div>
                <form action="uploads_admin.php" class="product" method="post" enctype="multipart/form-data">
                    <label>Input info for the product you want to add</label>
                    <input type="text" name="prodname" class="control" placeholder="product name" required>
                    <input type="text" name="prodprice" class="control" placeholder="product price eg. $50" required>
                    <textarea type="text" name="proddetails" class="control" placeholder="product detail" required>
                    </textarea>
                    <label>Input image of the product here</label>
                    <input type="file" name="file" class="control" required> 
                    <!--show user success/failure response -->
                    <div class="mssg">
                        <?php 
                            if (isset($_GET['msg'])) {
                                echo $_GET['msg']; 
                            }else {
                                echo "";
                            }            
                        ?>
                    </div>
                    <button  type="submit" name="submit" class="btn">UPLOAD</button>
                </form>
            </div>

            <!-- ORDER SECTION -->
            <div id="order" class="sec-head">
                <div class="title">ORDERS</div>

                <!-- BE SOKE ORDERS -->
                <h3>BE SPOKE ORDERS</h3>
                <div class="orders">
                    <table border="2">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>orderNumber</th>
                                <th>name</th>
                                <th>email</th>
                                <th>location</th>
                                <th>phone</th>
                                <th>gender</th>
                                <th>clothe</th>
                                <th>detail</th>
                                <th>shoulder</th>
                                <th>neck</th>
                                <th>bust</th>
                                <th>waist</th>
                                <th>halfLength</th>
                                <th>stub</th>
                                <th>stwl</th>
                                <th>ubc</th>
                                <th>wc</th>
                                <th>hip</th>
                                <th>roundKnee</th>
                                <th>roundSleeve</th>
                                <th>trouserLength</th>
                                <th>base</th>
                                <th>lap</th>
                                <th>kneeCircum</th>
                                <th>sleeveLength</th>
                                <th>fullLength</th>
                                <th>blouseLength</th>
                                <th>image</th>
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                # GETTING BE-SPOKE ORDERS FROM DADTABASE TABLE MEASUREMENTS
                                $sql = $conn->query("SELECT * FROM measurement");
                                while($data = $sql->fetch_array()) {
                                   echo "<tr>
                                            <td>". $data['id']. "</td>  
                                            <td>". $data['orderNumber']. "</td>  
                                            <td>" . $data['name']. "</td>
                                            <td>". $data['email']. "</td>
                                            <td>". $data['location']. "</td>
                                            <td>". $data['phone']. "</td>
                                            <td>". $data['gender']. "</td>
                                            <td>". $data['clothe']. "</td>
                                            <td>". $data['detail']. "</td>
                                            <td>". $data['shoulder']. "</td>
                                            <td>". $data['neck']. "</td>
                                            <td>". $data['bust']. "</td>
                                            <td>". $data['waist']. "</td>
                                            <td>". $data['halfLength']. "</td>
                                            <td>". $data['stub']. "</td>
                                            <td>". $data['stwl']. "</td>
                                            <td>". $data['ubc']. "</td>
                                            <td>". $data['wc']. "</td>
                                            <td>". $data['hip']. "</td>
                                            <td>". $data['roundKnee']. "</td>
                                            <td>". $data['roundSleeve']. "</td>
                                            <td>". $data['trouserLength']. "</td>
                                            <td>". $data['base']. "</td>
                                            <td>". $data['lap']. "</td>
                                            <td>". $data['kneeCircum']. "</td>
                                            <td>". $data['sleeveLength']. "</td>
                                            <td>". $data['fullLength']. "</td>
                                            <td>". $data['blouseLength']. "</td>
                                            <td>". $data['image_url']. "</td>      
                                        </tr>
                                    ";
                                }
                        
                            ?>
                        </tbody>
                    </table>     
                </div>
                <!-- READY TO WEAR ORDERS -->
                <h3>READY TO WEAR ORDERS</h3>
                <div class="orders">
                    <table border="2">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>orderNumber</th>
                                <th>email</th>   
                                <th>Product name</th>  
                                <th>Product price</th>
                                <th>Quantity</th>  
                                <th>Total amount</th>
                                <th>Product detail</th> 
                                <th>Image</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <?php
                                # GETTING READY TO WEAR ORDERS FROM DADTABASE TABLE MEASUREMENTS
                                $sql = $conn->query("SELECT * FROM ready_to_wear");
                                while($data = $sql->fetch_array()) {
                                   echo "<tr>
                                            <td>". $data['id']. "</td>
                                            <td>". $data['orderNumber']. "</td>  
                                            <td>". $data['email']. "</td>  
                                            <td>". $data['name']. "</td>  
                                            <td>" . $data['price']. "</td>
                                            <td>". $data['quantity']. "</td>  
                                            <td>" . $data['total_amt']. "</td>
                                            <td>". $data['detail']. "</td> 
                                            <td>". $data['image_url']. "</td>      
                                        </tr>
                                    ";
                                }
                        
                            ?>
                        </tbody>
                    </table>     
                </div>



            </div>
            

        </div>    
    </div>

    <!-- Javascript code for toggling drop side bar -->
    <script type="text/javascript">
        // toggle sidebar on and off
        let btn = document.querySelector(".menubtn");
        let sidebar = document.querySelector(".drop");

        btn.onclick = function () {
            sidebar.classList.toggle("active");
        };
    </script>

  </body>
</html>