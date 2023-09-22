<?php 
    require("../admin/config/config.php");
    require("../admin/config/essentials.php");


    // ! add review
    if(isset($_POST['key']) && $_POST['key'] == 'add_review_key'){
        $path = REVIEWS_IMG_PATH;
        $user_id = $_POST['user_id'];
        $order_no = $_POST['order_no'];
        $rating = $_POST['rating'];
        $feedback = $_POST['feedback'];
        
        $img1 = $_FILES['img1']['name'];
        $tmp_img1 = $_FILES['img1']['tmp_name'];
        
        $img2 = $_FILES['img2']['name'];
        $tmp_img2 = $_FILES['img2']['tmp_name'];

        $img3 = $_FILES['img3']['name'];
        $tmp_img3 = $_FILES['img3']['tmp_name'];

        $validExtensions = ['jpg', 'jpeg', 'png'];

        $ext1 = strtolower(pathinfo($img1, PATHINFO_EXTENSION)); // ! get uploaded file's extension
        $ext2 = strtolower(pathinfo($img2, PATHINFO_EXTENSION)); // ! get uploaded file's extension
        $ext3 = strtolower(pathinfo($img3, PATHINFO_EXTENSION)); // ! get uploaded file's extension

        if(!empty($img1)){
            $final_img1 = 'REVIEW_'.rand(100000000, 999999999).".$ext1"; // ! Rename Image
        }else{
            $final_img1 = NULL;
        }
        if(!empty($img2)){
            $final_img2 = 'REVIEW_'.rand(100000000, 999999999).".$ext2"; // ! Rename Image
        }else{
            $final_img2 = NULL;
        }
        if(!empty($img3)){
            $final_img3 = 'REVIEW_'.rand(100000000, 999999999).".$ext3"; // ! Rename Image
        }else{
            $final_img3 = NULL;
        }

        $path1 = UPLOAD_IMAGE_PATH.REVIEWS_FOLDER.$final_img1;
        $path2 = UPLOAD_IMAGE_PATH.REVIEWS_FOLDER.$final_img2;
        $path3 = UPLOAD_IMAGE_PATH.REVIEWS_FOLDER.$final_img3;

        // ! check user exist or not
        $select = "SELECT * FROM orders WHERE order_no='$order_no'";
        $run = mysqli_query($con, $select);
        while($row = mysqli_fetch_array($run)){
            $pro_id = $row['product_id'];

            $insert = "INSERT INTO reviews(product_id, user_id, rating, feedback, img_one, img_two, img_three) VALUES('$pro_id', '$user_id', '$rating', '$feedback', '$final_img1', '$final_img2', '$final_img3')";
            $exe = mysqli_query($con, $insert);
            move_uploaded_file($tmp_img1, $path1);
            move_uploaded_file($tmp_img2, $path2);
            move_uploaded_file($tmp_img3, $path3);
        }
        if($exe){
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>