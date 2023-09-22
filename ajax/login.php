<?php 
require("../admin/config/config.php");
require("../admin/config/essentials.php");

$email = $_POST['email'];
$pass = $_POST['pass'];

// ! check user exist or not
$q = "SELECT * FROM users WHERE email='$email' AND password='$pass' LIMIT 1";
$r = mysqli_query($con, $q);
if(mysqli_num_rows($r) == 0){
    echo 'inv_email';
}else{
    $u_fetch = mysqli_fetch_assoc($r);
    if($u_fetch['status'] == '0'){
        echo 'not_approved';
    }else{
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['uId'] = $u_fetch['id'];
        $_SESSION['uName'] = $u_fetch['name'];
        $_SESSION['uPic'] = $u_fetch['img'];
        $_SESSION['uPass'] = $u_fetch['password'];
        $_SESSION['email'] = $u_fetch['email'];
        echo 'success';
    }
}

?>