<?php
require("config/essentials.php");
$productImgPath = PRODUCTS_IMG_PATH;
$userImgPath = USERS_IMG_PATH;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Order Details</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
</head>

<body class="body-bg">

    <?php require("inc/header.php") ?>

    <?php 
        if(isset($_GET['order_no']) AND !empty($_GET['order_no'])){
            $order_no = $_GET['order_no'];
            // ! get orders
            $order = "SELECT * FROM orders where order_no = '$order_no'";
            
            // ! for showing single data 
            $run = mysqli_query($con, $order);
            if(mysqli_num_rows($run) > 0){

                // ! for using in loop
                $run1 = mysqli_query($con, $order);
                
                $row = mysqli_fetch_array($run);
                $userId = $row['user_id'];
                
                // ! get users
                $user = "SELECT * FROM users where id = '$userId'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);
                
                $userName = $row_user['name'];
                $userEmail = $row_user['email'];
                $userImg = USERS_IMG_PATH.'/'.$row_user['img'];
                $userRegDate = date("F j, Y, g:i a", strtotime($row['date_added']));
                
                // ! get user address
                $address = "SELECT * FROM user_address where user_id = '$row[user_id]'";
                $run_address = mysqli_query($con, $address);
                $row_address = mysqli_fetch_array($run_address);
                
                $phone = $row_address['ph_no'];
                $province = $row_address['province'];
                $city = $row_address['city'];
                $postalCode = $row_address['postal_code'];
                $address = $row_address['address'];
                
                $orderNo = '<span class="text-muted">'.$row['order_no'].'</span>';
                $orderDate = '<span class="text-muted">'.date("F j, Y, g:i a", strtotime($row['date_added'])).'</span>';
            }else{
                echo '<script>window.open("orders.php","_self")</script>';
            }
        }else{
            echo '<script>window.open("orders.php","_self")</script>';
        }
    ?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo siteMaintenanceMode() ?>
                <div class="card rounded-0">
                    <div class="card-header bg-main-1 text-light rounded-0 d-flex justify-content-between align-items-center">
                        <h4 class="m-0">Order Details</h4>
                        <a href="orders.php" class="btn btn-sm btn-transparent text-dark shadow-none"><i class="bi bi-arrow-left me-1"></i>Go Back</a>
                    </div>
                    <div class="card-body">
                        <small class="m-0"><span class="fw-bold">Order #</span><?php echo $orderNo ?></small><br>
                        <small class="m-0 mt-2"><span class="fw-bold">Order Date: </span><?php echo $orderDate ?></sma>
                    </div>
                    <div class="row">
                        <!-- Product Details -->
                        <div class="col-lg-8 col-md-8 col-sm-12">
                            <div class="card-header bg-main-1 text-light rounded-0">
                                <h5 class="m-0">Product</h5>
                            </div>
                            <div class="card-body">
                                <?php 
                                    $totalPrice = 0;
                                    while($row1 = mysqli_fetch_array($run1)){
                                            $productImg = PRODUCTS_IMG_PATH.'/'.$row1['product_img'];
                                            $qty = $row1['qty'];
                                            $price = $row1['price'];
                                            $shippingFee = $row1['shipping_fee'];
                                            $subTotal = $price * $qty;
                                            $shippingTotal = $shippingFee * $qty;
                                            $itemTotal = $subTotal + $shippingTotal;
                                            $totalPrice += $itemTotal;
                                        echo <<<orders
                                        <div class="d-flex border-bottom border-gray pb-3 mb-2">
                                            <div class="me-2" style="width: 80px; height: 80px; position: relative">
                                                <img src="$productImg" class="img-responsive" style="width: 100%; height: 100%; position: absolute; object-fit: cover;">
                                            </div>
                                            <div class="d-flex justify-content-between w-100">
                                                <div>
                                                    <div class="fw-bold">$row1[product_name] </div>
                                                    <div class="order-details-variation-box mt-2 ms-1" style="--i: $row1[variation];" title="$row1[variation]"></div>
                                                </div>
                                                <div class="text-end">
                                                    <small>$qty x $$price = <span class="fw-bold">$$subTotal</span></small><br>
                                                    <small>Shipping = <span class="fw-bold">$$shippingTotal</span></small><br>
                                                    <small>Item Total = <span class="fw-bold">$$itemTotal</span></small>
                                                </div>
                                            </div>
                                        </div>
                                        orders;
                                    }
                                    ?>
                                    <div class="float-end fw-bold mb-2"><?php echo 'Total Price: '.'$'.$totalPrice; ?></div>
                            </div>
                        </div>
                        <!-- Customer Details -->
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card-header bg-main-1 text-light rounded-0">
                                <h5 class="m-0">Customer</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="fw-bold p-0 m-0 text-capitalize"><?php echo $userName ?></small><br>
                                        <small><?php echo $userEmail ?></small><br>
                                        <small><?php echo $userRegDate ?></small>
                                    </div>
                                    <div class="me-2" style="width: 80px; height: 80px; position: relative">
                                        <img src="<?php echo $userImg ?>" style="width: 100%; height: 100%; position: absolute; object-fit: cover;">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="card-header bg-main-1 text-light rounded-0">
                                <h5 class="m-0">Shipping Address</h5>
                            </div>
                            <div class="card-body">
                                <div>
                                    <small class="mb-2"><span class="fw-bold">Phone #: </span><?php echo $phone ?></small><br>
                                    <small class="mb-2"><span class="fw-bold">Province: </span><?php echo $province.', '.$city.', '.$postalCode ?></small><br>
                                    <small class="mb-2"><span class="fw-bold">Address: </span><?php echo $address ?></small><br>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-12">
                            <!-- Order Tracking -->
                            <div class="card-header bg-main-1 text-light rounded-0">
                                <h5 class="m-0">Order Tracking</h5>
                            </div>
                            <div class="card-body">
                                <?php 
                                    $disablePending = "";
                                    $disableProcessing = "";
                                    $disableInTransit = "";
                                    $disableShipped = "";
                                    $disableOutForDelivery = "";
                                    $disableDelivered = "";
                                    $disableCanceled = "";
                                    $disableFailed = "";
                                    $track = "SELECT * FROM track_order WHERE order_no = '$order_no'";
                                    $run_track = mysqli_query($con, $track);
                                    while($row_track = mysqli_fetch_assoc($run_track)){
                                        $pending = $row_track['title'];
                                        $processing = $row_track['title'];
                                        $inTransit = $row_track['title'];
                                        $shipped = $row_track['title'];
                                        $outForDelivery = $row_track['title'];
                                        $delivered = $row_track['title'];
                                        $canceled = $row_track['title'];
                                        $failed = $row_track['title'];
                                        if($pending == 'pending'){
                                            $disablePending = 'disabled';
                                        }
                                        if($processing == 'processing' OR $canceled == 'canceled'){
                                            $disableProcessing = 'disabled';
                                        }
                                        if($inTransit == 'in-transit' OR $canceled == 'canceled'){
                                            $disableInTransit = 'disabled';
                                        }
                                        if($shipped == 'shipped' OR $canceled == 'canceled'){
                                            $disableShipped = 'disabled';
                                        }
                                        if($outForDelivery == 'out for delivery' OR $canceled == 'canceled'){
                                            $disableOutForDelivery = 'disabled';
                                        }
                                        if($delivered == 'delivered' OR $canceled == 'canceled'){
                                            $disableDelivered = 'disabled';
                                        }
                                        if($canceled == 'canceled' OR $processing == 'processing'){
                                            $disableCanceled = 'disabled';
                                        }
                                        if($failed == 'failed' OR $canceled == 'canceled' OR $processing == 'processing'){
                                            $disableFailed = 'disabled';
                                        }
                                    }
                                ?>
                                <div class="form-group mb-2">
                                    <label class="mb-2 fw-bold">Tracking Status:</label>
                                    <select class='form-select shadow-none' id="trackingDropdown" data-order-id="<?php echo $order_no ?>" data-user-id="<?php echo $userId ?>" required>
                                        <option selected disabled>---Select Status---</option>
                                        <option value='pending' <?php echo $disablePending ?>>Pending</option>
                                        <option value='processing' <?php echo $disableProcessing ?>>Processing</option>
                                        <option value='in-transit' <?php echo $disableInTransit ?>>In-Transit</option>
                                        <option value='shipped' <?php echo $disableShipped ?>>Shipped</option>
                                        <option value='out for delivery' <?php echo $disableOutForDelivery ?>>Out For Delivery</option>
                                        <option value='delivered' <?php echo $disableDelivered ?>>Delivered</option>
                                        <option value='canceled' <?php echo $disableCanceled ?>>Canceled</option>
                                        <option value='failed' <?php echo $disableFailed ?>>Failed</option>
                                    </select>
                                </div>
                                <div class="tracking-status trackingStatus"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add new admin modal -->
    <div class="modal fade" id="add_admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_admin_form">
                        <input type="hidden" name="add_admin_key">
                        <div class="form-group mb-3">
                            <label class="mb-2">Name:</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Email:</label>
                            <input type="text" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Password:</label>
                            <input type="text" name="pass" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Image:</label>
                            <input type="file" name="profile" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Status:</label>
                            <select name="active" class="form-select shadow-none">
                                <option value="0" selected>Pending</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script>
        function getTrackingStatus(order_no){
            $.ajax({
                url: "ajax/tracking.php",
                type: "POST",
                data: {
                    order_no: order_no,
                    key: 'get_tracking_status',
                },
                success: function (data) { 
                    $(".trackingStatus").html(data);
                }
            })
        }
        $("#trackingDropdown").on('change', function(){
            var title = $(this).val();
            var order_no = $(this).attr('data-order-id');
            var user_id = $(this).attr('data-user-id');
            $.ajax({
                url: "ajax/tracking.php",
                type: "POST",
                data: {
                    title: title,
                    order_no: order_no,
                    user_id: user_id,
                    key: 'update_tracking_status',
                },
                beforeSend: function(){
                    $('#trackingDropdown').attr('disabled', true);
                },
                success: function(data) {
                    if (data == 1) {
                        alert('Status Updated');
                        window.location.reload();
                    }else{
                        alert('Something went wrong');
                    }
                },
                complete: function(){
                    $('#trackingDropdown').attr('disabled', false);
                }
            })
        });
        
        window.onload = function(){
            getTrackingStatus(<?php echo $order_no ?>);
        }
    </script>
</body>

</html>