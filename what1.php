<?php
include('config.inc');

		$val = mysql_real_escape_string($_POST['idval']);
		$tabledata ="<select name='name' value='' class='addbox1$val newadd' id='box3_$val'>";

            $tabledata.="
            <option value='Days'>Days </option>
            <option value='Week'>Week</option>
            <option value='Months'>Months</option>
            <option value='Year'>Year</option>";
        //}
	$tabledata.="</select></td>";
	echo $tabledata;
	?>
