<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Brands</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
</head>

<body class="body-bg">

    <?php require("inc/header.php") ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo siteMaintenanceMode() ?>
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Brands</h4>
                            <button type="button" class="btn bg-main-1 btn-sm" data-bs-toggle="modal" data-bs-target="#add_brand"><i class="bi bi-plus-square me-1"></i>Add New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-main-1 text-light">
                                        <th width="3%">#</th>
                                        <th>Date Added</th>
                                        <th width="40%">Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="brand_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Add new brand modal -->
    <div class="modal fade" id="add_brand" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandLabel">Add Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_brand_form">
                        <input type="hidden" name="key" value="add_brand">
                        <div class="form-group mb-2">
                            <label class="mb-2">Name</label>
                            <input type="text" name="brandName" class="form-control shadow-none">
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark" id="save_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit brand modal -->
    <div class="modal fade" id="edit_brand_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandLabel">Edit Brand</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="pushBrandInModalForm"></div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/brands.js"></script>
    
</body>

</html>