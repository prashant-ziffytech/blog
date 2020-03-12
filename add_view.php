<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	
</head>
<body bgcolor="lightgrey">
	<center><h1>Insert Infomartion</h1></center>
	<form method="POST" id="addform" action="">
		<table align="center" cellpadding="5"cellspacing="5" border="10">
			<tr>
				<td><font size="5"> Blog Title</font></td>
				<td><input type="text" name="blog_title"></td>
			</tr>
			<tr>
				<td><font size="5"> Blog Description</font></td>
				<td><input type="text" name="description"></td>
			</tr>
			<tr>
				
					<td><font size="5">category</font></td>
				<td><select class="form-control" name="category">
		    <option value="">All</option>
		    <?php
		    foreach($groups as $category)
		    {
		        echo '<option value="'.$category['category_id'].'">'.$category['category_name'].'</option>';
		    }
		    ?>  
		</select> <br/>
				</td>
			</tr>
			<tr>
				
					<td><font size="5">authortable</font></td>
				<td><select class="form-control" name="author">
		    <option value="">All</option>
		    <?php
		    foreach($auth as $authortable)
		    {
		        echo '<option value="'.$authortable['author_id'].'">'.$authortable['author_name'].'</option>';
		    }
		    ?>  
		</select> <br/>
				</td>
			</tr>
			<tr>
				
					<td><font size="5">blogtag</font></td>
			<td><select class="form-control" name="tag">
		    <option value="">All</option>
		    <?php
		    foreach($tags as $blogtag)
		    {
		        echo '<option value="'.$blogtag['tag_id'].'">'.$blogtag['tag_name'].'</option>';
		    }
		    ?>  
		</select> <br/>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<input type="submit" name="save"id="save" value="Add">
				</td>
			</tr>
		</table>
		
		</br>
		</form>
	</body>
	<script>
		$(document).ready(function(){
		
		$("#add").click(function() {
			
			$.ajax({
		            url:"<?php echo base_url().'Blog_controller/add_blog';?>",
		            data: $("#addform").serialize(),
		            type: "POST",
		            success: function(response){
		              
		                $('#addform')[0].reset();
		                alert('Tag Inserted Successfully...');
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