<?php
include('config.inc');

		$val = mysql_real_escape_string($_POST['idval']);
                $select = mysql_real_escape_string($_POST['sel']);
		$tabledata ="<select name='name' value='' class='drugAad newadd cont' id='box5_$val'>";

                 $time=array("Days","Week","Months","Year","Continue");
               $i=0;
               while($i<5){
                   $che=$time[$i];
                   $check=$che[0];
                   //echo $che+"  check";
                   if($check==$select){
                       
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
