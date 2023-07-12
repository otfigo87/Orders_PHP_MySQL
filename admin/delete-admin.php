<?php 
include('../config/constants.php');

//1. Get the ID of Admin to Delete
$id = $_GET['id'];

//2. Create SQL Query to Delete Admin
$sql = " DELETE FROM table_admin WHERE id=$id ";

$res = mysqli_query($conn, $sql);

if($res == true) {
    //Admin deleted
    // echo "Admin deleted";
    $_SESSION['delete'] = "Admin Deleted Successfully";
    header("location:" . SITE_URL . '/admin/manage-admin.php');
} else {
    // echo "Failed to delete Admin";
    $_SESSION['delete'] = "Failed to delete Admin";
}


//3. Redirect to Manage Admin Page with Message

?>