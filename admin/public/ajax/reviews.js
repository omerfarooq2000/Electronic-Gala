// ! load all reviews from db
function getAllReview(){
    $.ajax({
        url: "ajax/reviews.php",
        type: "POST",
        data: {
            key: 'get_all_reviews',
        },
        success: function(data) {
            $('#all_review_data').html(data);
        },
    });
}

// ! load pending reviews from db
function getPendingReview(){
    $.ajax({
        url: "ajax/reviews.php",
        type: "POST",
        data: {
            key: 'get_pending_reviews',
        },
        success: function(data) {
            $('#pending_review_data').html(data);
        },
    });
}

// ! load approved reviews from db
function getApprovedReview(){
    $.ajax({
        url: "ajax/reviews.php",
        type: "POST",
        data: {
            key: 'get_approved_reviews',
        },
        success: function(data) {
            $('#approved_review_data').html(data);
        },
    });
}

// ! load disapproved reviews from db
function getDisapprovedReview(){
    $.ajax({
        url: "ajax/reviews.php",
        type: "POST",
        data: {
            key: 'get_disapproved_reviews',
        },
        success: function(data) {
            $('#disapproved_review_data').html(data);
        },
    });
}

// ! approve review
$(document).on("click", "#approve", function(){
    var btn = $(this);
    var id = btn.attr('data-approve-id');
    $.ajax({
        url: 'ajax/reviews.php',
        type: 'POST',
        data: {
            key: 'approve_review',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Review approved successfully!');
                getAllReview();
                getPendingReview();
                getApprovedReview();
                getDisapprovedReview();
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

// ! disapprove review
$(document).on("click", "#disapprove", function(){
    var btn = $(this);
    var id = btn.attr('data-disapprove-id');
    $.ajax({
        url: 'ajax/reviews.php',
        type: 'POST',
        data: {
            key: 'disapprove_review',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr("disabled", true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Review disapproved successfully!');
                getAllReview();
                getPendingReview();
                getApprovedReview();
                getDisapprovedReview();
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

// ! push clicked brand in edit modal
$(document).on('click', '#view_review', function(){
    var id = $(this).attr('data-review-id');
    $.ajax({
        url: "ajax/reviews.php",
        type: 'POST',
        data: {
            key: 'view_review',
            id: id,
        },
        beforeSend: function() {
            $('#view_review_data').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#view_review_data').html(data);
        },
    })
});

window.onload = function(){
    getAllReview();
    getPendingReview();
    getApprovedReview();
    getDisapprovedReview();
}