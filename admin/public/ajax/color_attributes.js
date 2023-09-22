// ! show input color below input field
$('#colorName').on('input', function(){
    var colorValue = " ";
    colorValue = $(this).val();
    if(colorValue != " "){
        $(this).css('color', colorValue);
        $(this).css('border-color', colorValue);
    }else{
        var colorValue = " ";
        $(this).css('color', "#212529");
        $(this).css('borderColor', "#ced4da");
    }
});

// ! add color attributes in db
$('#add_color_attribute_form').on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/color_attributes.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#add_color_attribute_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#add_color_attribute_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Color added successfully!');
                $('#add_color_attribute_form')[0].reset();
                $('#colorName').css('color', "#212529");
                $('#colorName').css('borderColor', "#ced4da");
                load_color_attributes();
            }else if(data == 'exist'){
                alert('Color you want to add is already exist');
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#add_color_attribute_btn').html('Save');
            $('#add_color_attribute_btn').attr("disabled", false);
        }
    });
});

// ! push clicked colors in edit modal
$(document).on('click', '#edit_color_attribute', function(){
    var id = $(this).attr('data-edit-id');
    $.ajax({
        url: "ajax/color_attributes.php",
        type: 'POST',
        data: {
            key: 'push_color_in_modal_form',
            id: id,
        },
        beforeSend: function() {
            $('#pushColorInModalForm').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#pushColorInModalForm').html(data);
        },
    })
});

// ! edit color attribute in db
$(document).on('submit', '#edit_color_attribute_form', function(e){
    e.preventDefault();
    $.ajax({
        url: 'ajax/color_attributes.php',
        type: 'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $('#edit_color_attribute_btn').html('<span class="spinner-grow spinner-grow-sm"></span>');
            $('#edit_color_attribute_btn').attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                $('#edit_color_attribute_form')[0].reset();
                $('#edit_color_attribute_modal').modal('hide');
                alert('Color updated successfully!');
                load_color_attributes();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function(){
            $('#edit_color_attribute_btn').html('Save');
            $('#edit_color_attribute_btn').attr("disabled", false);
        }
    })
});

// ! delete color attributes in db
$(document).on('click', '#deleteColorAttribute', function(){
    var btn = $(this);
    var colorName = $(this).attr('data-delete-name');
    $.ajax({
        url: 'ajax/color_attributes.php',
        type: 'POST',
        data: {
            name: colorName,
            key: 'delete_color_attributes',
        },
        beforeSend: function(){
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Color attribute deleted successfully!');
                load_color_attributes();
            }else if(data == 'exist'){
                alert('You cannot delete color because color you want to delete is linked with some products');
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

// ! fetch color attributes from db
function load_color_attributes(){
    $.ajax({
        url: 'ajax/color_attributes.php',
        type: 'POST',
        data: {
            key: 'load_color_attributes',
        },
        success: function(data){
            $("#color_attributes_data").html(data);
        }
    });
}

window.onload = function(){
    load_color_attributes();
}