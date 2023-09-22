// ! get inventory products from db
function getInventoryProducts(){
    $.ajax({
        url: "ajax/inventory.php",
        type: "POST",
        data: {
            key: 'get_inventory',
        },
        success: function(data) {
            $('#inventory_data').html(data);
        },
    });
}

// ! get colors from db
function getColorAttributes(){
    $.ajax({
        url: "ajax/inventory.php",
        type: "POST",
        data: {
            key: 'get_colors',
        },
        success: function(data) {
            $('.color_attribute_data').html(data);
        },
    });
}

// ! edit variations
$(document).on("submit", "#edit_variation_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/inventory.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#update_inventory_btn').text("Please Wait...");
            $('#update_inventory_btn').attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Variation updated successfully");
                window.location.reload();
            }else{
                alert("Something went wrong");
            }
        },
        complete: function() {
            $('#update_inventory_btn').text("Upload Product");
            $('#update_inventory_btn').attr("disabled", false);
        },
    });
});

// ! insert variations
$(document).on("submit", "#add_variation_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/inventory.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#add_variation_btn').text("Please Wait...");
            $('#add_variation_btn').attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Variation added successfully");
                window.location.reload();
            }else{
                alert("Something went wrong");
            }
        },
        complete: function() {
            $('#add_variation_btn').text("Upload Product");
            $('#add_variation_btn').attr("disabled", false);
        },
    });
});

// ! remove variation
$('.remove').on('click', function(){
    var btn = $(this);
    var id = $(this).attr('data-delete-id');
    var proId = $(this).attr('data-product-id');
    if(confirm('Are you sure you want to delete this variation?')){
        $.ajax({
            url: 'ajax/inventory.php',
            type: 'POST',
            data: {
                id: id,
                proId: proId,
                key: 'delete_variation',
            },
            beforeSend: function(){
                btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
                btn.attr("disabled", true);
            },
            success: function(data){
                if(data == 'success'){
                    btn.closest('tr').remove();
                }else if(data == 'not_allowed'){
                    alert('You cannot delete all variations!');
                }else{
                    alert('Something went wrong!');
                }
            },
            complete: function(){
                btn.html('Remove');
                btn.attr("disabled", false);
            }
        })
    }
});

window.onload = function(){
    getInventoryProducts();
    getColorAttributes();
}