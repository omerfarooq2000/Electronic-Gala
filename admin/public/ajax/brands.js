// ! add new brand ajax request
$(document).on("submit", "#add_brand_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/brands.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#save_btn").text("Please Wait...");
            $("#save_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Brand Added!");
                $("#add_brand_form")[0].reset();
                getBrands();
            } else if(data == 'exist'){
                alert("Brand already exist!");
            }else if(data == 'invalid_img'){
                alert("Only jpg, jpeg and png images are allowed");
            }else{
                alert("Something went wrong!")
            }
        },
        complete: function(){
            $("#save_btn").text("Save");
            $("#save_btn").attr("disabled", false);
        }
    });
});

// ! push clicked brand in edit modal
$(document).on('click', '#editBrand', function(){
    var id = $(this).attr('data-edit-id');
    $.ajax({
        url: "ajax/brands.php",
        type: 'POST',
        data: {
            key: 'push_brand_in_modal_form',
            id: id,
        },
        beforeSend: function() {
            $('#pushBrandInModalForm').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#pushBrandInModalForm').html(data);
        },
    })
});

// ! edit brand in db
$(document).on('submit', '#edit_brand_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/brands.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_brand_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_brand_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                $('#edit_brand_form')[0].reset();
                $('#edit_brand_modal').modal('hide');
                alert('Brand updated successfully!');
                getBrands();
            }else if(data == 'invalid_img'){
                alert('Only JPG, JPEG and PNG images are allowed');
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_brand_btn').html('Save');
            $('#edit_brand_btn').attr("disabled", false);
        }
    })
});

// ! delete brands in db
$(document).on('click', '#deleteBrand', function(){
    var btn = $(this);
    var id = $(this).attr('data-delete-id');
    $.ajax({
        url: 'ajax/brands.php',
        type: 'POST',
        data: {
            id: id,
            key: 'delete_brand',
        },
        beforeSend: function(){
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Brand deleted successfully!');
                getBrands();
            }else if(data == 'exist'){
                alert('You cannot delete brand because brand you want to delete is linked with some products');
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            btn.html('<i class="bi bi-trash"></i>');
            btn.attr("disabled", false);
        }
    })
});

// ! get brands from db
function getBrands(){
    $.ajax({
        url: "ajax/brands.php",
        type: "POST",
        data: {
            key: 'get_brand',
        },
        success: function(data) {
            $('#brand_data').html(data);
        },
    });
}

window.onload = function(){
    getBrands();
}