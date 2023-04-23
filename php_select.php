<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<select>
    <?php
    $i=1300;
    while($i!=1403){
        echo '<option>'.$i.'</option>';
        if ($i==1402){
            break;
        }
        else{
            $i++;
        }
    }
    ?>
</select>
</body>
</html>
