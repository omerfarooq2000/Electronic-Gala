<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Product - Admin Panel</title>
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
                            <h4 class="m-0">Add New Product</h4>
                            <a href="products.php" class="btn bg-main-1 btn-sm shadow-none"><i class="bi bi-arrow-left me-1"></i>Go Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="ajax/products.php" method="POST" id="add_product_form" enctype="multipart/form-data">
                            <input type="hidden" name="key" value="add_product"> 
                            <div class="row">
                                <div class="col-lg-5 col-md-6 col-sm-12">
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-2">Name:</label>
                                        <input type="text" name="name" class="form-control shadow-none" id="proName" placeholder="Name" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Brand:</label>
                                        <select name="brand" class="form-select shadow-none">
                                            <option value="" selected disabled>---Select Brand---</option>
                                            <?php 
                                                $b = "SELECT * FROM brands";
                                                $b_run = mysqli_query($con, $b);
                                                while($b_row = mysqli_fetch_array($b_run)){
                                                    echo <<<brand
                                                    <option value="$b_row[id]">$b_row[name]</option>
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
                                                $c = "SELECT * FROM categories";
                                                $c_run = mysqli_query($con, $c);
                                                while($c_row = mysqli_fetch_array($c_run)){
                                                    echo <<<category
                                                    <option value="$c_row[id]">$c_row[name]</option>
                                                    category;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group my-4">
                                        <label class="fw-bold mb-1">Delivery Charges:</label>
                                        <input type="number" name="delivery_charges" class="form-control shadow-none" placeholder="Delivery Charges" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Recommend:</label>
                                        <div class="form-check form-check-inline me-3">
                                            <label class="form-check-label" for="yes">Yes</label>
                                            <input type="radio" name="hotSelling" id="yes" class="form-check-input shadow-none" value="1" required checked>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label" for="no">No</label>
                                            <input type="radio" name="hotSelling" id="no" class="form-check-input shadow-none" value="0" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="fw-bold mb-1">Image 1:</label>
                                                <input type="file" name="img" class="form-control shadow-none" id="img-one" required>
                                            </div>
                                            <div class="img-box" id="img-preview1">
                                                <small>Image Preview</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="fw-bold mb-1">Image 2:</label>
                                                <input type="file" name="img1" class="form-control shadow-none" id="img-two" required>
                                            </div>
                                            <div class="img-box" id="img-preview2">
                                                <small>Image Preview</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="form-group mb-3">
                                                <label class="fw-bold mb-1">Image 3:</label>
                                                <input type="file" name="img2" class="form-control shadow-none" id="img-three" required>
                                            </div>
                                            <div class="img-box" id="img-preview3">
                                                <small>Image Preview</small>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group mb-2">
                                        <label class="d-block fw-bold mb-2">Products Variations:</label>
                                        <div class="bg-white rounded border border-gray">
                                            <table class="table table-stripped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Color</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Add/Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_field">
                                                    <tr class="mb-2">
                                                        <td style="width: 25%">
                                                            <select name="color[]" class="form-select shadow-none">
                                                                <?php 
                                                                    $color = "SELECT * FROM color_attributes ORDER BY id DESC";
                                                                    $color_run = mysqli_query($con, $color);
                                                                    while($color_row = mysqli_fetch_array($color_run)){
                                                                        echo <<<color
                                                                        <option value="$color_row[name]" class="text-capitalize">$color_row[name]</option>
                                                                        color;
                                                                    }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="width: 25%"><input type="number" min="1" name="price[]" class="form-control shadow-none" placeholder="Price" required></td>
                                                        <td style="width: 25%"><input type="number" min="1" name="stock[]" class="form-control shadow-none" placeholder="Stock" required></td>
                                                        <td style="width: 25%"><input type="button" id="add" value="Add More" class="btn bg-9 text-white fw-bold w-100 shadow-none"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label class="fw-bold mb-1">Description:</label>
                                        <textarea name="desc" class="tinymsc"></textarea>
                                    </div>
                                    <button type="submit" class="btn bg-main-1 shadow-none float-end" id="add_product_btn">Upload Product</button>
                                </div>
                            </div>
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
            var html = '<tr class="mb-2"><td style="width: 25%"><select name="color[]" class="form-select shadow-none color_attribute_data"></select></td><td style="width: 25%"><input type="number" name="price[]" placeholder="Price" class="form-control shadow-none" required></td><td style="width: 25%"><input type="number" name="stock[]" placeholder="Stock" class="form-control shadow-none" required></td><td style="width: 25%"><input type="button" id="remove" value="Remove" class="btn bg-8 text-white fw-bold w-100 shadow-none"></td></tr>';

            var x = 1;
            
            // ! append tr to table
            $("#add").click(function(){
                $("#add_field").append(html);
                getColorAttributes();
            });

            // ! remove tr from table
            $(document).on('click', '#remove', function(){
                $(this).closest('tr').remove();
                x--;
            });

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
                // Check if a file is selected
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    // When the file is loaded, set the source of the image preview
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

            $('#proName').on('input', function () {
                var val = $(this).val();
                var newVal = val.replaceAll(' ', '-');

                $('#urlSlug').val(newVal);
            })

        });
    </script>
</body>

</html>

