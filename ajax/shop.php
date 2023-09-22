<?php 
    include("../admin/config/config.php");
    include("../admin/config/essentials.php");
    if(isset($_POST['key']) && $_POST['key'] == 'filter_products'){
        $new_badge = "";
        $hot_selling_badge = "";
        $recommend_badge = "";
        // ! get min max price
        
        // ! Get the selected category, brand, color and price values
        $minPrice = isset($_POST['minPrice']) ? $_POST['minPrice'] : '';
        $maxPrice = isset($_POST['maxPrice']) ? $_POST['maxPrice'] : '';
        $categories = isset($_POST['categories']) ? $_POST['categories'] : '';
        $brands = isset($_POST['brands']) ? $_POST['brands'] : '';
        $color = isset($_POST['color']) ? $_POST['color'] : '';

        // ! Build the query to get filtered products
        $query = "SELECT products.id, products.date, products.name, products.img, products.sales, products.recommended FROM products INNER JOIN  product_variations ON product_variations.product_id=products.id WHERE 1=1";
        if(!empty($categories)){
            $query .= " AND products.category_id IN (".$categories.")";
        }
        if(!empty($brands)){
            $query .= " AND products.brand_id IN (".$brands.")";
        }
        if(!empty($color)){
            $query .= " AND product_variations.color IN (".$color.")";
        }
        if(!empty($minPrice)){
            $query .= " AND product_variations.price BETWEEN $minPrice AND $maxPrice";
        }
        $query .= " GROUP BY product_variations.product_id ORDER BY products.id DESC";

        // ! Execute the query
        $result = mysqli_query($con, $query);

        // ! Build the HTML for the product list
        $output = '';
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                // ! get variations of product
                $q1 = "SELECT * FROM product_variations WHERE product_id='$row[id]'";
                $r1 = mysqli_query($con, $q1);
                
                $variation_data = "";
                while($row1 = mysqli_fetch_assoc($r1)){
                    $price = number_format($row1['price'], 1);
                    if($row1['stock'] > 0){
                        $variation_data .="
                        <div class='variation_box me-2 my-2' style='--i: $row1[color];'></div>
                        ";
                    }else{
                        $variation_data .="
                        <div class='out_of_stock me-2 my-2' style='--i: $row1[color];'></div>
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
                $output .= "
                <div class='col-lg-3 col-md-4 col-sm-6 my-3'>
                    <div class='card border-0 bg-light mb-3 rounded-0 py-3' style='max-width: 350px; margin: auto; position: relative;'>
                        <div class='badge-tags'  style='position: absolute; top: 10px; left: 0px; z-index: 999'>
                        $new_badge
                        $hot_selling_badge
                        $recommend_badge
                        </div>
                        <a href='product_details.php?id=$row[id]' class='text-decoration-none text-dark'>
                            <div class='card-header rounded border-0' style='height: 250px; overflow: hidden'>
                                <img src='$path/$row[img]' class='img-fluid' style='height: 100%; width: 100%; object-fit: contain;'>
                            </div>
                            <div class='card-body text-center' style='white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>
                                $variation_data
                                <br>
                                <small class='mb-3'>$row[name]</small>
                            </div>
                        </a> 
                    </div>
                </div>";
            }
        }else{
            $output .= "<div class='alert bg-orange rounded-0 text-center'>No Product Exist</div>";
        }
        // ! Return the product list HTML
        echo $output;
    }
?>