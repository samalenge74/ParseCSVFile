<?php

	function validateCSVColumnsData($file)
	{
		
		if (($handle = fopen($file, "r")) !== FALSE) {

			//Table will be used for final output to user
			$table ="";
			$table .="<table border='1' cellpadding='10'>";
			$table .="<tr>";
			$table .="<th>Column 1</th>";
			$table .="<th>Column 2</th>";
			$table .="<th>Column 3</th>";
			$table .="</tr>";
			$sum = 0;
			
			//loop through the whole CSV file
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	$table .="<tr>";
		    	$num = count($data); //count the number of values separated by ","
		    	
		    	//loop through each row to validate column values
		        for ($c=0; $c < $num; $c++) {
		        	
		        	switch ($c) {
		        		//this checks if values in first column match the pattern below
		        		case 0:
		        			if(preg_match("/^[A-Z]{3,5}-[0-9]{1,4}$/", $data[$c]))
				        	{
				        		$table .="<td>" . $data[$c] . "</td>";
				        	}else{
				        		$table .="<td></td>";
				        	}
		        			break;
		        		//this checks if values in second column are valid unix timestamp
		        		case 1:
		        			if(isValidTimeStamp($data[$c]))
				        	{
				        		$table .="<td>" . $data[$c] . "</td>";
				        	}else{
				        		$table .="<td></td>";
				        	}
		        			break;
		        		//this checks if values in third column are numeric, and add to $sum each numeric value
		        		case 2:
		        			if(is_numeric($data[$c]))
				        	{
				        		$table .="<td>" . $data[$c] . "</td>";
				        		$sum += $data[$c];
				        	}else{
				        		$table .="<td></td>";
				        	}
		        			break;
		        		
		        		default:
		        			# code...
		        			break;
		        	}
		            
		        }
		        $table .="</tr>";
		    }
		    fclose($handle);
		    $table .="<tr>";
		    $table .="<td colspan='3'>Sum of third Column: " .$sum. "</td>";
		    $table .="</tr>";
		    $table .="</table>";
		    echo $table;

		    echo "<a href='../index.php'><-Back</a>";

		    
		}
	}

	//Function that returns the number of columns in CSV file
	function countColumns($file)
	{
		$file_handler = fopen($file, "r");
		$row = fgetcsv($file_handler, 0, ",");
		return count($row);
	}

	//Function to validate is value is a valid unix timestamp
	function isValidTimeStamp($strTimestamp) {
	    return ((string) (int) $strTimestamp === $strTimestamp) 
	        && ($strTimestamp <= PHP_INT_MAX)
	        && ($strTimestamp >= ~PHP_INT_MAX);
	}

?>