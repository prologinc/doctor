<?php
include('config.inc');

		$val = mysql_real_escape_string($_POST['idval']);
		$tabledata ="<select name='name' value='' class='addbox1$val' id='box3_$val'>";

            $tabledata.="
            
            <option value='Yes'>Yes</option>
            <option value='No'>No</option>";
        //}
	$tabledata.="</select></td>";
	echo $tabledata;
	?>
