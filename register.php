<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>Register - <?php echo $site_title .' - ' . $site_tagline; ?></title>
    <?php 
        if(isset($_SESSION['login'])){
            header("Location: index.php");
        }
    ?>
</head>
<body>

    <?php include('inc/header.php') ?>

    <!-- Register-->
    <div class="row mt-5">
        <div class="col-lg-6 col-md-7 col-sm-8 mx-auto">
            <form id="register_form">
                <div class="card rounded-0">
                    <div class="card-header bg-orange rounded-0">
                        <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration</h5>
                        <span class="badge rounded-pill bg-transparent text-white text-wrap mb-2 lh-base">
                            Note: Field with <span class="text-black">*</span> sign are required
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Name</label>
                                    <input name="name" type="text" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Email</label>
                                    <input name="email" type="email" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Picture</label>
                                    <input name="profile" type="file" accept=".jpg, jpeg, .png, .webp" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Password</label>
                                    <input name="pass" type="password" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Confirm Password</label>
                                    <input name="c_pass" type="password" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Phone</label>
                                    <input name="phone" type="number" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Province</label>
                                    <input name="province" type="text" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>City</label>
                                    <input name="city" type="text" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Postal Code</label>
                                    <input name="postal_code" type="number" class="form-control shadow-none rounded-0" required>
                                </div>
                                <div class="col-12 mb-3">
                                    <label class="form-label"><span class="text-danger">*</span>Address</label>
                                    <textarea name="address" rows="3" class="form-control shadow-none rounded-0"></textarea>
                                </div>
                            </div>
                            <button class="btn bg-orange shadow-none rounded-0 float-end" id="register_btn">SIGN UP</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <!-- Ajax -->
        <script src="public/ajax/register.js"></script>
    </footer>
</body>
</html>