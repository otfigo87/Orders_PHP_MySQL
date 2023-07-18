<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br /><br /><br />


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
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
        
        ?>


    </div>
</div>
<?php include('partials/footer.php'); ?>;