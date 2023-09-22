<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Dashboard</title>
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
                <div class="row">
                    <?php 
                        // ! count previous year sales
                        $number = 0;
                        $current_date = date('Y-m-d');
                        $previous_month_date = date('Y-m-d', strtotime('-1 year', strtotime($current_date)));

                        $query = "SELECT SUM(price*qty) AS pre_year_sales FROM orders WHERE date_added BETWEEN '$previous_month_date' AND '$current_date' AND status = '5'";

                        $result = mysqli_query($con, $query);
                        $pre_year_sales = mysqli_fetch_assoc($result);

                        if($pre_year_sales['pre_year_sales'] < 1000){
                            $number = number_format($pre_year_sales['pre_year_sales'], 1);
                        }
                        if($pre_year_sales['pre_year_sales'] > 1000){
                            $number = number_format($pre_year_sales['pre_year_sales'] / 1000, 1).'K';
                        }
                        if($pre_year_sales['pre_year_sales'] > 1000000){
                            $number = number_format($pre_year_sales['pre_year_sales'] / 1000000, 1).'M';
                        }
                        if($pre_year_sales['pre_year_sales'] > 1000000000){
                            $number = number_format($pre_year_sales['pre_year_sales'] / 1000000000, 1). 'B';
                        } 

                        echo <<<pre_year_sales
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-8 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$$number</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-graph-up-arrow fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Since Last Year</h5>
                                </div>
                            </div>
                        </div>
                        pre_year_sales;

                        // ! count previous monthly sales
                        $number = 0;
                        $current_date = date('Y-m-d');
                        $previous_month_date = date('Y-m-d', strtotime('-1 month', strtotime($current_date)));
                    
                        $query = "SELECT SUM(price*qty) AS pre_month_sales FROM orders WHERE date_added BETWEEN '$previous_month_date' AND '$current_date' AND status = '5'";
                        $result = mysqli_query($con, $query);
                        $pre_month_sales = mysqli_fetch_assoc($result);

                        if($pre_month_sales['pre_month_sales'] < 1000){
                            $number = number_format($pre_month_sales['pre_month_sales'], 1);
                        }
                        if($pre_month_sales['pre_month_sales'] > 1000){
                            $number = number_format($pre_month_sales['pre_month_sales'] / 1000, 1).'K';
                        }
                        if($pre_month_sales['pre_month_sales'] > 1000000){
                            $number = number_format($pre_month_sales['pre_month_sales'] / 1000000, 1).'M';
                        }
                        if($pre_month_sales['pre_month_sales'] > 1000000000){
                            $number = number_format($pre_month_sales['pre_month_sales'] / 1000000000, 1). 'B';
                        } 

                        echo <<<pre_month_sales
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-9 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$$number</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-graph-up-arrow fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Since Last Month</h5>
                                </div>
                            </div>
                        </div>
                        pre_month_sales;

                        // ! count previous week sales
                        $number = 0;

                        $current_date = date('Y-m-d');
                        $previous_month_date = date('Y-m-d', strtotime('-1 week', strtotime($current_date)));

                        $query = "SELECT SUM(price*qty) AS pre_week_sales FROM orders WHERE date_added BETWEEN '$previous_month_date' AND '$current_date' AND status = '5'";
                        $result = mysqli_query($con, $query);
                        $pre_week_sales = mysqli_fetch_assoc($result);

                        if($pre_week_sales['pre_week_sales'] < 1000){
                            $number = number_format($pre_week_sales['pre_week_sales'], 1);
                        }
                        if($pre_week_sales['pre_week_sales'] > 1000){
                            $number = number_format($pre_week_sales['pre_week_sales'] / 1000, 1).'K';
                        }
                        if($pre_week_sales['pre_week_sales'] > 1000000){
                            $number = number_format($pre_week_sales['pre_week_sales'] / 1000000, 1).'M';
                        }
                        if($pre_week_sales['pre_week_sales'] > 1000000000){
                            $number = number_format($pre_week_sales['pre_week_sales'] / 1000000000, 1). 'B';
                        } 

                        echo <<<pre_week_sales
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-10 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$$number</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-graph-up-arrow fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Since Last Week</h5>
                                </div>
                            </div>
                        </div>
                        pre_week_sales;

                        // ! count products
                        $query = "SELECT count(*) AS total_products FROM products";
                        $result = mysqli_query($con, $query);
                        $count_products = mysqli_fetch_assoc($result);
                        echo <<<total_products
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-4 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$count_products[total_products]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-basket2-fill fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Products</h5>
                                </div>
                            </div>
                        </div>
                        total_products;

                        // ! count reviews
                        $query = "SELECT count(*) AS total_reviews FROM reviews";
                        $result = mysqli_query($con, $query);
                        $count_reviews = mysqli_fetch_assoc($result);
                        echo <<<total_reviews
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-5 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$count_reviews[total_reviews]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-star-fill fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Reviews</h5>
                                </div>
                            </div>
                        </div>
                        total_reviews;

                        // ! count categories
                        $query = "SELECT count(*) AS total_categories FROM categories";
                        $result = mysqli_query($con, $query);
                        $count_categories = mysqli_fetch_assoc($result);
                        echo <<<total_categories
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-6 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$count_categories[total_categories]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-bookmark fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Categories</h5>
                                </div>
                            </div>
                        </div>
                        total_categories;

                        // ! count brands
                        $query = "SELECT count(*) AS total_brands FROM brands";
                        $result = mysqli_query($con, $query);
                        $count_brands = mysqli_fetch_assoc($result);
                        echo <<<total_brands
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-7 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$count_brands[total_brands]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-view-list fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Brands</h5>
                                </div>
                            </div>
                        </div>
                        total_brands;

                        // ! count total admins 
                        $query = "SELECT count(*) AS total_admins FROM admins";
                        $result = mysqli_query($con, $query);
                        $total_admins = mysqli_fetch_assoc($result);
                        echo <<<total_admins
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-1 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$total_admins[total_admins]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-person-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Admins</h5>
                                </div>
                            </div>
                        </div>
                        total_admins;

                        // ! count pending admins 
                        $query = "SELECT count(*) AS pending_admins FROM admins WHERE status = '0'";
                        $result = mysqli_query($con, $query);
                        $pending_admins = mysqli_fetch_assoc($result);
                        echo <<<pending_admins
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-2 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$pending_admins[pending_admins]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-person-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Pending Admins</h5>
                                </div>
                            </div>
                        </div>
                        pending_admins;

                        // ! count active admins 
                        $query = "SELECT count(*) AS active_admins FROM admins WHERE status = '1'";
                        $result = mysqli_query($con, $query);
                        $active_admins = mysqli_fetch_assoc($result);
                        echo <<<active_admins
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-3 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$active_admins[active_admins]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-person-plus fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Active Admins</h5>
                                </div>
                            </div>
                        </div>
                        active_admins;
                        
                        // ! count total orders 
                        $query = "SELECT count(*) AS total_orders FROM orders";
                        $result = mysqli_query($con, $query);
                        $total_orders = mysqli_fetch_assoc($result);
                        echo <<<total_orders
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-11 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$total_orders[total_orders]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-list-ol fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Orders</h5>
                                </div>
                            </div>
                        </div>
                        total_orders;

                        // ! count pending orders 
                        $query = "SELECT count(*) AS pending_orders FROM orders WHERE status = '0'";
                        $result = mysqli_query($con, $query);
                        $pending_orders = mysqli_fetch_assoc($result);
                        echo <<<pending_orders
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-12 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$pending_orders[pending_orders]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-list-ol fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Pending Orders</h5>
                                </div>
                            </div>
                        </div>
                        pending_orders;

                        // ! count in process orders 
                        $query = "SELECT count(*) AS in_process_orders FROM orders WHERE status BETWEEN '1' AND '4'";
                        $result = mysqli_query($con, $query);
                        $in_process_orders = mysqli_fetch_assoc($result);
                        echo <<<in_process_orders
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-13 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$in_process_orders[in_process_orders]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-list-ol fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>In Process Orders</h5>
                                </div>
                            </div>
                        </div>
                        in_process_orders;

                        // ! count completed orders 
                        $query = "SELECT count(*) AS completed_orders FROM orders WHERE status = '5'";
                        $result = mysqli_query($con, $query);
                        $completed_orders = mysqli_fetch_assoc($result);
                        echo <<<completed_orders
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-14 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$completed_orders[completed_orders]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-list-ol fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Completed Orders</h5>
                                </div>
                            </div>
                        </div>
                        completed_orders;
                        
                        // ! count total users
                        $query = "SELECT count(*) AS all_users FROM users";
                        $result = mysqli_query($con, $query);
                        $all_users = mysqli_fetch_assoc($result);
                        echo <<<all_users
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-15 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$all_users[all_users]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-people-fill fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Total Users</h5>
                                </div>
                            </div>
                        </div>
                        all_users;

                        // ! count pending users 
                        $query = "SELECT count(*) AS pending_users FROM admins WHERE status = '0'";
                        $result = mysqli_query($con, $query);
                        $pending_users = mysqli_fetch_assoc($result);
                        echo <<<pending_users
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-16 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$pending_users[pending_users]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-people-fill fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Pending Users</h5>
                                </div>
                            </div>
                        </div>
                        pending_users;

                        // ! count active users 
                        $query = "SELECT count(*) AS active_users FROM users WHERE status = '1'";
                        $result = mysqli_query($con, $query);
                        $active_users = mysqli_fetch_assoc($result);
                        echo <<<active_users
                        <div class="col-lg-4 col-md-4 col-sm-6 mb-3">
                            <div class="card bg-17 text-light icon-box">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h2 class="m-0">$active_users[active_users]</h2>
                                    <div class="icon-bg">
                                        <i class="bi bi-people-fill fs-2"></i>
                                    </div>
                                </div>
                                <div class="card-body progress-bar-striped">
                                    <h5 class='fw-bold'>Active Users</h5>
                                </div>
                            </div>
                        </div>
                        active_users;
                        
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <!-- <script src="public/js/admins.js"></script> -->
    
</body>

</html>