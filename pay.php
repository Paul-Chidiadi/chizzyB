<?php

    if(isset($_POST['order_send'])) {
        $email = $_POST['order_email'];
        $product = $_POST['order_product'];
        $productInfo = $_POST['order_productInfo'];
        $price = $_POST['order_total'];

        echo $email;
        echo $product;
        echo $productInfo;
        echo $price;
    }



?>