<?php
    session_start();

    unset($_SESSION['loggedIN']);
    //session_destory();
    header('Location: access.php');
    exit();
?>