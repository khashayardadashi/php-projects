<?php
function calculator($a,$b,$c){
    if($b=='+'){
        echo $a+$c;
    }
    elseif($b=='/'){
        echo $a/$c;
    }
    elseif($b=='-'){
        echo $a-$c;
    }
    elseif($b=='*'){
        echo $a*$c;
    }
    elseif($b=='**'){
        echo $a**$c;
    }
    else{
        echo'مقدار وارد شده درست نیست مجددا وارد کنید';
    }
}
calculator(100,'**',2)
?>
