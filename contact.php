<?php

// using php to submit contact form (validation done with HTML form validation method)
// we can also use java script library(JQUERY) to validate the form, send data with AJAx,
//  and send email with PHP but that will be an over kill for just a contact form
if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "chizzyBcouture@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You received a messsage from".$name.".\n\n".$message;

    $myMail = mail($mailTo, $subject, $txt, $headers);
    if($myMail) {
        header('Location: index.html?msg=mail sent...#contact');
    }else{
        header('Location: index.html?msg=mail not sent...#contact');
    }
}

// submit code for CONTACT SECTION IN sell.php
if(isset($_POST['submition'])) {

    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['email'];
    $message = $_POST['message'];

    $mailTo = "chizzyBcouture@gmail.com";
    $headers = "From: ".$mailFrom;
    $txt = "You received a messsage from".$name.".\n\n".$message;

    $myMail = mail($mailTo, $subject, $txt, $headers);
    if($myMail) {
        header('Location: sell.php?msg=mail sent...#contact');
    }else{
        header('Location: sell.php?msg=mail not sent...#contact');
    }
}
?>
