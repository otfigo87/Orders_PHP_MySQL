<!-- to access $conn -->
<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

    <div class="login">
        <h1>Login</h1>
        <br><br>
        <?php 
        if(isset($_SESSION["login"])){
            echo $_SESSION["login"];
            unset($_SESSION["login"]);
        }
        ?>
        <br>

        <form action="" method="POST">
            <label for="username">Username:</label> <br>
            <input type="text" name="username" id="username" placeholder="Enter username"> <br><br>
            <label for="password">Password:</label> <br>
             <input type="password"  id="password" name="password" placeholder="Enter password"> <br><br>

             <input type="submit" name="submit" value="Login" class="btn-primary"><br>
        </form>
        <br><br>
        <p>Created By - <a href="https://otmaneaatik.netlify.app">Otmane</a></p>
    </div>

</body>

</html>

<?php 

if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "SELECT * FROM table_admin WHERE username = '$username' AND password = '$password'";
    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if($count == 1){
        $_SESSION["login"] = "<div class='success'>Login Successful</div>";
        header("location:" . SITE_URL . '/admin/');
    } else {
        // User not Found
        $_SESSION["login"] = "<div class='error'>User not found</div>";
        header("location:" . SITE_URL . '/admin/login.php');
    }
}
?>