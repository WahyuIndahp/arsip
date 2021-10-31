<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'dbarsip';
    $connect = mysqli_connect($host, $user, $password, $db);
    
    mysqli_select_db($connect, $db);
?>