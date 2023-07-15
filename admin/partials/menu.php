<!-- Connection to Database -->
<?php include('../config/constants.php'); ?>
<!-- Connection to Database -->

<?php
// Authorization - access control
// Check if the user is logged in or not

if (!isset($_SESSION["user"])) { //if user session is not set
    //user is not logged in
    $_SESSION["no-login-message"] = "<div class='error'>Please login to access Admin Panel.</div>";
    //Redirect
    header('location:' . SITE_URL . 'admin/login.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <link rel="stylesheet" href="../css/admin.css" />
</head>

<body>
    <!-- Menu Section -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li> <a href="index.php">Home</a></li>
                <li> <a href="manage-admin.php">Admin</a></li>
                <li> <a href="manage-category.php">Category</a></li>
                <li> <a href="manage-food.php">Food</a></li>
                <li> <a href="manage-order.php">Order</a></li>
                <li> <a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>