<?php 
    session_start(); 
    if(!isset($_SESSION['admin_login']) && $_SESSION['admin_email'] != true){
        header("Location: login.php");
    }
?>

<link rel="shortcut icon" href="public/img/favicon/fav.png" type="image/x-icon">
<!-- Bootstrap v5.2.1 -->
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<link rel="stylesheet" href="public/css/main.css">
<!-- Bootstrap icons v1.9.1 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
