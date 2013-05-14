<html><head>
        <link rel="stylesheet" type="text/css" href="css/disease.css" />
        <script type="text/javascript" src="js/jsapi"></script>
        <script type="text/javascript" src="js.r/tester.js"></script>
        </head><body>
<?php
$pres_id=$_SESSION['pres'];
$sql = "SELECT * from prescription_test where pres_id=$pres_id";
$result=mysql_query($sql);
$sql1="SELECT * FROM prescription_test WHERE id = (SELECT MAX(id) FROM prescription_test)";
$adder=mysql_query($sql1);
$add=0;
while($row1 = mysql_fetch_array($adder)) 
{
$add=$row1['id'];
}
if($add==0){
    $add=1;
}
$finaldata = "";

$tablehead="<tr><th class='gridH'>Test Name</th><th class='gridH'>Note</td><th class='gridH'>Option</th><th class='gridH'>Delete</th></tr>";
$tabledata="";

while($row = mysql_fetch_array($result)) 
{        $val=htmlentities($row['id']);
	$t_id=htmlentities($row['test_id']);
          $res = mysql_query("SELECT * FROM test WHERE id='$t_id'");
          $ro = mysql_fetch_array($res);
         $name = $ro['name'];
         $note = $row['note'];
	$tabledata.="<tr id='$val' class='edit_t'>
        
        <td class='gridB'>
	<span id='add1_$val' class='text'>$name</span>
         <div>
        <input type='text' size='50' value='$name' id='inputString' class='box1_$val addbox' onkeyup='lookup(this.value);' />
        </div>
		<div id='suggestions'class=' sug_$val'>
                </div>
        </td>
         <td class='gridB'><span id='add2_$val' class='text'>$note</span><input type='text' class='addbox' value='$note' id='box2_$val'/> </td>
        <td class='gridB'><a href='#' class='edit_test' id='$val' name='$name'> <img src='img/edit.png' alt='Edit' height='30'width='35'/><br/>Edit</a>
        <a href='#' class='test_edit' id='test_edit$val' name='$name'> <img src='img/d2.png' alt='Done' height='30'width='35'/><br/>Done</a></td>
        <td class='gridB'><a href='#' class='del_test' id='$val' name='$name'> <img src='img/del.png' alt='Delete' height='30'width='35'/><br/>Delete</a></td>
	</tr>
      </tr>";
}
        
    echo $finaldata = "<center><table id='test_adder'width='80%'>".$tablehead . $tabledata ."</table></center>
            <br></br>
    <center><a href='#' class='add_test' id='$add' ><img src='img/add2.png' alt='Add' height='50'width='55'/></a></center>";

?>
</body></html>