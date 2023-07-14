<?php
include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update admin</h1>
        <br><br>

        <?php
        //Get the ID of the selected Admin
        $id = $_GET["id"];
        //Create sql query
        $sql = "SELECT * FROM table_admin WHERE id = $id";
        //Execute the query
        $res = mysqli_query($conn, $sql);
        //Check
        if ($res == true) {
            $count = mysqli_num_rows($res);
            if ($count == 1) {
                // echo "Admin Available with ID# ". $id;
                $row = mysqli_fetch_assoc($res);
                $full_name = $row['full_name'];
                $username = $row['username'];
            } else {
                header("location:" . SITE_URL . '/admin/add-admin.php');
            }
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td colspan="2">Full Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username ?>"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<!-- Process data in the from to update data in the database -->

<?php
if (isset($_POST['submit'])) {
    // Button Clicked
    // Get data from form
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    // SQL Query to save data into database
    $sql = " UPDATE table_admin SET
    full_name ='$full_name',
    username = '$username' WHERE id='$id'
    ";

    // Execute query
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        header("location:" . SITE_URL . '/admin/manage-admin.php');
    } else {
        $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
        header("location:" . SITE_URL . '/admin/manage-admin.php');
    }
}
?>