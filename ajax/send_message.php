<?php 
require("../admin/config/config.php");
require("../admin/config/essentials.php");

$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$message = $_POST['message'];

// ! check if user already send message or not
$check = "SELECT * FROM user_queries WHERE email = '$email' AND status = '0'";
$exe = mysqli_query($con, $check);
if(mysqli_num_rows($exe) > 0){
    echo 'exist';
}else{
    // ! inert messages in db
    $q = "INSERT INTO user_queries(name, subject, email, message) VALUES('$name', '$subject', '$email', '$message')";
    if(mysqli_query($con, $q)){
        echo 'success';
    }else{
        echo 'error';
    }
}



?>