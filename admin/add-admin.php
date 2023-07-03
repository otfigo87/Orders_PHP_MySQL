<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder=" Username"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<!-- Process data from the Form and save it in the MySql database -->
<?php

// Check whether the submit button is clicked
if (isset($_POST['submit'])) {
    // Button Clicked
    // Get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //password Encrypted with md5

    // SQL Query to save data into database
    $sql = " INSERT INTO table_admin SET
    full_name ='$full_name',
    username = '$username',
    password='$password'
    ";

    // Execute query

    $res = mysqli_query($conn, $sql) or die(mysqli_error()); //$conn is in the config file

    // Check whether the data is inserted or not and display message

    if ($res) {
        // echo 'Data inserted';
        // Create a session to display message
        $_SESSION['add'] = "Admin Added Successfully";
        // And Redirect Page to Manage Admin Page
        header("location:" . SITE_URL . '/admin/manage-admin.php');
    } else {
        // echo 'failed to insert data';
        // Create a session to display message
        $_SESSION['add'] = "Failed to add Admin";
        // And Redirect Page to Manage Add Admin Page
        header("location:" . SITE_URL . '/admin/add-admin.php');
    }
}

?>