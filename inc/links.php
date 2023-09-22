<!-- Favicon  -->
<link rel="shortcut icon" href="public/img/favicon/fav.png" type="image/x-icon">
<!-- Bootstrap v5.2.1 -->
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="public/css/main.css">
<!-- Bootstrap icons v1.9.1 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<?php 
    session_start();
    require("admin/config/config.php");
    require("admin/config/essentials.php");

    if(isset($_SESSION['login']) AND $_SESSION['login'] == true){
        $u_id = $_SESSION['uId'];
        $u_name = $_SESSION['uName'];
        $u_email = $_SESSION['email'];
        $profile_img = $_SESSION['uPic'];

        $address_q = "SELECT * FROM user_address WHERE user_id = '$u_id'";
        $run_q = mysqli_query($con, $address_q);
        $fet_row = mysqli_fetch_array($run_q);
        
        $phone = $fet_row['ph_no'];
        $province = $fet_row['province'];
        $city = $fet_row['city'];
        $postal_code = $fet_row['postal_code'];
        $address = $fet_row['address'];

        // ! count cart items
        $cart = 0;
        $cart_qry = "SELECT count(*) as total_items FROM cart WHERE user_id ='$u_id'";
        $run_cart_qry = mysqli_query($con, $cart_qry);
        $row_cart_qry= mysqli_fetch_array($run_cart_qry);
        if($row_cart_qry['total_items'] > 9){
            $count = '9+';
        }else{
            $count = $row_cart_qry['total_items'];
        }
    }else{
        $u_id = 0;
    }

    // ! get contact details
    $contact = "SELECT * FROM settings";
    $run_contact = mysqli_query($con, $contact);
    $row_settings = mysqli_fetch_array($run_contact);
    $site_title = $row_settings['site_title'];
    $site_tagline = $row_settings['site_tagline'];
    $site_about = $row_settings['site_about'];

    if($row_settings['site_maintenance'] == 1){
        header("Location: maintenance.php");
    }

    // ! get site settings
    $settings = "SELECT * FROM contact_details";
    $run_settings = mysqli_query($con, $settings);
    $row_contact = mysqli_fetch_array($run_settings);
    $c_address = $row_contact['address'];
    $c_email = $row_contact['email'];
    $c_ph = $row_contact['ph'];
    $c_fb = $row_contact['fb'];
    $c_insta = $row_contact['insta'];
    $c_tw = $row_contact['tw'];
    $c_iframe = $row_contact['iframe'];

    
?>