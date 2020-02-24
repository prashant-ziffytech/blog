<html>
<head>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>  
<form method="post" action="" form id="FormLogin" name="registartion-form" enctype="multipart/form_data">
			<table align="center">
					<tr>
                    	<td>Author_Name:</td>
                    	<td><input type="text" name="author_name"></td>
                	</tr>
                	<tr>
                    	<td>Author_MobileNo:</td>
                    	<td><input type="text" name="author_mobno"></td>
               		</tr>
               		<tr>
    					<td colspan="2" align="center"><input type="submit" name="add" id="btn"></td>
    				</tr>
    		</table>
</form>

	<script>
		$(document).ready(function(){
			$("#btn").click(function() {
				$.ajax({
		        	    url: "<?php echo base_url().'Author1/create'; ?>",
		            	data: $("#FormLogin").serialize(),
		            	type: "post",
		            	success: function(response){
		                $('#FormLogin')[0].reset();
		                alert('Successfully inserted');
		                window.location.href="<?php echo base_url('Author1/dispdata');?>"
		              }
		      	});	
          });
		});
	</script>
</body>
</html>