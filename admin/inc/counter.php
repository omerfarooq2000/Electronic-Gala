<?php
    include("config/config.php");

    /* 
        ===================================
        ! count pending reviews
        =================================== 
    */
    $review_qry = "SELECT * FROM reviews WHERE status = '0'";
    $run_review_qry = mysqli_query($con, $review_qry);
    $review_count = mysqli_num_rows($run_review_qry);
    if($review_count > 99){
        $review_count = '99+ New';
        $review_new_tag = 'New';
    }else{
        if($review_count == '0'){
            $review_count = '';
            $review_new_tag = '';
        }else{
            $review_count;
            $review_new_tag = 'New';
        }
    }
    /* 
        ===================================
        ! count pending orders
        =================================== 
    */
    $pending_order_qry = "SELECT * FROM orders WHERE status = '0' GROUP BY order_no";
    $run_pending_order_qry = mysqli_query($con, $pending_order_qry);
    $pending_order_count = mysqli_num_rows($run_pending_order_qry);
    if($pending_order_count > 99){
        $pending_order_count = '99+ New';
    }else{
        if($pending_order_count == '0'){
            $pending_order_count = '';
        }else{
            $pending_order_count = ''.$pending_order_count.' New';
        }
    }
    /* 
        ===================================
        ! count canceled orders
        =================================== 
    */
    $canceled_order_qry = "SELECT * FROM orders WHERE status = '6' OR status = '7' GROUP BY order_no";
    $run_canceled_order_qry = mysqli_query($con, $canceled_order_qry);
    $canceled_order_count = mysqli_num_rows($run_canceled_order_qry);
    if($canceled_order_count > 99){
        $canceled_order_count = '99+ New';
    }else{
        if($canceled_order_count == '0'){
            $canceled_order_count = '';
        }
    }
    /* 
        ===================================
        ! count in process orders
        =================================== 
    */
    $in_process_order_qry = "SELECT * FROM orders WHERE status = '1' OR status = '2' OR status = '3' OR status = '4' GROUP BY order_no";
    $run_in_process_order_qry = mysqli_query($con, $in_process_order_qry);
    $in_process_order_count = mysqli_num_rows($run_in_process_order_qry);
    if($in_process_order_count > 99){
        $in_process_order_count = '99+';
    }else{
        if($in_process_order_count == '0'){
            $in_process_order_count = '';
        }else{
            $in_process_order_count;
        }
    }
    /* 
        ===================================
        ! count delivered orders
        =================================== 
    */
    $delivered_order_qry = "SELECT * FROM orders WHERE status = '5' GROUP BY order_no";
    $run_delivered_order_qry = mysqli_query($con, $delivered_order_qry);
    $delivered_order_count = mysqli_num_rows($run_delivered_order_qry);
    if($delivered_order_count > 99){
        $delivered_order_count = '99+';
    }else{
        if($delivered_order_count == '0'){
            $delivered_order_count = '';
        }else{
            $delivered_order_count;
        }
    }
    /* 
        ===================================
        ! count pending user queries
        =================================== 
    */
    $user_qry_tag = '';
    $users_qry = "SELECT * FROM users WHERE status = '0'";
    $run_users_qry = mysqli_query($con, $users_qry);
    $users_qry_count = mysqli_num_rows($run_users_qry);
    if($users_qry_count > 99){
        $users_qry_count = '99+';
        $user_qry_tag .= 'New';
    }else{
        if($users_qry_count == '0'){
            $users_qry_count = '';
            $user_qry_tag .= '';
        }else{
            $users_qry_count;
            $user_qry_tag = 'New';
        }
    }
    /* 
        ===================================
        ! count pending user queries
        =================================== 
    */
    $user_qry = "SELECT * FROM user_queries WHERE status = '0'";
    $run_user_qry = mysqli_query($con, $user_qry);
    $user_qry_count = mysqli_num_rows($run_user_qry);
    if($user_qry_count > 99){
        $user_qry_count = '99+';
        $user_qry_tag .= 'New';
    }else{
        if($user_qry_count == '0'){
            $user_qry_count = '';
            $user_qry_tag .= '';
        }else{
            $user_qry_count;
            $user_qry_tag = 'New';
        }
    }
    /* 
        ===================================
        ! count pending admins
        =================================== 
    */
    $admin_qry = "SELECT * FROM admins WHERE status = '0'";
    $run_admin_qry = mysqli_query($con, $admin_qry);
    $admin_qry_count = mysqli_num_rows($run_admin_qry);
    if($admin_qry_count > 99){
        $admin_qry_count = '99+';
        $admin_qry_tag .= 'New';
    }else{
        if($admin_qry_count == '0'){
            $admin_qry_count = '';
        }else{
            $admin_qry_count;
        }
    }
    /* 
        ===================================
        ! count out of stock product
        =================================== 
    */
    $variation_qry = "SELECT * FROM product_variations WHERE stock = '0'";
    $run_variation_qry = mysqli_query($con, $variation_qry);
    $variation_qry_count = mysqli_num_rows($run_variation_qry);
    if($variation_qry_count > 99){
        $variation_qry_count = '99+';
    }else{
        if($variation_qry_count == '0'){
            $variation_qry_count = '';
        }else{
            $variation_qry_count;
        }
    }
?>