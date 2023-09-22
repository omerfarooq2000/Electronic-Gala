// ! admin login
$(document).on("submit", "#login_form", function(e) {
    e.preventDefault();
    $.ajax({
        url: "ajax/login.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#login_btn").html("Logging in... <span class='spinner-grow spinner-grow-sm'></span>");
            $("#login_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                window.open('index.php', '_self');
            }else if(data == 'not_approved'){
                alert('Account not approved yet!');
            } 
            else{
                alert('Invalid email or password!!');
            }
        },
        complete: function() {
            $("#login_btn").html("Login");
            $("#login_btn").attr("disabled", false);
        },
    });
});