 <?php
        session_start();
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
        border:0;
    }
</style>
</head>

<body>
    
        <?php
        $date= $_GET['date'];
        $id=$_SESSION['pid'];
        //echo $date+'---------'+$id;
        $sql = mysql_query("SELECT * from app where pid='$id' and date='$date'");
        $tablehead="<tr><th>Name:</th><th>Value:</th><th>Name:</th><th>Value:</th></tr>";
          $tabledata="";
         while ($row1 = mysql_fetch_array($sql)) {
       
             $pres_old=$row1['id'];
 
          // echo "$pres_old";
$result=(mysql_query("select * from diagnosis where pres_id=$pres_old"));
          $row=  mysql_fetch_array($result);
          $d_id=$row['dis_id'];
          $dec=$row['decetion'];
          $per=$row['parcent'];
          $note=$row['note'];
          
        $tabledata.=
          "
          <tr>
                <td>Disease Name:</td><td><span>$d_id</span></td>
                <td>Decition: </td><td><span>$dec</span></td>
                
            </tr>
            <tr >
                <td>Percent: </td><td><span>$per%</span></td>
                <td>Note: </td><td><span $note</span></td>   
            </tr>
          ";
       
         }
         echo $finaldata = "<table width=100% id='lol' width='100%'>".$tablehead . $tabledata ."</table>";
         
            ?>
  
</body>
    
	
