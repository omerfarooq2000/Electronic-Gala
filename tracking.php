<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Track Order | <?php echo $site_title .' - ' . $site_tagline; ?></title>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main class="container-fluid px-4">
        <h3 class="text-center my-4 text-orange fw-bold">Track Order</h3>
        <div class="row">
            <div class="col-lg-8 col-md-10 col-sm-12 m-auto">
                <div class="card rounded-0">
                    <div class="card-header">
                        <form class="w-md-50 w-100 m-auto" method="GET">
                            <div class="form-group">
                                <label class="mb-2">Order No</label>
                                <div class="input-group">
                                    <input type="text" class="form-control shadow-none" name="order_no" placeholder="Enter Order Number" required>
                                    <button type="submit" class="btn bg-orange shadow-none rounded-0 input-group-text">Track</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                            <?php 
                                if(isset($_GET['order_no'])){
                                    $order_no = $_GET['order_no'];
                                    $qry = "SELECT * FROM orders WHERE order_no = '$order_no'";
                                    $exe = mysqli_query($con, $qry);
                                    if(mysqli_num_rows($exe) < 1){
                                        echo <<<empty
                                        <h4 class='my-5 text-capitalize text-center'>No order exist.<br> kindly check your order number</h4>
                                        empty;
                                    }else{
                                        while($row = mysqli_fetch_array($exe)){
                                            $path = PRODUCTS_IMG_PATH;

                                            $tracking = $row['status'];

                                            $price = $row['price'];
                                            $qty = $row['qty'];
                                            $subTotal = $price*$qty;

                                    ?>
                                    
                                    <div class="border-bottom mb-2 pb-2 d-flex align-items-center">
                                        <img src="<?php echo $path.'/'.$row['product_img'] ?>" class="img-responsive me-2" width="80px" height="80px">
                                        <div>
                                            <h4 class="mt-3 fs-5"><?php echo $row['product_name'] ?></h4>
                                            <p class="p-0 m-0"><?php echo '$'.$price.' x '.$qty.'='.'$'.$subTotal ?></p>
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    }
                                }
                            ?>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 tracking-status">
                                <?php 
                                    if(isset($_GET['order_no'])){
                                        $textClass = '';
                                        $bgClass = '';
                                        $reviewBtn = '';
                                        $order_no = $_GET['order_no'];
                                        $qry = "SELECT * FROM track_order WHERE order_no = '$order_no' ORDER BY id DESC";
                                        $exe = mysqli_query($con, $qry);
                                        while($row = mysqli_fetch_array($exe)){
                                            $title = $row['title'];
                                            $description = $row['description'];
                                            $date = date("F j, Y, g:i a", strtotime($row['date']));

                                            $status = $row['title'];
                                            if($status == 'canceled'){
                                                $textClass = 'text-danger';
                                                $bgClass = 'bg-danger';
                                            }else{
                                                $textClass = 'text-secondary';
                                                $bgClass = 'bg-dark';
                                            }

                                            if($status == 'delivered'){
                                                $textClass = 'text-success';
                                                $bgClass = 'bg-success';
                                                $reviewBtn = '<a href="javascript:void(0)" class="text-decoration-none text-orange fw-bold ms-2" data-bs-toggle="modal" data-bs-target="#add_review">Review Now</a>';
                                            }else{
                                                $textClass = 'text-secondary';
                                                $bgClass = 'bg-dark';
                                                $reviewBtn = '';
                                            }
                                        ?>
                                        <div class='tracking-box d-flex align-items-center'>
                                            <div class='circle <?php echo $bgClass ?> d-flex justify-content-center align-items-center rounded-circle me-2'>
                                                <div class='inner-circle rounded-circle'></div>
                                                <div class='line <?php echo $bgClass ?>'></div>
                                            </div>
                                            <div>
                                                <small class='value <?php echo $textClass ?> fw-bold m-0 p-0 text-capitalize'><?php echo $title ?></small><small class='value <?php echo $textClass ?> fw-bold ms-2'>(<?php echo $date ?>)</small><small><?php echo $reviewBtn ?></small><br>
                                                <small class='value <?php echo $textClass ?> fw-bold m-0 p-0 text-capitalize'><?php echo $description ?></small><br>
                                            </div>
                                        </div>
                                        
                                        <?php 
                                            }
                                        }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- add review modal -->
    <div class="modal fade" id="add_review" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">Add Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_review_form">
                        <input type="hidden" name="key" value="add_review_key">
                        <input type="hidden" name="order_no" value="<?php echo $order_no ?>">
                        <input type="hidden" name="user_id" value="<?php echo $u_id ?>">
                        <div class="form-group mb-3">
                            <label class="mb-2">Select Rating:</label>
                            <select name="rating" class="form-select shadow-none" required>
                                <option value="" disabled selected>---Select Rating---</option>
                                <option value="1">Poor</option>
                                <option value="2">Satisfied</option>
                                <option value="3">Neutral</option>
                                <option value="4">Good</option>
                                <option value="5">Excellent</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Feedback:</label>
                            <textarea name="feedback" class="form-control shadow-none" rows="3" maxlength="255" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Image 1:</label>
                            <input type="file" name="img1" class="form-control shadow-none">
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Image 2:</label>
                            <input type="file" name="img2" class="form-control shadow-none">
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Image 3:</label>
                            <input type="file" name="img3" class="form-control shadow-none">
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark" id="add_review_btn">Add Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <!-- Ajax -->
        <script src="public/ajax/tracking.js"></script>
    </footer>
</body>
</html>

