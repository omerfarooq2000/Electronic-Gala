<?php 
    session_start();
    include("../config/config.php");
    include("../config/essentials.php");
    $product_img_path = PRODUCTS_IMG_PATH;
    $review_img_path = REVIEWS_IMG_PATH;
    
    // ! load all reviews from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_all_reviews'){
        $qry = "SELECT * FROM reviews";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $status = "";
        $actionBtn = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y", strtotime($row['date']));
                $time = date("g:i a", strtotime($row['date']));
                if($row['status'] == '0'){
                    $status = '<span class="fw-bold status pending">&#9679; Pending</span>';
                    $actionBtn = "
                    <button class='btn btn-sm btn-info text-white shadow-none fw-bold' id='approve' title='Approve' data-approve-id='$row[id]'><i class='bi bi-hand-thumbs-up'></i></button>
                    <button class='btn btn-sm btn-warning text-white shadow-none fw-bold' id='disapprove' title='Disapprove' data-disapprove-id='$row[id]'><i class='bi bi-hand-thumbs-down'></i></button>
                    ";
                }
                if($row['status'] == '1'){
                    $status = '<span class="fw-bold status approved">&#9679; Approved</span>';
                    $actionBtn = "-----";
                }
                if($row['status'] == '2'){
                    $status = '<span class="fw-bold status disapproved">&#9679; Disapproved</span>';
                    $actionBtn = "-----";
                }
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'><small>$date <br> $time</small></td>
                        <td class='align-middle'>
                            <small>
                                <a href='javascript:void(0)' class='text-decoration-none fw-bold text-dark' data-review-id='$row[id]' id='view_review' data-bs-toggle='modal' data-bs-target='.view_review' style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$row[feedback]</a>
                            </small>
                        </td>
                        <td class='align-middle'>$status</td>
                        <td class='align-middle'>$actionBtn</td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! load pending reviews from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_pending_reviews'){
        $qry = "SELECT * FROM reviews WHERE status ='0'";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y", strtotime($row['date']));
                $time = date("g:i a", strtotime($row['date']));
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'><small>$date <br> $time</small></td>
                        <td class='align-middle'>
                            <small>
                                <a href='javascript:void(0)' class='text-decoration-none fw-bold text-dark' data-review-id='$row[id]' id='view_review' data-bs-toggle='modal' data-bs-target='.view_review' style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$row[feedback]</a>
                            </small>
                        </td>
                        <td class='align-middle'><span class='fw-bold status pending'>&#9679; Pending</span></td>
                        <td class='align-middle'>
                            <button class='btn btn-sm btn-info text-white shadow-none fw-bold' id='approve' title='Approve' data-approve-id='$row[id]'><i class='bi bi-hand-thumbs-up'></i></button>
                            <button class='btn btn-sm btn-warning text-white shadow-none fw-bold' id='disapprove' title='Disapprove' data-disapprove-id='$row[id]'><i class='bi bi-hand-thumbs-down'></i></button>
                        </td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! load approved reviews from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_approved_reviews'){
        $qry = "SELECT * FROM reviews WHERE status ='1'";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $status = "";
        $actionBtn = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y", strtotime($row['date']));
                $time = date("g:i a", strtotime($row['date']));
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'><small>$date <br> $time</small></td>
                        <td class='align-middle'>
                            <small>
                                <a href='javascript:void(0)' class='text-decoration-none fw-bold text-dark' data-review-id='$row[id]' id='view_review' data-bs-toggle='modal' data-bs-target='.view_review' style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$row[feedback]</a>
                            </small>
                        </td>
                        <td class='align-middle'><span class='fw-bold status approved'>&#9679; Approved</span></td>
                        <td class='align-middle'>---</td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! load disapproved reviews from db
    if(isset($_POST['key']) && $_POST['key'] == 'get_disapproved_reviews'){
        $qry = "SELECT * FROM reviews WHERE status ='2'";
        $exe = mysqli_query($con, $qry);
        $output = "";
        $no = 0;
        if (mysqli_num_rows($exe) > 0) {
            while ($row = mysqli_fetch_assoc($exe)) {
                $no++;
                $date = date("F j, Y", strtotime($row['date']));
                $time = date("g:i a", strtotime($row['date']));
                $output .= "
                    <tr>
                        <td class='bg-main-1 align-middle'>$no</td>
                        <td class='align-middle'><small>$date <br> $time</small></td>
                        <td class='align-middle'>
                            <small>
                                <a href='javascript:void(0)' class='text-decoration-none fw-bold text-dark' data-review-id='$row[id]' id='view_review' data-bs-toggle='modal' data-bs-target='.view_review' style='width: 100%; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;'>$row[feedback]</a>
                            </small>
                        </td>
                        <td class='align-middle'><span class='fw-bold status disapproved'>&#9679; Disapproved</span></td>
                        <td class='align-middle'>---</td>
                    </tr>";
                }
                echo $output;
        } else {
            echo "<tr class='text-center'><td colspan='5'>No Data Exist</td></tr>";
        }
    }

    // ! approve review in db
    if(isset($_POST['key']) && $_POST['key'] == 'approve_review'){
        $id = $_POST['id'];
        $qry = "UPDATE reviews SET status = '1' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! disapprove review in db
    if(isset($_POST['key']) && $_POST['key'] == 'disapprove_review'){
        $id = $_POST['id'];
        $qry = "UPDATE reviews SET status = '2' WHERE id = '$id'";
        if(mysqli_query($con, $qry)){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    // ! view review in modal form
    if(isset($_POST['key']) && $_POST['key'] == 'view_review'){
        $id = $_POST['id'];
        $output = "";
        $rating = "";
        $img1 = "";
        $img2 = "";
        $img3 = "";
        $qry = "SELECT * FROM reviews WHERE id = '$id'";
        $exe = mysqli_query($con, $qry);
        if($exe) {
            $row = mysqli_fetch_assoc($exe);

            if($row['img_one'] != "") {
                $img1 = "
                <div class='col-4'>
                    <img src='$review_img_path/$row[img_one]' class='img-responsive w-100'>
                </div>
                ";
            }
            if($row['img_two'] != "") {
                $img2 = "
                <div class='col-4'>
                    <img src='$review_img_path/$row[img_two]' class='img-responsive w-100'>
                </div>
                ";
            }
            if($row['img_three'] != "") {
                $img3 = "
                <div class='col-4'>
                    <img src='$review_img_path/$row[img_three]' class='img-responsive w-100'>
                </div>
                ";
            }

            if($row['rating'] == '1') {
                $rating = "
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                ";
            }
            if($row['rating'] == '2') {
                $rating = "
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                ";
            }
            if($row['rating'] == '3') {
                $rating = "
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                ";
            }
            if($row['rating'] == '4') {
                $rating = "
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star text-warning'></i>
                ";
            }
            if($row['rating'] == '5') {
                $rating = "
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                    <i class='bi bi-star-fill text-warning'></i>
                ";
            }

            $product = "SELECT * FROM products WHERE id = $row[product_id]";
            $run = mysqli_query($con, $product);
            $row_product = mysqli_fetch_array($run);

            $output .= "
            <div class='row'>
                <div class='col-lg-6 col-md-6 col-sm-12'>
                    <h2 class='mb-2'>$row_product[name]</h2>
                    <div class='row'>
                        <div class='col-4'>
                            <img src='$product_img_path/$row_product[img]' class='img-responsive w-100'>
                        </div>
                        <div class='col-4'>
                            <img src='$product_img_path/$row_product[img1]' class='img-responsive w-100'>
                        </div>
                        <div class='col-4'>
                            <img src='$product_img_path/$row_product[img2]' class='img-responsive w-100'>
                        </div>
                    </div>
                </div>
                <div class='col-lg-6 col-md-6 col-sm-12'>
                    <h2>Feedback</h2>
                    <div class='my-2'>
                        $rating
                    </div>
                    <p>$row[feedback]</p>
                    <div class='row'>
                        $img1
                        $img2
                        $img3
                    </div>
                </div>
            </div>";
            echo $output;
        } else {
            echo "<div class='alert alert-danger'>Something went wrong</div>";
        }
    }
?>