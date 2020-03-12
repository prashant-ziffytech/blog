<html>
<head>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
  </script>
  <title>Display Records</title>
</head>
<body bgcolor="lightgrey">
  <center><h1>Display Information of Blog</h1></center> 
  <table align="center" width="600" border="10" cellspacing="5" cellpadding="5" bgcolor="#CEE3F6">
  <tr>
    <th colspan="5"  >
       <!-- <?php echo "<td><a id='add' href='savedata/$row->id'>Add Blog</a></td>";
       ?>
      -->
      <a href="<?php echo base_url('Blog_controller/savedata')?>">Add info</a>
    </tr>
  <tr>
    <th>No</th>
    <th>Blog Title</th>
    <th>Created Date</th>
    <th>Status</th>
    <th>Edit</th>
  </tr>
  <?php
  $i=1;
    foreach($data as $row)  
  {
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$row->blog_title."</td>";
      echo "<td>".$row->created_at."</td>";
      echo "<td><a href='#' class='status_checks' data-status =".$row->status." 
      data-id=".$row->id." >";
      if($row->status =='1'){ echo 'Active';}else{echo 'Deactive';}
      echo "</a></td>";
      echo "<td><a id='update' href='updatedata/$row->id'>Update</a></td>";
      echo "</tr>";
       $i++;
      }   ?>
</table>
</body>
<script type="text/javascript">
  $(document).on('click','.status_checks',function()
 { 
    var status  =  $(this).attr("data-status");
    var id      =  $(this).attr("data-id");
    var $str    =  'Deactivate';
    status      =  (status == 1 ? 0 : 1);
    var msg = (status=='0')? 'Deactivate' : 'Active'; 

if(confirm("Are you sure to "+ msg))
{ 
    url = "<?php echo base_url('Blog_controller/').'update_status'; ?>"; 
        $.ajax({
          type:"POST",
          url: url, 
          data: {"id":id,"status":status}, 
          success: function(data) { 
          location.reload();
    } 
  });
 }  
 });
</script> 
</html>