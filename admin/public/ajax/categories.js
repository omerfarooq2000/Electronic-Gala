// ! get categories from db
function getCategories(){
    $.ajax({
        url: "ajax/categories.php",
        type: "POST",
        data: {
            key: 'get_cat',
        },
        success: function(data) {
            $('#category_data').html(data);
        },
    });
}

// ! add category in db
$(document).on("submit", "#add_category_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/categories.php",
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
                alert("Category Added!");
                $("#add_category_form")[0].reset();
                getCategories();
            } else if(data == 'exist'){
                alert("Category already exist!");
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
$(document).on('click', '#editCategory', function(){
    var id = $(this).attr('data-edit-id');
    $.ajax({
        url: "ajax/categories.php",
        type: 'POST',
        data: {
            key: 'push_category_in_modal_form',
            id: id,
        },
        beforeSend: function() {
            $('#pushCategoryInModalForm').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#pushCategoryInModalForm').html(data);
        },
    })
});

// ! edit category in db
$(document).on('submit', '#edit_category_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/categories.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_category_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_category_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                $('#edit_category_form')[0].reset();
                $('#edit_category_modal').modal('hide');
                alert('Category updated successfully!');
                getCategories();
            }else if(data == 'invalid_img'){
                alert('Only JPG, JPEG and PNG images are allowed');
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_category_btn').html('Save');
            $('#edit_category_btn').attr("disabled", false);
        }
    })
});

// ! delete category in db
$(document).on('click', '#deleteCategory', function(){
    var btn = $(this);
    var id = $(this).attr('data-delete-id');
    $.ajax({
        url: 'ajax/categories.php',
        type: 'POST',
        data: {
            id: id,
            key: 'delete_categories',
        },
        beforeSend: function(){
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Category deleted successfully!');
                getCategories();
            }else if(data == 'exist'){
                alert('You cannot delete category because category you want to delete is linked with some products');
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

window.onload = function(){
    getCategories();
}