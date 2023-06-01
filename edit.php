<!DOCTYPE html>
<?php
if (isset($_GET['id'])==false){
    header('Location: database.php');
    die();
}
$mysql = mysqli_connect('localhost:3306', 'root', '', 'php');
    $function = mysqli_prepare($mysql,"select * from users where id = ?");
    $id=(int) $_GET['id'];
    mysqli_stmt_bind_param($function,'i',$id);
    mysqli_stmt_execute($function);
    $result=mysqli_stmt_get_result($function);
    if($result->num_rows==0){
        header('Location: database.php');
        die();
    }
    $user=mysqli_fetch_assoc($result);
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and ! is_null($user)) {
            if(isset($_POST['btn'])==true) {
            $function = mysqli_prepare($mysql, "update users set username=? , email=?, pass=? where id =?");
            mysqli_stmt_bind_param($function, 'sssi', $_POST['username'], $_POST['email'], $_POST['password'], $user['id']);
            mysqli_stmt_execute($function);
            header('Location:database.php');
            }
            if (isset($_POST['btn1'])==true) {
                $function1 = mysqli_prepare($mysql, "DELETE FROM USERS WHERE id =?");
                mysqli_stmt_bind_param($function1,'i',$user['id']);
                mysqli_stmt_execute($function1);
                header('Location:database.php');
            }
        }
?>
<html>
<head>
    <title>ویرایش اطلاعات</title>
</head>
<body>
        <form action="edit.php?id=<?= $user['id']; ?>" method="post">
            <label>نام کاربری:</label>
            <input type="text" name="username" value='<?php echo $user['username']?>'>
            <br>
            <br>
            <label>ایمیل:</label>
            <input type="email" name="email" value='<?php echo $user['email']?>'>
            <br>
            <br>
            <label>رمز عبور:</label>
            <input type="password" name="password" value='<?php echo $user['pass']?>'>
            <br>
            <br>
            <button type="submit" name="btn"><b>ویرایش</b></button>
            <button type="submit" name="btn1"><b>حذف</b></button>
        
        </form>
</body>
</html>
