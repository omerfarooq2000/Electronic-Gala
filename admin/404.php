<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>404 Not Found</title>
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
                <div class="page-not-found text-center">
                    <h1 class="text-orange fw-bold">Oops!<i class="bi bi-emoji-frown ms-2"></i></h1>
                    <h3 class="fw-bold text-uppercase">404, page not found</h3>
                    <h3 class="text-capitalize">the page you are looking for doesn't exist.</h3>
                    <a href="index.php" class="btn btn-dark shadow-none rounded-0 mt-3">Return To Dashboard</a>
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