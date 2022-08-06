<?php
    require_once 'function.php';

    if(isset($_POST['order_send'])) {
        $email = $_POST['order_email'];
        $productid = $_POST['order_product'];
        $productInfo = $_POST['order_productInfo'];
        $price = $_POST['order_total'];

        echo $email;
        echo $productid;
        echo $productInfo;
        echo $price;

        # prepare wave request
        $request = [
            'tx_ref' => 'chizzy_'.generateDigits(9),
            'amount' => $price,
            'currency' => 'USD',
            'payment_options' => 'card',
            'redirect_url' => 'process.php',
            'customer' => [
                'email' => $email
            ],
            'meta' => [
                'price' => $price,
                'productinfo' => $productInfo,
                'productid' => $productid,
                'email' => $email
            ],
            'customizations' => [
                'title' =>  "CHIZZYB COUTURE",
                'description' =>  "Always giving you the best"
            ]
        ];

        # Call flutterwave endpoint
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODNG => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURLOPT_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMERREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer {{sec_key}}',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $res = json_decode($response);
        if($res->status == 'success') {
            $link = $res->data->link;
            header('Location: '.$link);
        }else {
            echo 'Payment can not be processed, try again later';
        }

    }



?>