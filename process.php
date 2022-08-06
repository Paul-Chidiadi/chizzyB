<?php
    include 'conn.php';

    if(isset($_GET['status'])) {
        // check payment status
        if($_GET['status'] == 'cancelled') {
            # take user back to cart.php page
            header('Location: cart.php');
        } else if ($_GET['status'] == 'successful') {
            
            $tx_id = $_GET['transaction_id'];
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.flutterwave.com/v3/transactions/'.$tx_id.'/verify',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODNG => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURLOPT_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMERREQUEST => 'GET',
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
                $amtPaid = $res->data->charged_amount;
                $amtToPay = $res->data->meta->price;
                if($amtPaid >= $amtToPay) {
                    echo 'Payment successful, your transaction id is: <b>'.$tx_id;
                    #collect items needed for database
                    $emailDb = $res->data->meta->email;
                    $productInfo = $res->data->meta->productinfo;
                    $productId = $res->data->meta->productid;
                    $priceDb = $res->data->meta->price;
                    # Insert  all data into Database
                    $sql = "INSERT INTO ready_to_wear (email, amount_paid, product_id, product_info) 
                    VALUES ('$emailDb', '$priceDb', '$productId', '$productInfo')";
                    if (mysqli_query($conn, $sql)) {
                        echo '<br><br>Click <a href="sell.php"><b>HERE</b></a> to go to home page';
                    } else {

                    }
                }else {
                    echo 'Fraud transaction detected';
                }
            }else {
                echo 'Payment can not be processed, try again later';
            }
        }
    }




?>