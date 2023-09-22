<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Reviews</title>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Reviews</h4>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-pending-tab" data-bs-toggle="pill" data-bs-target="#pills-pending" type="button" role="tab" aria-controls="pills-pending" aria-selected="false">Pending <div class="badge bg-warning"><?php echo $review_count ?></div></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-approved-tab" data-bs-toggle="pill" data-bs-target="#pills-approved" type="button" role="tab" aria-controls="pills-approved" aria-selected="false">Approved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-disapproved-tab" data-bs-toggle="pill" data-bs-target="#pills-disapproved" type="button" role="tab" aria-controls="pills-disapproved" aria-selected="false">Disapproved</button>
                                </li>
                            </ul>
                                
                        </div>
                    </div>
                    <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border table-sm">
                                    <thead class="sticky-top">
                                        <tr class="bg-main-1 text-light">
                                            <th width="3%">#</th>
                                            <th>Date</th>
                                            <th width="40%">Review</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="all_review_data"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border table-sm">
                                    <thead class="sticky-top">
                                        <tr class="bg-main-1 text-light">
                                            <th width="3%">#</th>
                                            <th>Date</th>
                                            <th width="40%">Review</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="pending_review_data"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
                            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border table-sm">
                                    <thead class="sticky-top">
                                        <tr class="bg-main-1 text-light">
                                            <th width="3%">#</th>
                                            <th>Date</th>
                                            <th width="40%">Review</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="approved_review_data"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-disapproved" role="tabpanel" aria-labelledby="pills-disapproved-tab">
                            <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                                <table class="table table-hover border table-sm">
                                    <thead class="sticky-top">
                                        <tr class="bg-main-1 text-light">
                                            <th width="3%">#</th>
                                            <th>Date</th>
                                            <th width="40%">Review</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="disapproved_review_data"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- view review modal -->
    <div class="modal fade view_review" id="" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addBrandLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandLabel">View Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="view_review_data">
                    
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/reviews.js"></script>
    
</body>

</html>