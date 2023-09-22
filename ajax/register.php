<?php 
require("../admin/config/config.php");
require("../admin/config/essentials.php");

// ! valid extensions
$valid_extensions = array('jpeg', 'jpg', 'png'); 

// ! get the input fields data
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$c_pass = $_POST['c_pass'];

$ph_no = $_POST['phone'];
$province = $_POST['province'];
$city = $_POST['city'];
$postal_code = $_POST['postal_code'];
$address = $_POST['address'];

// ! get the image file
$profile = $_FILES['profile']['name'];
$tmp_profile = $_FILES['profile']['tmp_name'];
// ! get uploaded file's extension
$ext = strtolower(pathinfo($profile, PATHINFO_EXTENSION));
// ! Rename Image
$final_img = 'IMG_'.rand(1000, 9999999).".$ext"; 
// ! set uploading path for image 
$path = UPLOAD_IMAGE_PATH.USERS_FOLDER.$final_img; 

if ($pass != $c_pass) { // ! check password and confirm password is same or not
    echo 'not_matched';
}else { // ! if password is same then this block of code will execute
    $checkUser = "SELECT * FROM users WHERE email = '$email'";
    $runUser = mysqli_query($con, $checkUser);
    $count = mysqli_num_rows($runUser);
    // ! check if user with the entered email is exist or not
    if ($count > 0) {
        echo 'email_exist';
    } else { // ! if user don't exist then this block of code with run
        if (in_array($ext, $valid_extensions)) { // ! checking the image is valid or not
            
            // ! Insert data into data
            $insert = "INSERT INTO users(name, email, password, img) VALUES('$name', '$email', '$pass', '$final_img')";
            if(mysqli_query($con, $insert)){
                $user_gen_id = mysqli_insert_id($con);

                // ! Insert data into data
                $address = "INSERT INTO user_address(user_id, ph_no, province, city, postal_code, address) VALUES('$user_gen_id', '$ph_no', '$province', '$city', '$postal_code', '$address')";

                // ! Execute Query
                if (mysqli_query($con, $address) &&  move_uploaded_file($tmp_profile, $path)) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            }
        } else {
            echo 'invalid_img';
        }
    }
}