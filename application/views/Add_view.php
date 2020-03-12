<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<center>
	<form  method="post" action="" id="Form">
		<h1>Add Tag</h1>
		<table width="400" border="2" cellspacing="2" cellpadding="2"  bgcolor="#e6ffe6">
      
			<tr  style="background:#e6ffff">
				<td><b><font size="5">Tag_Name</font></b></td>
				<td><input type="text" name="tag"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" name="Add" value="Add_Tag" id="btn"></a></td>
			</tr>
		</table>
	</form>
</center>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    $("#btn").click(function() {
      $.ajax({
                url:"<?php echo base_url().'Addtag_c/Addtag';?>",
                data: $("#Form").serialize(),
                type: "post",
                success: function(response){
                  
                    $('#Form')[0].reset();
                    alert('Successfully inserted...');
                    },
               error: function()
               {
                //alert("error");
              }
              });
          });
	});
</script>
</html>