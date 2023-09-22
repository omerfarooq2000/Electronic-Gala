// ! ajax call to delete user queries
$(document).on('click', '#deleteQueries', function(){
    var id = $(this).attr('data-delete-id');
    var btn = $(this);
    $.ajax({
        url: "ajax/user_queries.php",
        type: 'POST',
        data: {
            key: 'delete_user_queries',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
        },
        success: function(data){
            if(data == 'success'){
                alert('Message deleted successfully!');
                load_user_queries();
            }else{
                alert('Something went wrong!')
            }
        },
        complete: function(){
            btn.html('<i class="bi bi-trash"></i>');
        }
    })
});

// ! ajax call to mark as read user queries
$(document).on('click', '#markAsRead', function(){
    var id = $(this).attr('data-read-id');
    var btn = $(this);
    $.ajax({
        url: "ajax/user_queries.php",
        type: 'POST',
        data: {
            key: 'mark_user_queries',
            id: id,
        },
        beforeSend: function() {
            btn.html('<span class="spinner-grow spinner-grow-sm"></span>');
            btn.attr('disabled', true);
        },
        success: function(data){
            if(data == 'success'){
                alert('Marked as read successfully!');
                load_user_queries();
            }else{
                alert('Something went wrong!')
            }
        },
        complete: function(){
            btn.html('<i class="bi bi-hand-thumbs-up"></i>');
            btn.attr('disabled', false);
        }
    })
});

// ! ajax call to view user queries
$(document).on('click', '#viewQueries', function(){
    var id = $(this).attr('data-view-id');
    var btn = $(this);
    $.ajax({
        url: "ajax/user_queries.php",
        type: 'POST',
        data: {
            key: 'view_user_queries',
            id: id,
        },
        beforeSend: function() {
            $('#viewQueryModalBody').html('<div class="d-flex justify-content-center"><span class="spinner-grow spinner-grow-sm my-5" style="width: 3rem; height: 3rem;"></span></div>');
        },
        success: function(data){
            $('#viewQueryModalBody').html(data)
        },
        complete: function(){
            $('#viewQueryModalBody').html(data)
        }
    })
});

// ! ajax call to load user queries
function load_user_queries(){
    $.ajax({
        url: "ajax/user_queries.php",
        type: 'POST',
        data: {
            key: 'load_user_queries',
        },
        success: function(data){
            $("#user_queries_data").html(data);
        }
    })
}
window.onload = function(){
    load_user_queries();
}