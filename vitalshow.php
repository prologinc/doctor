
<?php
        //session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
?>
<head>
<style type="text/css">
    td{
        width:auto;
        padding:0 15 0 5;
        font-size: 12px;
		color: darkblue;
    }
</style>
</head>
<body>
    <div id="vital_container"> 
        <?php
        $sql = "SELECT * from person where phone=$pid";
                    $result=mysql_query($sql);
                    $table="";
                     while($row = mysql_fetch_array($result)) {

            $dob=$row['dob'];
            $table.="
            <tr>           

            <td><b>Age:</b></td><td>
            <span><b>$dob</b></span>           
            </td>
            </tr>";
    }
            
    echo"<b>Today's Findings</b> <br/>";
    echo $finaldata = "<table>".$table . "</table>"; 
        $id=$_SESSION['pid'];
        $pres=$_SESSION['pres'];
          $result=(mysql_query("select * from vital where pres_id=$pres"));
          $row=  mysql_fetch_array($result);
          if($row!=""){
          $bp=$row['bp'];
          $height=$row['height'];
          $weight=$row['weight'];
          $temp=$row['temp'];
          $pulse=$row['pulse'];
          $bmi=$row['bmi'];
          $other=$row['other'];
          $vital=array($weight,$height,$bp,$temp,$pulse,$bmi);
          $vital_name=array("Weight","Height",'Blood Pressure',"Temparature","Pulse","BMI");
          $tabledata="";
          $var=0;
          $has=0;
          while($var<6){
            if($vital[$var]!=""){
                if($has%2==0){
                    $tabledata.="<tr>";
                }
                $tabledata.="<td>$vital_name[$var]:$vital[$var]</td>";
                if($has%2!=0){
                    $tabledata.="</tr>";
                }
                $has++;
            }
            $var++;
          }
          $oterTab="<tr id='$id' class='vital_edit'>
              <td>Other:$other</td>
            </tr>";
        echo $finaldata = "<table id='vitals' width='100%'>" . $tabledata ."</table>";
        
        echo $finaldata = "<table id='vitals' width='100%'>" . $oterTab ."</table>";
          }else{
              echo" Today's Findings is not Added<br/>Please ADD today's Findings In Problem Page.";
          }
            ?>
   
 </div>
    </body>
    
   	