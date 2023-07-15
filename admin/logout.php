<?php 
include('../config/constants.php');

// Destroy the session and redirect to login page

session_destroy();

header("location:" . SITE_URL . '/admin/login.php');
