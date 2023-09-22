<?php 
require("../config/config.php");
require("../config/essentials.php");

$email = $_POST['email'];
$pass = $_POST['pass'];

// ! check user exist or not
$q = "SELECT * FROM admins WHERE email='$email' AND password='$pass' LIMIT 1";
$r = mysqli_query($con, $q);

if(mysqli_num_rows($r) == 0){
    echo 'inv_email';
}else{
    $a_fetch = mysqli_fetch_assoc($r);
    if($a_fetch['status'] == '0'){
        echo 'not_approved';
    }else{
        session_start();
        $_SESSION['admin_login'] = true;
        $_SESSION['aId'] = $a_fetch['id'];
        $_SESSION['aName'] = $a_fetch['name'];
        $_SESSION['aPic'] = $a_fetch['img'];
        $_SESSION['aEmail'] = $a_fetch['email'];
        echo 'success';
    }
}

?>