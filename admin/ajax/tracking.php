<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    // ! get order tracking status from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_tracking_status'){
        $output = "";

        $order_no = $_POST['order_no'];

        $query = "SELECT * FROM track_order WHERE order_no = '$order_no' ORDER BY id DESC";
        $run = mysqli_query($con, $query);
        while($row = mysqli_fetch_array($run)){
            $title = $row['title'];
            $description = $row['description'];
            $date = date("F j, Y, g:i a", strtotime($row['date']));
            $bgClass = ($title == 'delivered') ? "bg-success" : "bg-warning";
            $textClass = ($title == 'delivered') ? "text-success" : "text-warning";
            $textClass1 = ($title == 'delivered') ? "text-success" : "text-secondary";
            if($title == 'canceled' OR $title == 'failed'){
                $output.= "
                <div class='tracking-box d-flex align-items-center'>
                    <div class='circle bg-danger d-flex justify-content-center align-items-center rounded-circle me-2'>
                        <div class='inner-circle rounded-circle'></div>
                    </div>
                    <div class='line bg-dark'></div>
                    <div>
                        <small class='value text-danger fw-bold m-0 p-0 text-capitalize'>$title</small><small class='value text-danger fw-bold ms-2'>($date)</small><br>
                        <small class='value text-danger fw-bold m-0 p-0 text-capitalize'>$description</small><br>
                    </div>
                </div>
                ";
            }else{
                $output.= "
                <div class='tracking-box d-flex align-items-center'>
                    <div class='circle $bgClass d-flex justify-content-center align-items-center rounded-circle me-2'>
                        <div class='inner-circle rounded-circle'></div>
                    </div>
                    <div class='line $bgClass'></div>
                    <div>
                        <small class='value $textClass fw-bold m-0 p-0 text-capitalize'>$title</small><small class='value $textClass1 fw-bold ms-2'>($date)</small><br>
                        <small class='value $textClass1 fw-bold m-0 p-0 text-capitalize'>$description</small><br>
                    </div>
                </div>
                ";
            }
            
        }
        echo $output;
    }

    // ! update tracking status
    if(isset($_POST['key']) && $_POST['key'] == 'update_tracking_status'){
        $description = "";
        $status = 0;

        $title = $_POST['title'];
        $order_no = $_POST['order_no'];
        $user_id = $_POST['user_id'];

        // ! get ordered product quantity to update in sales and stock
        if($title == 'delivered'){
            $product = "SELECT * FROM orders WHERE order_no = '$order_no'";
            $run_product = mysqli_query($con, $product);
            while($row_product = mysqli_fetch_array($run_product)){
                $qty = $row_product['qty'];
                $upd_product = "UPDATE products SET sales = sales+$qty WHERE id = '$row_product[product_id]'";
                $run_upd = mysqli_query($con, $upd_product);

                $upd_variation = "UPDATE product_variations SET stock = stock-$qty WHERE id = '$row_product[variation_id]'";
                $run_variation = mysqli_query($con, $upd_variation);
            }
        }

        if($title == "processing"){
            $description = "the order has been received and is being processed.";
            $status = 1;
        }
        if($title == "in-transit"){
            $description = "the order is on its way to its final destination.";
            $status = 2;
        }
        if($title == "shipped"){
            $description = "the order has been shipped and is on its way to the customer.";
            $status = 3;
        }
        if($title == "out for delivery"){
            $description = "be ready, your order will be delivered today.";
            $status = 4;
        }
        if($title == "delivered"){
            $description = "the order has been delivered to the customer.";
            $status = 5;
        }
        if($title == "canceled"){
            $description = "the order has been cancelled by the merchant.";
            $status = 6;
        }
        if($title == "failed"){
            $description = "the order has failed for some reason.";
            $status = 7;
        }
        
        $qry = "INSERT INTO track_order(user_id, order_no, title, description) VALUES('$user_id', '$order_no', '$title', '$description')";
        if(mysqli_query($con, $qry)){
            $upd = "UPDATE orders SET status = '$status' WHERE order_no = '$order_no'";
            if(mysqli_query($con, $upd)){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }
    }
?>