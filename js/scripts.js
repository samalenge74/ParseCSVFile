$(document).ready(function() {

	$("button#submit").removeAttr('disabled');

	$('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        var fileNameSplit = fileName.split('.');
        var ext = fileNameSplit[1];
        if(ext !=="csv")
        {
        	alert('please select a ".csv" file');
        	$("button#submit").prop("disabled", true);

        	
        }else{
        	$("button#submit").removeAttr('disabled');
        }
        
    });


});