<?php 
    session_start();
    include("../config/config.php");
    include("../config/essentials.php");
    $products_img_path = PRODUCTS_IMG_PATH;
    
    // ! load frequently bought products from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_frequently_bought_products'){
        $boughtWith = "";
        $output = "";
        $no = "";
        // ! select data from frequent bought table
        $qry = "SELECT * FROM frequent_bought GROUP BY product_id ORDER by id DESC";
        $run = mysqli_query($con, $qry);
        if (mysqli_num_rows($run) > 0) {
            while ($row = mysqli_fetch_assoc($run)) {
                // ! get parent product using frequent bought table's product id
                $qry1 = "SELECT * FROM products WHERE id = '$row[product_id]'";
                $run1 = mysqli_query($con, $qry1);
                $row1 = mysqli_fetch_array($run1);

                // ! get bought with products id using frequent bought table's bought with id
                $qry2 = "SELECT * FROM frequent_bought WHERE product_id = '$row[product_id]'";
                $run2 = mysqli_query($con, $qry2);
                while($row2 = mysqli_fetch_array($run2)){
                    // ! get products from products table using bought with id
                    $qry3 = "SELECT * FROM products WHERE id = '$row2[bought_with]'";
                    $run3 = mysqli_query($con, $qry3);
                    $row3 = mysqli_fetch_array($run3);
                    $boughtWith .= "
                        <div class='d-flex align-items-center pb-1'>
                            <img src='$products_img_path/$row3[img]' class='img-responsive me-2' width='50px' height='50px'>
                            <small class='fw-bold'>$row3[name]</small>
                        </div>
                    ";
                }
                $no++;

                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'>
                            <div class='d-flex align-items-center'>
                                <img src='$products_img_path/$row1[img]' class='img-responsive me-2' width='50px' height='50px'>
                                <small class='fw-bold'>$row1[name]</small>
                            </div>
                        </td>
                        <td class='align-middle'>$boughtWith</td>
                        <td class='align-middle'>
                            <button class='btn btn-sm bg-8 shadow-none' id='deleteProductBtn' data-delete-id='$row[product_id]'><i class='bi bi-trash'></i></button>
                        </td>
                    </tr>"
                ;
                echo $output;
            }
        } else {
            echo "<tr class='text-center'><td colspan='4'>No Data Exist</td></tr>";
        }
        
    }

    // ! insert frequently bought products in db
    if(isset($_POST['key']) && $_POST['key'] == 'add_frequently_bought_products_key'){
        global $exe;
        $val = '';
        $pro_id = $_POST['product_id'];
        $bought_with = $_POST['bought_with'];

        foreach($bought_with as $bought_with_id){
            $check = "SELECT * FROM frequent_bought WHERE product_id = '$pro_id'";
            $run = mysqli_query($con, $check);
            $insert = "INSERT INTO frequent_bought(product_id, bought_with) VALUES('$pro_id', '$bought_with_id')";
            $exe = mysqli_query($con, $insert);
        }

        if($exe){
            echo 'success';
        }else if($val == 'exist'){
            echo $val;
        }else{
            echo 'error';
        }
        
    }

    // ! delete frequently bought products in db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_frequently_bought_products'){
        $id = $_POST['id'];
        $qry = "DELETE FROM frequent_bought WHERE product_id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>