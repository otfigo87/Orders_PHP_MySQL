<?php

//Create constants to store NO repeating values
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'otmane');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME , DB_PASSWORD ) or die(mysqli_error()); //db Connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Select db

?>