<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<center>
	<form  method="post" action="" id="Form">
		<h1>Update Tag</h1>
		<table width="400" border="2" cellspacing="2" cellpadding="2"  bgcolor="#e6ffe6">
			<tr>
				<td><b><font size="5">Tag_Name</font></b></td>
				<td><input type="text" name="tag"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" name="update" value="update_tag"  id="btn"></a></td>
			</tr>
		</table>
	</form>
</center>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    $("#btn").click(function() {
      $.ajax({
                url:"<?php echo base_url().'Addtag_c/updatedata';?>",
                data: $("#Form").serialize(),
                type: "post",
                success: function(response){
                  
                    $('#createForm')[0].reset();
                    alert('Successfully inserted...');
                    },
               error: function()
               {
                //alert("error");
              }
              });
          });
	})
</script>
</html>