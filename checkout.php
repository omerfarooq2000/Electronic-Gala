<?php 
    include("vendor/stripe/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>My Cart | <?php echo $site_title .' - ' . $site_tagline; ?></title>
    <?php 
        if(!isset($_SESSION['login'])){
            header("Location: index.php");
        }
    ?>

    <!-- product details -->
    <?php 
        $data = '';
        $amount = 0;
        $total_amount = 0;
        $shipping_fee = 0;
        $q = "SELECT * FROM cart WHERE user_id = $u_id";
        $r = mysqli_query($con, $q);
        if(mysqli_num_rows($r) == 0){
            header("Location: cart.php");
        }else{
            while($row = mysqli_fetch_array($r)){
                $pro = "SELECT * FROM products WHERE id = $row[product_id]";
                $r1 = mysqli_query($con, $pro);
                $row1 = mysqli_fetch_array($r1);
                
                $var = "SELECT * FROM product_variations WHERE id = $row[variation_id]";
                $r2 = mysqli_query($con, $var);
                
                while($row3 = mysqli_fetch_array($r2)){
                    // ! for backend purposes
                    // * single item shipping fee including quantity
                    $single_item_shipping_fee = $row1['delivery_charges'] * $row['qty'];

                    // * total shipping fee count
                    $shipping_fee += $single_item_shipping_fee;

                    // * single item price
                    $single_item_price = $row3['price'];

                    // * sub total of single item
                    $subtotal_price = $single_item_price * $row['qty'];

                    // * total amount of cart items
                    $amount += $subtotal_price;

                    // * total amount of cart items including shipping fee
                    $total_payable = $shipping_fee + $amount;

                    // * total amount to pay (for stripe process)
                    $stripe_final_amount = $total_payable*100; 
                    
                    // ! for frontend purpose
                    $subtotal_price_formatted = number_format($subtotal_price, 1);
                    $single_item_price_formatted = number_format($single_item_price, 1);
                    $total_amount_formatted = number_format($amount, 1);
                    $total_payable_formatted = number_format($total_payable, 1);
                    $shipping_fee_formatted = number_format($shipping_fee, 1);
                    $data .="
                    <div class='form-group d-flex justify-content-between mb-3 pb-3 border-bottom'>
                        <small style='width: 300px'>$row1[name] x <span class='fw-bold'>$row[qty]</span></small>
                        <input type='hidden' value='$row[qty]' name='qty[]'/>
                        <small class='fw-bold'>$$subtotal_price_formatted</small>
                    </div>";
                }
            }
        }
    ?>

    <!-- pay with card -->
    <?php 
        // ! Card payment
        if (isset($_POST["stripeToken"])) {

            \Stripe\Stripe::setVerifySslCerts(false);
            $token = $_POST['stripeToken'];
            $data = \Stripe\Charge::create(array(
                "amount" => $stripe_final_amount,
                "currency" => "usd",
                "description" => "Electronic Gala",
                "source" => $token,
            ));
            
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

                    $getVar = "SELECT * FROM product_variations WHERE id='$variation_id'";
                    $runVar = mysqli_query($con, $getVar);
                    $rowVar = mysqli_fetch_array($runVar);

                    $variation_id = $rowVar['id'];
                    $variation = $rowVar['color'];
                    $price = $rowVar['price'];

                    $total_shipping_fee = $shipping_fee * $qty;

                    $order_price = $price * $qty;

                    $insert = "INSERT INTO orders(product_id, user_id, variation_id, product_name, variation, qty, price, shipping_fee, order_no, product_img, payment_type) VALUES('$user_cart_pro_id', '$u_id', '$variation_id', '$pro_name', '$variation', '$qty', '$order_price', '$total_shipping_fee', '$order_no', '$pro_img', '1')";
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
                echo '<script>window.open("account.php?page=orders", "_self")</script>';
            } else {
                echo '<script>alert("Something Went Wrong")</script>';
                echo '<script>window.open("cart.php", "_self")</script>';
            }
        }
    ?>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main class="container-fluid px-4">
        <h3 class="my-5 text-center">Checkout</h3>
            
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12 nav-tabs">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h4 class="mt-2">Billing Details</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-0 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Cash On Delivery</button>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <button class="nav-link rounded-0" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Pay With Card</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- Cash On Delivery -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <form action="app/cash_on_delivery.php" method="POST">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Email</label>
                                                        <input type="text" name="email" class="form-control shadow-none" value="<?php echo $u_email ?>" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Name</label>
                                                        <input type="text" name="name" value="<?php echo $u_name ?>" class="form-control shadow-none" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">City</label>
                                                        <input type="text" name="city" value="<?php echo $city ?>" class="form-control shadow-none" placeholder="City">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Province</label>
                                                        <input type="text" name="province" value="<?php echo $province ?>" class="form-control shadow-none" placeholder="Province">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="mb-2">Address</label>
                                                        <textarea name="address" rows="2" class="form-control shadow-none" placeholder="Address"><?php echo $address ?></textarea>
                                                    </div>
                                                    
                                                    <div class="col-12 mb-3">
                                                        <label class="mb-2">Phone</label>
                                                        <input type="number" name="phone" value="<?php echo $phone ?>" class="form-control shadow-none" placeholder="Phone #">
                                                    </div>
        
                                                    <div class="col-12">
                                                        <button type='submit' class='btn bg-orange btn-lg rounded-0 pay_btn_cash' name="pay_now_btn">PLACE ORDER</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pay With Card -->
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card rounded-0">
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Email</label>
                                                        <input type="text" name="email" class="form-control shadow-none input" value="<?php echo $u_email ?>" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Name</label>
                                                        <input type="text" name="name" class="form-control shadow-none input" value="<?php echo $u_name ?>" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">City</label>
                                                        <input type="text" name="city" class="form-control shadow-none input" value="<?php echo $city ?>" placeholder="City">
                                                    </div>
                                                    <div class="col-lg-6 col-sm-6 col-sm-12 mb-3">
                                                        <label class="mb-2">Province</label>
                                                        <input type="text" name="province" class="form-control shadow-none input" value="<?php echo $province ?>" placeholder="Province">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="mb-2">Address</label>
                                                        <textarea name="address" rows="2" class="form-control shadow-none input" placeholder="Address"><?php echo $address ?></textarea>
                                                    </div>
                                                    
                                                    <div class="col-12 mb-3">
                                                        <label class="mb-2">Phone</label>
                                                        <input type="number" name="phone" class="form-control shadow-none input" value="<?php echo $phone ?>" placeholder="Phone #">
                                                    </div>
        
                                                    <div class="col-12" id="card_payment_block">
                                                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                                            data-key="<?php echo $publishAbleKey; ?>"
                                                            data-amount="<?php echo $stripe_final_amount;  ?>" data-name="Electronic Gala"
                                                            data-description="Sell Amazing Things" data-currency="usd">
                                                        </script>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h4 class="mt-2">Order Summary</h4>
                        </div>
                        <div class="card-body">
                            <div class="card border-0">
                                <div class="card-body">
                                    <?php echo $data ?>
                                    <div class="form-group d-flex justify-content-between mb-3 pb-3 border-bottom">
                                        <small style="width: 300px">Shipping Fee</small>
                                        <small class="fw-bold"><?php echo '$'. $shipping_fee_formatted ?></small>
                                    </div>
                                    <div class="form-group d-flex justify-content-between mb-3 pb-3 border-bottom">
                                        <small style="width: 300px">Total</small>
                                        <small class="fw-bold"><?php echo '$'. $total_payable_formatted ?></small>
                                        <input type="hidden" value="$total_payable" name="total_payable"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>
    </main>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
    </footer>
</body>
</html>

