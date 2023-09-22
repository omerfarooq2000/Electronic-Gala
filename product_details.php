
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/fancybox/fancybox.css">
    <link href="vendor/exzoom/jquery.exzoom.css" rel="stylesheet">
    
    
    <?php include('inc/links.php') ?>
    <?php include("functions/functions.php"); ?>
    <?php 
    if(isset($_GET['id']) &&  !empty($_GET['id'])){
        $pro_id = $_GET['id'];
        // ! get product
        $qry = "SELECT * FROM products WHERE id = '$pro_id'";
        $exe = mysqli_query($con, $qry);
        if(mysqli_num_rows($exe) > 0){
            $row = mysqli_fetch_assoc($exe);

            $pro_id = $row['id'];
            $name = $row['name'];
            $description = $row['description'];
            $delivery_charges = $row['delivery_charges'];
            $img = $row['img'];
            $img1 = $row['img1'];
            $img2 = $row['img2'];
    
            // ! get product Brand
            $q1 = "SELECT * FROM brands WHERE id='$row[brand_id]'";
            $r1 = mysqli_query($con, $q1);
            $get1 = mysqli_fetch_array($r1);
            $brand_id = $get1['id'];
            $brand = $get1['name'];
    
            // ! get product category
            $q2 = "SELECT * FROM categories WHERE id='$row[category_id]'";
            $r2 = mysqli_query($con, $q2);
            $get2 = mysqli_fetch_array($r2);
            $category_id = $get2['id'];
            $category = $get2['name'];
    
            // ! get variations of product
            $q3 = "SELECT * FROM product_variations WHERE product_id='$row[id]'";
            $r3 = mysqli_query($con, $q3);
            
            $variation_data = "";
            $add_to_cart_btn = "";
            $stock = "";
            while($variation = mysqli_fetch_assoc($r3)){
                $price = number_format($variation['price'], 1);
                $variation_id = $variation['id'];
                $stock .= $variation['stock'];
                if($variation['stock'] > 0){
                    $variation_data .="
                    <div class='select_variation me-3 my-2' style='--i: $variation[color];' data-variation-id='$variation[id]' data-product-id='$pro_id' data-bs-toggle='tooltip' data-bs-placement='top' title='$variation[color]'></div>
                    ";
                }else{
                    $variation_data .="
                    <div class='out_of_stock me-3 my-2' style='--i: $variation[color];' data-variation-id='$variation[id]' data-product-id='$pro_id'></div>
                    ";
                }
            }
            if($stock > 0){
                $add_to_cart_btn .="
                <select class='form-select form-select-lg rounded-0 shadow-none d-inline-block w-25 mb-2' id='qty'>
                    <option value='1'>1</option>
                    <option value='2'>2</option>
                    <option value='3'>3</option>
                    <option value='4'>4</option>
                    <option value='5'>5</option>
                </select>
                <button onclick='addToCart($pro_id, $u_id)' class='btn bg-orange btn-lg shadow-none mb-1 rounded-0 input-group-text' id='add_to_cart_btn'><i class='bi bi-cart-plus me-2'></i>Add To Cart</button>
                ";
            }else{
                $add_to_cart_btn .="
                <div class='bg-orange text-white rounded-0 d-inline my-3 px-5 py-2'>Out Of Stock</div>
                ";
            }
    
            $new_badge = "";
            $hot_selling_badge = "";
            $recommend_badge = "";
    
            // ! minus 30 days from now to check product is new or not
            $new_date = strtotime('-30 days');
            if(strtotime($row['date']) > $new_date){
                $new_badge = "<div class='badge bg-warning rounded-0'>New</div><br>";
            }else{
                $new_badge = "";
            }
    
            // ! show hot selling badge
            if($row['sales'] > 100){
                $hot_selling_badge = "<div class='badge bg-danger rounded-0'>Hot Selling</div><br>";
            }else{
                $hot_selling_badge = "";
            }
    
            // ! show recommendation badge
            if($row['recommended'] == 1){
                $recommend_badge = "<div class='badge bg-info rounded-0  mb-1'>Recommended</div><br>";
            }else{
                $recommend_badge = "";
            }
            $product_img_path = PRODUCTS_IMG_PATH;
        }else{
            echo '<script>window.open("shop.php", "_self")</script>';
        }
    }else {
        header("Location: shop.php");
    }
    ?>

    <?php
        // ! Counting the ratings as number. like 1 star, 2 start, 3 start etc
        // ! count total rating
        global $count_total_rating;
        $total_rating = "SELECT * FROM reviews WHERE product_id = '$pro_id' AND status = '1'";
        $run_total_rating = mysqli_query($con, $total_rating);
        $count_total_rating = mysqli_num_rows($run_total_rating);

        // ! count five stars
        $five_star = "SELECT COUNT(rating) as five FROM reviews WHERE product_id = '$pro_id' AND status = '1' AND rating = 5";
        $run_five_start = mysqli_query($con, $five_star);
        $fetch_five_star = mysqli_fetch_array($run_five_start);

        // ! count four stars
        $four_star = "SELECT COUNT(rating) as four FROM reviews WHERE product_id = '$pro_id' AND status = '1' AND rating = 4";
        $run_four_start = mysqli_query($con, $four_star);
        $fetch_four_star = mysqli_fetch_array($run_four_start);

        // ! count three stars
        $three_star = "SELECT COUNT(rating) as three FROM reviews WHERE product_id = '$pro_id' AND status = '1' AND rating = 3";
        $run_three_start = mysqli_query($con, $three_star);
        $fetch_three_star = mysqli_fetch_array($run_three_start);

        // ! count two stars
        $two_star = "SELECT COUNT(rating) as two FROM reviews WHERE product_id = '$pro_id' AND status = '1' AND rating = 2";
        $run_two_start = mysqli_query($con, $two_star);
        $fetch_two_star = mysqli_fetch_array($run_two_start);

        // ! count one star
        $one_star = "SELECT COUNT(rating) as one FROM reviews WHERE product_id = '$pro_id' AND status = '1' AND rating = 1";
        $run_one_start = mysqli_query($con, $one_star);
        $fetch_one_star = mysqli_fetch_array($run_one_start);

        // ! count average rating
        // fetch rating
        $get_rating = "SELECT ROUND(AVG(rating),1) as average FROM reviews WHERE product_id='$pro_id' AND status = '1'";
        $run_get_rating = mysqli_query($con, $get_rating);
        $getAverage = mysqli_fetch_array($run_get_rating);
        $averageRating = $getAverage['average'] ? $getAverage['average'] : 0;
    ?>
    <title><?php echo $name ?> | <?php echo $site_title .' - ' . $site_tagline; ?></title>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main>
        <div class="container-fluid">
            <div class="card mt-4 rounded-0">
                <div class="card-body">
                    <!-- product details row -->
                    <div class="row">
                        <!-- Breadcrumbs -->
                        <div class="col-12 mb-4">
                            <div class="text-center" style="font-size: 15px">
                                <a href="index.php" class="text-secondary fw-bold text-decoration-none">HOME</a>
                                <span> / </span>
                                <a href="shop.php" class="text-secondary fw-bold text-decoration-none">SHOP</a>
                                <span> / </span>
                                <span class="text-gray"><?php echo $name ?></span>
                            </div>
                        </div>
                        <!-- Product Image slider -->
                        <div class="col-lg-5 col-md-6 col-sm-12 mb-5">
                            <div class="product-img-container">
                                <div class="badge-tags"  style="position: absolute; top: 10px; left: 0px; z-index: 999">
                                    <?php 
                                        echo $new_badge; 
                                        echo $hot_selling_badge;
                                        echo $recommend_badge;
                                    ?>
                                </div>
                                
                                <div class="exzoom" id="exzoom">
                                    <div class="exzoom_img_box">
                                        <ul class='exzoom_img_ul'>
                                            <li>
                                                <img src='<?php echo $product_img_path.'/'.$img  ?>' class='img-fluid'>
                                            </li>
                                            <li>
                                                <img src='<?php echo $product_img_path.'/'.$img1  ?>' class='img-fluid'>
                                            </li>
                                            <li>
                                                <img src='<?php echo $product_img_path.'/'.$img2  ?>' class='img-fluid'>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="exzoom_nav"></div>
                                    <p class="exzoom_btn">
                                        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        <!-- product details -->
                        <div class="col-lg-7 col-md-6 col-sm-12">
                            <?php 
                                echo "<h4 class='fw-bold mb-2 pb-2'>$name</h4>";
                                $fullStars = floor($averageRating);
                                $halfStar = ($averageRating - $fullStars) >= 0.5;
                                echo str_repeat('<i class="bi bi-star-fill text-warning"></i>', $fullStars); // Full stars
                                if ($halfStar) {
                                    echo '<i class="bi bi-star-half text-warning"></i>'; // Half star
                                }
                                $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                echo str_repeat('<i class="bi bi-star text-warning"></i>', $emptyStars); // Empty stars
                                echo '('.$count_total_rating.')';
                                echo <<<data
                                    <div class=" mt-2">
                                        <div class="fw-bold mb-2" id="price"></div>
                                        <div class="get-index">$variation_data</div>
                                        <div class="mb-2" id="color"></div>
                                        <div class="mb-3">
                                            <small class="text-success fw-bold">Stock &#9679;:</small>
                                            <small id="stock"></small>
                                        </div>
                                        <div>
                                            $add_to_cart_btn
                                            <div class="my-2">
                                                Brand: <span class='text-orange text-capitalize'>$brand</span> <br>
                                                Category: <span class='text-orange text-capitalize'>$category</span>
                                            </div>
                                        </div>
                                    </div>
                                data;
                            ?>
                            <div class="mt-4">
                                <?php 
                                    $frequent_bought_product = "";
                                    // ! select from frequently bought together table
                                    $freq = "SELECT * FROM frequent_bought WHERE product_id = '$pro_id'";
                                    $exe_freq = mysqli_query($con, $freq);
                                    if(mysqli_num_rows($exe_freq) > 0){
                                        echo '<h4 class="mb-3">Frequently Bought Together</h4>';
                                        $frequent_bought_product .= "<form id='add_selected_to_cart_form'><input type='hidden' name='user_id' value='$u_id'>";
                                        $frequent_bought_product .= "<button type='submit'  class='btn btn-sm bg-orange rounded-0 my-3 shadow-none' id='add_selected_to_cart_btn'>Add Selected To Cart</button>";
                                        while($frequent = mysqli_fetch_array($exe_freq)){
                                            $var_price = 0;
                                            $pro = "SELECT * FROM products WHERE id = '$frequent[bought_with]'";
                                            $exe_pro = mysqli_query($con, $pro);
                                            $product = mysqli_fetch_array($exe_pro);
                                            // ! get variations
                                            $var = "SELECT * FROM product_variations WHERE product_id = '$product[id]'";
                                            $run_var = mysqli_query($con, $var);

                                            $prod_name = "<span class='text-muted'>$product[name]</span>";

                                            $frequent_bought_product .= "<div><input type='hidden' name='user_id[]' value='$u_id'>";

                                            $frequent_bought_product .= "<input type='checkbox' name='pro_id[]' value='$product[id]' class='me-1 mb-2' checked readonly><small class='fw-bold'>$prod_name</small>";
                                            
                                            $frequent_bought_product .= "<select name='pro_var[]' class='mx-2'>";
                                            while($var_row = mysqli_fetch_array($run_var)){
                                                $frequent_bought_product .= "<option value='$var_row[id]'>$var_row[color]</option>";
                                                $price = $var_row['price'];
                                                $var_price += $price;
                                            }
                                            $frequent_bought_product .= "</select>$$price<div></div>";
                                        }
                                        $frequent_bought_product .= "<div class='mt-3 fw-bold'>Total Price: $$var_price</div>";
                                        $frequent_bought_product .= "</form>";
                                        echo $frequent_bought_product;
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- product description -->
                    <div class="card mt-4 rounded-0 product-desc">
                        <div class="card-header bg-orange rounded-0">
                            <h6 class="mt-2">Product Description Of <?php echo $name; ?></h6>
                        </div>
                        <div class="card-body">
                            <p><?php echo $description ?></p>
                        </div>
                    </div>
                    <!-- Rating and reviews -->
                    <div class="card mt-4 rounded-0">
                        <div class="card-header bg-orange rounded-0">
                            <h6 class="mt-2">Ratings & Reviews Of <?php echo $name; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Star rating total average count -->
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <!-- Show average ratings out of 5 -->
                                    <div class="total-rating-section"><span class="average-ratings"><?php echo $averageRating; ?></span><span class="text-muted total-rating">/5</span></div>
                                    <!-- Show average rating stars -->
                                    <div class="rating-starts">
                                        <?php 
                                            $fullStars = floor($averageRating);
                                            $halfStar = ($averageRating - $fullStars) >= 0.5;
                                            echo str_repeat('<i class="bi bi-star-fill text-warning fs-3"></i>', $fullStars); // Full stars
                                            if ($halfStar) {
                                                echo '<i class="bi bi-star-half text-warning fs-3"></i>'; // Half star
                                            }
                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
                                            echo str_repeat('<i class="bi bi-star text-warning fs-3"></i>', $emptyStars); // Empty stars
                                        ?>
                                    </div>
                                    <small class="text-muted"><?php echo $count_total_rating.' rating(s)' ?></small>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    
                                    <!-- Star Rating bars 1 -->
                                    <div class="d-flex align-items-center">
                                        <div class="me-5">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                        </div>
                                        <div class="d-flex align-items-center" style="width: 160px">
                                            <div class="progress w-100 me-2">
                                                <div class="progress-bar bg-orange progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="ps-2"><?php echo $fetch_five_star["five"] ?></small>
                                        </div>
                                    </div>
                                    <!-- Star Rating bars 2 -->
                                    <div class="d-flex align-items-center">
                                        <div class="me-5">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star text-muted"></i>
                                        </div>
                                        <div class="d-flex align-items-center" style="width: 160px">
                                            <div class="progress w-100 me-2">
                                                <div class="progress-bar bg-orange progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="ps-2"><?php echo $fetch_four_star["four"] ?></small>
                                        </div>
                                    </div>
                                    <!-- Star Rating bars 3 -->
                                    <div class="d-flex align-items-center">
                                        <div class="me-5">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                        </div>
                                        <div class="d-flex align-items-center" style="width: 160px">
                                            <div class="progress w-100 me-2">
                                                <div class="progress-bar bg-orange progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="ps-2"><?php echo $fetch_three_star["three"] ?></small>
                                        </div>
                                    </div>
                                    <!-- Star Rating bars 4 -->
                                    <div class="d-flex align-items-center">
                                        <div class="me-5">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                        </div>
                                        <div class="d-flex align-items-center" style="width: 160px">
                                            <div class="progress w-100 me-2">
                                                <div class="progress-bar bg-orange progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="ps-2"><?php echo $fetch_two_star["two"] ?></small>
                                        </div>
                                    </div>
                                    <!-- Star Rating bars 5 -->
                                    <div class="d-flex align-items-center">
                                        <div class="me-5">
                                            <i class="bi bi-star-fill text-warning"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                            <i class="bi bi-star text-muted"></i>
                                        </div>
                                        <div class="d-flex align-items-center" style="width: 160px">
                                            <div class="progress w-100 me-2">
                                                <div class="progress-bar bg-orange progress-bar-striped" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <small class="ps-2"><?php echo $fetch_one_star["one"] ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header bg-orange rounded-0">
                            <h6 class="mt-2">Ratings & Reviews</h6>
                        </div>
                        <div class="card-body">
                            <?php 
                                $user_star_rate = "";
                                $review_img_one = "";
                                $review_img_two = "";
                                $review_img_three = "";
                                $users_img_path = USERS_IMG_PATH;
                                $reviews_img_path = REVIEWS_IMG_PATH;
                                $review = "SELECT * FROM reviews WHERE product_id = '$pro_id' AND status = '1' ORDER BY id DESC";
                                $run_review = mysqli_query($con, $review);
                                if(mysqli_num_rows($run_review) > 0){
                                    while($review_row = mysqli_fetch_array($run_review)){
                                        $get_user = "SELECT * FROM users WHERE id = '$review_row[user_id]'";
                                        $run_get_user = mysqli_query($con, $get_user);
                                        $get_user_details = mysqli_fetch_array($run_get_user);
                                        $date = date("F j, Y, g:i a", strtotime($review_row['date']));

                                        if($review_row['img_one'] != NULL){
                                            $review_img_one =
                                            '<a href="'.$reviews_img_path.'/'.$review_row['img_one'].'" class="me-2" style="display: block; width: 80px; height: 80px; position: relative;"  data-fancybox="gallery" data-caption="'.$review_row['feedback'].'">
                                                <img src="'.$reviews_img_path.'/'.$review_row['img_one'].'" style="width: 100%; height: 100%; position: absolute; object-fit: contain;"/>
                                            </a>';
                                        }
                                        if($review_row['img_two'] != NULL){
                                            $review_img_two =
                                            '<a href="'.$reviews_img_path.'/'.$review_row['img_two'].'" class="me-2" style="display: block; width: 80px; height: 80px; position: relative;"  data-fancybox="gallery" data-caption="'.$review_row['feedback'].'">
                                                <img src="'.$reviews_img_path.'/'.$review_row['img_two'].'" style="width: 100%; height: 100%; position: absolute; object-fit: contain;"/>
                                            </a>';
                                        }
                                        if($review_row['img_three'] != NULL){
                                            $review_img_three =
                                            '<a href="'.$reviews_img_path.'/'.$review_row['img_three'].'" class="me-2" style="display: block; width: 80px; height: 80px; position: relative;"  data-fancybox="gallery" data-caption="'.$review_row['feedback'].'">
                                                <img src="'.$reviews_img_path.'/'.$review_row['img_three'].'" style="width: 100%; height: 100%; position: absolute; object-fit: contain;"/>
                                            </a>';
                                        }

                                        if($review_row['rating'] == 5){
                                            $user_star_rate =
                                            '<div class="rating ms-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                            </div>';
                                        }
                                        if($review_row['rating'] == 4){
                                            $user_star_rate =
                                            '<div class="rating ms-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                            </div>';
                                        }
                                        if($review_row['rating'] == 3){
                                            $user_star_rate =
                                            '<div class="rating ms-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                            </div>';
                                        }
                                        if($review_row['rating'] == 2){
                                            $user_star_rate =
                                            '<div class="rating ms-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                            </div>';
                                        }
                                        if($review_row['rating'] == 1){
                                            $user_star_rate =
                                            '<div class="rating ms-2">
                                                <i class="bi bi-star-fill text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                                <i class="bi bi-star text-warning"></i>
                                            </div>';
                                        }

                                        
                                        echo <<<review
                                        <div class="border-bottom bg-light mb-3 pb-3" style="min-height: 100px">
                                            <div class="d-flex align-items-center align-items-center mb-3">
                                                <div style="width: 50px; height: 50px; position: relative">
                                                    <img src="$users_img_path/$get_user_details[img]" style="width: 100%; height: 100%; position: absolute">
                                                </div>
                                                <div>
                                                    <small class="fw-bold m-0 ms-2 text-capitalize">$get_user_details[name]</small>
                                                    <small class="m-0 text-muted">$date</small>
                                                    $user_star_rate
                                                </div>
                                            </div>
                                            <p class="ms-2">$review_row[feedback]</p>
                                            <div class="d-flex">
                                                $review_img_one
                                                $review_img_two
                                                $review_img_three
                                            </div>
                                        </div>
                                        review;
                                    }
                                }else{
                                    echo "<h5>No one review this product</h5>";
                                }
                            ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="card mt-4 rounded-0">
                        <div class="card-header bg-orange rounded-0">
                            <h6 class="mt-2">Most Selling Items</h6>
                        </div>
                        <div class="card-body">
                            <?php 
                                most_selling_items();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer area -->
    <?php include('inc/footer.php') ?>
    <script src="vendor/fancybox/fancybox.js"></script>
    <!-- Ajax -->
    <script src="public/ajax/product_details.js"></script>
    <script src="public/ajax/add_selected_to_cart.js"></script>
    <script src="vendor/exzoom/jquery.exzoom.js"></script>
    <!-- fancy box image viewer. view product reviews images -->
    <script>
    Fancybox.bind("[data-fancybox]", {
        animationEffect: "classic",
        Thumbs: {
            type: "classic",
        },
    });

    $(function(){

    $("#exzoom").exzoom({

        // thumbnail nav options
        "navWidth": 60,
        "navHeight": 60,
        "navItemNum": 5,
        "navItemMargin": 7,
        "navBorder": 1,

        // autoplay
        "autoPlay": true,

        // autoplay interval in milliseconds
        "autoPlayTimeout": 2000
        
        });

    });
    </script>
</body>
</html>

