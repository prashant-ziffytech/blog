<?php
class Blog_Models extends CI_Model 
{
	function saverecords($n,$b,$c,$t,$a)
	{
		$data['blog_title']           = $_POST['blog'];
		$data['blog_description']     = $_POST['dblog'];
        $data['cat_id']               = $_POST['category'];
        $data['tag_id']               = $_POST['tag'];
        $data['auth_id']              = $_POST['author'];
		$this->db->insert('blog', $data);
	}
	function displayrecords()
	{
	$query         =$this->db->query("select * from blog");
	return $query->result();
	}
	function updaterecords($blog_title,$blog_description,$category,$tag,$author,$id)
	{

	$query         =$this->db->query("update blog SET blog_title='$blog_title',blog_description='$blog_description' ,cat_id='$category',tag_id='$tag',auth_id='$author' where sr_no='".$id."'");
	 }	
	function displayrecordsById($id)
	{
		$query = $this->db->get_where('blog', array('sr_no' => $id));
		return $query->result();
	}	
    function getAllcategory()
    {
        $query = $this->db->query('SELECT * FROM category');
        return $query->result_array();
    }
    function getAlltag()
    {
        $query = $this->db->query('SELECT * FROM tag');
        return $query->result_array();
    }
    function getAllauthor()
    {
        $query = $this->db->query('SELECT * FROM auth');
        return $query->result_array();
    }
	 function user_records($id,$status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('sr_no',$id);
		$this->db->update('blog',$data);
	}
}
?>