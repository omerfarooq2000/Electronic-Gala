<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Products | <?php echo $site_title .' - ' . $site_tagline; ?></title>
    
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main>

        <div class="container-fluid">
            <h3 class="text-center my-4 text-orange fw-bold">Shop Our Latest Products</h3>
            <div class="row">
                <div class="col-lg-3 d-md-block d-none">
                    <div class="card rounded-0 mb-3">
                        <div class="accordion accordion-flush" id="accordionPrice">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="price-headingOne">
                                    <button class="accordion-button collapsed shadow-none bg-orange fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#price-collapseOne" aria-expanded="false" aria-controls="price-collapseOne">Price</button>
                                </h2>
                                <div id="price-collapseOne" class="accordion-collapse collapse show" aria-labelledby="price-headingOne" data-bs-parent="#accordionPrice">
                                    <div class="accordion-body">
                                        <div class="form-group mb-2">
                                            <label class="mb-1">Min Price</label>
                                            <input type="number" name="minPrice" id="minPrice" class="form-control shadow-none" placeholder="Min Price" value="0" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1">Max Price</label>
                                            <input type="number" name="maxPrice" id="maxPrice" class="form-control shadow-none" placeholder="Max Price" value="10000000" min="10" max="10000000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card rounded-0 mb-3">
                        <div class="accordion accordion-flush" id="accordionBrand">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="brand-headingOne">
                                <button class="accordion-button collapsed shadow-none fs-4 bg-orange" type="button" data-bs-toggle="collapse" data-bs-target="#brand-collapseOne" aria-expanded="false" aria-controls="brand-collapseOne">Brands</button>
                                </h2>
                                <div id="brand-collapseOne" class="accordion-collapse collapse" aria-labelledby="brand-headingOne" data-bs-parent="#accordionBrand">
                                    <div class="accordion-body">
                                        <?php 
                                            // ! get product Brand
                                            $brand_qry = "SELECT * FROM brands";
                                            $r_brand = mysqli_query($con, $brand_qry);
                                            if(mysqli_num_rows($r_brand) > 0){
                                                while($brand = mysqli_fetch_array($r_brand)){
                                                    echo <<<brandFilter
                                                        <input class="form-check-input shadow-none me-2" type="checkbox" id="$brand[name]" value="$brand[id]" name='brands[]' style="cursor: pointer">
                                                        <label class="form-check-label" for="$brand[name]" style="cursor: pointer">$brand[name]</label><br>
                                                    brandFilter;
                                                }
                                            }else{
                                                echo '<small>No data Exist</small>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card rounded-0 mb-3">
                        <div class="accordion accordion-flush" id="accordionCategories">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="category-headingOne">
                                <button class="accordion-button collapsed shadow-none fs-4 bg-orange" type="button" data-bs-toggle="collapse" data-bs-target="#category-collapseOne" aria-expanded="false" aria-controls="category-collapseOne">Categories</button>
                                </h2>
                                <div id="category-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionCategories">
                                    <div class="accordion-body">
                                        <?php 
                                            // ! get product categories
                                            $cat_qry = "SELECT * FROM categories";
                                            $r_cat = mysqli_query($con, $cat_qry);
                                            if(mysqli_num_rows($r_cat) > 0){
                                                while($cat = mysqli_fetch_array($r_cat)){
                                                    echo <<<categoryFilter
                                                        <input class="form-check-input shadow-none me-2" type="checkbox" id="$cat[name]" value="$cat[id]" name='categories[]' style="cursor: pointer">
                                                        <label class="form-check-label" for="$cat[name]" style="cursor: pointer">$cat[name]</label><br>
                                                    categoryFilter;
                                                }
                                            }else{
                                                echo '<small>No data Exist</small>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card rounded-0">
                        <div class="accordion accordion-flush" id="accordionColor">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="color-headingOne">
                                <button class="accordion-button collapsed shadow-none fs-4 bg-orange" type="button" data-bs-toggle="collapse" data-bs-target="#color-collapseOne" aria-expanded="false" aria-controls="color-collapseOne">
                                    Colors
                                </button>
                                </h2>
                                <div id="color-collapseOne" class="accordion-collapse collapse" aria-labelledby="color-headingOne" data-bs-parent="#accordionColor">
                                    <div class="accordion-body">
                                        <?php 
                                            // ! get product colors
                                            $color_qry = "SELECT * FROM color_attributes";
                                            $r_color = mysqli_query($con, $color_qry);
                                            if(mysqli_num_rows($r_color) > 0){
                                                while($color_row = mysqli_fetch_array($r_color)){
                                                    echo <<<colorFilter
                                                        <input class="form-check-input shadow-none me-2" type="checkbox" id="$color_row[name]" value="$color_row[name]" name="color[]" style="cursor: pointer">
                                                        <label class="form-check-label badge" for="$color_row[name]" style="cursor: pointer; background: $color_row[name]">$color_row[name]</label><br>
                                                    colorFilter;
                                                }
                                            }else{
                                                echo '<small>No data Exist</small>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card rounded-0">
                        <div class="card-body">
                            <div class="row" id="product_list">
                                <?php 
                                    $new_badge = "";
                                    $hot_selling_badge = "";
                                    $recommend_badge = "";
                                    $qry = "SELECT * FROM products ORDER BY id DESC";
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
                                ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <script src="public/ajax/shop.js"></script>
    </footer>
</body>
</html>