<?php
include('config.inc');

$val = mysql_real_escape_string($_POST['idval']);
$select = mysql_real_escape_string($_POST['sel']);
$tabledata ="<select name='name' value='' class='drugAad newadd' id='box5_$val'>";

$time=array("Days","Week","Months","Year");
$i=0;
while($i<4){

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
