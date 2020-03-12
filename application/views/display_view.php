<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<form action="" method="POST" id="updateform">
		<center><h1>Display Records</h1></center>
    <table align="center" width="600" border="2" cellspacing="2" cellpadding="2" bgcolor="#e6ffe6">
      <tr style="background:#e6ffff">
        <th><b><font size="5">Tag id</font></b></th>
        <th><b><font size="5">Tag Name</font></b></th>
        <th><b><font size="5">Update</font></b></th>
        <th><b><font size="5">Status</font></b></th>
      </tr>
<?php
$i=1;
foreach ($data as $row) 
{
	echo "<tr>";
	echo "<td>".$i."</td>";
	echo "<td>".$row->tag_name."</td>";
	echo "<td><a id='update' href='updatedata/$row->tag_id'>Update</a></td>";
	echo "<td><a class='status_check' data-status =".$row->status." data-id=".$row->tag_id." >";
      if($row->status =='1')
        {
         echo 'Deactive';
       }
       else
       {
      echo 'Active';
      }  

	"</a></td>";
	echo "</tr>";
	$i++;

}
?>
</body>
<script type="text/javascript">
$(document).on('click','.status_check',function()
{
        var status       = $(this).attr("data-status");
        var id           = $(this).attr("data-id");
        status           = (status == 1 ? 0 : 1);
        var msg          = (status=='0')? 'Deactive' : 'Active';
        if(confirm("Are you sure to "+ msg))
          {
            url          = "<?php echo base_url('Addtag_c/').'user_status'; ?>";
            $.ajax({
            type         :"POST",
            url          : url,
            data         : {"id":id,"status":status},
            success      : function(data) {
            location.reload();
          } 
      });        
}
});
</script>
</table>
</form>
</html>