<?php 
    // ! get slider images
    function slider_images(){
        global $con;
        $carousal_img_path = CAROUSAL_IMG_PATH;
        $carousal = "SELECT * FROM carousal ORDER BY id DESC";
        $exe_carousal = mysqli_query($con, $carousal);
        if(mysqli_num_rows($exe_carousal) > 0){
            while($row_carousal = mysqli_fetch_assoc($exe_carousal)){
                echo <<<carousal
                <div class="carousel-item active c-item">
                    <img src="$carousal_img_path/$row_carousal[image]" class="d-block w-100 c-img" alt="...">
                </div>
                carousal;
            }
        }else{
            echo <<<carousal
            <div class="carousel-item active c-item">
                <img src="https://www.cvent-assets.com/brand-page-guestside-site/assets/images/venue-card-placeholder.png" class="d-block w-100 c-img" alt="...">
            </div>
            carousal;
        }
        
    }

    // ! get product to show on index page
    function get_index_page_products(){
        global $con;
        $new_badge = "";
        $hot_selling_badge = "";
        $recommend_badge = "";
        $qry = "SELECT * FROM products ORDER BY id DESC LIMIT 8";
        $exe = mysqli_query($con, $qry);
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {

                // ! get product Brand
                $q1 = "SELECT * FROM brands WHERE id='$row[brand_id]'";
                $r1 = mysqli_query($con, $q1);
                $get1 = mysqli_fetch_array($r1);
                $brand = $get1['name'];

                // ! get product category
                $q2 = "SELECT * FROM categories WHERE id='$row[category_id]'";
                $r2 = mysqli_query($con, $q2);
                $get2 = mysqli_fetch_array($r2);
                $category = $get2['name'];

                // ! get variations of product
                $q3 = "SELECT * FROM product_variations WHERE product_id='$row[id]'";
                $r3 = mysqli_query($con, $q3);

                $variation_data = "";
                while($variation = mysqli_fetch_assoc($r3)){
                    $stock = $variation['stock'];
                    if($stock > 0){
                        $variation_data .="
                        <div class='variation_box me-2 my-2' style='--i: $variation[color];'></div>
                        ";
                    }else{
                        $variation_data .="
                        <div class='out_of_stock me-2 my-2' style='--i: $variation[color];'></div>
                        ";
                    }

                }

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

                $path = PRODUCTS_IMG_PATH;
                echo <<<product
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card border-0 bg-light mb-3 rounded-0" style="max-width: 350px; margin: auto; position: relative;">
                        <div class='badge-tags'  style='position: absolute; top: 10px; left: 0px; z-index: 999'>
                            $new_badge
                            $hot_selling_badge
                            $recommend_badge
                        </div>
                        <a href="product_details.php?id=$row[id]" class="text-decoration-none text-dark">
                            <div class="card-header rounded-0 border-0" style="height: 250px; overflow: hidden">
                                <img src="$path/$row[img]" class="img-fluid" style="height: 100%; width: 100%; object-fit: contain;">
                            </div>
                            <div class="card-body text-center border border-top-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                $variation_data
                                <br>
                                <small class="mb-3">$row[name]</small>
                            </div>
                        </a> 
                    </div>
                </div>
                product;
            }
        }else {
            echo "<div class='alert alert-danger w-100'>No Product Exist</div>";
        }
    }

    // ! get most selling items to show on details page
    function most_selling_items(){
        global $con;
        $product_img_path = PRODUCTS_IMG_PATH;
        $most_sell = "SELECT * FROM products ORDER BY sales DESC LIMIT 8";
        $exe_most_sell = mysqli_query($con, $most_sell);
        while($row_most_sell = mysqli_fetch_assoc($exe_most_sell)){
            echo <<<mostSelling
            <a href="product_details.php?id=$row_most_sell[id]" class="text-decoration-none text-black" style="margin-bottom: 150px;">
                <div class="mb-3" style="width: 100%; height: 150px; position: relative">
                    <img src="$product_img_path/$row_most_sell[img]" class="img-fluid" style="width: 100%; height: 100%; position: absolute; object-fit: contain;">
                </div>
                <small>$row_most_sell[name]</small>
            </a>
            <hr>
            mostSelling;
        }
    }
?>