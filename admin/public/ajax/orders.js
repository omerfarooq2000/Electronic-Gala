function getAllOrders(){
    $.ajax({
        url: "ajax/orders.php",
        type: 'POST',
        data: {
            key: 'get_all_orders',
        },
        success: function(data){
            $('#all_orders_data').html(data);
        }
    });
}
function getPendingOrders(){
    $.ajax({
        url: "ajax/orders.php",
        type: 'POST',
        data: {
            key: 'get_pending_orders',
        },
        success: function(data){
            $('#pending_orders_data').html(data);
        }
    });
}
function getProcessingOrders(){
    $.ajax({
        url: "ajax/orders.php",
        type: 'POST',
        data: {
            key: 'get_processing_orders',
        },
        success: function(data){
            $('#processing_orders_data').html(data);
        }
    });
}
function getDeliveredOrders(){
    $.ajax({
        url: "ajax/orders.php",
        type: 'POST',
        data: {
            key: 'get_delivered_orders',
        },
        success: function(data){
            $('#delivered_orders_data').html(data);
        }
    });
}
function getCanceledOrders(){
    $.ajax({
        url: "ajax/orders.php",
        type: 'POST',
        data: {
            key: 'get_canceled_orders',
        },
        success: function(data){
            $('#canceled_orders_data').html(data);
        }
    });
}


window.onload = function () { 
    getAllOrders();
    getPendingOrders();
    getProcessingOrders();
    getDeliveredOrders();
    getCanceledOrders();
}