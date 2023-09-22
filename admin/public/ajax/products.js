// ! get product from db
function getProducts(){
    $.ajax({
        url: "ajax/products.php",
        type: "POST",
        data: {
            key: 'get_products',
        },
        success: function(data) {
            $('#product_data').html(data);
        },
    });
}

// ! get colors from db
function getColorAttributes(){
    $.ajax({
        url: "ajax/products.php",
        type: "POST",
        data: {
            key: 'get_colors',
        },
        success: function(data) {
            $('.color_attribute_data').html(data);
        },
    });
}

// ! add new product
$(document).on("submit", "#add_product_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/products.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#add_product_btn').text("Please Wait...");
            $('#add_product_btn').attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Product added successfully");
                window.location.reload();
            }else if (data == 'invalid-img') {
                alert("Invalid image file type");
            } else{
                alert("Something went wrong");
            }
        },
        complete: function() {
            $('#add_product_btn').text("Upload Product");
            $('#add_product_btn').attr("disabled", false);
        },
    });
});

// ! update product
$(document).on("submit", "#edit_product_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/products.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#edit_product_btn').html("Please Wait...<span class='spinner-grow spinner-grow-sm'></span>");
            $('#edit_product_btn').attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Product updated successfully");
                window.location.reload();
            }else if (data == 'invalid-_mg') {
                alert("Invalid image file type");
            } else{
                alert("Something went wrong");
            }
        },
        complete: function() {
            $('#edit_product_btn').html("Update Product");
            $('#edit_product_btn').attr("disabled", false);
        },
    });
});

// ! view specific product
$(document).on('click', '#viewProductBtn', function(){
    var id = $(this).attr('data-view-id');
    var btn = $(this);
    $.ajax({
        url: "ajax/products.php",
        type: 'POST',
        data: {
            key: 'view_product',
            id: id,
        },
        beforeSend: function() {
            $('#viewProductDetails').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#viewProductDetails').html(data)
        },
        complete: function(){
            $('#viewProductDetails').html(data)
        }
    })
});

// ! delete products
$(document).on('click', '#deleteProductBtn', function(){
    var btn = $(this);
    var id = $(this).attr('data-delete-id');
    if(confirm('Are you sure you want to delete this product? All data related to this product will be deleted such as order history, colors, user cart etc')){
        $.ajax({
            url: 'ajax/products.php',
            type: 'POST',
            data: {
                id: id,
                key: 'delete_product',
            },
            beforeSend: function(){
                btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
                btn.attr("disabled", true);
            },
            success: function(data){
                if(data == 'success'){
                    alert('Product deleted successfully!');
                    getProducts();
                }else{
                    alert('Something went wrong!');
                }
            },
            complete: function(){
                btn.html('<i class="bi bi-trash"></i>');
                btn.attr("disabled", false);
            }
        })
    }
});

window.onload = function(){
    getProducts();
    getColorAttributes();
}