<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>گزارش کاربر ها</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">
    <?php
    if ($mysql=mysqli_connect('localhost:3306' ,'root','','php')){
        $function='SELECT * FROM USERS';
        $run=mysqli_query($mysql,$function);
    }
    else{
        echo'Error' . mysqli_connect_error();
    }

    ?>
</head>

<body>
  <div class="wrapper">

  <div class="table">

    <div class="row header blue">
      <div class="cell">
Username
      </div>
      <div class="cell">
Email
      </div>
      <div class="cell">
Password
      </div>
    </div>
<?php while($result=mysqli_fetch_assoc($run)){ ?>
    <div class="row">
      <div class="cell">
          <?php  echo $result['username'];?>
      </div>
      <div class="cell">
          <?php  echo $result['email']; ?>
</div>
      <div class="cell">
          <?php echo $result['pass']; ?>
      </div>
    </div>
<?php }?>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
