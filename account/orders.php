<div class="card rounded-0" style="min-height: 456px;">
    <div class="card-body">
        <h4>My Orders</h4>
        <?php 
            $no = 1;
            $payment_status = '';
            $status = '';
            $combo = '';
            $cancel_btn = '';
            $product_img_path = PRODUCTS_IMG_PATH;
            $q = "SELECT * FROM orders WHERE user_id = $u_id GROUP BY order_no ORDER BY date_added DESC";
            $r = mysqli_query($con, $q);
            if(mysqli_num_rows($r) == 0){
                echo "
                <div class='text-center'>
                    <h3 class='text-center text-orange my-5 fw-bold'>No Order Exist</h3>
                    <a href='shop.php' class='btn btn-lg bg-orange shadow-none rounded-0'>Shop Now</a>
                </div>
                ";
            }else{
                while($row = mysqli_fetch_array($r)){
                    $total_price = 0;
                    $order_no = $row['order_no'];
                    $placed = date("F j, Y, g:i a", strtotime($row['date_added']));
                    
                    // ! check payment type (card or COD)
                    if($row['payment_type'] == '0'){
                        $payment_status = '<small class="text-muted">Paid Using: Cash On Delivery</small>';
                    }else{
                        $payment_status = '<small class="text-muted">Paid Using Credit Card</small>';
                    }
                ?>
                <div class="bg-light p-3 border-bottom mb-3">
                    <span class="text-orange fw-bold"><?php echo '#'.$no++; ?></span>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <small class="bg-white rounded-pill px-3 py-2 me-4">Order <span class="text-orange">#<?php echo $order_no ?></span></small><br>
                            
                            <small class="text-muted fw-bold">Placed On <?php echo $placed ?></small>
                        </div>
                        <div class="text-center">
                            <a href="tracking.php?order_no=<?php echo $order_no ?>" class="btn bg-orange shadow-none rounded-pill px-4"><i class="bi bi-bounding-box-circles me-2"></i>Track Order</a><br>
                        </div>
                    </div>
                    <?php 
                        $q1 = "SELECT * FROM orders WHERE order_no = '$order_no'";
                        $r1 = mysqli_query($con, $q1);
                        while($row1 = mysqli_fetch_array($r1)){
                            $name = $row1['product_name'];
                            $delivery_date = date("F j, Y", strtotime($row1['date_added']. '+7 days'));
                            $color = $row1['variation'];
                            $qty = $row1['qty'];
                            $shipping_fee = $row1['shipping_fee'];
                            $total_price += ($row1['price'] + $shipping_fee);
                            $price = number_format($row1['price']);

                            $formatted_total_price = number_format($total_price, 1);
                            
                            $formatted_shipping_fee = number_format($shipping_fee, 1);

                            $tracking = "SELECT * FROM track_order WHERE order_no = '$order_no' ORDER BY id DESC";
                            $run_tracking = mysqli_query($con, $tracking);
                            $row_tracking = mysqli_fetch_array($run_tracking);
                            $status = '<h4 class="fw-bold text-capitalize">'.$row_tracking['title'].'</h4>';
                            if($row_tracking['title'] == 'pending'){
                                $cancel_btn = "<button data-cancel-id='$order_no' data-user-id='$u_id' class='btn btn-transparent shadow-none cancel_order'><i class='bi bi-x-lg'></i> Cancel Order</button>";
                            }
                    ?>
                    <div>
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-3">
                            <div class="d-flex align-items-center">
                                <div style="width: 100px; height: 100px; overflow: hidden; position: relative;">
                                    <img src="<?php echo $product_img_path.'/'.$row1['product_img'] ?>" class="img-fluid" style="width: 100%; height: 100%; position: absolute; object-fit: contain;">
                                </div>
                                <div class="ms-2">
                                    <p style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; "><a href="product_details.php?id=<?php echo $row1['product_id'] ?>" class="text-decoration-none text-black"><?php echo $name ?></a></p>
                                    <small class="text-muted">
                                        Color: <span class="me-3 fw-bold"><?php echo $color ?></span>
                                        Qty: <span class="fw-bold"><?php echo $qty ?></span><br>
                                        Shipping Total: <span class="me-3 fw-bold"><?php echo '$'.$formatted_shipping_fee ?><br>
                                        Item Total: <span class="me-3 fw-bold"><?php echo '$'.$price ?></span>
                                    </small>
                                </div>
                            </div>
                            <div>
                                <small class="text-muted">Status</small>
                                <?php echo $status ?>
                            </div>
                            <div>
                                <small class="text-muted">Delivery Expected By</small>
                                <h4 class="p-0 m-0"><?php echo $delivery_date ?></h4>
                                <small class="text-muted">5 to 7 Working Days</small>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <?php echo $cancel_btn ?>
                        <?php echo $payment_status ?>
                        <div class=" fs-5">Total Price: <span class="text-orange fw-bold"><?php echo '$'.$formatted_total_price ?></span></div>
                    </div>
                </div>
        <?php } } ?>
    </div>
</div>