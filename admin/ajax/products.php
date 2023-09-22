<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $viewProductImagePath = PRODUCTS_IMG_PATH;
    // ! get products from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_products'){
        $qry = "SELECT * FROM products ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $inventory = "";
        $stock = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date']));
                $path = PRODUCTS_IMG_PATH;

                // ! get categories of product
                $q1 = "SELECT * FROM categories WHERE id='$row[category_id]'";
                $r1 = mysqli_query($con, $q1);
                $row1 = mysqli_fetch_array($r1);
                
                // ! get brands of products
                $q2 = "SELECT * FROM brands WHERE id='$row[brand_id]'";
                $r2 = mysqli_query($con, $q2);
                $row2 = mysqli_fetch_array($r2);

                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$path/$row[img]' class='rounded' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='width: 100%'  class='align-middle'>
                                <a href='javascript:void(0)' class='text-decoration-none text-black fw-bold' data-view-id='$row[id]' id='viewProductBtn'  title='View' data-bs-toggle='modal' data-bs-target='#view_product_modal'>$row[name]</a><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>
                        <small class='fw-bold'>$row1[name]<br>$row2[name]</small>
                    </td>
                    <td class='align-middle'>
                        <a href='edit-product.php?id=$row[id]' class='btn btn-sm bg-7 text-white shadow-none fw-bold' title='Edit'><i class='bi bi-pencil'></i></a>
                        <button  class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteProductBtn' data-delete-id='$row[id]' title='Delete'><i class='bi bi-trash'></i></button>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='4'>No Data Exist</td></tr>";
        }
    }

    // ! get colors from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_colors'){
        $output = "";
        $qry = "SELECT * FROM color_attributes ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $output .= "<option value='$row[name]'>$row[name]</option>";
            }
            echo $output;
        } else {
            echo "<option>No Data Exist</option>";
        }
    }

    // ! inserting products into database 
    if(isset($_POST['key']) && $_POST['key'] == 'add_product'){
        
        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        
        $name = $_POST['name'];
        $category_id = $_POST['category'];
        $brand_id = $_POST['brand'];
        $delivery_charges = $_POST['delivery_charges'];
        $desc = addslashes($_POST['desc']);
        $hotSelling = $_POST['hotSelling'];

        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        $img = $_FILES['img']['name'];
        $tmp_img = $_FILES['img']['tmp_name'];

        $img1 = $_FILES['img1']['name'];
        $tmp_img1 = $_FILES['img1']['tmp_name'];

        $img2 = $_FILES['img2']['name'];
        $tmp_img2 = $_FILES['img2']['tmp_name'];

        $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); // ! get uploaded file's extension
        $ext1 = strtolower(pathinfo($img1, PATHINFO_EXTENSION)); // ! get uploaded file's extension
        $ext2 = strtolower(pathinfo($img2, PATHINFO_EXTENSION)); // ! get uploaded file's extension

        $final_img = 'PRODUCT_'.rand(100000000, 999999999).".$ext"; // ! Rename Image
        $final_img1 = 'PRODUCT_'.rand(100000000, 999999999).".$ext1"; // ! Rename Image
        $final_img2 = 'PRODUCT_'.rand(100000000, 999999999).".$ext2"; // ! Rename Image

        $path = UPLOAD_IMAGE_PATH.PRODUCTS_FOLDER.$final_img;
        $path1 = UPLOAD_IMAGE_PATH.PRODUCTS_FOLDER.$final_img1;
        $path2 = UPLOAD_IMAGE_PATH.PRODUCTS_FOLDER.$final_img2;
        
        if (in_array($ext, $valid_extensions) || in_array($ext1, $valid_extensions) || in_array($ext2, $valid_extensions)) {
            // ! Insert data into data
            $insert = "INSERT INTO products(category_id, brand_id, name, description, delivery_charges, img, img1, img2, recommended) VALUES('$category_id', '$brand_id', '$name', '$desc', '$delivery_charges', '$final_img', '$final_img1', '$final_img2', '$hotSelling')";
            // ! Execute Query
            if (mysqli_query($con, $insert)) {
                $inserted_product_id = mysqli_insert_id($con);
                foreach($color as $key => $color_name) {
                    $insert1 = "INSERT INTO product_variations(product_id, color, price, stock) VALUES('$inserted_product_id', '$color_name', '$price[$key]', '$stock[$key]')";
                    mysqli_query($con, $insert1);
                }
                move_uploaded_file($tmp_img, $path);
                move_uploaded_file($tmp_img1, $path1);
                move_uploaded_file($tmp_img2, $path2);
                echo 'success';
                exit;
            } else {
                echo 'error';
            }
        } else {
            echo 'invalid_img';
        }
    }

    // ! edit products into database 
    if(isset($_POST['key']) && $_POST['key'] == 'edit_product'){
        $id = $_POST['id'];

        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        
        $name = $_POST['name'];
        $category_id = $_POST['category'];
        $brand_id = $_POST['brand'];
        $delivery_charges = $_POST['delivery_charges'];
        $desc = addslashes($_POST['desc']);
        $productRecommend = $_POST['productRecommend'];

        $img = $_FILES['img']['name'];
        $tmp_img = $_FILES['img']['tmp_name'];
        
        $img1 = $_FILES['img1']['name'];
        $tmp_img1 = $_FILES['img1']['tmp_name'];
        
        $img2 = $_FILES['img2']['name'];
        $tmp_img2 = $_FILES['img2']['tmp_name'];
        
        $img_array = array($img, $img1, $img2);
        $tmp_img_array = array($tmp_img, $tmp_img1, $tmp_img2);

        $updateImages = "";
        $status = 0;
        $moveFile = '';
        
        for($i = 0; $i < 3; $i ++){
            if(!empty($img_array[$i])){
                $ext = strtolower(pathinfo($img_array[$i], PATHINFO_EXTENSION)); // ! get uploaded file's extension
                if(in_array($ext, $valid_extensions)){
                    $tmp_img = $tmp_img_array[$i]; // ! get uploaded file's extension

                    $final_img = 'PRODUCT_'.rand(100000000, 999999999).".$ext"; // ! Rename Image
    
                    $path = UPLOAD_IMAGE_PATH.PRODUCTS_FOLDER.$final_img;
                    
                    $moveFile .= move_uploaded_file($tmp_img, $path);
    
                    // ! the image variable has a value, add it to the UPDATE query
                    $imageNum = (string)$i; // !cast index as string
                    if($imageNum == "0"){
                        // !first image does not have a number
                        $imageNum = "";
                    }
                    $updateImages .= "img" . $imageNum . "='" . $final_img . "',";
                }else{
                    $status = 2;
                }
            }

        }

        $UpdateSql = "UPDATE products SET category_id='$category_id', brand_id='$brand_id', name='$name', description='$desc', delivery_charges='$delivery_charges', ".$updateImages." recommended='$productRecommend' WHERE id='$id'";

        if(mysqli_query($con, $UpdateSql)){
            $moveFile;
            echo 'success';
            die();
        }else if($status == 2){
            echo 'invalid_img';
            die();
        }else{
            echo 'error';
            die();
        }
        
    }

    // ! view specific product in modal from db
    if(isset($_POST['key']) && $_POST['key'] == 'view_product'){
        $id = $_POST['id'];
        $qry = "SELECT * FROM products WHERE id = '$id'";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $inventory = "";
        $recommended = "";
        $variation_data = "";
        if (mysqli_num_rows($exe) > 0) {
            $row = mysqli_fetch_assoc($exe);
            $date = date("F j, Y, g:i a", strtotime($row['date']));
            $path = PRODUCTS_IMG_PATH;
            
            if($row['sales'] > 100){
                $inventory = "
                <span class='badge bg-danger'>Hot Selling</span>
                <span class='badge bg-danger'><i class='bi bi-fire'></i> 100 Items Sold</span>
                ";
            }else{
                $inventory = "";
            }
            if($row['recommended'] == '1'){
                $recommended = "<div class='badge bg-info'>Recommended</div>";
            }else{
                $recommended = "";
            }

            // ! get brands of product
            $brd = "SELECT * FROM brands WHERE id='$row[brand_id]'";
            $run_brd = mysqli_query($con, $brd);
            $row_brd = mysqli_fetch_assoc($run_brd);

            // ! get categories of product
            $cat = "SELECT * FROM categories WHERE id='$row[category_id]'";
            $run_cat = mysqli_query($con, $cat);
            $row_cat = mysqli_fetch_assoc($run_cat);

            // ! get variations of product
            $q1 = "SELECT * FROM product_variations WHERE product_id='$row[id]'";
            $r1 = mysqli_query($con, $q1);
            
            while($row1 = mysqli_fetch_assoc($r1)){
                $price = number_format($row1['price'], 1);
                $row_stock = $row1['stock'];
                if($row_stock > 0){
                    $variation_data .="
                    <span class='d-flex mb-2 border border-gray me-2' style='border-left: 5px solid $row1[color] !important; width: 200px' title='$row1[color]'>
                        <div class='ms-1'>
                            <small class='text-success fw-bold'>Stock ●: $row_stock Items left</small><br>
                            <small class='me-2'>Price: <span class='fw-bold'>$$row1[price]</span></small>
                            <small>Color: <span class='fw-bold'>$row1[color]</span></small>
                        </div>
                    </span>
                    ";
                }else{
                    $variation_data .="
                    <span class='d-flex mb-2 border border-gray me-2' style='border-left: 5px solid $row1[color] !important; width: 190px' title='$row1[color]'>
                    <div class='ms-1'>
                        <small class='text-success fw-bold'>Stock ●: $row_stock Items left</small><br>
                        <small class='me-2'>Price: <span class='fw-bold'>$$row1[price]</span></small>
                        <small>Color: <span class='fw-bold'>$row1[color]</span></small>
                    </div>
                </span>
                    ";
                    
                }
            }
            
            // ! count average rating of product
            $get_rating = "SELECT ROUND(AVG(rating),1) as average FROM reviews WHERE product_id='$row[id]'";
            $run_get_rating = mysqli_query($con, $get_rating);
            $getAverage = mysqli_fetch_array($run_get_rating);
            $averageRating = $getAverage['average'] ? $getAverage['average'] : 0;

            $fullStars = floor($averageRating);
            $halfStar = ($averageRating - $fullStars) >= 0.5;
            $ratingStars = str_repeat('<i class="bi bi-star-fill text-warning"></i>', $fullStars); // Full stars
            if ($halfStar) {
                $ratingStars .='<i class="bi bi-star-half text-warning"></i>'; // Half star
            }
            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
            $ratingStars .= str_repeat('<i class="bi bi-star text-warning"></i>', $emptyStars); // Empty stars

            // ! count total rating of product
            $total_rating = "SELECT * FROM reviews WHERE product_id = '$row[id]'";
            $run_total_rating = mysqli_query($con, $total_rating);
            $count_total_rating = mysqli_num_rows($run_total_rating);

            $output .= "
            <div class='row'>
                <div class='col-lg-5 col-md-6 col-sm-12'>
                    <div class='row'>
                        <div class='col-4 col-lg-6 col-md-6 col-sm-6 mb-2'>
                            <img src='$viewProductImagePath/$row[img]' class='img-responsive w-100'>
                        </div>
                        <div class='col-4 col-lg-6 col-md-6 col-sm-6 mb-2'>
                            <img src='$viewProductImagePath/$row[img1]' class='img-responsive w-100'>
                        </div>
                        <div class='col-4 col-lg-6 col-md-6 col-sm-6 mb-2'>
                            <img src='$viewProductImagePath/$row[img2]' class='img-responsive w-100'>
                        </div>
                    </div>
                </div>
                <div class='col-lg-7 col-md-6 col-sm-12'>
                    <div>$inventory $recommended</div>

                    <h2 class='mb-1 mt-2'>$row[name]</h2>

                    <div class='rating mb-3'>
                        $ratingStars $averageRating/5 ($count_total_rating Customer Reviews)
                    </div>
                    <p class='fw-bold p-0 mb-2'>Color Variations:</p>
                    <div class='d-flex flex-wrap mb-3'>
                        $variation_data
                    </div>

                    <div class='mb-3'>
                        <div class='badge bg-success me-1'>Brand:</div><small>$row_brd[name]</small><br>
                        <div class='badge bg-success me-1'>Category:</div><small>$row_cat[name]</small><br>
                        <div class='badge bg-success me-1'>Delivery Charges:</div><small>$$row[delivery_charges]</small>
                    </div>

                    <div class='mb-3'>
                        <div class='card'>
                            <div class='card-header'>
                                <h5>Product Description</h5>
                            </div>
                            <div class='card-body product_desc'>$row[description]</div>
                        </div>
                    </div>
                </div>
            </div>
            ";
            echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='3'>No Data Exist</td></tr>";
        }
    }

    // ! delete product from db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_product'){
        $id = $_POST['id'];
        $is_deleted = 0;

        mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 0");

        // ! get brand image to delete
        $img = "SELECT * FROM products WHERE id = '$id'";
        $run_img = mysqli_query($con, $img);
        $row_img = mysqli_fetch_array($run_img);
        
        $del_product = "DELETE FROM products WHERE id = '$id'";
        mysqli_query($con, $del_product) ? $is_deleted = '1' : $is_deleted = '0';
        if($is_deleted == '1'){
            // ! check review exist or not
            $get_review = "SELECT * FROM reviews WHERE product_id = '$id'";
            $run_get_review = mysqli_query($con, $get_review);
            if(mysqli_num_rows($run_get_review) > 0){
                $del_review = "DELETE FROM reviews WHERE product_id = '$id'";
                mysqli_query($con, $del_review) ? $is_deleted = '1' : $is_deleted = '0';
            }
        }
        if($is_deleted == '1'){
            // ! check cart exist or not
            $get_cart = "SELECT * FROM cart WHERE product_id = '$id'";
            $run_get_cart = mysqli_query($con, $get_cart);
            if(mysqli_num_rows($run_get_cart) > 0){
                $del_cart = "DELETE FROM cart WHERE product_id = '$id'";
                mysqli_query($con, $del_cart) ? $is_deleted = '1' : $is_deleted = '0';
            }
        }
        if($is_deleted == '1'){
            $get_frequent_bought = "SELECT * FROM frequent_bought WHERE product_id = '$id'";
            $run_get_frequent_bought = mysqli_query($con, $get_frequent_bought);
            if(mysqli_num_rows($run_get_frequent_bought) > 0){
                $del_frequent_bought = "DELETE FROM frequent_bought WHERE product_id = '$id'";
                mysqli_query($con, $del_frequent_bought) ? $is_deleted = '1' : $is_deleted = '0';
            }
        }
        if($is_deleted == '1'){
            $del_product_variations = "DELETE FROM product_variations WHERE product_id = '$id'";
            mysqli_query($con, $del_product_variations) ? $is_deleted = '1' : $is_deleted = '0';
        }
        if($is_deleted == '1'){
            $get_orders = "SELECT * FROM orders WHERE product_id = '$id'";
            $run_get_orders = mysqli_query($con, $get_orders);
            if(mysqli_num_rows($run_get_orders) > 0){
                $del_get_orders = "DELETE FROM orders WHERE product_id = '$id'";
                mysqli_query($con, $del_get_orders) ? $is_deleted = '1' : $is_deleted = '0';
            }
        }
        if($is_deleted == '1'){
            $delImg = [
                PRODUCTS_IMG_ABSOLUTE_PATH.$row_img['img'],
                PRODUCTS_IMG_ABSOLUTE_PATH.$row_img['img1'],
                PRODUCTS_IMG_ABSOLUTE_PATH.$row_img['img2'],
            ];
    
            foreach($delImg as $deleteProductImages){
                if(file_exists($deleteProductImages)){
                    unlink($deleteProductImages);
                }
            }
            mysqli_query($con, "SET FOREIGN_KEY_CHECKS = 1");
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>