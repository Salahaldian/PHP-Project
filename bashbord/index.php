<?php

include 'includess/conniction.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
       header("Location: index2.php");
}

if (isset($_POST['submit'])) {
    $user = $_POST['user'];
    $password = md5($_POST['password']);
    isset($_POST['status']) ? $status=$_POST['status'] : $status=0;

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
     if($row['status']=="0"){
            header("Location: notfound.php");
   }
      $_SESSION['username'] = $row['username'];
        header("Location: index2.php");
    
    
    } else {
        echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="style2.css">

    <title>Login Form - Pure Coding</title>
</head>
<body>
<div class="container">
    <form action="" method="POST" class="login-email">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
        <div class="input-group">
            <input type="text" placeholder="Username" name="user" value="<?php echo $user; ?>" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
        </div>



        <div class="input-group">
            <button name="submit" class="btn">Login</button>
        </div>
        <p class="login-register-text">Don't have an account?
            <a href="register.php">Register Here</a>.
        </p>
    </form>
</div>
</body>
</html>