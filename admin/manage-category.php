<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Category</h1>

        <br /> <br>

         <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; 
            unset($_SESSION['add']); // Remove Session message
        }
        ?>
        
        <br><br>

        <a href="<?php echo SITE_URL; ?>admin/add-category.php" class="btn-primary">Add Category</a>
        <br /><br /><br />

        <table class="tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>1.</td>
                <td>Otmane</td>
                <td>otmane</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Otmane</td>
                <td>otmane</td>
                <td>
                    <a href="#" class="btn-secondary">Update Admin</a>
                    <a href="#" class="btn-danger">Delete Admin</a>
                </td>
            </tr>

        </table>
    </div>

</div>

<?php include('partials/footer.php'); ?>