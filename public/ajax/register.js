// ! User Registration Form Script
$(document).on("submit", "#register_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/register.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#register_btn").text("Please Wait...");
            $("#register_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert('Registration Successful');
                window.open('login.php', '_self');
                $("#register_form")[0].reset();
            }else if (data == 'not_matched') {
                alert('Password did not match');
            } else if (data == 'email_exist') {
                alert('User with this email already exist');
            } else if (data == 'error') {
                alert('Something went wrong!');
            } else if (data == 'invalid-img') {
                alert('Invalid image');
            }
        },
        complete: function() {
            $("#register_btn").text("Register");
            $("#register_btn").attr("disabled", false);
        },
    });
});