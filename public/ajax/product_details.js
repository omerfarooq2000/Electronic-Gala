
// ! select first variation of product by default
var index = $(".get-index .select_variation").eq(0);
index.addClass("active");

var variant_id = $(index).attr('data-variation-id');
var product_id = $(index).attr('data-product-id');
$.ajax({
    url: 'ajax/product_details.php',
    type: 'POST',
    data: {
        variant_id: variant_id,
        product_id: product_id,
        key: 'get_variation_price',
    },
    success: function(data) {
        var variant_data = $.parseJSON(data);
        $("#color").html('Color: ' + variant_data.color);
        $("#price").html('$' + variant_data.price);
        $("#stock").html(variant_data.stock + ' item(s) left');

    },
});

// ! select product image on product details page
$(".img-thumbs-inner").on("click", function() {
    var thumb = $(this).attr("data-img-src");
    $(".img-thumbs-inner").removeClass("active");
    $(this).addClass("active");
    var mainImg = $("#img-main").attr("src");
    $("#img-main").attr("src", thumb);
});


// ! select product variation
$('.select_variation').on('click', function() {
    $('.select_variation').removeClass('active');
    $(this).addClass('active');

    if ($('.select_variation').hasClass('active')) {
        var variant_id = $(this).attr('data-variation-id');
        var product_id = $(this).attr('data-product-id');
        $.ajax({
            url: 'ajax/product_details.php',
            type: 'POST',
            data: {
                variant_id: variant_id,
                product_id: product_id,
                key: 'get_variation_price',
            },
            beforeSend: function() {
                $("#add_to_cart_btn").html('Please Wait...');
                $("#add_to_cart_btn").attr('disabled', true);
            },
            success: function(data) {
                var variant_data = $.parseJSON(data);
                $("#color").html('Color: ' + variant_data.color);
                $("#price").html('$' + variant_data.price);
                $("#stock").html(variant_data.stock + ' item(s) left');
            },
            complete: function() {
                $("#add_to_cart_btn").html('<i class="bi bi-cart-plus me-2"></i>Add To Cart');
                $("#add_to_cart_btn").attr('disabled', false);
            }
        });
    } else {
        alert("Please select product variant");
    }
});

// ! Add to cart
function addToCart(pro_id, u_id) {
    if (u_id == 0) {
        alert("Please login to add to cart");
    } else {
        var qty = $("#qty").val();
        if ($('.select_variation').hasClass('active')) {
            var variation_id = $('.select_variation.active').attr('data-variation-id');
            $.ajax({
                url: 'ajax/product_details.php',
                type: "POST",
                data: {
                    pro_id: pro_id,
                    u_id: u_id,
                    variation_id: variation_id,
                    qty: qty,
                    key: 'add_to_cart',
                },
                beforeSend: function() {
                    $("#add_to_cart_btn").html('<span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>Processing...');
                    $("#add_to_cart_btn").attr('disabled', true);
                },
                success: function(data) {
                    if (data = 'success') {
                        alert('Product added into cart successfully!');
                        window.open("cart.php", "_self");
                    } else {
                        alert('Something went wrong, please try again later');
                    }
                },
                complete: function() {
                    $("#add_to_cart_btn").html('<i class="bi bi-cart-plus me-2"></i>Add To Cart');
                    $("#add_to_cart_btn").attr('disabled', false);
                }
            });
        } else {
            alert("Please select product variant");
        }
    }
}