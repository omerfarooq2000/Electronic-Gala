$(document).ready(function() {
    $("#add_selected_to_cart_form").on("submit", function(e){
        e.preventDefault();
        $.ajax({
            url: "ajax/add_selected_to_cart.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function(){
                $("#add_selected_to_cart_btn").html('<span class="spinner-grow spinner-grow-sm me-3" role="status" aria-hidden="true"></span>Please wait...');
                $("#add_selected_to_cart_btn").attr("disabled", true);
            },
            success: function(data){
                if(data == 'success'){
                    window.open("cart.php", "_self");
                }else if(data == 'exist'){
                    alert("Already exist. you cannot add these items more then 1");
                }else if(data == 'require_login'){
                    alert("Please login to add to cart!");
                }else{
                    alert("Something went wrong!");
                }
            },
            complete: function(){
                $("#add_selected_to_cart_btn").html('Add selected to cart');
                $("#add_selected_to_cart_btn").attr("disabled", false);
            }
        })
    });
});