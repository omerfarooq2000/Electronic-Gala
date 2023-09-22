<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $path = BRANDS_IMG_PATH;
    // ! get brands from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_brand'){
        $qry = "SELECT * FROM brands ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date']));
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'>$date</td>
                        <td class='text-capitalize align-middle'>$row[name]</td>
                        <td class='align-middle'>
                            <a href='#' class='btn btn-sm bg-7 text-white shadow-none fw-bold' id='editBrand' data-edit-id='$row[id]' data-bs-toggle='modal' data-bs-target='#edit_brand_modal'><i class='bi bi-pencil'></i></a>
                            <button  class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteBrand' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                        </td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='3'>No Data Exist</td></tr>";
        }
    }

    // ! add new brand in db
    if(isset($_POST['key']) && $_POST['key'] == 'add_brand'){
        $brand = strtolower($_POST['brandName']);

        $check = "SELECT * FROM brands WHERE name = '$brand'";
        $run = mysqli_query($con, $check);
        if(mysqli_num_rows($run) > 0){
            echo "exist";
            die();
        }else{
            $insert = "INSERT INTO brands(name) VALUES('$brand')";
            if(mysqli_query($con, $insert)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }

    // ! push brand in modal form
    if(isset($_POST['key']) && $_POST['key'] == 'push_brand_in_modal_form'){
        $id = $_POST['id'];
        $output = "";
        $qry = "SELECT * FROM brands WHERE id = '$id'";
        $exe = mysqli_query($con, $qry);
        if($exe) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $output .= "
                <form id='edit_brand_form'>
                    <input type='hidden' name='id' value='$row[id]'>
                    <input type='hidden' name='key' value='edit_brand'>
                    <div class='form-group mb-2'>
                        <label class='mb-2'>Name:</label>
                        <input type='text' name='brandName' id='brandName' value='$row[name]' class='form-control shadow-none' required>
                    </div>
                    <div class='form-group d-flex justify-content-end'>
                        <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-dark' id='edit_brand_btn'>Save</button>
                    </div>
                </form>";
                }
                echo $output;
        } else {
            echo "<div class='alert alert-danger'>Something went wrong</div>";
        }
    }

    // ! edit brands in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_brand'){
        $id = $_POST['id'];
        $name = strtolower($_POST['brandName']);
        $qry = "UPDATE brands SET name = '$name' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
        
    }

    // ! delete brand in db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_brand'){
        $id = $_POST['id'];

        // ! check if brand is exist in product of not
        $get = "SELECT * FROM products WHERE brand_id = '$id'";
        $run = mysqli_query($con, $get);
        
        if(mysqli_num_rows($run) > 0){
            echo 'exist';
        }else{
            $qry = "DELETE FROM brands WHERE id = '$id'";
            if(mysqli_query($con, $qry)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }
?>