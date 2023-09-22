<?php 
    include("../config/config.php");
    include("../config/essentials.php");

    // ! load and show color attributes from db
    if(isset($_POST['key']) && $_POST['key'] == 'load_color_attributes'){
        $qry = "SELECT * FROM color_attributes ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y, g:i a", strtotime($row['date_added']));
                $output .= "
                <tr>
                    <td class='bg-main-1 align-middle'>$no</td>
                    <td class='align-middle'>$date</td>
                    <td class='text-capitalize align-middle'>
                        <div class='d-inline-block rounded-circle me-2' style='height: 10px; width: 10px; background-color: $row[name]'></div>$row[name]
                    </td>
                    <td class='align-middle'>
                        <button class='btn btn-sm bg-7 text-white shadow-none fw-bold' title='Edit' id='edit_color_attribute' data-edit-id='$row[id]'data-bs-toggle='modal' data-bs-target='#edit_color_attribute_modal'><i class='bi bi-pencil'></i></button>
                        <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteColorAttribute' title='Delete' data-delete-name='$row[name]'><i class='bi bi-trash'></i></button>
                    </td>
                </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! add color attributes in db
    if(isset($_POST['key']) && $_POST['key'] == 'add_color_attributes'){
        $name = strtolower($_POST['color']);
        $get = "SELECT * FROM color_attributes WHERE name = '$name'";
        $run = mysqli_query($con, $get);
        if(mysqli_num_rows($run) > 0){
            echo 'exist';
        }else{
            $qry = "INSERT INTO color_attributes(name) VALUES('$name')";
            if(mysqli_query($con, $qry)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }

    // ! push color in modal form
    if(isset($_POST['key']) && $_POST['key'] == 'push_color_in_modal_form'){
        $id = $_POST['id'];
        $output = "";
        $qry = "SELECT * FROM color_attributes WHERE id = '$id'";
        $exe = mysqli_query($con, $qry);
        if ($exe) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $output .= "
                <form id='edit_color_attribute_form'>
                    <div class='form-group mb-3'>
                        <label class='mb-2'>Name:</label>
                        <input type='text' name='editColor' id='colorName' value='$row[name]' class='form-control shadow-none' required>
                        <div id='colorBar' style='height: 5px; width: 90px; margin-top: 10px;'></div>
                        <input type='hidden' name='id' value='$row[id]'>
                        <input type='hidden' name='key' value='edit_color_attributes'>
                    </div>
                    <div class='form-group d-flex justify-content-end'>
                        <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                        <button type='submit' class='btn btn-dark' id='edit_color_attribute_btn'>Save</button>
                    </div>
                </form>";
                }
                echo $output;
        } else {
            echo "<div class='alert alert-danger'>Something went wrong</div>";
        }
    }

    // ! edit color attributes in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_color_attributes'){
        $id = $_POST['id'];
        $name = strtolower($_POST['editColor']);
        $qry = "UPDATE color_attributes SET name = '$name' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! delete color attributes in db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_color_attributes'){
        $name = $_POST['name'];
        $get = "SELECT * FROM product_variations WHERE color = '$name'";
        $run = mysqli_query($con, $get);
        if(mysqli_num_rows($run) > 0){
            echo 'exist';
        }else{
            $qry = "DELETE FROM color_attributes WHERE name = '$name'";
            if(mysqli_query($con, $qry)){
                echo 'success';
            }else{
                echo 'error';
            }
        }
    }
?>
