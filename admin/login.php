<?php
    session_start(); 
    if(isset($_SESSION['admin_login']) && $_SESSION['admin_login'] == true){
        header("Location: products.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel - Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="public/img/favicon/fav.png" type="image/x-icon">
    <!-- Bootstrap v5.2.1 -->
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/main.css">
    <!-- Bootstrap icons v1.9.1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <!-- Login  -->
    <div class="row my-5">
        <div class="col-lg-4 col-md-6 col-sm-9 mx-auto">
            <form id="login_form" class="w-100">
                <div class="card">
                    <div class="card-header">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>Admin Login</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" value="admin@gmail.com" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="pass" value="123" class="form-control shadow-none" required>
                        </div>
                        <div class="d-flex justify-content-end mb-2">
                            <button type="submit" class="btn btn-dark shadow-none" id="login_btn">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="public/js/jquery.min.js"></script>
    <script src="public/ajax/login.js"></script>
</body>
</html>