<?php 
    require("../admin/config/config.php");
    require("../admin/config/essentials.php");

    // ! edit account (change password)
    if(isset($_POST['update_password_key'])){
        $user_id = $_POST['user_id'];
        $old_pass = $_POST['old_pass'];
        $new_pass = $_POST['new_pass'];
        $confirm_pass = $_POST['confirm_pass'];
        
        // ! check user exist or not
        $q = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
        $r = mysqli_query($con, $q);
        while($row = mysqli_fetch_array($r)){
            if($old_pass != $row['password']){
                echo 'inv_old_pass';
                die();
            }else{
                if($new_pass != $confirm_pass){
                    echo 'not_matched';
                    die();
                }else{
                    $qry = "UPDATE users SET password = '$new_pass' WHERE id = '$user_id'";
                    if(mysqli_query($con, $qry)){
                        echo 'success';
                    }else{
                        echo 'error';
                        die();
                    }
                }
            }
        }
    }

    // ! edit address
    if(isset($_POST['key']) && $_POST['key'] =='update_address_key'){
        $user_id = $_POST['user_id'];
        $ph = $_POST['ph'];
        $province = $_POST['province'];
        $city = $_POST['city'];
        $postal_code = $_POST['postal_code'];
        $address = $_POST['address'];
        date_default_timezone_set("Asia/Karachi");
        $date = date("Y-m-d H:i:s");

        // ! check user exist or not
        $q1 = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
        $r1 = mysqli_query($con, $q1);
        if(mysqli_num_rows($r1) > 0){
            $qry1 = "UPDATE user_address SET ph_no = '$ph', province = '$province', city = '$city', postal_code = '$postal_code', address = '$address' WHERE user_id = '$user_id'";
            if(mysqli_query($con, $qry1)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }
?>