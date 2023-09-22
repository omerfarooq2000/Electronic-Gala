// ! edit account (change password)
$("#edit_account_form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        url: "ajax/account.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#edit_account_btn").html('<span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>Updating...');
            $("#edit_account_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Password updated!");
                location.reload();
            }else if(data == 'inv_old_pass'){
                alert('Old password is wrong');
            }else if(data == 'not_matched'){
                alert('Password not matched');
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function() {
            $("#edit_account_btn").html("<i class='bi bi-arrow-clockwise me-2'></i>Update");
            $("#edit_account_btn").attr("disabled", false);
        },
    });
    
});

// ! edit address
$("#edit_address_form").on("submit", function(e){
    e.preventDefault();
    $.ajax({
        url: "ajax/account.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#edit_address_btn").html('<span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>Updating...');
            $("#edit_address_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert("Address Updated!");
                window.location.reload();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function() {
            $("#edit_address_btn").html("<i class='bi bi-arrow-clockwise me-2'></i>Update");
            $("#edit_address_btn").attr("disabled", false);
        },
    });
    
});

// ! cancel order
$(".cancel_order").on("click", function(){
    var btn = $(this);
    var order_no = $(this).attr("data-cancel-id");
    var user_id = $(this).attr("data-user-id");
    $.ajax({
        url: "ajax/cancel_order.php",
        type: "POST",
        data: {
            order_no: order_no,
            user_id: user_id,
        },
        beforeSend: function(){
            btn.html('<span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>Canceling...');
            btn.attr('disabled', true);
        },
        success: function(data){
            if(data == 'success'){
                alert("Order cancelled successfully!");
                location.reload();
            }else{
                alert("Something went wrong");
            }
        },
        complete: function(){
            btn.html('<i class="bi bi-x-lg"></i> Cancel Order');
            btn.attr('disabled', false);
        }
    });
});