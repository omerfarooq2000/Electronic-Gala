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
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main class="container-fluid px-4">
        <h3 class="my-4 text-center">My Cart</h3>
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12" id="cart_data">
            <?php 
                $no = 0;
                $amount = 0;
                $total_price = 0;
                $cart_total_shipping = 0;
                $product_img_path = PRODUCTS_IMG_PATH;
                $q = "SELECT * FROM cart WHERE user_id = '$u_id'";
                $r = mysqli_query($con, $q);
                if(mysqli_num_rows($r) == 0){
                    echo "
                        <div class='d-flex justify-content-center align-items-center'>
                            <div class='text-center'>
                                <h4>No data exist is cart</h4>
                                <a href='shop.php' class='btn bg-orange shadow-none rounded-0'>Continue Shopping<i class='bi bi-arrow-right ms-2'></i></a>
                            </div>
                        </div>
                    ";
                }else{
                    while($row = mysqli_fetch_array($r)){
                        $no++;
                        $pro = "SELECT * FROM products WHERE id = $row[product_id]";
                        $r1 = mysqli_query($con, $pro);
                        $row1 = mysqli_fetch_array($r1);
                        
                        $var = "SELECT * FROM product_variations WHERE id = $row[variation_id]";
                        $r2 = mysqli_query($con, $var);
                        
                        while($row3 = mysqli_fetch_array($r2)){
                            // ! for backend purposes
                            // * cart quantity
                            $cart_qty = $row['qty'];

                            // * product shipping charges
                            $product_shipping = $row1['delivery_charges'];

                            // * single product price
                            $single_item_price = $row3['price'];
                            
                            // * calculate single item shipping amount or cart item
                            $single_product_shipping_total = $product_shipping * $cart_qty;

                            // * calculate total cart items shipping amount
                            $cart_total_shipping += $single_product_shipping_total;
                            
                            // * calculate total price of single item according to quantity
                            $subtotal_price = $single_item_price * $cart_qty;
                            
                            // * final amount of all cart items
                            $total_price += $subtotal_price;
                            
                            // * calculate total price of single item including shipping charges
                            $total_payable = $total_price + $cart_total_shipping;

                            // ! for frontend purpose
                            $formatted_single_item_price = number_format($single_item_price, 1);
                            $formatted_single_product_shipping_total = number_format($single_product_shipping_total, 1);
                            $formatted_subtotal_price = number_format($subtotal_price, 1);
                            $formatted_total_price = number_format($total_price, 1);
                            $formatted_cart_total_shipping = number_format($cart_total_shipping, 1);
                            $formatted_total_payable = number_format($total_payable, 1);

                            echo <<<cart
                                <div class="card border-0 shadow-sm mb-2">
                                    <div class="card-body">
                                        <div class="cart-product-wrapper d-flex w-100">
                                            <div class="me-3" style="width: 150px; height: 150px; position: relative; overflow:hidden;">
                                                <img src="$product_img_path/$row1[img]" style="width: 100%; height: 100%; position: absolute; object-fit: contain;">
                                            </div>
                                            <div class="cart-product-info w-100">
                                                <div class="d-flex justify-content-between">
                                                    <a href="product_details.php?id=$row1[id]" class="text-decoration-none text-muted">$row1[name]</a>
                                                    <div class='text-orange ms-5' style='cursor: pointer;' onclick="deleteFromCart($row[id])">
                                                        <i class="bi bi-trash fs-5"></i>
                                                    </div>
                                                </div>
                                                <div class="my-1">
                                                    <div class='variation_box me-2 my-3' style='--i: $row3[color];'></div>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="p-0 m-0">$$formatted_single_item_price</h4>
                                                        <small class="text-muted">+ Shipping: <span class="fw-bold">$$formatted_single_product_shipping_total</span></small>
                                                    </div>
                                                    <div>
                                                        <input type="number" class="form-control shadow-none cart-quantity bg-light w-100" value="$row[qty]" min="1" max="5" onchange="updateCart(this, $_SESSION[uId], $row[id])">
                                                        <small class='fw-bold text-muted'>Subtotal: $ $formatted_subtotal_price</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            cart;
                        }
                    }
                }
            ?>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12" id="cart_total">
                <?php 
                    if(mysqli_num_rows($r) > 0){
                        echo <<<totalAmount
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4>Order Summary</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between my-3">
                                        <small>Total Price:</small>
                                        <small class="fw-bold">$$formatted_total_price</small>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small>Shipping Charges:</small>
                                        <small class="fw-bold">$$formatted_cart_total_shipping</small>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small>Total Payable:</small>
                                        <small class="fw-bold">$$formatted_total_payable</small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="checkout.php" class="btn bg-orange w-100 text-uppercase rounded-0" id='checkout_btn'><i class="bi bi-lock-fill me-2"></i>Checkout</a>
                                </div>
                            </div>
                        totalAmount;
                    }else{
                        echo <<<totalAmount
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4 class='text-dark'>Order Summary</h4>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between my-3">
                                        <small>Total Price:</small>
                                        <small class="fw-bold">$0</small>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small>Shipping Charges:</small>
                                        <small class="fw-bold">$0</small>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small>Total Payable:</small>
                                        <small class="fw-bold">$0</small>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="javascript:void(0)" class="btn bg-orange w-100 text-uppercase rounded-0 disabled"><i class="bi bi-lock-fill me-2"></i>Checkout</a>
                                </div>
                            </div>
                        totalAmount;
                    }
                ?>
            </div>
        </div>
    </main>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <script src="public/ajax/cart.js"></script>
    </footer>
</body>
</html>

