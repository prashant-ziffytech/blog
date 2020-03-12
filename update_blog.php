<!DOCTYPE html>
<html>
<head>
  <title>Codeigniter</title>
</head>
<body>
 <?php
 $i=1;
  foreach($data as $row)
  {
  ?>
  <h1 align="center"><u>Update Blog</u></h1>
<form method="post">
  <table align="center"width="600" border="10" cellspacing="2" cellpadding="2" bgcolor="lightgrey">
    <tr>
  <td  align="center"colspan="2" width="230" bgcolor="lightblue"><font size="5"> <b>ID:</b></font>
   <?php 
   echo $row->id;
    ?>  
    </td>
   </tr>
</td>
</tr>
<tr>
  <td width="230" align="center"><b><font size="5">Blog Title</font></b></td>
  <td width="329"><input type="text" name="blog_title" 
    value="<?php echo $row->blog_title; ?>"/></td>
</tr>
<tr><td width="230" align="center"><b><font size="5"> Description</font></b></td>
  <td width="329"><textarea id="textarea"name="description" rows="4" cols="50"></textarea>
</td></tr>
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
  <td colspan="2" align="center">
<input type="submit" name="update" value="Update Records"/></td>
</tr>
</table>
</form>
  <?php } ?>
</body>
</html>