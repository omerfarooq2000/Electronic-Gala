$("#send_message_form").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        url: "ajax/send_message.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#send_message_btn").html('<span class="spinner-grow spinner-grow-sm me-2" role="status" aria-hidden="true"></span>Sending Message...');
            $("#send_message_btn").attr("disabled", true);
        },
        success: function(data) {
            if (data == 'success') {
                alert('Message sent successfully');
                $("#send_message_form")[0].reset();
            }
            if(data == 'exist'){
                alert('Message already sent!');
            }
            if(data == 'error'){
                alert('Something went wrong!');
            }
        },
        complete: function() {
            $("#send_message_btn").html('Send Message <i class="ms-2 bi bi-send"></i>');
            $("#send_message_btn").attr("disabled", false);
        },
    });
});