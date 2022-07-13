<?php

    if(isset($_POST['submit'])) {

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
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header('Location: store.php?msg=file uploaded successfully');
                }else{
                    header('Location: store.php?msg=file is too large');
                }
            }else{
                header('Location: store.php?msg=error uploading your file, try again!');
            }
        }else{
            header('Location: store.php?msg=files of this type not accepted');
        }



    }



?>