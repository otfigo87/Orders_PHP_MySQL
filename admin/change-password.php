<?php include('./partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br><br>

        <?php 
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Old Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password" required>
                    </td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password" required>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </td>
                </tr>
                <tr>
                    <td col-span="2">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>" > 
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit'])){
    // Get Data
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    // Check user Id and Current password exists or not
    $sql = "SELECT * FROM table_admin WHERE id=$id AND password='$current_password'";
    $res = mysqli_query($conn, $sql);

    if ($res == true) {
        $count = mysqli_num_rows($res);

        if($count == 1){
            // user exist and password can be changed
            // echo "User Found";
            if($new_password==$confirm_password){
                //UPDATE PASSWORD
                $sql2 = "UPDATE table_admin SET password='$new_password' WHERE id=$id";
                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true) {
                    $_SESSION['password-change'] = "<div class='success'>Password Changed successfully </div>";
                    header("location:" . SITE_URL . '/admin/manage-admin.php');
                }else{
                    $_SESSION['password-change'] = "<div class='error'>Failed to change </div>";
                    header("location:" . SITE_URL . '/admin/manage-admin.php');
                }

            }else {
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Did Not Match!</div>";
                header("location:" . SITE_URL . '/admin/manage-admin.php');
            }
            }else {
            $_SESSION['user-not-found'] = "<div class='error'>User Not Found!</div>";
            header("location:" . SITE_URL . '/admin/manage-admin.php');
        }
    }
}

?>


<?php include('./partials/footer.php'); ?>