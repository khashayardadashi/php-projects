<?php
if (isset($_FILES['image'])) {
    if (file_exists($_FILES['image']['tmp_name'])) {
        $path = 'photo/';
        $path .=$_FILES['image']['name'];
        if (is_dir('photo/')==true){
            pass;
        }
        else{
            mkdir('photo/');
        }
        if (move_uploaded_file( $_FILES['image']['tmp_name'],$path)){
            echo $path;
        }
        else{
            echo'file can not uploaded';
        }
    } else {
        echo 'Error';
    }
}
else{
    echo 'ERROR';
}
