<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include("db.php");

$d1=mysql_escape_String($_POST['date1']);

$d2=mysql_escape_String($_POST['date2']);

$date1 = strftime("%Y-%m-%d", strtotime($d1));
$date2 = strftime("%Y-%m-%d", strtotime($d2));
// $sql2="INSERT INTO `doctor_app`.`availavle_date` (`doctor_id`, `date`) VALUES ('0000', '$date2');";
 
 //mysql_query($sql2);

while($date1<=$date2)
    {
    $sql ="DELETE FROM `availavle_date` WHERE `availavle_date`.`doctor_id` = 'pro' AND `availavle_date`.`date` = '$date1'";
     mysql_query($sql);
    $date1=strftime("%Y-%m-%d",strtotime("+1 day",strtotime( $date1)));

}
header("Location:complite.php");
//header("Location: http://demoproject.net84.net/doctor/Doctor%27s_app/complite.php");
//header("http://localhost/Doctor%27s_app/complite.php");
?>
