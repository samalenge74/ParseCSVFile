 <?php
 
 	require_once('validateCSVFile.php');

	//if upload button is click then further process
	if(!empty($_FILES['csvFile']))
	{
		
		//upload path
		$path = basename($_FILES['csvFile']['name']);

		//move file to new location
		if(move_uploaded_file($_FILES['csvFile']['tmp_name'], $path))
		{
			//Check number of columns in CSV files
			//If not equal to 3, return a message to user
			//Else, validate CSV file
			if(countColumns($path) != 3){
				echo "You CSV file has " .countColumns($path). " columns .It must have a maximum of 3 Columns";
			}else{
				validateCSVColumnsData($path);
			}
		}else{
			echo "There was an error uploading the file, please try again!";
		}	
		
	}