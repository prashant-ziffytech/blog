<?php
class Blog_Model extends CI_Model
{
	function saverecords($n,$d,$c,$a,$t)
	{
		$data['blog_title'] = $_POST['blog_title'];
		$data['description'] = $_POST['description'];
		$data['category']=$_POST['category'];
		$data['author']=$_POST['author'];
		$data['tag']=$_POST['tag'];
		$this->db->insert('myblog', $data);
	}
	function getAllGroups()
    {
        $query = $this->db->query('SELECT * FROM category');
        return $query->result_array();
    }

    function getAllauthor()
    {
        $query = $this->db->query('SELECT * FROM authortable');
        return $query->result_array();
    }

    function getAlltag()
    {
        $query = $this->db->query('SELECT * FROM blogtag');
        return $query->result_array();
    }
	
	function displayrecords()
	{
		$query = $this->db->get('myblog');
		return $query->result();
	}
	
	function deleterecords($id)
	{
		$this->db->query("delete from myblog where id='".$id."'");
	 }
	
	function displayrecordsById($id)
	{
		$query = $this->db->get_where('myblog', array('id' => $id));
		return $query->result();
	
	}
	
	function updaterecords($blog_title,$description,$category,$author,$tag,$id)
	{
	$query=$this->db->query("update myblog SET blog_title='$blog_title',description='$description',
	category='$category',author='$author',tag='$tag' where id='".$id."'");
	 }	

	function user_records_status($id,$status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('id',$id);
		$this->db->update('myblog',$data);
	}
	 public function fetch_author(){
      $this->db->select("*");
      $this->db->from("authortable");
      $this->db->where("author_id",$author_id);
      $resAuthor  = $this->db->get();
      if($resAuthor->num_rows() > 0){
        return $resAuthor->result();
      }
    }
    public function fetch_category(){
      $this->db->select("*");
      $this->db->from("category");
     $this->db->where("category_id",$category_id);
      $resCategory  = $this->db->get();
      if($resCategory->num_rows() > 0){
        return $resCategory->result();
      }
    }
     public function fetch_tag(){
      $this->db->select("*");
      $this->db->from("blogtag");
      $this->db->where("tag_id",$tag_id);
      $resTag  = $this->db->get();
      if($resTag->num_rows() > 0){
        return $resTag->result();
      }
    }	
}
?>