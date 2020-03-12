<!DOCTYPE html>
<html>
<head> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
</script>
</head>
<style type="text/css">
body {
    font-family: Georgia, Times, serif;
    color: purple;
    background-color: #9ca36d
}
h1 {
    font-family: Helvetica, Arial
}
</style>
<body>
  <h1  align="center">Blog Management System</h1>
   <table align="center" width="1000" border="10" cellspacing="5" cellpadding="5" bgcolor="#e6ffe6">
      <td colspan="5" align="center">

 <a href="<?php echo base_url('Blog_controller/savedata')?>" >Add Blog</a>
  <tr style="background:#e6ffff">
        <th><b><font size="5">Sr No</font></b></th>
        <th><b><font size="5">Blog Title</font></b></th>
        <th><b><font size="5">Created_Date</font></b></th>
        <th><b><font size="5">Edit</font></b></th>
        <th><b><font size="5">Status</font></b></th>
      </tr>
<?php
$i=1;
foreach($data as $row)
      {
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$row->blog_title."</td>";
      echo "<td>".$row->created_date."</td>";
      echo "<td><a id='update' href='updatedata/$row->sr_no'>Update</a></td>";
      echo "<td><a class='status_checks' data-status =".$row->status." data-id=".$row->sr_no." >";
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
    </table>
  </body>
<script type="text/javascript">
$(document).on('click','.status_checks',function()
{
        var status       = $(this).attr("data-status");
        var id           = $(this).attr("data-id");
        status           = (status == 1 ? 0 : 1);
        var msg          = (status=='0')? 'Deactivate' : 'Activate';
        if(confirm("Are you sure to "+ msg))
          {
            url          = "<?php echo base_url('Blog_controller/').'update_status'; ?>";
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
</html>