<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br /><br /><br />

        
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add']; 
            unset($_SESSION['add']); // Remove Session message
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']); // Remove Session message
        }
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> YES
                        <input type="radio" name="featured" value="No"> NO
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name="active" value="Yes"> YES
                        <input type="radio" name="active" value="No"> NO
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        if(isset($_POST['submit'])){
            // Button clicked => Get values from the form
            $title = $_POST['title'];
            //Check Radio input
            if(isset($_POST['featured'])){
                $featured = $_POST['featured'];
            }else{
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } else {
                $active = "No";
            }

            // Check if image selected
            // print_r($_FILES['image']);
            // die(); 

            if(isset($_FILES['image']['name'])){
                //Upload image
                $image_name = $_FILES['image']['name'];
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/category/" . $image_name;
                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload == false){
                    $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                    header('location:' . SITE_URL . 'admin/add-category.php');
                    die();
                }
            }else {
                // No Image
                $image_name = "";
            }

            //SQL Queries
            $sql = "INSERT INTO table_category SET 
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
            ";

            $res = mysqli_query($conn, $sql);

            if($res == true){
                $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                header('location:'.SITE_URL.'admin/manage-category.php');
            } else {
                $_SESSION['add'] = "<div class='error'>Failed to Add.</div>";
                header('location:' . SITE_URL . 'admin/add-category.php');
            }
        }
        ?>


    </div>
</div>
<?php include('partials/footer.php'); ?>;