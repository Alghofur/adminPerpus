<?php
    include '../config.php';

    error_reporting(0);

    session_start();

    if (isset($_SESSION['username'])){
        header("Location: ../index.php");
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql ="SELECT * FROM admin WHERE email='$email' AND password = '$password'";
        $result = mysqli_query($koneksi, $sql);
        if ($result -> num_rows > 0){
            $row = mysqli_query_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: ../index.php");
        }else{
            echo "<script>alert('Email atau password anda salah. Silahkan coba lagi')</script>";
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
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error'] ?>
    </div>
    <div class="container">
        <div class="login">
            <form action="">
                <h1>Login</h1>
                <hr>
                <p>Admin Perpus</p>
                 <label for="">Email</label>
                 <input type="text" name="email" placeholder="example@gmail.com">
                 <label for="">Password</label>
                 <input type="text" placeholder="password" name="password" id="">

                 <button>Login</button>

                 <p><a href="#">Forgot Password</a></p>
            </form>
        </div>
        <div class="right">
            <img src="../assets/img/library.jpg" alt="gambar (〜￣▽￣)〜">
         </div>
    </div>
</body>
</html>