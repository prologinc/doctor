<html><head>
        <script type="text/javascript" src="js.r/testCheck.js"></script> </head><body>
<div class="check">
<?php
include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
        $id=$_SESSION['pid'];
        $pres_id=$_SESSION['pres'];
        // $rk=$_SESSION['vital'];
        $sql = "SELECT * from app where pid=$id ORDER BY date DESC";
         $query=mysql_query($sql);
         $var="";
         $default="<tr><th class='gridH'>Checked</th><th class='gridH'>Test Name</th></tr>";
         while ($row1 = mysql_fetch_array($query)) {
             $pres_old=$row1['id'];
             //$date=$row1['date'];
                 $sql = mysql_query("SELECT * from prescription_test where pres_id=$pres_old && checked=0");
                while ($row1 = mysql_fetch_array($sql)) {
                    $real_id=$row1['id'];
                    $t_id=$row1['test_id'];
                    $his=mysql_query("select * from test where id='$t_id'");
                    $h=mysql_fetch_array($his);
                        $did=$h['name'];
                    if($pres_old!=$pres_id){
                           $var.= "<tr><td class='gridB'><input type='checkbox' class='update_me' id='$real_id'></td><td class='gridB'>$did</td></tr>";                                          
                        }         
             }  
         }
         if($var!=""){
        echo $finaldata = "<center><table id='hist_tab' width='50%'>".$default . $var ."</table></center>";
         }else{
             echo"NO Pending INV";
         }
?>
    </div>
</body>