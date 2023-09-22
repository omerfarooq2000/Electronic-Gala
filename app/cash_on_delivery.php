<?php 
    session_start();
    include("../admin/config/config.php");

    if(isset($_SESSION['login']) && $_SESSION['login'] == true){
        $u_id = $_SESSION['uId'];
    }

    if(isset($_POST["pay_now_btn"])) {

        $order_email = $_POST["email"];
        $order_name = $_POST["name"];
        $order_province = $_POST["province"];
        $order_address = $_POST["address"];
        $order_phone = $_POST["phone"];
        $order_city = $_POST["city"];

        $upd = "UPDATE user_address SET ph_no = '$order_phone', province = '$order_province', address = '$order_address',  city = '$order_city' WHERE user_id = '$u_id' LIMIT 1";
        $run_upd = mysqli_query($con, $upd);

        $order_no = rand(100000000000000, 999999999999999);

        $get = "SELECT * FROM cart WHERE user_id = '$u_id'";
        $run = mysqli_query($con, $get);
        while ($rowRun = mysqli_fetch_array($run)) {
            
            $user_cart_id = $rowRun["id"];
            $user_cart_pro_id = $rowRun["product_id"];
            $variation_id = $rowRun["variation_id"];
            $qty = $rowRun["qty"];

            $getProducts = "SELECT * FROM products WHERE id='$user_cart_pro_id'";
            $runProducts = mysqli_query($con, $getProducts);

            while ($rowProducts = mysqli_fetch_array($runProducts)) {
                $pro_name = $rowProducts["name"];
                $pro_img = $rowProducts["img"];
                $shipping_fee = $rowProducts["delivery_charges"];

                $getVar = "SELECT * FROM product_variations WHERE id='$variation_id'";
                $runVar = mysqli_query($con, $getVar);
                $rowVar = mysqli_fetch_array($runVar);

                $variation_id = $rowVar['id'];
                $variation = $rowVar['color'];
                $price = $rowVar['price'];

                $total_shipping_fee = $shipping_fee * $qty;

                $order_price = $price * $qty;

                $insert = "INSERT INTO orders(product_id, user_id, variation_id, product_name, variation, qty, price, shipping_fee, order_no, product_img, payment_type) VALUES('$user_cart_pro_id', '$u_id', '$variation_id', '$pro_name', '$variation', '$qty', '$order_price', '$total_shipping_fee', '$order_no', '$pro_img', '0')";
                $exe = mysqli_query($con, $insert);

                $delete = mysqli_query($con, "DELETE FROM cart WHERE id = '$user_cart_id' AND user_id = '$u_id'");
            }
        }
        if($run){
            $tracking = "INSERT INTO track_order(user_id, order_no, title, description) VALUES('$u_id', '$order_no', 'pending', 'order has been placed and pending approval')";
            $run_tracking = mysqli_query($con, $tracking);
        }

        if ($exe) {
            echo '<script>alert("Order Successfully")</script>';
            echo '<script>window.open("../account.php?page=orders", "_self")</script>';
        } else {
            echo '<script>alert("Something Went Wrong")</script>';
            echo '<script>window.open("../cart.php", "_self")</script>';
        }
    }
?>