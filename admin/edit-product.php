<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Edit Product</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php require("inc/header.php") ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo siteMaintenanceMode() ?>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="m-0">Edit Product</h4>
                            <a href="products.php" class="btn bg-main-1 btn-sm shadow-none"><i class="bi bi-arrow-left me-1"></i>Go Back</a>
                        </div>
                    </div>
                    <?php 
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $getProduct = "SELECT * FROM products WHERE id = '$id'";
                            $runGetProduct = mysqli_query($con, $getProduct);
                            $rowProduct = mysqli_fetch_array($runGetProduct);

                            $productId = $rowProduct['id'];
                            $productName = $rowProduct['name'];
                            $productDeliveryCharges = $rowProduct['delivery_charges'];
                            $productDesc = $rowProduct['description'];
                            $productImg = PRODUCTS_IMG_PATH.'/'.$rowProduct['img'];
                            $productImg1 = PRODUCTS_IMG_PATH.'/'.$rowProduct['img1'];
                            $productImg2 = PRODUCTS_IMG_PATH.'/'.$rowProduct['img2'];
                            $productRecommend = $rowProduct['recommended'];
                        }
                    ?>
                    <div class="card-body">
                        <form id="edit_product_form" enctype="multipart/form-data">
                            <input type="hidden" name="key" value="edit_product"> 
                            <input type="hidden" name="id" value="<?php echo $id ?>"> 
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-2">Name:</label>
                                        <input type="text" name="name" value="<?php echo $productName ?>" class="form-control shadow-none" placeholder="Name" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Brand:</label>
                                        <select name="brand" class="form-select shadow-none">
                                            <option value="" selected disabled>---Select Brand---</option>
                                            <?php 
                                                $brand = "SELECT * FROM brands";
                                                $runBrand = mysqli_query($con, $brand);
                                                while($rowBrand = mysqli_fetch_array($runBrand)){
                                                    $selected = ($rowBrand['id'] == $rowProduct['brand_id']) ? 'selected' : '';
                                                    echo <<<brand
                                                    <option value="$rowBrand[id]" $selected>$rowBrand[name]</option>
                                                    brand;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Category:</label>
                                        <select name="category" class="form-select shadow-none">
                                            <option value="" selected disabled>---Select Category---</option>
                                            <?php 
                                                $category = "SELECT * FROM categories";
                                                $runCategory = mysqli_query($con, $category);
                                                while($rowCategory = mysqli_fetch_array($runCategory)){
                                                    $selected = ($rowCategory['id'] == $rowProduct['category_id']) ? 'selected' : '';
                                                    echo <<<category
                                                    <option value="$rowCategory[id]" $selected>$rowCategory[name]</option>
                                                    category;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Delivery Charges:</label>
                                        <input type="number" name="delivery_charges" value="<?php echo $productDeliveryCharges ?>" class="form-control shadow-none" placeholder="Delivery Charges" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Recommend:</label>
                                        <div class="form-check form-check-inline me-3">
                                            <label class="form-check-label" for="yes">Yes</label>
                                            <input type="radio" name="productRecommend" id="yes" class="form-check-input shadow-none" value="1" required <?php echo ($productRecommend == '1') ? 'checked' : '' ?>>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="no">No</label>
                                            <input type="radio" name="productRecommend" id="no" class="form-check-input shadow-none" value="0" required <?php echo ($productRecommend == '0') ? 'checked' : ''; ?>>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Description:</label>
                                        <textarea name="desc" rows="3" class="tinymsc form-control" maxlength="10000"><?php echo $productDesc ?></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="fw-bold mb-1">Image 1:</label>
                                            <input type="file" name="img" value="<?php echo $productImg ?>" class="form-control shadow-none" id="img-one">
                                        </div>
                                        <div class="img-box" id="img-preview1">
                                            <img id="myImg1" src="<?php echo $productImg ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="fw-bold mb-1">Image 2:</label>
                                            <input type="file" name="img1" class="form-control shadow-none" id="img-two">
                                        </div>
                                        <div class="img-box" id="img-preview2">
                                            <img id="myImg2" src="<?php echo $productImg1 ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="form-group mb-3">
                                            <label class="fw-bold mb-1">Image 3:</label>
                                            <input type="file" name="img2" class="form-control shadow-none" id="img-three">
                                        </div>
                                        <div class="img-box" id="img-preview3">
                                            <img id="myImg3" src="<?php echo $productImg2 ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark shadow-none float-end" id="edit_product_btn">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("inc/footer.php") ?>
    <script src="public/ajax/products.js"></script>
    <script>
        $(document).ready(function(){
            // ! image preview one
            $('#img-one').on('change', function(){
                var input = this;
                var checkImg = $('#myImg1');
                // Check if a file is selected
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    // When the file is loaded, set the source of the image preview
                    reader.onload = function(e) {
                        if(checkImg.length > 0){
                            var find = $('#img-preview1').find(checkImg);
                            var small = $('#img-preview1').find('small');
                            find.remove();
                            small.remove();
                            var img = $("<img id='myImg1' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview1");
                        }else{
                            var small = $('#img-preview1').find('small');
                            small.remove();
                            var img = $("<img id='myImg1' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview1");
                        }
                        
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // ! image preview two
            $('#img-two').on('change', function(){
                var input = this;
                var checkImg = $('#myImg2');
                // Check if a file is selected
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    // When the file is loaded, set the source of the image preview
                    reader.onload = function(e) {
                        if(checkImg.length > 0){
                            var find = $('#img-preview2').find(checkImg);
                            var small = $('#img-preview2').find('small');
                            find.remove();
                            small.remove();
                            var img = $("<img id='myImg2' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview2");
                        }else{
                            var small = $('#img-preview2').find('small');
                            small.remove();
                            var img = $("<img id='myImg2' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview2");
                        }
                        
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(input.files[0]);
                }
            });

            // ! image preview three
            $('#img-three').on('change', function(){
                var input = this;
                var checkImg = $('#myImg3');
                // ! Check if a file is selected
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    // ! When the file is loaded, set the source of the image preview
                    reader.onload = function(e) {
                        if(checkImg.length > 0){
                            var find = $('#img-preview3').find(checkImg);
                            var small = $('#img-preview3').find('small');
                            find.remove();
                            small.remove();
                            var img = $("<img id='myImg3' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview3");
                        }else{
                            var small = $('#img-preview3').find('small');
                            small.remove();
                            var img = $("<img id='myImg3' >");
                            img.attr('src', e.target.result);
                            img.appendTo("#img-preview3");
                        }
                        
                    };

                    // Read the file as a data URL
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>
</body>

</html>

