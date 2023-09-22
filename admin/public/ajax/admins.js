// ! load admin from db
function getAdmins(){
    $.ajax({
        url: "ajax/admins.php",
        type: "POST",
        data: {
            key: 'get_admins',
        },
        success: function(data) {
            $('#admin_data').html(data);
        },
    });
}

// ! add new admin
$(document).on("submit", "#add_admin_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/admins.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#save_btn").text("Please Wait...");
            $("#save_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert('Admin Added!');
                $("#add_admin_form")[0].reset();
                $(".modal").modal('hide');
                getAdmins();
            }else if (data == 'email_exist') {
                alert('Admin with this email already exist');
            } else if (data == 'error') {
                alert('Something went wrong!');
            } else if (data == 'invalid-img') {
                alert('Invalid image');
            }
        },
        complete: function() {
            $("#save_btn").text("Save");
            $("#save_btn").attr("disabled", false);
        },
    });
});

// ! approve admin
$(document).on("click", "#approveAdmin", function(){
    var btn = $(this);
    var id = btn.attr('data-approve-id');
    $.ajax({
        url: 'ajax/admins.php',
        type: 'POST',
        data: {
            key: 'approve_admin',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Admin approved successfully!');
                getAdmins();
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

// ! delete admin
$(document).on("click", "#deleteAdmin", function(){
    var btn = $(this);
    var id = btn.attr('data-delete-id');
    $.ajax({
        url: 'ajax/admins.php',
        type: 'POST',
        data: {
            key: 'delete_admin',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Admin deleted successfully!');
                getAdmins();
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
    getAdmins();
}