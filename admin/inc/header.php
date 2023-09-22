<?php 
    include('inc/counter.php');
    include('functions/functions.php');
?>
<div class="container-fluid bg-main text-light p-3 d-flex align-items-center justify-content-between sticky-top border-bottom-dashed">
    <h3 class="mb-0 h-font">Electronic Gala</h3>
    <!-- <a href="logout.php" class="btn btn-light btn-sm shadow-none">Logout</a> -->
    <div class="btn-group dropdownButton" >
        <button type="button" class="btn setting-btn text-white dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
            <?php
                $imgPath = ADMINS_IMG_PATH;
                echo "<img src='$imgPath/$_SESSION[aPic]' class='rounded-circle' width='30px' height='30px' style='object-fit: cover;'>";
            ?>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right text-warning fw-bold me-2"></i>Logout</a></li>
        </ul>
    </div>
</div>

<div class="col-lg-2 bg-main border-top border-3 border-secondary" id="dashboard-menu">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid flex-lg-column align-items-stretch px-0">
            <h4 class="mt-2 text-light text-center">ADMIN PANEL</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#adminNavBar" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminNavBar">
                <ul class="nav nav-pills flex-column px-2">
                    <!-- Dashboard btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="index.php"><i class="bi bi-bar-chart fw-bold me-2"></i>Dashboard</a>
                    </li>
                    <!-- Manage products btn -->
                    <li class="nav-item">
                        <button class="btn text-white w-100 btn-outline-none shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#productManagement">
                            <span><i class="bi bi-basket2-fill fw-bold me-2"></i>Product<span class="badge bg-warning ms-2"><?php echo $review_new_tag ?></span></span>
                            <span><i class="bi bi-caret-down-fill"></i></span>
                        </button>
                        <div class="collapse small mb-1 dropdown-show" id="productManagement">
                            <ul class="nav nav-pills flex-column rounded border border-1 border-secondary">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="products.php"><i class="bi bi-arrow-return-right me-2"></i>Products</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="frequently-bought.php"><i class="bi bi-arrow-return-right me-2"></i>Frequently Bought</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="colors.php"><i class="bi bi-arrow-return-right me-2"></i>Colors</a>
                                </li> 
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="reviews.php"><i class="bi bi-arrow-return-right me-2"></i>Reviews <span class="badge bg-warning"><?php echo $review_count ?></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Brands btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="brands.php"><i class="bi bi-view-list me-2"></i>Brands</a>
                    </li>
                    <!-- Categories btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="categories.php"><i class="bi bi-bookmark me-2"></i>Categories</a>
                    </li>
                    <!-- Manage orders btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="orders.php"><i class="bi bi-list-ol me-2"></i>Orders <span class="badge bg-warning"><?php echo  $pending_order_count ?></span></a>
                    </li>
                    <!-- Manage users btn -->
                    <li class="nav-item">
                        <button class="btn text-white w-100 btn-outline-none shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#userManagement">
                            <span><i class="bi bi-people-fill fw-bold me-2"></i>Users <span class="badge bg-warning"><?php echo  $user_qry_tag; ?></span></span>
                            <span><i class="bi bi-caret-down-fill"></i></span>
                        </button>
                        <div class="collapse small mb-1 dropdown-show" id="userManagement">
                            <ul class="nav nav-pills flex-column rounded border border-1 border-secondary">
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="users.php"><i class="bi bi-arrow-return-right me-2"></i>Users <span class="badge bg-warning"><?php echo $users_qry_count ?></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="user-queries.php"><i class="bi bi-arrow-return-right me-2"></i>Queries <span class="badge bg-warning"><?php echo $user_qry_count ?></span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- Manage admins btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="admins.php"><i class="bi bi-person-plus fw-bold me-2"></i>Admins <span class="badge bg-warning"><?php echo $admin_qry_count ?></span></a>
                    </li>
                    <!-- Manage inventory btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="inventory.php"><i class="bi bi-receipt-cutoff fw-bold me-2"></i>Inventory <span class="badge bg-warning"><?php echo $variation_qry_count ?></span></a>
                    </li>
                    <!-- manage settings btn -->
                    <li class="nav-item">
                        <a class="nav-link text-white" href="settings.php"><i class="bi bi-gear me-2"></i>Settings</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>