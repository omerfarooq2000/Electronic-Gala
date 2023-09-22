<?php 
    session_start();
    include("../config/config.php");
    include("../config/essentials.php");
    $del_admin_img_absolute_path = ADMINS_IMG_ABSOLUTE_PATH;
    // ! insert admin in db
    if(isset($_POST['add_admin_key'])){
        // ! valid extensions
        $valid_extensions = array('jpeg', 'jpg', 'png'); 

        // ! get the input fields data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $active = $_POST['active'];

        // ! get the image file
        $profile = $_FILES['profile']['name'];
        $tmp_profile = $_FILES['profile']['tmp_name'];

        // ! get uploaded file's extension
        $ext = strtolower(pathinfo($profile, PATHINFO_EXTENSION));

        // ! Rename Image
        $final_img = 'IMG_'.rand(1000, 9999999).".$ext"; 

        // ! set uploading path for image 
        $admin_path = UPLOAD_IMAGE_PATH.ADMINS_FOLDER.$final_img; 

        $checkAdmin = "SELECT * FROM admins WHERE email = '$email'";
        $runAdmin = mysqli_query($con, $checkAdmin);
        $count = mysqli_num_rows($runAdmin);
        // ! check if admin with the entered email is exist or not
        if ($count > 0) {
            echo 'email_exist';
        } else { // ! if admin don't exist then this block of code with run
            if (in_array($ext, $valid_extensions)) { // ! checking the image is valid or not

                // ! Insert data into data
                $insert = "INSERT INTO admins(name, email, password, img, status) VALUES('$name', '$email', '$pass', '$final_img', '$active')";
                if(mysqli_query($con, $insert) && move_uploaded_file($tmp_profile, $admin_path)){
                    echo 'success';
                } else {
                    echo 'error';
                }
            } else {
                echo 'invalid_img';
            }
        }
    }
    
    // ! load admins from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_admins'){
        $admin_img_path = ADMINS_IMG_PATH;
        $qry = "SELECT * FROM admins WHERE id != '$_SESSION[aId]' ORDER BY id DESC";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $status = "";
        $actionBtn = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                if($row['status'] == '0'){
                    $status = '<span class="fw-bold status pending">&#9679; Pending</span>';
                    $actionBtn = "
                    <button class='btn btn-sm bg-9 text-white shadow-none fw-bold' id='approveAdmin' title='Approve' data-approve-id='$row[id]'><i class='bi bi-hand-thumbs-up'></i></button>
                    <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteAdmin' title='Delete' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                    ";
                }
                if($row['status'] == '1'){
                    $status = '<span class="fw-bold status active">&#9679; Active</span>';
                    $actionBtn = "
                    <button class='btn btn-sm bg-8 text-white shadow-none fw-bold' id='deleteAdmin' title='Delete' data-delete-id='$row[id]'><i class='bi bi-trash'></i></button>
                    ";
                }
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'>
                            <img src='$admin_img_path/$row[img]' class='img-responsive rounded-circle border border-dark me-3' width='50px' height='50px'>
                        </td>
                        <td class='text-capitalize align-middle'>$row[name]</td>
                        <td class='align-middle'>$row[email]</td>
                        <td class='align-middle'>$status</td>
                        <td class='align-middle'>
                            $actionBtn
                        </td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='3'>No Data Exist</td></tr>";
        }
    }

    // ! approve admin in db
    if(isset($_POST['key']) && $_POST['key'] == 'approve_admin'){
        $id = $_POST['id'];
        $qry = "UPDATE admins SET status = '1' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! delete admin from db
    if(isset($_POST['key']) && $_POST['key'] == 'delete_admin'){
        $id = $_POST['id'];
        $select = "SELECT * FROM admins WHERE id = '$id'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);
        $qry = "DELETE FROM admins WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            unlink($del_admin_img_absolute_path.'/'.$row['img']);
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>