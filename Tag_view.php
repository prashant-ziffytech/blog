<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</head>
<body>
  <center><h1>Display Records</h1></center>
  <div class="table-responsive">
    <div align="center">
     <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-info">Add Tag</button>
    </div></br>
	<form action="" method="POST">
  <table align="center" width="600" border="2" cellspacing="2" cellpadding="2" bgcolor="#e6ffe6">
      <tr style="background:#e6ffff">
        <th><b><font size="5">Sr no</font></b></th>
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
  	echo "<td><a data-toggle='modal' data-id=".$row->tag_id." class='update-tag btn btn-primary' '>Update</a></td>";
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
</table>
</form>
</div>
</body>
 <div id="add_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">Add Tag</h4>
      </div>
    <div class="modal-body">
    <form method="post" id="createForm" name="createForm" action="<?php echo base_url('Tag_controller/Addtag'); ?>">
      <label>Tag Name</label>
        <input type="text" name="tag" id="name" class="form-control" />
      <br/>
    </div>
    <div class="modal-footer">
      <!-- <input type="submit" name="Add" id="Add" value="Add" class="btn btn-primary" /> -->
      <input type="button" id="modalAddTag" name="Add" value="Add"  class="btn btn-primary" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
   </form>
  </div>
 </div>
</div>
  <script type="text/javascript">
    $(document).ready(function(){
    $(document).on("click","#modalAddTag",function(){
      console.log($("#createForm").serialize());
      $.ajax({
                url        :    "<?php echo base_url('Tag_controller/Addtag'); ?>",
                data       :    $("#createForm").serialize(),
                type       :    "POST",
                success    :    function(response)
                {
                    $('#createModal').modal('hide');
                    $('#createForm')[0].reset();
                    alert('Successfully inserted');
                    location.reload();
                },
               error      :    function()
               {
                //alert("error");
               }
          });
    });
 $("#Add").submit(function(event) {
      event.preventDefault();
      $.ajax({
                url        :    "<?php echo base_url('Tag_controller/Addtag'); ?>",
                data       :    $("#createForm").serialize(),
                type       :    "POST",
                success    :    function(response)
                {
                    $('#createModal').modal('hide');
                    $('#createForm')[0].reset();
                    alert('Successfully inserted');
                    location.reload();
                },
               error      :    function()
               {
                //alert("error");
               }
          });
    });
  });
  </script>
 <div id="update_data_Modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
         <h4 class="modal-title">update Tag</h4>
      </div>
    <div class="modal-body">
    <form method="post" id="update" name="updateForm" action="<?php echo base_url('Tag_controller/updatedata'); ?>">
      <label>Tag Name</label>
        <input type="text" name="tag" id="tag" class="form-control" />
        <input type="hidden" name="tag_id" id="tag_id" />
      <br/>
    </div>
    <div class="modal-footer">
      <input type="button" id="modalupdateTag" name="update" value="update"  class="btn btn-primary"/>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
   </form>
  </div>
 </div>
</div>
  <script type="text/javascript">
    $(document).ready(function(){

    // From listing view, on update-tag class click get its attribute value into variable then show update popup modal.
    // then call function getTagDetails to get tag existing information from the data base.

    $(document).on("click",".update-tag",function(){
       $("#update_data_Modal").modal("show");
       var tag_id =   $(this).attr("data-id");
       $("#update_data_Modal #tag_id").val(tag_id);
       getTagDetails(tag_id);
    })

    // When function get call then create ajax call and get information from database.
    // and result get in json, to show result into modal form parse json and shows to input element.
    function getTagDetails(tag_id){
        $.ajax({
                url        :    "<?php echo base_url('Tag_controller/getTagData'); ?>",
                data       :    {tag_id:tag_id},
                type       :    "POST",
                success    :    function(response)
                {
                  // Parse result json to access each array element.
                    var res   = JSON.parse(response);
                    // after parsing json show tag_name data base value to form input element.  
                    $("#update_data_Modal #tag").val(res.tag_name);
                }               
          });
    }
    $(document).on("click","#modalupdateTag",function(){
      $.ajax({
                url        :    "<?php echo base_url('Tag_controller/updatedata'); ?>",
                data       :    $("#update").serialize(),
                type       :    "POST",
                success    :    function(response)
                {
                    $('#createModal').modal('hide');
                    $('#update')[0].reset();
                    alert('Successfully updated');
                    window.location.reload();  
                },
               error      :    function()
               {
                //alert("error");
               }
               
          });
    });
  });
  </script>
<script type="text/javascript">
$(document).on('click','.status_check',function()
{
        var status       =    $(this).attr("data-status");
        var id           =    $(this).attr("data-id");
        status           =    (status == 1 ? 0 : 1);
        var msg          =    (status =='0')? 'Deactive' : 'Active';
        if(confirm("Are you sure to "+ msg))
          {
            url          =    "<?php echo base_url('Tag_controller/').'user_status'; ?>";
            $.ajax({
            type         :    "POST",
            url          :    url,
            data         :    {"id":id,"status":status},
            success      :    function(data) {
            location.reload();
          } 
     });        
}
});
</script>
</table>
</form>
</html>