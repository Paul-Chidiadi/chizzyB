<?php

    include 'conn.php';

    if(isset($_POST['submit'])) {

        $orderNumber = $_POST['orders'];
       
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allow = array('jpg', 'jpeg', 'png', 'pdf');

        if(in_array($fileActualExt, $allow)) {
            if($fileError === 0) {
                if($fileSize <= 1000000) {
                    $fileNewName = uniqid('IMG-', true).".".$fileActualExt;
                    $fileDestination = 'uploads_customer/'.$fileNewName;

                    //insert into Database
                    $data = $conn->query("SELECT id from measurement WHERE orderNumber ='$orderNumber'");
                    if($data->num_rows > 0) { 
                        $sql = $conn->query("UPDATE measurement SET image_url='$fileDestination' WHERE orderNumber='$orderNumber'");
                        if ($sql) {
                            # making sure image file  is inserted into database before moving it into its folder on the disk
                            move_uploaded_file($fileTmpName, $fileDestination);
                            header('Location: store.php?msg=file uploaded successfully#mssgg');
                        } else {
                            header('Location: store.php?msg=file upload failed#mssgg');
                        }
                    }else {
                        header('Location: store.php?msg=you have to fill the form above first#mssgg');
                    }
                }else{
                    header('Location: store.php?msg=file is too large#mssgg');
                }
            }else{
                header('Location: store.php?msg=error uploading your file, try again!#mssgg');
            }
        }else{
            header('Location: store.php?msg=files of this type not accepted#mssgg');
        }



    }



?>