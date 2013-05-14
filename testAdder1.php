<html><head><script type="text/javascript" src="js.r/test_new.js"></script> 
    <style>
        #test{width:200px;}.sub_test{width:200px;}#sends{width:200px;}.cat{width:200px;}#source{width:200px;}
        </style>
    </head>
<?php
//session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
        $sql1="SELECT * FROM prescription_test WHERE id = (SELECT MAX(id) FROM prescription_test)";
        $pres_id=$_SESSION['pres'];
$adder=mysql_query($sql1);
$add=0;
while($row1 = mysql_fetch_array($adder)) 
{
$add=$row1['id'];
}
if($add==0){
    $add=1;
}
$pre=  mysql_query("select * from prescription_test where pres_id=$pres_id");
        $p1=  mysql_fetch_array($pre);
        $pre=$p1['pres_id'];
        if($pre==""){
            $test=0;
        }else{
            $test=1;
        }
if($test==0){

        $sql = "SELECT * from cat_test";
        $result=mysql_query($sql);
        $finaldata = "";
    $tabledata="";
    $tabledata.="<tr><td><div class='catagorey'> 
    <select id='source' multiple='' size='10' >";
        while($row = mysql_fetch_array($result)) {
           $name= $row['name'];
           $val=$row['id'];
             $tabledata.= "<option value='$val' class='cat' id='$val'>&nbsp;&nbsp;$name&nbsp;&nbsp;</option>";
}
         $tabledata.="</select></div></td><td></td>";
         $tabledata.="<td class='subs'><select multiple=''class='sub_test' size='10'><option></option></select></td></tr>";
         $tabledata.="<tr><td class='real'><select id='test' multiple='' size='10'><option></option></select></td>";
          $tabledata.="<td valign='center'><a href='#' class='add_t'id='$add'>ADD</a><br></br><a href='#'class='r_box'>Remove</a></td>";
          $tabledata.="<td id='solo'><select id='sends' multiple='' size='10'><option></option></select></td></tr>";
            
          echo $finaldata = "<center><table id='c_com_adder'width='40%'>". $tabledata ."</table></center>";


}else{
    $finaldata="Test Names:";
    $tablehead="<tr><th class='gridH'>Test Name</th><th class='gridH'>Delete</th></tr>";
   $oldData="";
$sql_1 = "SELECT * from prescription_test where pres_id=$pres_id";
 $result_1=mysql_query($sql_1);
while($row_1 = mysql_fetch_array($result_1)) {
    
           $id= $row_1['test_id'];
           //echo "$id";
          $sql_2="SELECT * from test where id=$id";
           $lol=mysql_query($sql_2);
           while($row_2 = mysql_fetch_array($lol)) {
                 $name=$row_2['name'];
                 $oldData.= "<tr><td class='gridB'>$name </td><td class='gridB'><a href='#' class='remove_test' id='$id'>X</a></td></tr>";
           }
           
}
echo $finaldata = "<center><table id='c_com_adder'width='40%'>". $tablehead.$oldData ."</table></center>";
echo "<a href='#' class='show_again'>ADD</a>";

}
?>    <div class='latest_test'>
        <?php
        $sql = "SELECT * from cat_test";
        $result=mysql_query($sql);
        $finaldata = "";
    $tabledata="";
    $tabledata.="<tr><td><div class='catagorey'> 
    <select id='source' multiple='' size='10' >";
        while($row = mysql_fetch_array($result)) {
           $name= $row['name'];
           $val=$row['id'];
             $tabledata.= "<option value='$val' class='cat' id='$val'>&nbsp;$name&nbsp;</option>";
}
         $tabledata.="</select></div></td><td></td>";
         $tabledata.="<td class='subs'><select multiple='' class='sub_test'size='10'></select></td></tr>";
         $tabledata.="<tr><td class='real'><select multiple='' id='test'size='10'></select></td>";
          $tabledata.="<td valign='center'><a href='#' class='add_t'id='$add'>ADD</a><br></br><a href='#' class='r_box'>Remove</a></td>";
          $tabledata.="<td id='solo'><select id='sends' multiple='' size='10'></select></td></tr>";
            
          echo $finaldata = "<center><table id='c_com_adder'width='40%'>". $tabledata ."</table></center>";

?>
 </div>