<?php
    session_start();

    define('SITEURL', 'http://localhost/food-order/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'food-order');
     $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASS);
    $db_select = mySqli_select_db($conn, DB_NAME);
?>