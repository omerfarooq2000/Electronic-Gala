// ! load users from db
function getUsers(){
    $.ajax({
        url: "ajax/users.php",
        type: "POST",
        data: {
            key: 'get_users',
        },
        success: function(data) {
            $('#user_data').html(data);
        },
    });
}

// ! approve users
$(document).on("click", "#approveUser", function(){
    var btn = $(this);
    var id = btn.attr('data-approve-id');
    $.ajax({
        url: 'ajax/users.php',
        type: 'POST',
        data: {
            key: 'approve_user',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('User approved successfully!');
                getUsers();
            }else{
                alert('Something went wrong!');
            }
        },
        complete: function() {
            btn.html("<i class='bi bi-hand-thumbs-up'></i>");
            btn.attr("disabled", false);
        },
    })
});

// ! delete users
$(document).on("click", "#deleteUser", function(){
    var btn = $(this);
    var id = btn.attr('data-delete-id');
    $.ajax({
        url: 'ajax/users.php',
        type: 'POST',
        data: {
            key: 'delete_user',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('User deleted successfully!');
                getUsers();
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
    getUsers();
}