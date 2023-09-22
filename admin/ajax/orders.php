<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $productImgPath = PRODUCTS_IMG_PATH;
    $userImgPath = USERS_IMG_PATH;
    // ! get all orders from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_all_orders'){
        $qry = "SELECT * FROM orders GROUP BY order_no ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $payment_status = "";
        $status_class = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));

                $user = "SELECT * FROM users WHERE id = '$row[user_id]'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                $track = "SELECT * FROM track_order WHERE order_no = '$row[order_no]' ORDER BY id DESC";
                $run_track = mysqli_query($con, $track);
                $row_track = mysqli_fetch_array($run_track);
                
                if($row['payment_type'] == '0'){
                    $payment_status = '<small class="text-color-8 fw-bold">COD</small>';
                }else{
                    $payment_status = '<small class="text-color-15 fw-bold">Card</small>';
                }

                if($row['status'] == '0'){
                    $status_class = 'status pending';
                }
                if($row['status'] == '1'){
                    $status_class = 'status processing';
                }
                if($row['status'] == '2'){
                    $status_class = 'status transit';
                }
                if($row['status'] == '3'){
                    $status_class = 'status shipped';
                }
                if($row['status'] == '4'){
                    $status_class = 'status out-for-delivery';
                }
                if($row['status'] == '5'){
                    $status_class = 'status delivered';
                }
                if($row['status'] == '6'){
                    $status_class = 'status canceled';
                }
                if($row['status'] == '7'){
                    $status_class = 'status failed';
                }
                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td >
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$productImgPath/$row[product_img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'>
                                <small class='fw-bold'>$row[product_name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 50px; height: 50px;'>
                                <img src='$userImgPath/$row_user[img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div>
                                <span class='fw-bold text-capitalize'>$row_user[name]</span><br>
                                <small>$row_user[email]</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='text-capitalize fw-bold $status_class'>&#9679; $row_track[title]</div>
                    </td>
                    <td class='fw-bold align-middle'> $payment_status</td>
                    <td class='align-middle'>
                        <a href='order-details.php?order_no=$row[order_no]' class='btn btn-warning shadow-none' title='View'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }
    // ! get pending orders from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_pending_orders'){
        $qry = "SELECT * FROM orders WHERE status = '0' GROUP BY order_no ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $status = "";
        $output = "";
        $payment_status = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));

                $user = "SELECT * FROM users WHERE id = '$row[user_id]'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                ($row['status'] == 0) ? $status = 'pending' : "";
                
                if($row['payment_type'] == '0'){
                    $payment_status = '<small class="text-color-8 fw-bold">COD</small>';
                }else{
                    $payment_status = '<small class="text-color-15 fw-bold">Card</small>';
                }

                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$productImgPath/$row[product_img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'>
                                <small class='fw-bold'>$row[product_name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='d-flex'>
                            <div class='me-3' style='width: 50px; height: 50px;'>
                                <img src='$userImgPath/$row_user[img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div>
                                <span class='fw-bold text-capitalize'>$row_user[name]</span><br>
                                <small>$row_user[email]</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='fw-bold text-capitalize status pending'>&#9679; $status</div>
                    </td>
                    <td class='fw-bold align-middle'> $payment_status</td>
                    <td class='align-middle'>
                        <a href='order-details.php?order_no=$row[order_no]' class='btn btn-warning shadow-none' title='View'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }
    // ! get processing orders from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_processing_orders'){
        $qry = "SELECT * FROM orders WHERE status = '1' OR status = '2' OR status = '3' OR status = '4' GROUP BY order_no ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $status = "";
        $output = "";
        $payment_status = "";
        $status_class = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));

                $user = "SELECT * FROM users WHERE id = '$row[user_id]'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                ($row['status'] == 1) ? $status = 'processing' : "";
                ($row['status'] == 2) ? $status = 'in-transit' : "";
                ($row['status'] == 3) ? $status = 'shipped' : "";
                ($row['status'] == 4) ? $status = 'out for Delivery' : "";
                
                if($row['payment_type'] == '0'){
                    $payment_status = '<small class="text-color-8 fw-bold">COD</small>';
                }else{
                    $payment_status = '<small class="text-color-15 fw-bold">Card</small>';
                }

                if($row['status'] == '1'){
                    $status_class = 'status processing';
                }
                if($row['status'] == '2'){
                    $status_class = 'status transit';
                }
                if($row['status'] == '3'){
                    $status_class = 'status shipped';
                }
                if($row['status'] == '4'){
                    $status_class = 'status out-for-delivery';
                }

                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$productImgPath/$row[product_img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'>
                                <small class='fw-bold'>$row[product_name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='d-flex'>
                            <div class='me-3' style='width: 50px; height: 50px;'>
                                <img src='$userImgPath/$row_user[img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div>
                                <span class='fw-bold text-capitalize'>$row_user[name]</span><br>
                                <small>$row_user[email]</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='text-capitalize fw-bold $status_class'>&#9679; $status</div>
                    </td>
                    <td class='fw-bold align-middle'> $payment_status</td>
                    <td class='align-middle'>
                        <a href='order-details.php?order_no=$row[order_no]' class='btn btn-warning shadow-none' title='View'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }
    // ! get delivered orders from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_delivered_orders'){
        $qry = "SELECT * FROM orders WHERE status = '5' GROUP BY order_no ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $status = "";
        $output = "";
        $payment_status = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));

                $user = "SELECT * FROM users WHERE id = '$row[user_id]'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                ($row['status'] == 5) ? $status = 'delivered' : "";
                
                if($row['payment_type'] == '0'){
                    $payment_status = '<small class="text-color-8 fw-bold">COD</small>';
                }else{
                    $payment_status = '<small class="text-color-15 fw-bold">Card</small>';
                }

                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$productImgPath/$row[product_img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'>
                                <small class='fw-bold'>$row[product_name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='d-flex'>
                            <div class='me-3' style='width: 50px; height: 50px;'>
                                <img src='$userImgPath/$row_user[img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div>
                                <span class='fw-bold text-capitalize'>$row_user[name]</span><br>
                                <small>$row_user[email]</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='fw-bold text-capitalize status delivered'>&#9679;$status</div>
                    </td>
                    <td class='fw-bold align-middle'> $payment_status</td>
                    <td class='align-middle'>
                        <a href='order-details.php?order_no=$row[order_no]' class='btn btn-warning shadow-none' title='View'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }
    // ! get canceled or failed orders from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_canceled_orders'){
        $qry = "SELECT * FROM orders WHERE status = '6' OR status = '7' GROUP BY order_no ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $status = "";
        $output = "";
        $payment_status = "";
        $status_class = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));

                $user = "SELECT * FROM users WHERE id = '$row[user_id]'";
                $run_user = mysqli_query($con, $user);
                $row_user = mysqli_fetch_array($run_user);

                ($row['status'] == 6) ? $status = 'canceled' : "";
                ($row['status'] == 7) ? $status = 'failed' : "";
                
                if($row['payment_type'] == '0'){
                    $payment_status = '<small class="text-color-8 fw-bold">COD</small>';
                }else{
                    $payment_status = '<small class="text-color-15 fw-bold">Card</small>';
                }

                if($row['status'] == '6'){
                    $status_class = 'status canceled';
                }
                if($row['status'] == '7'){
                    $status_class = 'status failed';
                }

                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$productImgPath/$row[product_img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'>
                                <small class='fw-bold'>$row[product_name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='d-flex'>
                            <div class='me-3' style='width: 50px; height: 50px;'>
                                <img src='$userImgPath/$row_user[img]' class='img-responsive rounded object-fit-cover' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div>
                                <span class='fw-bold text-capitalize'>$row_user[name]</span><br>
                                <small>$row_user[email]</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <div class='text-capitalize fw-bold $status_class'>&#9679;$status</div>
                    </td>
                    <td class='fw-bold align-middle'> $payment_status</td>
                    <td class='align-middle'>
                        <a href='order-details.php?order_no=$row[order_no]' class='btn btn-warning shadow-none' title='View'><i class='bi bi-eye'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='6'>No Data Exist</td></tr>";
        }
    }
?>

