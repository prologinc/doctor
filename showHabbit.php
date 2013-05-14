 <?php
        session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
   
 
?>
<head>
<style type="text/css">
    .habit_inside{
        border: 2px thin silver;
    }
</style>
</head>

<body>
    
        <?php
        $date= $_GET['date'];
        //echo $date;
        $id=$_SESSION['pid'];
        //echo " <center>Date:$date</center>";
        $sql = mysql_query("SELECT * from app where pid='$id' and date='$date' order by id desc");
          while($row1=  mysql_fetch_array($sql)){  
             $pres_old=$row1['id'];
             //echo"$pres_old********************************";
         $result=(mysql_query("select * from habit where pres_id=$pres_old"));
          $row=  mysql_fetch_array($result);
          {
              //$low=$row['pres_id'];
             // echo $low;
          $sleep=$row['sleep'];
          $bowel=$row['bowel'];
          $smoke=$row['smoke'];
          $alcohol=$row['alco'];
          $other=$row['others'];

          $tablehead="";
          $tabledata="";
        $tabledata.=
          "<tr><td class='gridH'> Date:</td><td class='grid'>$date</td></tr>
          <tr><td class='gridH''>Sleep: </td><td class='grid'><span id='3V_$id' class='textV'>$sleep</span></td></tr>
          <tr><td class='gridH'>Bowel: </td><td class='grid'><span id='3V_$id' class='textV'>$bowel</span></td></tr>
          <tr><td class='gridH'>Smoke: </td><td class='grid'><span id='5V_$id' class='textV'>$smoke</span></tr>
          <tr> <td class='gridH'>Alcohol: </td><td class='grid'><span id='7V_$id' class='textV'>$alcohol</span></tr>
          <tr><td class='gridH'> Other:</td><td class='grid'><span id='9V_$id' class='textV'>$other</span></td></td></tr>";
        echo $finaldata = "<table width=60% id='habits'>".$tablehead . $tabledata ."</table>";  
          }
          break;
          }
            ?>
</body>
    
	
