<?php 
require("../admin/config/config.php");
require("../admin/config/essentials.php");

if(isset($_POST['key']) AND $_POST['key'] == 'get_variation_price'){
    $var_id = $_POST['variant_id'];
    $pro_id = $_POST['product_id'];
    $q = "SELECT * FROM product_variations WHERE id='$var_id' AND product_id='$pro_id'";
    $r = mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $color = $row['color'];
    $price = number_format($row['price'], 0);
    $stock = $row['stock'];

    $data = ['color'=> $color, 'price' => $price, 'stock' => $stock];
    $data = json_encode($data);

    echo $data;
}

if(isset($_POST['key']) AND $_POST['key'] == 'add_to_cart'){
    $pro_id = $_POST['pro_id'];
    $u_id = $_POST['u_id'];
    $var_id = $_POST['variation_id'];
    $qty = $_POST['qty'];

    $get = "SELECT * FROM cart WHERE product_id = '$pro_id' AND user_id='$u_id' AND variation_id='$var_id'";
    $run_get = mysqli_query($con, $get);
    $fetch = mysqli_fetch_array($run_get);

    if(mysqli_num_rows($run_get) == 0) {
        $insert = "INSERT INTO cart(product_id, user_id, variation_id, qty) VALUES('$pro_id', '$u_id', '$var_id', '$qty')";
        if(mysqli_query($con, $insert)){
            echo 'success';
        }else{
            echo 'error';
        }
    }else{
        $upd = "UPDATE cart SET qty = qty+$qty WHERE product_id='$pro_id' AND user_id='$u_id' AND variation_id='$var_id'";
        if(mysqli_query($con, $upd)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    
}


?>