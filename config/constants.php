<?php

//Create constants to store NO repeating values
define('SITE_URL', 'http://localhost/food-order-php');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'otmane');
define('DB_PASSWORD', '1234');
define('DB_NAME', 'food-order');

//db Connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME , DB_PASSWORD ) or die(mysqli_error());

 //Select database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
 

//Start Session
session_start();
