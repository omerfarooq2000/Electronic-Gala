$(document).ready(function() {
    // ! Load all products on page load
    loadProducts();

    // ! Triggered when category, brand or color checkboxes change
    $('input[name="categories[]"], input[name="brands[]"], input[name="color[]"]').change(function(){
        loadProducts();
    });

    $('input[name="minPrice"], input[name="maxPrice"]').on("input", function(){
        loadProducts();
    })
})

function loadProducts(){

    // ! Get the category, brand, color, price values

    var minPrice = $('input[name="minPrice"]').val();

    var maxPrice = $('input[name="maxPrice"]').val();

    var brands = $('input[name="brands[]"]:checked').map(function(){ 
        return $(this).val(); 
    }).get().join(',');
    
    var categories = $('input[name="categories[]"]:checked').map(function(){ 
        return $(this).val(); 
    }).get().join(',');

    var color = $('input[name="color[]"]:checked').map(function(){ 
        return "'" + $(this).val() + "'"; 
    }).get().join(',');

    // console.log(color);

    // ! Send AJAX request to get filtered products
    $.ajax({
        url: 'ajax/shop.php',
        method: 'POST',
        data: {
            key: 'filter_products',
            minPrice: minPrice,
            maxPrice: maxPrice,
            categories: categories, 
            brands: brands,
            color: color,
        },
        success: function(data){
            // console.log(data);
        // ! Update the product list with the filtered products
        $('#product_list').html(data);
        }
    });
}