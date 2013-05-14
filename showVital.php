 <?php
        session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
   

?>
<head>
<style type="text/css">

</style>
</head>

<body>
    
        <?php
        $date= $_GET['date'];
        $id=$_SESSION['pid'];
        echo " <center>Date:$date</center>";
        $sql = mysql_query("SELECT * from app where pid='$id' and date='$date' ORDER BY id DESC");
        $tablehead="<tr><th class='gridH'>Name:</th><th class='gridH'>Value:</th><th class='gridH'>Name:</th><th class='gridH'>Value:</th></tr>";
          $tabledata="";
         while ($row1 = mysql_fetch_array($sql)) {
             
             $pres_old=$row1['id'];
 
         //  echo "$pres_old";
$result=(mysql_query("select * from vital where pres_id=$pres_old"));
          $row=  mysql_fetch_array($result);
         // echo "</br>$row-------------time";
          if($row!=""){
          $bp=$row['bp'];
          $height=$row['height'];
          $weight=$row['weight'];
          $temp=$row['temp'];
          $tm=$row['heart'];
          $pulse=$row['pulse'];
          $respi=$row['lunge'];
          $bmi=$row['bmi'];
          $bmistat=$row['liver'];
          $waist=$row['anemia'];
          $hc=$row['jaundice'];
          $oxy=$row['oedema'];          
        $tabledata.=
          "
          <tr>
                <td class='grid'>Weight:</td><td class='grid'><span>$weight</span></td>
                <td class='grid'>Height: </td><td class='grid'><span>$height</span></td>
                
            </tr>
            <tr >
                <td class='grid'>Blood Presure: </td><td class='grid'><span>$bp</span></td>
                <td class='grid'>Temparature: </td><td class='grid'><span $temp</span></td>   
            </tr>
            <tr >
                <td class='grid'>Heart: </td><td class='grid'><span>$tm</span></td>
                <td class='grid'>Pulse:</td><td class='grid'><span  >$pulse</span></td> 
            </tr>
            <tr >
                <td class='grid'>Lunge: </td><td class='grid'><span  >$respi</span></td>
                <td class='grid'>BMI: </td><td class='grid'><span >$bmi</span></td>
            </tr>
           <tr >
                <td class='grid'> Liver:</td><td class='grid'><span  >$bmistat</span></td>
                <td class='grid'> Anemia:</td><td class='grid'><span >$waist</span></td>
            </tr>
           <tr id='$id' class=''>
                <td class='grid'> Jaundice:</td><td class='grid'><span  >$hc</span></td>
                <td class='grid'>Oedema: </td><td class='grid'><span>$oxy</span> </td>    
            </tr>
          ";
       
         
         echo $finaldata = "<table width=100% id='lol' width='100%'>".$tablehead . $tabledata ."</table>";
         BREAK;
          }
         }
            ?>
  
</body>
    
	
