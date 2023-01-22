<?php
    include 'config.php';

    error_reporting(0);

    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['cpassword']);

        if($password == $cpassword){
            $sql = "SELECT * FORM datalogin WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if(!$result->num_rows > 0){
                $sql = "INSERT INTO datalogin (username, email, password)
                        VALUES ('$username', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script>alert('Selamat, regristasi berhasil!')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                }else{
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                }
            }else{
                echo "<script>alert('Woops!, Email Sudah Terdaftar')</script>";
            }
        }else{
          echo  "<script>alert('Woops!, Password tidak sesuai')</script>";
        }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="" method="POST" >
            <input name="Tujuan" type="hidden" value="REGISTER">
            
            <label>Email</label>
            <br>
            <input name="email" type="text" placeholder="Email" value="<?php echo $email?>" required>
            <br>

            <label>Username</label>
            <br>
            <input name="username" type="text" placeholder="Username" value="<?php echo $username?>"required>
            <br>
            
            <label>Password</label>
            <br>
            <input name="password" type="password" placeholder="Password" value="<?php echo $_POST['cpassword']; ?>"required>
            <br>

            <label>Confirm Password</label>
            <br>
            <input name="cpassword" type="password" placeholder="Confirm Password" value="<?php echo $_POST['cpassword']; ?>" required>
            <br>
            
            <button type="submit">Register</button>
            
            <p>
                Sudah punya akun? <a href="login.php">Login</a>
            </p>
        </form>
    </div>
</body>
</html>