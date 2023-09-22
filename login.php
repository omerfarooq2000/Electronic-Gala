<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Login - <?php echo $site_title .' - ' . $site_tagline; ?></title>
    <?php 
        if(isset($_SESSION['login'])){
            header("Location: index.php");
        }
    ?>
</head>
<body>
    <?php include('inc/header.php') ?>

    <!-- Login  -->
    <div class="row my-5">
        <div class="col-lg-4 col-md-6 col-sm-9 mx-auto">
            <form id="login_form">
                <div class="card rounded-0">
                    <div class="card-header bg-orange rounded-0">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>User Login</h5>
                    </div>
                    <div class="card-body">
                        
                            <div class="mb-3">
                                <label class="form-label mb-2"><span class="text-danger">*</span>Email:</label>
                                <input type="text" name="email" class="form-control shadow-none rounded-0 w-100" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label mb-2"><span class="text-danger">*</span>Password:</label>
                                <input type="password" name="pass" class="form-control shadow-none rounded-0" required>
                            </div>
                            <button type="submit" class="btn bg-orange shadow-none float-end rounded-0" id="login_btn">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <!-- Ajax -->
        <script src="public/ajax/login.js"></script>
    </footer>

</body>
</html>