// ! load frequently bought products
function getFrequentlyBoughtProducts(){
    $.ajax({
        url: "ajax/frequently_bought_products.php",
        type: "POST",
        data: {
            key: 'get_frequently_bought_products',
        },
        success: function(data) {
            $('#frequently_bought_data').html(data);
        },
    });
}

// ! add frequently bought products
$(document).on("submit", "#add_frequently_bought_products_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/frequently_bought_products.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#addFrequentlyBoughtProductsBtn').text("Please Wait...");
            $('#addFrequentlyBoughtProductsBtn').attr("disabled", true);
        },
        success: function(data) {
            // console.log(data);
            if (data == 'success') {
                alert("Product added successfully!!");
               getFrequentlyBoughtProducts();
            }else if(data == 'exist'){
                alert("Already exist");
            }else{
                alert("Something went wrong!!");
            }
        },
        complete: function() {
            $('#addFrequentlyBoughtProductsBtn').text("Save");
            $('#addFrequentlyBoughtProductsBtn').attr("disabled", false);
        },
    });
});

// ! delete frequently bought products
$(document).on("click", "#deleteProductBtn", function () { 
    var btn = $(this);
    var id = $(this).attr('data-delete-id');
    $.ajax({
        url: 'ajax/frequently_bought_products.php',
        type: 'POST',
        data: {
            key: 'delete_frequently_bought_products',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Product deleted successfully!');
                getFrequentlyBoughtProducts();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function() {
            btn.html("<i class='bi bi-trash'></i>");
            btn.attr("disabled", false);
        },
    })
});
window.onload = function(){
    getFrequentlyBoughtProducts();
}