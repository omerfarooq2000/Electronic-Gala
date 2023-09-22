<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Orders</title>
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
                    <div class="card-header custom-tabs">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <h4>Orders</h4>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-0 py-1 px-2 active" id="pills-all-orders-tab" data-bs-toggle="pill" data-bs-target="#all-orders" type="button" role="tab" aria-controls="all-orders" aria-selected="true">All</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-0 py-1 px-2" id="pills-pending-orders-tab" data-bs-toggle="pill" data-bs-target="#pending-orders" type="button" role="tab" aria-controls="pending-orders" aria-selected="true">Pending<span class="badge bg-warning ms-2"><?php echo $pending_order_count ?></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-0 py-1 px-2" id="pills-processing-orders-tab" data-bs-toggle="pill" data-bs-target="#processing-orders" type="button" role="tab" aria-controls="processing-orders" aria-selected="false">In Process<span class="badge bg-warning ms-2"><?php echo $in_process_order_count; ?></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-0 py-1 px-2" id="pills-completed-orders-tab" data-bs-toggle="pill" data-bs-target="#completed-orders" type="button" role="tab" aria-controls="completed-orders" aria-selected="false">Delivered<span class="badge bg-warning ms-2"><?php echo $delivered_order_count ?></span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-0 py-1 px-2" id="pills-canceled-orders-tab" data-bs-toggle="pill" data-bs-target="#canceled-orders" type="button" role="tab" aria-controls="canceled-orders" aria-selected="false">Canceled<span class="badge bg-warning ms-2"><?php echo $canceled_order_count ?></span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- All orders tab -->
                            <div class="tab-pane fade show active" id="all-orders" role="tabpanel" aria-labelledby="pills-all-orders-tab">
                                <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                    <table class="table table-hover border table-sm">
                                        <thead class="sticky-top">
                                            <tr class="bg-main-1 text-white">
                                                <th width="3%">#</th>
                                                <th width='30%'>Product</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="all_orders_data"></tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Pending orders tab -->
                            <div class="tab-pane fade show" id="pending-orders" role="tabpanel" aria-labelledby="pills-pending-orders-tab">
                                <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                    <table class="table table-hover border table-sm">
                                        <thead class="sticky-top">
                                            <tr class="bg-main-1 text-white">
                                                <th width="3%">#</th>
                                                <th width='30%'>Product</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="pending_orders_data"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Processing orders tab -->
                            <div class="tab-pane fade" id="processing-orders" role="tabpanel" aria-labelledby="pills-processing-orders-tab">
                                <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                    <table class="table table-hover border table-sm">
                                        <thead class="sticky-top">
                                            <tr class="bg-main-1 text-white">
                                                <th width="3%">#</th>
                                                <th width='30%'>Product</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="processing_orders_data"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Delivered orders tab -->
                            <div class="tab-pane fade" id="completed-orders" role="tabpanel" aria-labelledby="pills-completed-orders-tab">
                                <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                    <table class="table table-hover border table-sm">
                                        <thead class="sticky-top">
                                            <tr class="bg-main-1 text-white">
                                                <th width="3%">#</th>
                                                <th width='30%'>Product</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="delivered_orders_data"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <!-- Canceled orders tab -->
                            <div class="tab-pane fade" id="canceled-orders" role="tabpanel" aria-labelledby="pills-canceled-orders-tab">
                                <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                    <table class="table table-hover border table-sm">
                                        <thead class="sticky-top">
                                            <tr class="bg-main-1 text-white">
                                                <th width="3%">#</th>
                                                <th width='30%'>Product</th>
                                                <th>Customer</th>
                                                <th>Status</th>
                                                <th>Payment Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="canceled_orders_data"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/orders.js"></script>
</body>

</html>