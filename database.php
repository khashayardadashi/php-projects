<!doctype html>
<?php
if(isset($_POST['btn'])==true){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
}
$connect=mysqli_connect('localhost:3306','root','khashayar1383',
    'php');
$sql="INSERT INTO users (username,email,pass) VALUES ('$username','$email','$password') ";
mysqli_query($connect,$sql);
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>khashayar.ir</title>
</head>
<body>
<div class='main'>
    <div class="right">
        <form action="" method="post">
            <label>نام کاربری:</label>
            <input type="text" name="username">
            <label>ایمیل:</label>
            <input type="email" name="email">
            <label>رمز عبور:</label>
            <input type="password" name="password">
            <button  class='btn' type="submit" name="btn"><b>ورود</b></button>
            <button class='btn' type="submit"><b>ثبت نام</b></button>
        </form>
    </div>
    <div class="left">
        <img src='home-page-top.webp'>
    </div>
</div>
<footer>
    <div class="footer1">
        تمام حقوق سایت محفوظ است
    </div>
</footer>
</body>
</html>
