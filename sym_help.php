<p id="searchresults">
<?php

include('config.inc');

		if(isset($_POST['queryString'])) {
			$queryString = mysql_real_escape_string($_POST['queryString']);
			
			// Is the string length greater than 0?
			if(strlen($queryString) >0) 
				$res=  mysql_query("select * from sym WHERE name LIKE '" . $queryString . "%'  ORDER BY name LIMIT 3");
			//else
				//$res=  mysql_query("select * from drugs");

		$data ="";//"<span class='category'>values</span>";
		while($row1=  mysql_fetch_array($res)){
                        $name=$row1['name'];
                       
			
        	
			//$data.= '<a href="'.$result->url.'">';
	        //$data.= '<img src="search_images/'.$result->img.'" alt="" />';
			//$data.= '<a href=test.html">';
			//$data.= '<a href=#?'.$name.'>';
	        $data.= '<a href="javascript:autocomplete(\''.$name.'\')">';
			
			
			if(strlen($name) > 35) { 
	        	$name = substr($name, 0, 35) . "...";
	         }	         			
	         $data.= '<span class="searchheading">'.$name.'</span>';
			
	         

        }
	echo $data;
		}

?>
</p>