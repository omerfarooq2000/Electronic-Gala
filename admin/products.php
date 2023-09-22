<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products - Admin Panel</title>
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
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Products</h4>
                            <a href="add-product.php" class="btn bg-main-1 btn-sm shadow-none"><i class="bi bi-plus-square me-1"></i>Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border table-sm" id="products_table">
                                <thead class="sticky-top">
                                    <tr class="bg-main-1 text-light">
                                        <th width="3%">#</th>
                                        <th width="50%">Product</th>
                                        <th>Category/Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="product_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- view product modal -->
    <div class="modal fade" id="view_product_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewProductLabel">View Product Details</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewProductDetails"></div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/products.js"></script>
    <script>
        $(document).ready(function(){
            var html = '<tr class="mb-2"><td style="width: 25%"><input type="color" name="color[]" class="form-control form-control-color w-100 shadow-none" required></td><td style="width: 25%"><input type="number" name="price[]" class="form-control shadow-none" required></td><td style="width: 25%"><input type="number" name="stock[]" class="form-control shadow-none" required></td><td style="width: 25%"><input type="button" id="remove" value="Remove" class="btn btn-danger text-white fw-bold w-100 shadow-none"></td></tr>';

            var max = 5;
            var x = 1;
            
            $("#add").click(function(){
                if(x <= max){
                    $("#add_field").append(html);
                    x++;
                }
            });
            $(document).on('click', '#remove', function(){
                $(this).closest('tr').remove();
                x--;
            });

        });
    </script>
</body>

</html>