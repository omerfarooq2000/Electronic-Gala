// ! delete items from cart
function deleteFromCart(id){
    $.ajax({
        url: 'ajax/cart.php',
        type: 'POST',
        data: {
            key: 'delete_from_cart',
            id: id,
        },
        success: function(data){
            if(data == 'success'){
                alert("Item deleted successfully!");
                get_cart_data();
                get_cart_price_total();
            }else{
                alert("Something went wrong!");
            }
        }
    })
}

// ! update cart on quantity change
function updateCart(val, u_id, cart_id){
    // alert(pro_id);
    var value = val.value;
    $.ajax({
        url: 'ajax/cart.php',
        method: "POST",
        data: {
            val: value,
            u_id: u_id,
            cart_id: cart_id,
            key: "update_cart"
        },
        beforeSend: function(){
            $("#checkout_btn").html("<span class='spinner-grow spinner-grow-sm me-2'></span>Processing...");
            $("#checkout_btn").addClass("disabled");
        },
        success: function(data){
            if(data == 'success'){
                get_cart_data();
                get_cart_price_total();
            }else{
                alert("Something went wrong");
            }
        },
    })
}

// ! get cart data
function get_cart_data(){
    $.ajax({
        url: "ajax/cart.php",
        type: "POST",
        data: {
            key: 'load_cart',
        },
        success: function(data){
            $("#cart_data").html(data);
        }
    });
}

// ! get cart total
function get_cart_price_total(){
    $.ajax({
        url: "ajax/cart.php",
        type: "POST",
        data: {
            key: "cart_total",
        },
        success: function(data){
            $("#cart_total").html(data);
        }
    })
}