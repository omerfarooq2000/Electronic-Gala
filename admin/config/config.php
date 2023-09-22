<?php 
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $db = 'eg_db';
    
    $con = mysqli_connect($host, $username, $pass, $db);
    
    if (!$con) {
        die("Cannot Connect To Database" . mysqli_connect_error());
    }
?>