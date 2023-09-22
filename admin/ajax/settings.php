<?php 
    include("../config/config.php");
    include("../config/essentials.php");
    $carousal_image_path = CAROUSAL_IMG_PATH;
    $carousal_image_absolute_path = CAROUSAL_IMG_ABSOLUTE_PATH;
    /*
    -------------------------------------------------------
    * get data from db and show in settings page section
    -------------------------------------------------------
    */
    // ! get general settings from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_general_settings'){
        $qry = "SELECT * FROM settings";
        $exe = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($exe);
        $output = "";
        $output .= "
            <div class='mb-2'>
                <h6 class='card-subtitle fw-bold mb-1'>Site Title:</h6>
                <p class='text-muted text-capitalize'>$row[site_title]</p>
            </div>
            <div class='mb-2'>
                <h6 class='card-subtitle fw-bold mb-1'>Site Tagline:</h6>
                <p class='text-muted text-capitalize'>$row[site_tagline]</p>
            </div>
            <div class='mb-2'>
                <h6 class='card-subtitle fw-bold mb-1'>Site About:</h6>
                <p class='text-muted text-capitalize'>$row[site_about]</p>
            </div>";
        echo $output;
    }

    // ! get carousal images from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_carousal_images'){
        $qry = "SELECT * FROM carousal";
        $exe = mysqli_query($con, $qry);
        $output = "";
        if(mysqli_num_rows($exe) > 0){
            while( $row = mysqli_fetch_array($exe)){
                $output .= "
                <div class='m-1' style='width: 250px; position: relative'>
                    <button class='btn btn-sm btn-danger shadow-none' id='deleteCarousalImage' data-delete-id='$row[id]' style='position: absolute; top: 10px; right: 10px; font-size: 10px'>DELETE</button>
                    <img src='$carousal_image_path/$row[image]' class='img-thumbnail w-100'>
                </div>
                ";
            }
        }else{
            $output .= "
            <div class='mb-2'>
                No Image Exist
            </div>
            ";
        }
        echo $output;
    }

    // ! get contact details from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_contact_details'){
        $qry = "SELECT * FROM contact_details";
        $exe = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($exe);
        $output = "";
        $output .= "
        <div class='row'>
            <div class='col-lg-6'>
                <div class='mb-4'>
                    <h6 class='card-subtitle mb-1 fw-bold'>Address</h6>
                    <p class='card-text'>$row[address]</p>
                </div> 
                <div class='mb-4'>
                    <h6 class='card-subtitle mb-1 fw-bold'>Phone Number</h6>
                    <p class='card-text mb-1'>
                        <i class='bi bi-telephone-fill me-1'></i>
                        <span>$row[ph]</span>
                    </p>
                </div>
                <div class='mb-4'>
                    <h6 class='card-subtitle mb-1 fw-bold'>Email</h6>
                    <p class='card-text'>$row[email]</p>
                </div>
            </div>

            <div class='col-lg-6'>
                <div class='mb-4'>
                    <h6 class='card-subtitle mb-1 fw-bold'>Social Links</h6>
                    <p class='card-text mb-1'>
                        <i class='bi bi-facebook text-primary me-1'></i>
                        <span>$row[fb]</span>
                    </p>
                    <p class='card-text mb-1'>
                        <i class='bi bi-instagram text-danger me-1'></i>
                        <span>$row[insta]</span>
                    </p>
                    <p class='card-text mb-1'>
                        <i class='bi bi-twitter text-info me-1'></i>
                        <span>$row[tw]</span>
                    </p>
                </div>

                <div class='mb-4'>
                    <h6 class='card-subtitle mb-1 fw-bold'>iFrame</h6>
                    <iframe src='$row[iframe]' loading='lazy' class='border p-2 w-100'></iframe>
                </div>
            </div>
        </div>
        ";
        echo $output;
    }

    // ! get about us from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_about_us'){
        $qry = "SELECT * FROM settings";
        $exe = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($exe);
        $output = "";
        $output .= "<p class='m-0 p-0'>$row[about_us]</p>";
        echo $output;
    }

    // ! get terms and conditions from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_terms_conditions'){
        $qry = "SELECT * FROM settings";
        $exe = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($exe);
        $output = "";
        $output .= "<p class='m-0 p-0'>$row[terms_condition]</p>";
        echo $output;
    }

    /*
    -------------------------------------------------------
    * click on edit button to push data in modal section
    -------------------------------------------------------
    */
    // ! push data to modal 
    if(isset($_POST['key'])){
        // ! push general data to modal
        if($_POST['key'] == 'general'){
            $qry = "SELECT * FROM settings";
            $exe = mysqli_query($con, $qry);
            $row = mysqli_fetch_array($exe);
            $output = "";
            $output .= "
            <form id='edit_general_settings_form'>
                <input type='hidden' name='key' value='edit_general_setting'>
                <input type='hidden' name='id' value='$row[id]'>
                <div class='form-group mb-3'>
                    <label class='mb-2'>Site Title:</label>
                    <input type='text' name='site_title' value='$row[site_title]' class='form-control shadow-none' maxlength='55' required>
                </div>
                <div class='form-group mb-3'>
                    <label class='mb-2'>Site Tagline:</label>
                    <input type='text' name='site_tagline' value='$row[site_tagline]' class='form-control shadow-none' maxlength='55' required>
                </div>
                <div class='form-group mb-3'>
                    <label class='mb-2'>Site About:</label>
                    <input type='text' name='site_about' value='$row[site_about]' class='form-control shadow-none' maxlength='55' required>
                </div>
                <div class='form-group d-flex justify-content-end'>
                    <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-dark' id='edit_general_settings_btn'>Save</button>
                </div>
            </form>";
            echo $output;
        }
        // ! push general data to modal
        if($_POST['key'] == 'contact'){
            $qry = "SELECT * FROM contact_details";
            $exe = mysqli_query($con, $qry);
            $row = mysqli_fetch_array($exe);
            $output = "";
            $output .= "
            <form id='edit_contact_details_form'>
                <input type='hidden' name='key' value='edit_contact_details'>
                <input type='hidden' name='id' value='$row[id]'>
                <div class='mb-3'>
                    <label class='mb-1'>Address</label>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-geo-alt-fill'></i></span>
                        <input type='text' name='address' value='$row[address]' class='form-control shadow-none' required>
                    </div>
                </div>
                <div class='mb-3'>
                    <label class='mb-1'>Phone Number</label>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-telephone-fill'></i></span>
                        <input type='number' name='ph' value='$row[ph]' class='form-control shadow-none' required>
                    </div>
                </div>
                <div class='mb-3'>
                    <label class='mb-1'>Email</label>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-envelope-fill'></i></span>
                        <input type='text' name='email' value='$row[email]' class='form-control shadow-none' required>
                    </div>
                    
                </div>
                <div class='mb-3'>
                    <label class='mb-1'>Social Links</label>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-facebook'></i></span>
                        <input type='text' name='fb' value='$row[fb]' class='form-control shadow-none' placeholder='Facebook' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-instagram'></i></span>
                        <input type='text' name='insta' value='$row[insta]' class='form-control shadow-none' placeholder='Instagram' required>
                    </div>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-twitter'></i></span>
                        <input type='text' name='tw' value='$row[tw]' class='form-control shadow-none' placeholder='Twitter' required>
                    </div>
                </div>
                <div class='mb-3'>
                    <label class='mb-1'>Google Map Iframe SRC</label>
                    <div class='input-group mb-3'>
                        <span class='input-group-text'><i class='bi bi-map-fill'></i></span>
                        <input type='text' name='iframe' value='$row[iframe]' class='form-control shadow-none' required>
                    </div>
                </div>
                <div class='form-group d-flex justify-content-end'>
                    <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-dark' id='edit_general_settings_btn'>Save</button>
                </div>
            </form>";
            echo $output;
        }
        // ! push about us data to modal
        if($_POST['key'] == 'about'){
            $qry = "SELECT * FROM settings";
            $exe = mysqli_query($con, $qry);
            $row = mysqli_fetch_array($exe);
            $output = "";
            $output .= "
            <form id='edit_about_us_form'>
                <input type='hidden' name='key' value='edit_about_us'>
                <input type='hidden' name='id' value='$row[id]'>
                <div class='form-group mb-3'>
                    <textarea name='about_us' class='form-control shadow-none' maxlength='1500' required>$row[about_us]</textarea>
                </div>
                <div class='form-group d-flex justify-content-end'>
                    <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-dark' id='edit_general_settings_btn'>Save</button>
                </div>
            </form>";
            echo $output;
        }
        // ! push terms and conditions data to modal
        if($_POST['key'] == 'terms'){
            $qry = "SELECT * FROM settings";
            $exe = mysqli_query($con, $qry);
            $row = mysqli_fetch_array($exe);
            $output = "";
            $output .= "
            <form id='edit_terms_conditions_form'>
                <input type='hidden' name='key' value='edit_terms_conditions'>
                <input type='hidden' name='id' value='$row[id]'>
                <div class='form-group mb-3'>
                    <textarea name='terms_condition' class='form-control shadow-none' maxlength='1500' required>$row[terms_condition]</textarea>
                </div>
                <div class='form-group d-flex justify-content-end'>
                    <button type='reset' class='btn btn-outline-dark me-2' data-bs-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-dark' id='edit_general_settings_btn'>Save</button>
                </div>
            </form>";
            echo $output;
        }
    }

    /*
    -------------------------------------------------------
    * edit data section
    -------------------------------------------------------
    */
    // ! edit general settings in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_general_setting'){
        $id = $_POST['id'];
        $site_title = trim($_POST['site_title']);
        $site_tagline = trim($_POST['site_tagline']);
        $site_about = trim($_POST['site_about']);

        $qry = "UPDATE settings SET site_title = '$site_title', site_tagline = '$site_tagline', site_about = '$site_about' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }

    // ! edit contact details in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_contact_details'){
        $id = $_POST['id'];
        $address = trim($_POST['address']);
        $ph = trim($_POST['ph']);
        $email = trim($_POST['email']);
        $fb = trim($_POST['fb']);
        $insta = trim($_POST['insta']);
        $tw = trim($_POST['tw']);
        $iframe = trim($_POST['iframe']);

        $qry = "UPDATE contact_details SET address = '$address', ph = '$ph', email = '$email', fb = '$fb', insta = '$insta', tw = '$tw', iframe = '$iframe' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }

    // ! edit about us in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_about_us'){
        $id = $_POST['id'];
        $about_us = $_POST['about_us'];

        $qry = "UPDATE settings SET about_us = '$about_us' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }

    // ! edit terms and conditions in db
    if(isset($_POST['key']) && $_POST['key'] == 'edit_terms_conditions'){
        $id = $_POST['id'];
        $terms_condition = $_POST['terms_condition'];

        $qry = "UPDATE settings SET terms_condition = '$terms_condition' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }

    // ! update maintenance mode in db
    if(isset($_POST['key']) && $_POST['key'] == 'change_maintenance_mode_status'){
        $id = $_POST['id'];
        $val = $_POST['val'];

        if($val == 1){
            $qry = "UPDATE settings SET site_maintenance = '0' WHERE id = '$id'";
        }
        if($val == 0){
            $qry = "UPDATE settings SET site_maintenance = '1' WHERE id = '$id'";
        }
        
        if(mysqli_query($con, $qry)){
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }

    /*
    -------------------------------------------------------
    * CRUD(Create, Read, Update, Delete) operation section
    -------------------------------------------------------
    */
    // ! add carousal image in db
    if(isset($_FILES['images'])){
        $status = 0;
        foreach($_FILES['images']['name'] as $key => $image){
            $img = $_FILES['images']['name'][$key];
            $tmp_img = $_FILES['images']['tmp_name'][$key];
            
            $valid_extensions = array('jpeg', 'jpg', 'png');
            
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION)); // ! get uploaded file's extension
            $final_img = 'CAROUSAL_'.rand(100000000, 999999999).".$ext"; // ! Rename Image
            $path = UPLOAD_IMAGE_PATH.CAROUSAL_FOLDER.$final_img;

            if(in_array($ext, $valid_extensions)){
                $insert = "INSERT INTO carousal(image) VALUES('$final_img')";
                if(mysqli_query($con, $insert)){
                    move_uploaded_file($tmp_img, $path);
                    $status = 1;
                }else{
                    $status = 0;
                }
            }else{
                $status = 2;
            }
        }
        if($status == 1){
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
    
    // ! remove carousal image
    if(isset($_POST['key']) && $_POST['key'] == 'delete_carousal_image'){
        $id = $_POST['id'];

        $select = "SELECT * FROM carousal WHERE id = '$id'";
        $run = mysqli_query($con, $select);
        $row = mysqli_fetch_array($run);

        $qry = "DELETE FROM carousal WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            unlink($carousal_image_absolute_path.'/'.$row['image']);
            echo 'success';
            die();
        }else{
            echo 'error';
            die();
        }
    }
?>

<!-- for textarea  -->
<script src="vendor/tinymce/tinymce.min.js"></script>
<script>
$(document).ready(function() {
    // ! Tinymce
    tinymce.init({
        selector: 'textarea',
        toolbar: 'numlist bullist',
        lists_indent_on_tab: false,
        height: 150,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
    });
});
</script>