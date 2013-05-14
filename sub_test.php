<?php
include('config.inc');
session_start();
//$pres=$_SESSION['pres'];
$val = mysql_real_escape_string($_POST['idval']);

     
    $tabledata ="";        
                $id=$val;
              $rest=  mysql_query("select * from sub_test where cat_id='$id'");
            $tabledata.="<select class='sub_test'multiple='' size='10'>";
               while($row2=  mysql_fetch_array($rest)){
                   $name=$row2['name'];
                    $new=$row2['id'];
            
                
                  $tabledata.="  
                   <option value='$new'class='sub' id='$new'>&nbsp;$name&nbsp;&nbsp;</option>";
            
                 
               }
                $tabledata.="</select>";
        
        
	
	echo $tabledata;
        

