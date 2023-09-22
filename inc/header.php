<div id="loader" class="flex-column">
    <div class="spinner-grow text-dark mb-3" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
    <h5>Loading...</h5>
</div>
<!-- top bar -->
<div class="bg-orange px-lg-3 py-2 d-flex justify-content-center justify-content-md-between">
    <div class="d-none d-sm-block">
        <small class="text-white fw-bold border-end border-2 border-white pe-2">
            <i class="bi bi-geo-alt-fill me-1"></i><?php echo $c_address ?>
        </small>
        <small class="ps-2">
            <i class="bi bi-envelope me-1"></i><?php echo $c_email ?>
        </small>
    </div>
    <div class="d-none d-sm-block">
        <a href="<?php echo $c_fb ?>" class="me-2 text-white text-decoration-none" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="<?php echo $c_insta ?>" class="me-2 text-white text-decoration-none" target="_blank"><i class="bi bi-instagram"></i></a>
        <a href="<?php echo $c_tw ?>" class="text-white text-decoration-none" target="_blank"><i class="bi bi-twitter"></i></a>
    </div>
    <div>
        <small class="border-end border-2 border-white pe-2">
            <a href="terms-conditions.php" class="text-white fw-bold text-decoration-none">Terms & Conditions</a>
        </small>
        <small class="ps-2">
            <a href="tracking.php" class="text-white fw-bold text-decoration-none">Track Order</a>
        </small>
    </div>
</div>
<!-- Navbar -->
<nav id="nav-bar" class="navbar navbar-expand-lg bg-white  shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">
            <img src="public/img/logo/logo.png" height="40px" class="img-responsive w-100">
        </a>
        <div class="d-flex justify-content-end">
            <a href="cart.php" class="text-decoration-none text-dark me-3 d-md-none d-block cart-icon-parent">
                <i class="bi bi-cart fw-bold fs-3 text-orange cart-icon"></i>
                <?php 
                    if(isset($_SESSION['login']) AND $_SESSION['login'] == true){
                    echo <<<cart_count
                        <span class="text-white fw-bold rounded-circle bg-orange d-flex justify-content-center align-items-center cart-num">$count</span>
                    cart_count;
                    }
                ?>
            </a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us.php">Contact Us</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <?php 
                    if(isset($_SESSION['login']) AND $_SESSION['login'] == true){
                        $path = USERS_IMG_PATH;
                        echo <<<data
                        <a href="cart.php" class="text-decoration-none text-dark me-3 d-md-block d-none cart-icon-parent">
                            <i class="bi bi-cart fw-bold fs-3 text-orange cart-icon"></i>
                            <span class="text-white fw-bold rounded-circle bg-orange d-flex justify-content-center align-items-center cart-num">$count</span>
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn bg-orange shadow-none dropdown-toggle rounded-0 text-capitalize" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                <img src="$path/$_SESSION[uPic]" class="rounded-circle" style="width: 25px; height: 25px" class="me-1" />
                                $_SESSION[uName]
                            </button>
                            <ul class="dropdown-menu dropdown-menu-lg-end rounded-0">
                                <li><a class="dropdown-item" href="account.php?page=profile">My Account</a></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        data;
                    }else{
                        echo <<<data
                        <a href="login.php" class="btn btn-outline-orange shadow-none me-1 rounded-0">Login</a>
                        <a href="register.php" class="btn bg-orange shadow-none rounded-0">Sign Up</a>
                        data;
                    }
                ?>
                
            </div>
        </div>
    </div>
</nav>





