<html>
<head>
<title>Update Author_Form</title>
</head>

<body>
	<form method="post">
		<table width="600" border="1" cellspacing="5" cellpadding="5">
      <tr>
         <td width="230">Enter Author Name </td>
         <td width="329"><input type="text" name="author_name" value="<?php echo $row->author_name; ?>"/></td>
      </tr>
      <tr>
          <td>Enter Author MobileNo</td>
          <td><input type="text" name="author_mobno" value="<?php echo $row->author_mobno; ?>"/></td>
      </tr>
      <tr>
          <td colspan="2" align="center"><input type="submit" name="update" value="Update Records"/></td>
      </tr>
    </table>
	</form>
</body>
</html>