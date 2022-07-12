<?php

// using php to submit contact form
// we can also use java script library(JQUERY) to validate the form, send data with AJAx,
//  and send email with PHP but that will be an over kill for just a contact form
if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "chizzyB@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You received a messsage from".$name.".\n\n".$message;

    $myMail = mail($mailTo, $subject, $txt, $headers);
    if($myMail) {
        header('Location: index.html?mailsent');
    }else{
        echo 'mail not sent';
    }
}
?>