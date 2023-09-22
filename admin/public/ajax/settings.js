/*
-------------------------------------------------------
* get data from db and show in settings page section
-------------------------------------------------------
*/

// ! get general settings from db
function getGeneralSettings(){
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'get_general_settings',
        },
        success: function(data) {
            $('#general_settings_data').html(data);
        },
    });
}

// ! get carousal images from db
function getCarousalIMages(){
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'get_carousal_images',
        },
        success: function(data) {
            $('#carousal_images_data').html(data);
        },
    });
}

// ! get contact details from db
function getContactDetails(){
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'get_contact_details',
        },
        success: function(data) {
            $('#contact_details_data').html(data);
        },
    });
}

// ! get about us from db
function getAboutUs(){
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'get_about_us',
        },
        success: function(data) {
            $('#about_us_data').html(data);
        },
    });
}

// ! get terms and conditions from db
function getTermsConditions(){
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'get_terms_conditions',
        },
        success: function(data) {
            $('#terms_conditions_data').html(data);
        },
    });
}

/*
-------------------------------------------------------
* click on edit button to push data in modal section
-------------------------------------------------------
*/

// ! push data to modal
$(document).on('click', '.edit', function(e) {
    var key = $(this).attr('data-edit-key');
    $.ajax({
        url: "ajax/settings.php",
        type: 'POST',
        data: {
            key: key,
        },
        beforeSend: function() {
            $('#setting_data').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#setting_data').html(data);
        },
    })
})

/*
-------------------------------------------------------
* edit data section
-------------------------------------------------------
*/

// ! edit general settings in db
$(document).on('submit', '#edit_general_settings_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/settings.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_general_settings_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_general_settings_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Settings updated successfully!');
                $('.edit_settings').modal('hide');
                getGeneralSettings();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_general_settings_btn').html('Save');
            $('#edit_general_settings_btn').attr("disabled", false);
        }
    })
});

// ! edit contact details in db
$(document).on('submit', '#edit_contact_details_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/settings.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_general_settings_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_general_settings_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Contact Details updated successfully!');
                $('.edit_settings').modal('hide');
                getContactDetails();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_general_settings_btn').html('Save');
            $('#edit_general_settings_btn').attr("disabled", false);
        }
    })
});

// ! edit about us in db
$(document).on('submit', '#edit_about_us_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/settings.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_general_settings_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_general_settings_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('About us updated successfully!');
                $('.edit_settings').modal('hide');
                getAboutUs();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_general_settings_btn').html('Save');
            $('#edit_general_settings_btn').attr("disabled", false);
        }
    })
});

// ! edit terms and conditions in db
$(document).on('submit', '#edit_terms_conditions_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/settings.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_general_settings_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_general_settings_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Terms and conditions updated successfully!');
                $('.edit_settings').modal('hide');
                getTermsConditions();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_general_settings_btn').html('Save');
            $('#edit_general_settings_btn').attr("disabled", false);
        }
    })
});

// ! update maintenance mode in db
$(document).on('change', '#maintenanceMode', function(){
    var id = $(this).attr('data-status-id');
    var val = $(this).attr('data-status-value');
    $.ajax({
        url: 'ajax/settings.php',
        type: 'POST',
        data: {
            key: 'change_maintenance_mode_status',
            id: id,
            val: val,

        },
        beforeSend: function(){
            $('#maintenanceMode').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                window.location.reload();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#maintenanceMode').attr("disabled", false);
        }
    })
});

/*
-------------------------------------------------------
* CRUD(Create, Read, Update, Delete) operation section
-------------------------------------------------------
*/
// ! add carousal image in db
$(document).on("submit", "#add_carousal_image_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#add_carousal_image_btn").text("Please Wait...");
            $("#add_carousal_image_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Image(s) added successfully!");
                $("#add_carousal").modal('hide');
                $("#add_carousal_image_form")[0].reset();
                $("#imagePreviewContainer").html("");
                getCarousalIMages();
            }else if(data == 'invalid_img'){
                alert("Only jpg, jpeg and png images are allowed");
            }else{
                alert("Something went wrong!")
            }
        },
        complete: function(){
            $("#add_carousal_image_btn").text("Save");
            $("#add_carousal_image_btn").attr("disabled", false);
        }
    });
});

// ! remove carousal image in db
$(document).on("click", "#deleteCarousalImage", function() {
    var id = $(this).attr('data-delete-id');
    var btn = $(this);
    $.ajax({
        url: "ajax/settings.php",
        type: "POST",
        data: {
            key: 'delete_carousal_image',
            id: id,
        },
        beforeSend: function() {
            btn.html("<span class='spinner-grow spinner-grow-sm'></span>");
            btn.attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Image deleted successfully");
                getCarousalIMages();
            }else{
                alert("Something went wrong!")
            }
        },
        complete: function(){
            btn.html("Save");
            btn.attr("disabled", false);
        }
    });
});

window.onload = function(){
    getGeneralSettings();
    getAboutUs();
    getTermsConditions();
    getContactDetails();
    getCarousalIMages();
}