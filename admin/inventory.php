<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Inventory - Admin Panel</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('inc/links.php') ?>
</head>

<body class="bg-light">

    <?php require("inc/header.php") ?>
    
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <?php echo siteMaintenanceMode() ?>
                <div class="card rounded-0">
                    <div class="card-header">
                        <h4>Inventory</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover table-sm table-bordered table-striped text-center" id="products_table">
                                <thead class="sticky-top">
                                    <tr class="bg-main-1 text-light">
                                        <th>#</th>
                                        <th width="40%" class="text-start">Product</th>
                                        <th width="10%">Variation</th>
                                        <th colspan="2" class="text-center">Stock</th>
                                        <th>Sales</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="inventory_data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/inventory.js"></script>
</body>

</html>