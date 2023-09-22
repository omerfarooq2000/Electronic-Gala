$(document).on("submit", "#add_review_form", function(e){
    e.preventDefault();
    $.ajax({
        url: "ajax/tracking.php",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $("#add_review_btn").html('<span class="spinner-grow spinner-grow-sm me-3" role="status" aria-hidden="true"></span>Please wait...');
            $("#add_review_btn").attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert("Review added successfully");
                $("#add_review").modal("hide");
                $("#add_review_form")[0].reset();
            }else{
                alert("Something went wrong!");
            }
        },
        complete: function(){
            $("#add_review_btn").html('Add Review');
            $("#add_review_btn").attr("disabled", false);
        }
    })
});