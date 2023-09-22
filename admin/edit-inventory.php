<?php
require("config/config.php");
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Edit Inventory</title>
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
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="m-0">Edit Inventory</h4>
                            <a href="inventory.php" class="btn bg-main-1 btn-sm shadow-none"><i class="bi bi-arrow-left me-1"></i>Go Back</a>
                        </div>
                    </div>
                    <?php 
                        if(isset($_GET['id']) OR !empty($_GET['id'])){
                            $id = $_GET['id'];
                            
                            $getProduct = "SELECT * FROM products WHERE id = '$id'";
                            $runGetProduct = mysqli_query($con, $getProduct);
                            if(mysqli_num_rows($runGetProduct) > 0){
                                $rowProduct = mysqli_fetch_array($runGetProduct);
                                $productId = $rowProduct['id'];
                                $productName = $rowProduct['name'];
                                $productDeliveryCharges = $rowProduct['delivery_charges'];
                            }else{
                                echo "<script>window.open('inventory.php', '_self')</script>";
                            }
                            
                        }
                    ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-12 m-auto">
                                <form id="edit_variation_form">
                                    <input type="hidden" name="key" value="update_variation_key">
                                    <div class="form-group mb-2">
                                        <label class="d-block fw-bold mb-2">Edit Variations:</label>
                                        <div class="bg-white rounded border border-gray">
                                            <table class="table table-stripped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Color</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $getVariations = "SELECT * FROM product_variations WHERE product_id = '$id'";
                                                        $runGetVariations = mysqli_query($con, $getVariations);
                                                        while($variationRow = mysqli_fetch_array($runGetVariations)){
                                                    ?>
                                                    <input type="hidden" name="variation_id[]" value="<?php echo $variationRow['id'] ?>">
                                                    <tr class="mb-2">
                                                        <td style="width: 25%">
                                                            <select name="color[]" class="form-select shadow-none">
                                                                <?php 
                                                                    $output = "";
                                                                    $selected = "";
                                                                    $color = "SELECT * FROM color_attributes ORDER BY id DESC";
                                                                    $color_run = mysqli_query($con, $color);
                                                                    while($color_row = mysqli_fetch_array($color_run)){
                                                                        $selected = ($color_row['name'] == $variationRow['color']) ? 'selected' : '';
                                                                        $output .="
                                                                        <option value='$color_row[name]' class='text-capitalize' $selected>$color_row[name]</option>
                                                                        ";
                                                                    }
                                                                    echo $output;
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td style="width: 25%"><input type="number" min="1" name="price[]" class="form-control shadow-none" value="<?php echo $variationRow['price'] ?>" placeholder="Price"></td>
                                                        <td style="width: 25%"><input type="number" name="stock[]" class="form-control shadow-none" value="<?php echo $variationRow['stock'] ?>" placeholder="Stock"></td>
                                                        <td style="width: 25%"><button type="button" id="remove" class="btn bg-8 text-white fw-bold w-100 shadow-none remove" data-delete-id="<?php echo $variationRow['id'] ?>" data-product-id="<?php echo $productId ?>">Remove</button></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-main-1 shadow-none float-end" id="update_inventory_btn">Update Now</button>
                                </form>
                            </div>
                            <div class="col-lg-7 col-md-8 col-sm-12 m-auto">
                                <form id="add_variation_form">
                                    <input type="hidden" name="key" value="add_variation_key">
                                    <input type="hidden" name="product_id" value="<?php echo $_GET['id'] ?>">
                                    <div class="form-group mb-2">
                                        <label class="d-block fw-bold mb-2">Add Variations:</label>
                                        <div class="bg-white rounded border border-gray">
                                            <table class="table table-stripped">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>Color</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Add/Remove</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="add_field">
                                                    <tr class="mb-2">
                                                        <td style="width: 25%">
                                                            <select name="color[]" class="form-select shadow-none color_attribute_data">
                                                            </select>
                                                        </td>
                                                        <td style="width: 25%"><input type="number" min="1" name="price[]" class="form-control shadow-none" placeholder="Price" required></td>
                                                        <td style="width: 25%"><input type="number" min="1" name="stock[]" class="form-control shadow-none" placeholder="Stock" required></td>
                                                        <td style="width: 25%"><input type="button" id="add" value="Add More" class="btn bg-9 text-white fw-bold w-100 shadow-none"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-sm bg-main-1 shadow-none float-end" id="add_variation_btn" value="Add Now">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("inc/footer.php") ?>
    <script src="public/ajax/inventory.js"></script>
    <script>
        $(document).ready(function(){
            var html = '<tr class="mb-2"><td style="width: 25%"><select name="color[]" class="form-select shadow-none color_attribute_data"></select></td><td style="width: 25%"><input type="number" name="price[]" placeholder="Price" class="form-control shadow-none" required></td><td style="width: 25%"><input type="number" name="stock[]" placeholder="Stock" class="form-control shadow-none" required></td><td style="width: 25%"><input type="button" id="remove" value="Remove" class="btn bg-8 text-white fw-bold w-100 shadow-none"></td></tr>';
            var x = 1;
            
            // ! append tr to table
            $("#add").click(function(){
                $("#add_field").append(html);
                getColorAttributes();
            });

            // ! remove tr from table
            $(document).on('click', '#remove', function(){
                $(this).closest('tr').remove();
                x--;
            });
        });
    </script>
</body>

</html>

