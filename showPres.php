<?php
session_start();
    include('config.inc');
    if (!isset($_SESSION['username'])) {
            header('Location: index.php');
    }
  ?>
<html>
<head>
  
<link rel="stylesheet" href="css/reveal.css">


<script src="js/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="print" href="css/style.css"/>
<script src="js.r/print.js" type="text/javascript"></script>
<script src="js/jquery.reveal.js" type="text/javascript"></script>
<style type="text/css" media="screen">
</style>

    </head>
    <body><center>
              <div class="body">
            <table id="doc_info">
                <tr >
                    <td style="width:70mm;border-right:solid gray 2px;"><?php
        $pres_id = $_GET['pre_is'];
        if($pres_id=="null"){
            return;
        }else{
        $date = date('d M, Y');
        $sql=  mysql_query("select * from app where id=$pres_id");
        $low=  mysql_fetch_array($sql);
        $user=$low['doctor_id'];
         $date = $low['date'];
        $pid=$_SESSION['pid']; 
        $a = mysql_fetch_array(mysql_query("select * from doctor where pid='$user'"));
        $doctor_id = $a['id'];
        $doctor_name_id = $a['pid'];
        $b = mysql_fetch_array(mysql_query("select * from person where id='$doctor_id'"));
        $doctor_name = $b['name'];
        $doctor_phn = $b['phone'];
        
        echo "
            
           
            <table class=doc_t>
            <tr>
            <td><span class=doc><br/>Dr. $doctor_name</span></td>
            </tr>
            <tr>
            <td>Doctor ID: $doctor_name_id</td>
            </tr>
            <tr>
            <td>Phone: +880$doctor_phn</td>
            </tr></table>
            ";
                    
                    ?></td>
                    <td style="width:60mm;border-right:solid gray 2px;">
                         <?php
        
      
            $sql = "SELECT sex,name,phone,dob from person where phone='$pid'";
            $result=mysql_query($sql);
            $row = mysql_fetch_array($result);
            $name=$row['name'];
            $age= $row['dob'];
            $sex=$row['sex'];
            $sql=  mysql_query("select * from chember where doctor_id=$doctor_id");
                        $low=  mysql_fetch_array($sql);
                        $c_name=$low['name'];
                        $address=$low['address'];
                        $phone=$low['phn'];
                        $v_hour=$low['v_hour'];
                        $v_day=$low['v_day'];
            echo"<center>Visting Hour:$v_hour<br/>
                       Visting Day:$v_day </center>";
    ?>
                    </td>
                    <td style="width:80mm;">
                        <?php
                        
                        
                         echo"<center>$c_name<br/>
                             $address<br/>
                             $phone<br/></center>";
                         ?>
                    </td>
                    
                </table>
            <hr/>
            <hr/>
            <table id="doc_info1"><tr>
                    <td style="width:80mm;border-right:solid gray 2px;">Name:<?php echo "  $name" ?></td>
                    <td style="width:30mm;border-right:solid gray 2px;">Age: <?php echo $age ?></td>
                    <td style="width:45.5mm;border-right:solid gray 2px;">Gender: <?php echo $sex ?></td>
                    <td style="width:52.5mm;">Date <?php echo $date ?></td>
                    </tr>
                    </table>
            <hr/>
            <hr/>
            <table border="0"  valign="top">
                <tr style="width:50mm;vertical-align:top;border-bottom:solid gray 2px;">
                    <td style="width:50mm;vertical-align:top;border-right:solid gray 2px;">
                    <table>
                        <tr>
                    <td>
                       
                    <?php
                     echo"<span class='pres_color'>O.E</span>";
                     echo "<hr width=25% ALIGN='left'/>";
                        echo "<hr width=30% ALIGN='left'/>";
                     $sql=  mysql_query("select * from vital where pres_id=$pres_id");
                     $low=  mysql_fetch_array($sql);
                     $bp=$low['bp'];
                     $pulse=$low['pulse'];
                     $temp=$low['temp'];
                     echo"Blood Pressure:$bp<br/>
                     Pulse:$pulse<br/>
                     Temparature:$temp";
                    ?>
                    </td>
                        </tr><tr>
                   
                                 <td>
                                     <hr/>

                                </td></tr></table>
                           
                    <td style="width:160mm;vertical-align:top;">
                       
                            
                        
                               <?php
                                $var=1;
                                $d = mysql_query("select * from prescription where pres_id='$pres_id'");
                                 echo"<span class='pres_color'>Rx</span>";
                                echo "<hr width=25% ALIGN='left'/>";
                                 echo "<hr width=30% ALIGN='left'/>";
                                while($e=  mysql_fetch_array($d)){
            $drug_id = $e['d_id'];
            $his=mysql_query("select * from brand where id='$drug_id'");
            $h=mysql_fetch_array($his);
            $d_name=$h['b_name'];
            //$drug_str = $h['strength'];
            $drug_when = $e['when'];
            $drug_day = $e['nodays'];
            $times = $e['ival'];
            $dose = $e['dose'];
            
        
        if($times==2){
            $num=substr($dose, 0, 1);
        $type=substr($dose, 2, strlen($dose));
        list($num,$type) = explode('-', $dose, 2);
        $dose="$num-0-$type";
            echo"$var.$d_name [$dose] $drug_when x $drug_day<br/>";
            $var++;
        }else{
            echo"$var.$d_name [$dose] $drug_when x $drug_day<br/>";
        $var++;
        }
        }
                                ?>
                    </td></tr>
                    </table>
            
            <table border="0" height="200"><tr>
                    <td style="width:50mm;vertical-align:top;border-right:solid gray 2px;"><?php
                    $u=1;
          $result=mysql_query("select * from complain where pres_id='$pres_id'");
           echo"<span class='pres_color'>C.C</span>";
          echo "<hr width=25% ALIGN='left'/>";
          echo "<hr width=30% ALIGN='left'/>";
                    while($row=mysql_fetch_array($result)){
              $sym_id=$row['sym_id'];
              $duration=$row['duration'];
                $con=$row['prime'];
              $test=(mysql_query("select * from sym where sym_id=$sym_id"));
              while($toe=$row=mysql_fetch_array($test)){
                  $testy=$toe['name'];
                  if($con==0){
             echo "<b>$u. $testy [$duration] <br/></b>";
                  }else{
                       echo "$u. $testy [$duration] <br/>";
                  }
              $u++;
              }
          }         
          ?>
                    </td>
                    <td style="width:110mm;vertical-align:top;">
                        <?php
                    $v=1;
                    $f = mysql_query("select * from prescription_test where pres_id='$pres_id'");
                     echo"<span class='pres_color'>INV</span>";
                     echo "<hr width=25% ALIGN='left'/>";
          echo "<hr width=30% ALIGN='left'/>";
                    while($g= mysql_fetch_array($f)){
            $test_id = $g['test_id'];
            $i=mysql_query("select * from test where id='$test_id'");
            while($h=mysql_fetch_array($i)){
                $test_name = $h['name'];
            
        echo"$v.$test_name<br/>";
         $v++;
        }
       
        }
                    ?></td>
                    <td style="width:50mm;vertical-align:top;"><?php
                    $a=1;
                    echo"<span class='pres_color'>Advice</span>";
                    echo "<hr width=25% ALIGN='left'/>";
                    echo "<hr width=30% ALIGN='left'/>";
                    $ad = mysql_query("select * from pres_advice where pres_id='$pres_id'");
                while($row=  mysql_fetch_array($ad)){
                      $advice=$row['advice_id'];
                      $ad1 = mysql_query("select * from advice_tab where id='$advice'");
                      $name= mysql_fetch_array($ad1);
                      $nam=$name['advice'];
                          echo "$a. $nam<br/>";
                $a++;
                }
                ?></td>
                            
                    </td>
                    </tr>
                    </table>
            <table border="0" height="100"><tr>
                    <td style="width:142mm">
                        <?php
                       $sql= mysql_query("select * from nextvisit where pres_id=$pres_id");
                       $goal=  mysql_fetch_array($sql);
                       $some=$goal['time'];
                       echo"<span id='view123'>Next Visit:<b>$some</b><br/></span><br/>";
                        ?>
                        <?php
                        $sql= mysql_query("select * from reference where pres_id=$pres_id");
                        $goal=  mysql_fetch_array($sql);
                            $doc_id=$goal['doctor_id'];
                             $sql= mysql_query("select * from ref_doc where id='$doc_id'");
                             $goal=  mysql_fetch_array($sql);
                             $ref_name=$goal['name'];
                             $ref_add=$goal['adress'];
                             echo"<span id='view'>Referred Doctor:<b>$ref_name</b><br/></span><br/>";
                             echo"<span id='view1'> Doctor's Address:<b>$ref_add</b><br/></span>";
                        ?>
                        
             </td>
                    <td style="width:68mm"></td>
                            
                    </td>
                    </tr>
                    </table>      
 </center></body>
</html>
<?php
        }
        ?>
