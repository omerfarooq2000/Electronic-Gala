<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Admins</title>
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
                            <h4>Admins</h4>
                            <button type="button" class="btn bg-main-1 btn-sm shadow-none" data-bs-toggle="modal" data-bs-target="#add_admin"><i class="bi bi-plus-square me-1"></i>Add New</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-main-1 text-light">
                                        <th width="3%">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="admin_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Add new admin modal -->
    <div class="modal fade" id="add_admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">Add Admin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_admin_form">
                        <input type="hidden" name="add_admin_key">
                        <div class="form-group mb-3">
                            <label class="mb-2">Name:</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Email:</label>
                            <input type="text" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Password:</label>
                            <input type="text" name="pass" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Image:</label>
                            <input type="file" name="profile" class="form-control shadow-none" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Status:</label>
                            <select name="active" class="form-select shadow-none">
                                <option value="0" selected>Pending</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/admins.js"></script>
</body>

</html>