<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
    <title>My Account | <?php echo $site_title .' - ' . $site_tagline; ?></title>
    <?php 
        if(!isset($_SESSION['login'])){
            header("Location: index.php");
        }

        $profile_img_path = USERS_IMG_PATH;
    ?>
</head>
<body>
    <!-- header area -->
    <header>
        <?php include('inc/header.php') ?>
    </header>

    <!-- main content area -->
    <main class="container-fluid px-4">
        <h3 class="my-4 text-center d-none d-md-block">My Account</h3>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 my-3 my-md-0">
                <div class="card rounded-0">
                    <div class="card-body">
                        <nav class="navbar navbar-expand-md navbar-light bg-light">
                            <div class="container-fluid p-0">
                                <h3 class="d-md-none d-block">My Account</h3>
                                
                                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#myAccountToggler">
                                <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse nav-pills" id="myAccountToggler">
                                    <ul class="navbar-nav flex-column w-100">
                                        <li class="nav-item text-center">
                                            <img src="<?php echo $profile_img_path.'/'.$profile_img ?>" class="img-fluid mb-3" style="width: 150px">
                                        </li>
                                        <li class="nav-item">
                                            <h5 class="text-dark text-capitalize text-center"><?php echo $u_name ?></h5>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn <?php if($_GET['page'] == 'profile'){ echo 'bg-orange'; }else{ echo 'btn-outline-dark'; } ?> w-100 mb-1 rounded-0 text-start" href="account.php?page=profile"><i class="bi bi-person me-2 fw-bold"></i>Profile</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn <?php if($_GET['page'] == 'orders'){ echo 'bg-orange'; }else{ echo 'btn-outline-dark'; } ?> w-100 mb-1 rounded-0 text-start" href="account.php?page=orders"><i class="bi bi-list-ol me-2"></i>My Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn <?php if($_GET['page'] == 'reviews'){ echo 'bg-orange'; }else{ echo 'btn-outline-dark'; } ?> w-100 mb-1 rounded-0 text-start" href="account.php?page=reviews"><i class="bi bi-star-half me-2 fw-bold"></i>My Reviews</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="btn btn-outline-dark w-100 mb-1 rounded-0 text-start" href="logout.php"><i class="bi bi-box-arrow-right me-2 fw-bold"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <?php 
                    if(isset($_GET['page']) AND !empty($_GET['page'])){
                        if($_GET['page'] == 'profile'){
                            include("account/profile.php");
                        }
                        if($_GET['page'] == 'orders'){
                            include("account/orders.php");
                        }
                        if($_GET['page'] == 'reviews'){
                            include("account/reviews.php");
                        }
                        if($_GET['page'] == 'messages'){
                            include("account/messages.php");
                        }
                    }else{
                        echo '<script>window.open("index.php", "_self")</script>';
                    }
                ?>
            </div>
        </div>
    </main>

    <!-- edit account box modal -->
    <div class="modal fade" id="editAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAccountLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAccountLabel">Change Password</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_account_form">
                    <input type="hidden" name="update_password_key">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['uId'] ?>">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class="mb-2">Old Password</label>
                            <input type="password" name="old_pass" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">New Password</label>
                            <input type="password" name="new_pass" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Confirm Password</label>
                            <input type="password" name="confirm_pass" class="form-control shadow-none rounded-0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-sm rounded-0 btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm rounded-0 bg-orange" id="edit_account_btn"><i class="bi bi-arrow-clockwise me-2"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- edit address box modal -->
    <div class="modal fade" id="editAddress" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editAddressLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAddressLabel">Change Password</h5>
                    <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_address_form">
                    <input type="hidden" name="key" value="update_address_key">
                    <input type="hidden" name="user_id" value="<?php echo $u_id ?>">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label class="mb-2">Phone</label>
                            <input type="text" name="ph" value="<?php echo $phone ?>" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Province</label>
                            <input type="text" name="province" value="<?php echo $province ?>" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">City</label>
                            <input type="text" name="city" value="<?php echo $city ?>" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Postal Code</label>
                            <input type="text" name="postal_code" value="<?php echo $postal_code ?>" class="form-control shadow-none rounded-0" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="mb-2">Address</label>
                            <input type="text" name="address" value="<?php echo $address ?>" class="form-control shadow-none rounded-0" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm rounded-0 bg-orange" id="edit_address_btn"><i class="bi bi-arrow-clockwise me-2"></i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- footer area -->
    <footer>
        <?php include('inc/footer.php') ?>
        <!-- Ajax -->
        <script src="public/ajax/account.js"></script>
    </footer>
</body>
</html>

