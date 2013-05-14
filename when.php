<?php
include('config.inc');

		$val = mysql_real_escape_string($_POST['idval']);
                $select = mysql_real_escape_string($_POST['sel']);
		$tabledata ="<select name='name' value='' class='drugAad newadd' id='box6_$val'>";
                //substr($var, 0, 2);
                //$value=array("3","2","4","6","8","12","1");
               $time=array("Any Time","After Meal","Before Meal","Bed Time","Wake Up");
               $i=0;
               while($i<4){
                   //$che=$time[$i];
                   //$check=$che[0];
                   //echo $che+"  check";
                   if($time[$i]==$select){
                       
                       $tabledata.="
                   
                    <option selected='selected' value='$time[$i]'>$time[$i]</option>
                
            ";
                   }else{
                $tabledata.="
                   
                    <option value='$time[$i]'>$time[$i]</option>
                
            ";
                   }
            $i++;
                
               }
	$tabledata.="</select></td>";
	echo $tabledata;
	?>