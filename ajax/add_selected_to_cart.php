<?php 
include("../admin/config/config.php");

if(isset($_POST['pro_id'])){
    $user_id = $_POST['user_id'];
    if($user_id > 0){
        foreach($_POST['pro_id'] as $key=>$val){
            $pro_id=$_POST['pro_id'][$key] ?? [];
            $user_id=$_POST['user_id'][$key] ?? [];
            $pro_var=$_POST['pro_var'][$key] ?? [];

            $get = "SELECT * FROM cart WHERE product_id = '$pro_id' AND user_id = '$user_id'";
            $exe = mysqli_query($con, $get);
            if(mysqli_num_rows($exe) > 0){
                echo 'exist';
                die();
            }else{
                $qry = "INSERT INTO cart(product_id, user_id, variation_id) VALUES('$pro_id', '$user_id', '$pro_var')";
                $run = mysqli_query($con, $qry);
            }
        }
        if($run){
            echo 'success';
        }else{
            echo 'error';
        }
    }else{
        echo 'require_login';
    }
}

?>