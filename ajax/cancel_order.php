<?php 
    include("../admin/config/config.php");

    if(isset($_POST['order_no'])){
        $order_no = $_POST['order_no'];
        $user_id = $_POST['user_id'];
        $title = 'canceled';
        $description = 'the order has been cancelled by the customer.';
        $qry = "INSERT INTO track_order(user_id, order_no, title, description) VALUES('$user_id', '$order_no', '$title', '$description')";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>