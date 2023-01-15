<?php 
    session_start();
    include "../config.php";
    if(isset($_POST['submit'])){
        $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$_POST[username]' && password = '$_POST[password]'");

        $cek = mysqli_num_rows($sql);
        if($cek > 0){
            $_SESSION['username'] = $_POST['username'];
            header("location: ../index.php");
        }else{
            echo '<script>alert("Username atau password anda salah!")</script>';
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <!-- <div class="alert alert-warning" role="alert">
        <?php //echo $_SESSION['error'] ?>
    </div> -->
    <div class="container">
        <div class="login">
            <form action="" method="post">
                <h1>Login</h1>
                <hr>
                <p>Admin Perpus</p>
                 <label for="">Username</label>
                 <input type="text" name="username" placeholder="username" id="username">
                 <label for="">Password</label>
                 <input type="password" placeholder="password" name="password" id="password">

                 <button type="submit" name="submit">Login</button>

                 <p><a href="#">Forgot Password</a></p>
            </form>
        </div>
        <div class="right">
            <img src="../assets/img/library.jpg" alt="gambar (〜￣▽￣)〜">
         </div>
    </div>
</body>
</html>