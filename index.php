<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    <title>Parse CSV File</title>

	    <meta name="description" content="Source code generated using layoutit.com">
	    <meta name="author" content="LayoutIt!">

	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <!-- <link href="css/style.css" rel="stylesheet"> -->

  	</head>
  	<body>

	    <div class="container-fluid">
	    	
			<div class="row">
				
				<div class="col-md-6">
					<h5>
						Select a CSV file to validate
					</h5>
					<form id="isNumberFibonacci" method="POST" action="php_functions/parseCSVFile.php" enctype="multipart/form-data">
						<div class="form-group">
					 
							<label for="csvFile">
								File input
							</label>
							<input type="file" class="form-control-file" name="csvFile" />
						</div>
						<button type="submit" id="submit" class="btn btn-primary">
							Validate it
						</button>
					</form>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
	    <script src="js/jquery-3.3.1.min.js"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="js/scripts.js"></script>
  	</body>
</html>