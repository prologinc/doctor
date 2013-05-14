<head><script type="text/javascript" src="js.r/aj_page_V.js"></script>  
    <script type="text/javascript">
var loadedobjects=""
var rootdomain="http://"+window.location.hostname

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
page_request.open('GET', url, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}

</script>
<style type="text/css">
#leftcolumn{
width:200px;
height:400px;
margin-bottom: 200px;
text-align: left;
}

#leftcolumn a{
padding: 3px 1px;
display: block;
width: 100%;
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid gray;

}

#leftcolumn a:hover{
background-color: #FFFF80;
}

#rightcolumn{
    margin-top: -500px;
    right:100px;
    margin-left: 250px;
    width:800px;
    margin-bottom: 100px;
    border:solid blue thin;
    background-color: lightblue;
    border: 1px solid #666;

}


* html #rightcolumn{ /*IE only style*/

}
.addVit
{
    display: none;
    border: 1px solid #aed0ea;
    width: 80%;
}
.editVit
{
    display: none;
}
.prev_vital{
    display: none;
}
.prev_add{
    display: none;
}
.add_edit1{
    display: none;
}
.howMuch1{width:160px;}
.addNewVital{float:right;}
.DONE_V{float: right;}
</style></head>
<?php
        //session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
         $id=$_SESSION['pid'];
        $pres_id=$_SESSION['pres'];
        $pre=  mysql_query("select pres_id from vital where pres_id=$pres_id");
        $p1=  mysql_fetch_array($pre);
        $pre=$p1['pres_id'];
        //echo "$pres_id------------$pre";
        if($pre==""){
            $rk=0;
        }else{
            $rk=1;
        }
        // $rk=$_SESSION['vital'];
        $sql = "SELECT * from app where pid=$id ORDER BY date DESC";
         $query=mysql_query($sql);
         $var=0;
         $default="";
         while ($row1 = mysql_fetch_array($query)) {
             $pres_old=$row1['id'];
             $date=$row1['date'];
                 $sql = mysql_query("SELECT pres_id from vital where pres_id=$pres_old");
                while ($row1 = mysql_fetch_array($sql)) {
                    if($pres_old!=$pres_id){
                              $default=$date;
                              $var=1;
                              break;                            
                        }         
             }
             if($var==1){
                 break;
             }
         }
             if($default==""){
                 echo"<div class='noData'>No Previous Record.<br></div>";
                 if($rk==0){
                 echo" <a href='#' class='addVi'>Add Today's Findings</a>";
                 }else{
                     echo "<div class='noData1'></br>Today's Findings information is already stored.<br/>";
                      echo"<a href='#' class='e_v'>Edit Today's Findings</a></div>";
                 }
             }else{
                    
?>
<body onload="ajaxpage('showVital.php?date=<?php echo $default?>','rightcolumn')">
     <div class='addNewVital'>
         <?php 
         if($rk==1){
             echo"<a href='#' class='e_v'>Edit Today's Findings</a>";
       
             }else {
                  echo" <a href='#' class='addVi'>Add Today's Findings</a>";
             }
             ?>
     </div>
    <div id='sBox1'>
        <p>Please Select How Many Entry You wants to See:</p>
        <form name='select'><select name='who' class='howMuch1'>
             <option value='5' selected='selected'>Last Five</option>
            <option value='10'>Last Ten</option>
            <option value='25'>Last Twenty Five</option>
            <option value='-1' >All</option>
            </select></form>
    </div>
    <div id="leftcolumn">
        <?php              
            
        $id=$_SESSION['pid'];
        $pres_id=$_SESSION['pres'];
        $sql = "SELECT DISTINCT date,id  from app where pid=$id ORDER BY date DESC";
         $query=mysql_query($sql);
         $vals=1;
         $var=0;
         $val=5;
         $vital_data="";
         $vital_data.="<select id='vitals'multiple='' size='10'>";
         while ($row1 = mysql_fetch_array($query)) {
             $pres_old=$row1['id'];
             $date=$row1['date'];
             if($var==1){
                 $default=$date;
             }

             
             if($pres_old!=$pres_id){
                 $nil = mysql_query("SELECT pres_id from vital where pres_id=$pres_old");
                $rk=0;
                while ($lal = mysql_fetch_array($nil)) {
                    $rk=1;    
                 }
                 if($rk==0){
                          $vital_data.="<option value='$date' disabled='disabled'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>"; 
                        }else{
               $vital_data.="<option value='$date'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";  
             }
             }
             if($val==$var){
                 $vals=$val;
                 break;
             }
             $var++;
             }
             if($vals!=$val){
                 $val-=1;
                $vital_data.="<option value=''disabled='disabled'>[Only $var data available]</option>";
             }
             $vital_data.="</select>";
            echo $vital_data;    
            ?>
    
  </div>
    <div id="rightcolumn"><h3>
        
      </h3></div>
      <?php 
        
              }
              ?>
    <center>
    <div class='addVit'>
        
        <?php
       
          $tabledata="";
        $tabledata.=
          "
          <tr id='' class='vital_edit'>
                <td class='gridH'>Weight(In KG):</td><td class='gridB'><span id='1V_$pres_id' class='textV'></span><input type='textbox' value='' class='Vbox weight' id='V1_$pres_id'/></td>
                <td class='gridH'>Height: </td><td class='gridB'><span id='2V_$pres_id' class='textV'></span>
                <select id='height_1' class='Vbox'>";

        for($j=1;$j<9;$j++){
            if($j==5){
                 $tabledata.=" <option value='$j' selected='selected'>$j</option>";
            }else{   
             $tabledata.=" <option value='$j'>$j</option>";
            }
        }
         $tabledata.=" </select>
          <select id='height_2' class='Vbox'>
          <option value='' selected='selected'></option>";
         
                for($k=0;$k<13;$k++){$tabledata.="<option value='$k'>$k</option>";}
          $tabledata.="</select>inch
          </td>
                
            </tr>
           <td class='gridH'>BMI: </td><td class='gridB'><span id='8V_$pres_id' class='textV'></span><input type='textbox' value='' disabled='disabled' class='Vbox bmi' id='V8_$pres_id'/> </td>
           <td class='gridH'>Blood Presure: </td><td class='gridB'><span id='3V_$pres_id' class='textV'></span><input type='textbox' value='' class='Vbox' id='V3_$pres_id'/></td>    
            </tr>
            <tr id='' class='vital_edit'>
                <td class='gridH'>Pulse:</td><td class='gridB'><span id='6V_$pres_id' class='textV'></span> <input type='textbox' value='' class='Vbox' id='V6_$pres_id'/></td> 
                <td class='gridH'>Temparature: </td><td class='gridB'><span id='4V_$pres_id' class='textV'></span><input type='textbox' value='' class='Vbox' id='V4_$pres_id'/></td> 
            </tr>";
        echo $finaldata = "<table id='new_vitals' width='100%'>". $tabledata ."</table>";
        echo "<table width='100%'><tr><td class='gridH'>Others:</td><td class='gridB'><span id='other_$pres_id' class='textV'></span> <textarea class='Vbox' id='other_t_$pres_id' rows='5' cols='60'/></textarea></td>
        <td></td><td class='gridB'><a href='#' class='DONE_V' id='$pres_id'><img src='img/d2.png' alt='Done' height='30'width='35'/><br/>Done</a><input type='button' value='See Previous' class='prev_add' id='$pres_id'/><a href='#'class='add_edit1' id='$pres_id'><img src='img/edit.png' alt='Edit' height='30'width='35'/><br/>Edit</a></td></td></tr></table>";
        //echo"";
        ?>
    </div></center>
        <div class='editVit'>
        <?php
        $result=(mysql_query("select * from vital where pres_id=$pres_id"));
          $row=  mysql_fetch_array($result);
          $bp=$row['bp'];
          $height=$row['height'];
          $weight=$row['weight'];
          $temp=$row['temp'];
          $other=$row['other'];
          $pulse=$row['pulse'];
          $bmi=$row['bmi']; 
          
        $tablehead="<tr><th>Name:</th><th>Value:</th><th>Name:</th><th>Value:</th></tr>";
          $tabledata="";
         
             $tabledata.=
          "
                    <tr id='' class='vital_edit'>
                <td class='gridB'>Weight*:</td><td class='gridB'><span id='E1V_$pres_id' class='EtextV'>$weight</span><input type='textbox' value='$weight' class='EVbox weight_e' id='EV1_$pres_id'/></td>";           
          if($height>0){
              $fow=explode('.',$height);
              $feet=$fow[0];
              $inch=$fow[1];
           $tabledata.="
                <td class='gridB'>Height*: </td><td class='gridB'><span id='E2V_$pres_id' class='EtextV'>$height</span>
          <select id='height_3'>";
           for($i=1;$i<8;$i++){
               if($i==$feet){
                   $tabledata.="<option value='$i' selected='selected'>$i</option>";
               }else{
                 $tabledata.="<option value='$i'>$i</option>";
               }
           }
           $tabledata.="</select>
          <select id='height_4'>";
           for($i=0;$i<13;$i++){
               if($i==$inch){
                   $tabledata.="<option value='$i' selected='selected'>$i</option>";
               }else{
                 $tabledata.="<option value='$i'>$i</option>";
               }
           }
            $tabledata.="
          </select>inch
          </td>";
          }else{
              $tabledata.="<tr id='' class='vital_edit'>
                <td class='gridB'>Height*: </td><td class='gridB'><span id='E2V_$pres_id' class='EtextV'>$height</span>
          <select id='height_3'>
                <option value='3'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5' selected='selected'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
          </select>
          <select id='height_4'>
              <option value='0'>0</option>
                <option value='1'>1</option>
          <option value='2'>2</option>
          <option value='3'>3</option>
          <option value='4'>4</option>
          <option value='5'>5</option>
          <option value='6'>6</option>
          <option value='7'>7</option>
          <option value='8'>8</option>
          <option value='9'>9</option>
          <option value='10'>10</option>
          <option value='11'>11</option>
          <option value='12'>12</option>
          </select>inch
          </td>";
          }
             $tabledata.="</tr>";
               $tabledata.="<tr id='' class='vital_edit'>
                <td class='gridB'>BMI: </td><td class='gridB'><span id='E8V_$pres_id' class='EtextV'>$bmi</span><input type='textbox' value='$bmi'disabled='disabled' class='EVbox bmi_e' id='EV8_$pres_id'/> </td>
                <td class='gridB'>Blood Presure: </td><td class='gridB'><span id='E3V_$pres_id' class='EtextV'>$bp</span><input type='textbox' value='$bp' class='EVbox' id='EV3_$pres_id'/></td>
            </tr>";

            $tabledata.="<tr id='' class='vital_edit'>
                <td class='gridB'>Temparature: </td><td class='gridB'><span id='E4V_$pres_id' class='EtextV'>$temp</span><input type='textbox' value='$temp' class='EVbox' id='EV4_$pres_id'/></td>
                <td class='gridB'>Pulse:</td><td class='gridB'><span id='E6V_$pres_id' class='EtextV'>$pulse</span> <input type='textbox' value='$pulse' class='EVbox' id='EV6_$pres_id'/></td> 
            </tr>
          <tr id='' class='vital_edit'>
                <td></td><td></td>
                
               
            </tr>";
        echo $finaldata = "<table id='new_vitals' width='100%'>".$tablehead . $tabledata ."</table>";
         echo "<table width='100%'><tr><td class='gridB'>Others:</td><td class='gridB'><span id='e_o_$pres_id' class='EtextV'>$other</span> <textarea class='EVbox' id='e_o_in_$pres_id' rows='5' cols='60'>$other</textarea></td>
        <td class='gridB'><a href='#' class='DONE_V' id='$pres_id'><img src='img/d2.png' alt='Done' height='30'width='35'/><br/>Done</a><a href='#' class='prev_vital' id=''>See Previous</a></td></tr></table>";
        
        ?>
    </div>
      
   
</body>
    
	