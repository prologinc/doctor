 <head>

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
#leftcolumn1{
width:200px;
}

#leftcolumn1 a{
padding: 3px 1px;
display: block;
width: 100%;
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid gray;
}

#leftcolumn1 a:hover{
background-color: #FFFF80;
}

#rightcolumn1{
    right:100px;
    margin-top: -100px;
    margin-left: 200px;
    width:auto;
    height: 300px;
    margin-bottom: 200px;

}

* html #rightcolumn1{ /*IE only style*/

}
.master_div
{
    display: none;
}
.edit_tool
{
    display: none;
}

</style>
 <script type="text/javascript" src="js.r/add_vital.js"></script>
 </head>
<?php
        //session_start();
        include('config.inc');
        if (!isset($_SESSION['username'])) {
                header('Location: index.php');
        }
        
       //$limit=$_GET['limit'];
        $limit=5;
   // echo"<b>Patient's Vital Information</b> </br></br>";
         $id=$_SESSION['pid'];
        $pres_id=$_SESSION['pres'];
        $sql = "SELECT * from app where pid=$id ORDER BY date DESC";
         $query=mysql_query($sql);
         $var=0;
          $pre=  mysql_query("select pres_id from habit where pres_id=$pres_id");
        $p1=  mysql_fetch_array($pre);
        $pre=$p1['pres_id'];
        //echo "$pres_id------------$pre";
        if($pre==""){
            $rk=0;
        }else{
            $rk=1;
        }
         $default="";
         while ($row1 = mysql_fetch_array($query)) {
             $pres_old=$row1['id'];
             $date=$row1['date'];
                 $sql = mysql_query("SELECT * from habit where pres_id=$pres_old");
              //  $rk=0;
                while ($row1 = mysql_fetch_array($sql)) {
                 if($pres_old!=$pres_id){
                    
                              $default=$date;
                              $var=1;
                               break;                            
             }else{
                
                
             }         
             }
             if($var==1){
               
                 break;
             }
         }
             if($default==""){
                  echo"<div class='noData2'>No Previous Record.<br></div>";
                 if($rk==0){
                 echo" <a href='#' class='addHa'>Add Today's Habit Information</a>";
                 }else{
                     echo "<div ><p class='noData1'></br>Today's Habit information is allready stored.<br></p></br>";
                    echo" <a href='#' class='edit_move'>Edit Today's Habbit Information</a>";
                 }
             }else{
                    //echo"$default";
?>


<body onload="ajaxpage('showHabbit.php?date=<?php echo $default?>','rightcolumn1')">
         <div class='addNew'>
         <?php 
         if($rk==1){
             echo" <a href='#' class='edit_move'>Edit Today's Habbit Information</a>";
       
             }else {
                  echo" <a href='#' class='addHa'>Add Today's Habbit Information</a>";
             }
             ?>
     </div>
    <div id='sBox'>
        <p>Please Select How Many Entry You wants to See:</p>
        <form name='select'><select name='who' class='howMuch'>
            <option value='5' selected='selected'>Last Five</option>
            <option value='10'>Last Ten</option>
            <option value='25'>Last Twenty Five</option>
            <option value='-1' >All</option>
            </select></form>
    </div>
    <div id="leftcolumn1">
      <?php
                  
             $id=$_SESSION['pid'];
        $pres_id=$_SESSION['pres'];
        $sql = "SELECT DISTINCT date,id from app where pid=$id ORDER BY date DESC";
         $query=mysql_query($sql);
         $vals=1;
         $var=0;
          $table="";
         $table.="<select id='habits'multiple='' size='10'>";
         while ($row1 = mysql_fetch_array($query)) {
             $pres_old=$row1['id'];
             $date=$row1['date'];
             if($pres_old!=$pres_id){
                 $nil = mysql_query("SELECT pres_id from habit where pres_id=$pres_old");
                $rk=0;
                while ($lal = mysql_fetch_array($nil)) {
                    $rk=1;    
                 }
                 if($rk==0){
                        $table.="<option value='$date' disabled='disabled'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";  
                        }else{
               $table.="<option value='$date'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>";  
             }
             }
             if($limit==$var){
                 $vals=$limit;
                 break;
             }
             $var++;
            // echo $var;
             }
             if($vals!=$var){
                 $limit-=1;
                 $table.="<option value=''disabled='disabled'>[Only $var data available]</option>";
             }
             $table.="</select>";
             echo $table;

             
            ?>
    
  </div><div id="rightcolumn1"><h3>
       Select a date
      </h3></div>
        <?php 
        
              }
              ?>
    
       <div class="master_div">

           <table id="sleep_123">
   <tr id='sl'> <td><input type='checkbox'  name='sl' id='sle' class="sle"></td>
        <td><Span>Sleep</span></td></tr>
   </table><table id="bowel_123">
   <tr id='bl'> <td><input type='checkbox'  name='bl' id='bow' class="bow"></td>
        <td ><Span>Bowel</span></td></tr>
   </table><table>
        <tr> <td><input type='checkbox'  name='smoke'  class="smoke"></td>
       <td ><Span>Smoke</span></td>
    <td><form name='smoke'>
            <select name='smokey' class='smokeS'  disabled="disabled" >
            <option value='3- Times per day'>Bellow 3 Times per day</option>
            <option value='3 Times per day'>3 Times per day</option>
            <option value='4 Times per day'>4 Times per day</option>
            <option value='5 Times per day' selected='selected'>5 Times per day</option>
            <option value='6 Times per day'>6 Times per day</option>
            <option value='7 Times per day'>7 Times per day</option>
            <option value='8 Times per day'>8 Times per day</option>
            <option value='10 Times per day'>10 Times per day</option>
            <option value='12 Times per day'>12 Times per day</option>
            <option value='14 Times per day'>14 Times per day</option>
            <option value='Chain Smoker'>Chain Smoker</option>
        </select></form></td></tr>
    <tr>
        <td><input type='checkbox'   name='alergy'  class="alco"></td>
        <td ><Span>Alcohols</span></td>
        <td><form name='alco'>
            <select name='al' class='alcoS'  disabled="disabled" >
            <option value='Once in a Month'>Once in a Month</option>
            <option value='Twice in a Month'>Twice in a Month</option>
            <option value='Four Times in a month' selected='selected'>Four Times in a month</option>
            <option value='Twice a week'>Twice a week</option>
            <option value='3times a week'>3 times a week</option>
            <option value='4times a week'>4 times a week</option>
            <option value='6times a week'>6times a week</option>
            <option value='once in a day'>once in a day</option>
            <option value='Twice in a day'>Twice in a day</option>
            <option value='Alcoholic'>Alcoholic</option>
        </select></form></td></tr>
    
    </table>
    <table>
        <tr><td><input type='checkbox' name='lal'  class="other"></td><td><Span>Other</span></td><td><form name="other"><textarea class='others' COLS='40' ROWS='6' disabled="disabled" name="others"></textarea></form></td></tr>
        </table>
       <?php
      
    echo"<a href='#' class='done_H' id='$pres_id'/>Done</a>";

    ?>
   </div>
    <div class="edit_tool">
        <a href='#' class='edit_habit' >EDIT</a>
        <a href='#' class='see_prev'>SEE PREVIOUS</a>
        </div>
</body>
    
	