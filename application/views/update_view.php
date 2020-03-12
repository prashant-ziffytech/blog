<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style type="text/css">
body {
    font-family: Georgia, Times, serif;
    color: black;
    background-color: #9ca36d
}
h1 {
    font-family: Helvetica, Arial
}
</style>
<body>
	<?php
	$i=1;
	foreach ($data as $row) {
	?>
	
<center>
	<form  method="post" action="" id="Form">
		<h1>Update Blog</h1>
		<table width="500" border="8" cellspacing="5" cellpadding="5"  bgcolor="#e6ffe6">
			<tr>
				<td><b><font size="5">blog  title</font></b></td>
				<td><input type="text" name="blog" value="<?php echo $row->blog_title; ?>"/></td>
			</tr>
			<tr>
				<td><b><font size="5">blog  Description</font></b></td>
				<td><textarea  name="dblog"></textarea></td>
			</tr>
			<tr>
                    <td ><b><font size="5">category</font></b> </td>
                    <td><select class="form-control"name="category" >
                  <option value="">All</option>
                  <?php
                  foreach($categories as $category)
                  {
                      echo '<option value="'.$category['cat_id'].'">'.$category['category_name'].'</option>';
                  }
                  ?>  
        </select></td>
                 </tr>
                 <tr>
                    <td ><b><font size="5">Tag</font></b> </td>
                    <td><select class="form-control" name="tag">
                  <option value="">All</option>
                  <?php
                  foreach($tags as $tag)
                  {
                      echo '<option value="'.$tag['tag_id'].'">'.$tag['tag_name'].'</option>';
                  }
                  ?>  
        </select></td>
                </div>
         </tr>
         <tr>
                    <td ><b><font size="5">Author</font></b> </td>
                    <td><select class="form-control" name="author">
                  <option value="">All</option>
                  <?php
                  foreach($authors as $author)
                  {
                      echo '<option value="'.$author['auth_id'].'">'.$author['author_name'].'</option>';
                  }
                  ?>  
        </select></td>
         </tr>
			<tr>
            <a href="Blog_controller/dispdata"><td colspan="2" align="center">
            <input type="submit" name="update" id="btn" value="update blog"/></a></td>
        </tr>
        <tr>
            <a href="Blog_controller/dispdata"><td colspan="2" align="center">
            <input type="submit" name="update" id="btn" value="close"/></a></td>
        </tr>
		</table>
	</form>
<?php } ?>
</center>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    $("#btn").click(function() {
      $.ajax({
                url:"<?php echo base_url().'Blog_controller/updatedata';?>",
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
	})
</script>
</html>