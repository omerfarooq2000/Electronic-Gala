<?php
require("config/essentials.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Panel - Settings</title>
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
                <h4 class="mb-3">Manage Site</h4>
                <!-- Maintenance mode -->
                <div class="card mb-3 bg-dark bg-gradient text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="card-subtitle fw-bold">Maintenance Mode</h6>
                            <div class="form-check form-switch">
                                <form>
                                    <input id="maintenanceMode" data-status-value='<?php echo $row_maintenance["site_maintenance"] ?>' data-status-id='<?php echo $row_maintenance["id"] ?>' class="form-check-input shadow-none" type="checkbox" role="switch" id="shutdown-toggle" <?php echo $checked; ?>>
                                </form>
                            </div>
                        </div>
                        <small class="card-text fw-bold">
                            <span class="text-danger">Note:</span> No User will be allowed to visit site
                        </small>
                    </div>
                </div>
                <!-- general settings -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-main-1 bg-gradient text-white">
                        <h6 class="card-subtitle fw-bold m-0 p-0"><i class="bi bi-gear me-2"></i>General Settings</h6>
                        <button class="btn btn-sm setting-btn shadow-none edit" data-bs-toggle="modal" data-bs-target=".edit_settings" data-edit-key="general"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                    </div>
                    <div class="card-body" id="general_settings_data"></div>
                </div>
                <!-- carousel -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-main-1 bg-gradient text-white">
                        <h6 class="card-subtitle fw-bold m-0 p-0"><i class="bi bi-sliders2 me-2"></i>Slider</h6>
                        <button class="btn btn-sm setting-btn shadow-none" data-bs-toggle="modal" data-bs-target="#add_carousal"><i class="bi bi-plus-square me-1"></i>Add</button>
                    </div>
                    <div class="card-body d-flex flex-wrap" id="carousal_images_data">
                    </div>
                </div>
                <!-- contact details settings -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-main-1 bg-gradient text-white">
                        <h6 class="card-subtitle fw-bold m-0 p-0"><i class="bi bi-person-lines-fill me-2"></i>Contacts Settings</h6>
                        <button class="btn btn-sm setting-btn shadow-none edit" data-bs-toggle="modal" data-bs-target=".edit_settings" data-edit-key="contact"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                    </div>
                    <div class="card-body" id="contact_details_data"></div>
                </div>
                <!-- about us settings -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-main-1 bg-gradient text-white">
                        <h6 class="card-subtitle fw-bold m-0 p-0"><i class="bi bi-file-earmark-person-fill me-2"></i>About Us</h6>
                        <button class="btn btn-sm setting-btn shadow-none edit" data-bs-toggle="modal" data-bs-target=".edit_settings" data-edit-key="about"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                    </div>
                    <div class="card-body" id="about_us_data" style="max-height: 350px; overflow-y: scroll">
                    </div>
                </div>
                <!-- terms & conditions settings -->
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-main-1 bg-gradient text-white">
                        <h6 class="card-subtitle fw-bold m-0 p-0"><i class="bi bi-arrows-angle-contract me-2"></i>Terms & Conditions</h6>
                        <button class="btn btn-sm setting-btn shadow-none edit" data-bs-toggle="modal" data-bs-target=".edit_settings" data-edit-key="terms"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                    </div>
                    <div class="card-body" id="terms_conditions_data"  style="max-height: 350px; overflow-y: scroll">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- edit general setting modal -->
    <div class="modal fade edit_settings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="setting_data"></div>
            </div>
        </div>
    </div>

    <!-- Add new carousal image modal -->
    <div class="modal fade" id="add_carousal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAdminLabel">Add Carousal Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add_carousal_image_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="key" name="add_carousal_image">
                        <div class="form-group mb-3">
                            <label class="mb-2">Select Image:</label>
                            <input type="file" name="images[]" class="form-control shadow-none" id="fileInput" multiple required>
                            <small class="text-danger">Note: <b>1280x720</b> resolution images are the best option for carousal</small>
                            <div id="imagePreviewContainer"></div>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button type="reset" class="btn btn-outline-dark me-2" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-dark" id="add_carousal_image_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include("inc/footer.php") ?>
    <script src="public/ajax/settings.js"></script>
    <script>
        // ! image preview three
        // ! Listen for changes in the file input
        $('#fileInput').on('change', function() {
            // ! Get the selected files
            const files = $(this)[0].files;

            // ! Clear the previous previews
            $('#imagePreviewContainer').empty();

            // ! Loop through each selected file
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                // ! Read the file as a data URL
                reader.readAsDataURL(file);

                // ! Callback when the file is loaded
                reader.onload = function(e) {
                    // ! Create an image element and set its source to the data URL
                    const imageElement = $('<img class="img-thumbnail carousal-preview-image m-1">').attr('src', e.target.result);
                    // ! Add the image element to the preview container
                    $('#imagePreviewContainer').append(imageElement);
                };
            }
        });
    </script>
</body>

</html>