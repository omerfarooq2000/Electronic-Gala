<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>frequently Bought - Admin Panel</title>
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
                            <h4 class="m-0">Frequently Bought Products</h4>
                            <button type="button" class="btn bg-main-1 btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#frequently_bought_modal"><i class="bi bi-plus-square me-1"></i>Add New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-main-1 text-light">
                                        <th width="3%">#</th>
                                        <th width="40%">Product</th>
                                        <th width="40%">Bought With</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="frequently_bought_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add frequently bought products modal -->
    <div class="modal fade" id="frequently_bought_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">Add Frequently Bought Products</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_frequently_bought_products_form">
                        <input type="hidden" name="key" value="add_frequently_bought_products_key">
                        <div class="form-group mb-3">
                            <label class="mb-2">Product:</label>
                            <select name="product_id" class="form-select shadow-none" required>
                                <option value="" selected disabled>---Select Product---</option>
                                <?php 
                                    $product = "SELECT * FROM products";
                                    $run = mysqli_query($con, $product);
                                    if(mysqli_num_rows($run) > 0){
                                        while($row = mysqli_fetch_array($run)){
                                            echo <<<product
                                            <option value='$row[id]'>$row[name]</option>
                                            product;
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Bought With:</label>
                            <select name="bought_with[]" class="form-select shadow-none" required>
                                <option value="" selected disabled>---Select Product---</option>
                                <?php 
                                    $product = "SELECT * FROM products";
                                    $run = mysqli_query($con, $product);
                                    if(mysqli_num_rows($run) > 0){
                                        while($row = mysqli_fetch_array($run)){
                                            echo <<<product
                                            <option value='$row[id]'>$row[name]</option>
                                            product;
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <select name="bought_with[]" class="form-select shadow-none">
                                <option value="" selected disabled>---Select Product---</option>
                                <?php 
                                    $product = "SELECT * FROM products";
                                    $run = mysqli_query($con, $product);
                                    if(mysqli_num_rows($run) > 0){
                                        while($row = mysqli_fetch_array($run)){
                                            echo <<<product
                                            <option value='$row[id]'>$row[name]</option>
                                            product;
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <select name="bought_with[]" class="form-select shadow-none">
                                <option value="" selected disabled>---Select Product---</option>
                                <?php 
                                    $product = "SELECT * FROM products";
                                    $run = mysqli_query($con, $product);
                                    if(mysqli_num_rows($run) > 0){
                                        while($row = mysqli_fetch_array($run)){
                                            echo <<<product
                                            <option value='$row[id]'>$row[name]</option>
                                            product;
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark" id="addFrequentlyBoughtProductsBtn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("inc/footer.php") ?>
    <script src="public/ajax/frequently_bought_products.js"></script>
</body>

</html>

