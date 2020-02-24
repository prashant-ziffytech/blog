<html>
<head>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<table width="600" border="1" cellspacing="5" cellpadding="5">
  <tr style="background:#CCC">
    <th>Sr No</th>
    <th>Author_name</th>
    <th>Author_mno</th>
    <th>Delete</th>
	 <th>Update</th>
   <th>Status</th>
  </tr>
  <?php
  $i=1;
  foreach($data as $row)
  {
  echo "<tr>";
  echo "<td>".$i."</td>";
  echo "<td>".$row->author_name."</td>";
  echo "<td>".$row->author_mobno."</td>";
  echo "<td><a href='deletedata/".$row->user_id."'>Delete</a></td>";
  echo "<td><a href='updatedata/".$row->user_id."'>Update</a></td>";
  echo "<td><a class='status_checks' data-status =".$row->status." 
  data-id=".$row->user_id." >";

  if($row->status=='1'){ echo 'Active';} else { echo 'Deactive';} "</a></td>";
  echo "</tr>";
  $i++;
  }
   ?>
</table>

<script type="text/javascript">
  $(document).on('click','.status_checks',function()
 { 
    var status  =  $(this).attr("data-status");
    var id      =  $(this).attr("data-id");
    
    status      =  (status == 1 ? 0 : 1);
    var msg = (status=='0')? 'Deactivate' : 'Activate'; 

if(confirm("Are you sure to "+ msg))
{ 
    url = "<?php echo base_url('Author1/').'update_status'; ?>"; 
        $.ajax({
          type:"POST",
          url: url, 
          data: {"id":id,"status":status}, 
          success: function(data) { 

          location.reload();
    } });
 }  
});
</script>

</body>
</html>