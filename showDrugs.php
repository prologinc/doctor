<?php
   session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
$limit=$_GET['limit'];
$p_id=$_SESSION['pid'];
$sql = "SELECT * from app where pid=$p_id";
$result=mysql_query($sql);
$tableHead="<tr><th class='gridH'>Drug Name</th><th class='gridH'>From When</th><th class='gridH'>Dose</th><th class='gridH'>Currently</th></tr>";
$tableData="";

while($row = mysql_fetch_array($result))
{
    $who=htmlentities($row['id']);
    $date=htmlentities($row['date']);
    $sql1 = "SELECT * from prescription where pres_id=$who";
    $result1=mysql_query($sql1);
    while($query = mysql_fetch_array($result1))
    {
       
        $drug_id=htmlentities($query['d_id']);
        $dose=htmlentities($query['dose']);
        $nDay=htmlentities($query['nodays']);
        if($nDay=='Continue'){
            $rest="Yes";
        }
        else{
        $num=substr($nDay, 0, 1);
        $type=substr($nDay, 2, strlen($nDay));

        list($num,$type) = explode('-', $nDay, 2);
        if($type=='Days'){
            $num=$num*1;
    }
        else if($type=='Week'){
            $num=$num*7;
        }
      else  if($type=='Months'){
            $num=$num*30;
        }
       else{
            $num=$num*365;
        }
        $num1 = $days = (strtotime(date("Y-m-d"))-strtotime($date)) / (60 * 60 * 24);
        $rest="YES";
        $show=0;
        if($num<$num1){
            $rest="NO";
          $num1=$num1-$num;

            if($num1>$limit){
                $show=1;
            }
        }}
        if($show==0){
        $res = mysql_query("SELECT * from brand where id=$drug_id");
        $ro = mysql_fetch_array($res);
        $name = $ro['b_name'];
        $tableData.="<tr id='$who' class='edit_c_com'>

        <td class='gridB' ><span id='add1' class='text'>$name</span></td>
        <td class='gridB' ><span id='add2' class='text'>$date</span></td>
        <td class='gridB' ><span id='add3' class='text'>$dose</span></td>
        <td class='gridB' ><span id='add4' class='text'>$rest</span></td>

      </tr>";
    }
    }
}
$sql=  mysql_query("select * from old_drug where pid=$p_id");
while($row=  mysql_fetch_array($sql)){
    $name=$row['d_name'];
    $date=$row['date'];
    $dose=$row['dose'];
    $con="Yes";
    
    $tableData.="<tr  class='oldy'>

        <td class='oldy' ><span id='add1' class='text'>$name</span></td>
        <td class='oldy' ><span id='add2' class='text'>$date</span></td>
        <td class='oldy' ><span id='add3' class='text'>$dose</span></td>
        <td class='oldy' ><span id='add4' class='text'>$con</span></td>

      </tr>";
    
    
}

echo $finalData = "<center><table id=''width='80%'>".$tableHead . $tableData ."</table></center>
            <br></br>
    ";

?>

