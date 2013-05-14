<?php
include('config.inc');

		$val = mysql_real_escape_string($_POST['idval']);
		$tabledata ="<select name='name' value='' class='addbox1$val' id='box5_$val'>";

            $tabledata.="       	
            <option value='Consanguinity'>Consanguinity</option>
            <option value='Genitic'>Genitic</option>
            <option value='Others'>Others</option> ";
        //}
	$tabledata.="</select></td>";
	echo $tabledata;
	?>
