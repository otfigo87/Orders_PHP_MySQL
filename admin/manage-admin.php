<?php include('partials/menu.php'); ?>

<!-- Main content -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br /><br />

        <?php
        //ADD MESSAGE
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; // Display Session message
            unset($_SESSION['add']); // Remove Session message
        }

        //DELETE MESSAGE
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }

        //UPDATE MESSAGE
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }

        //Password Change MESSAGES
        if (isset($_SESSION['user-not-found'])) {
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
        }
        if (isset($_SESSION['pwd-not-match'])) {
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
        }
        if (isset($_SESSION['password-change'])) {
            echo $_SESSION['password-change'];
            unset($_SESSION['password-change']);
        }
        ?>

        <br /><br />

        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php

            $sql = "SELECT * FROM table_admin"; //Query
            $res = mysqli_query($conn, $sql); //Execute query

            if ($res == TRUE) {
                // counts Rows to check if we have data in our DB
                $count = mysqli_num_rows($res);

                $sn = 0; // create variable to use for S.N

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        //data in our table
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                        $sn++;
                        //Display the values in our table
            ?>
                        <tr>
                            <td><?php echo $sn; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITE_URL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITE_URL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITE_URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>

                            </td>
                        </tr>

            <?php
                    }
                } else {
                    //No Data in DataBase
                }
            }


            ?>


        </table>
    </div>
</div>

<!-- Footer Section -->
<?php include('partials/footer.php'); ?>