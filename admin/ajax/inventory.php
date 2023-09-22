<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $viewProductImagePath = PRODUCTS_IMG_PATH;
    // ! get inventory products from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_inventory'){
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
                $sales = 0;
                if($row['sales'] >= 100){
                    $inventory = "<span class='badge bg-danger'><i class='bi bi-fire me-1'></i>Hot Selling</span><br>";
                    $sales = "<span class='text-success fw-bold'><i class='bi bi-arrow-up me-1'></i>$row[sales]</span>";
                }
                if($row['sales'] < 100 && $row['sales'] > 50){
                    $inventory = "<span class='badge bg-15'><i class='bi bi-arrow-down-up me-1'></i>In Demand</span><br>";
                    $sales = "<span class='text-warning fw-bold'><i class='bi bi-arrow-down-up me-1'></i>$row[sales]</span>";
                }
                if($row['sales'] < 50 && $row['sales'] > 25){
                    $sales = "<span class='text-info fw-bold'>$row[sales]</span>";
                }
                if($row['sales'] < 25){
                    $inventory = "<span class='badge bg-3'><i class='bi bi-arrow-down me-1'></i>Low Selling</span><br>";
                    $sales = "<span class='text-danger fw-bold'><i class='bi bi-arrow-down me-1'></i>$row[sales]</span>";
                }

                // ! get variations of product
                $q1 = "SELECT * FROM product_variations WHERE product_id='$row[id]'";
                $r1 = mysqli_query($con, $q1);
                
                $variation_data = "";
                $total_stock = 0;

                $out_of_stock_class = "";
                while($row1 = mysqli_fetch_assoc($r1)){
                    
                    $price = number_format($row1['price'], 1);
                    $total_stock += $row1['stock'];
                    
                    if($row1['stock'] > 0){
                        $variation_data .="
                            <div class='variation_box me-1 mb-1' style='--i: $row1[color];' title='$row1[color]'></div>
                        ";
                        
                    }else{
                        $variation_data .="
                            <div class='out_of_stock me-1 mb-1' style='--i: $row1[color];' title='Out Of Stock'></div>
                        ";
                        $out_of_stock_class = "out-of-stock-alert";
                    }
                }
                if($total_stock > 0){
                    if($total_stock > 50){
                        $stock = "<span class='badge bg-success'><i class='bi bi-emoji-smile-fill me-1'></i>In Stock</span>";
                    }
                    if($total_stock < 50){
                        $stock = "<span class='badge bg-17'><i class='bi bi-exclamation-circle-fill me-1'></i>Min Stock</span>";
                    }
                    if($total_stock < 10){
                        $stock = "<span class='badge bg-9'><i class='bi bi-emoji-frown-fill me-1'></i>Low Stock</span>";
                    }
                }else{
                    $stock = "<span class='badge bg-danger'><i class='bi bi-x-lg me-1'></i>Out of stock</span>";
                }
                
                $output .= "
                <tr class='$out_of_stock_class'>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='text-start align-middle'>
                        <div class='d-flex align-items-center'>
                            <div class='me-3' style='width: 80px; height: 80px;'>
                                <img src='$path/$row[img]' class='rounded' style='width: 100%; height: 100%; object-fit: contain'>
                            </div>
                            <div style='white-space: nowrap; width: 300px; overflow: hidden; text-overflow: ellipsis;'>
                                <small class='text-black fw-bold'>$row[name]</small><br>
                                <small>$date</small>
                            </div>
                        </div>
                    </td>
                    <td class='align-middle'>$variation_data</td>
                    <td class='align-middle'>$inventory $stock</td>
                    <td class='text-center align-middle'>$total_stock Item(s)</td>
                    <td class='align-middle'>$sales</td>
                    <td class='align-middle'>
                        <a href='edit-inventory.php?id=$row[id]' class='btn btn-sm btn-warning text-white shadow-none fw-bold' title='Edit'><i class='bi bi-pencil'></i></a>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='7'>No Data Exist</td></tr>";
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

    // ! update product variations
    if(isset($_POST['key']) && $_POST['key'] == 'update_variation_key'){

        $variation_id = $_POST['variation_id'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        foreach($variation_id as $key => $var_id) {
            $upd = "UPDATE product_variations SET color = '$color[$key]', price = '$price[$key]', stock = '$stock[$key]' WHERE id = '$var_id'";
            $run_upd = mysqli_query($con, $upd);
        }
        if($run_upd){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! insert variations
    if(isset($_POST['key']) && $_POST['key'] == 'add_variation_key'){
        $color = $_POST['color'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $product_id = $_POST['product_id'];
        
        foreach($color as $key => $colors) {
            $insert = "INSERT INTO product_variations(product_id, color, price, stock) VALUES('$product_id', '$colors', '$price[$key]', '$stock[$key]')";
            $run_insert = mysqli_query($con, $insert);
        }
        if($run_insert){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! delete product variation from db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_variation'){
        $id = $_POST['id'];
        $proId = $_POST['proId'];
        
        $select = "SELECT * FROM product_variations WHERE product_id = '$proId'";
        $run = mysqli_query($con, $select);
        if(mysqli_num_rows($run) == 1){
            echo 'not_allowed';
        }else{   
            $del_variation = "DELETE FROM product_variations WHERE id = '$id'";
            if(mysqli_query($con, $del_variation)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }
?>