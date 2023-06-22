		<?php 
			$d=strtotime("today");
			$user = wp_get_current_user();
			$roles =$user->roles;
			 if(date("Y-m-d",$d)=="2023-07-30" and $roles[0]=="subscriber"){
			header("Location:https://khashayaar.ir");}
		?>
<br>
<br>
<hr>
<div>	
  <table>
      <tr>
        <th>وضعیت اکانت</th>
         <td><?php 
			 $d=strtotime("today");
			 if(date("Y-m-d",$d)=="2023-07-30"){
			echo "زمان اشتراک شما به پایان رسیده"; 
			 }
			 else{
				 echo "فعال";
				 }
			 ?>
		  </td>
      </tr>
      <tr>
        <th>زمان اتمام اشتراک</th>
        <td>
			<?php
			echo '2023-07-30'
			;?>
		</td>
      </tr>
  </table>
