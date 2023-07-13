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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include('./partials/footer.php'); ?>