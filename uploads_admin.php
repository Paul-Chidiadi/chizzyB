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
                        <a href="">BE SPOKE ORDERS</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">READY ORDERS</a>
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
                        <a href="">BE SPOKE ORDERS</a>
                        <div class="indicator"></div>
                    </li>
                    <li>
                        <a href="">READY ORDERS</a>
                        <div class="indicator"></div>
                    </li>
                </ul>
            </div>

            <!-- UPLOAD -->
            <div id="upload" class="upload">
                <div class="title">UPLOAD</div>
                <form action="uploads_admin.php" class="product" method="post" enctype="multipart/form-data">
                    <label>Input info for the product you want to add</label>
                    <input type="text" name="prodname" class="control" placeholder="product name" required>
                    <input type="text" name="prodprice" class="control" placeholder="product price eg. $50" required>
                    <textarea type="text" name="proddetails" class="control" placeholder="product detail" required>
                    </textarea>
                    <label>Input image of the product here</label>
                    <input type="file" name="file" class="control" required> 
                    <button  type="submit" name="submit" class="btn">UPLOAD</button>
                </form>
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