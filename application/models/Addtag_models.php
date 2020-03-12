<?php
class Addtag_Models extends CI_Model
{
	
	function Addrecords($tag)
	{
		$data['tag_name']=$_POST['tag'];
		$this->db->insert('tag',$data);
	}
	public function displayrecords()
	{
		$query=$this->db->query("select * from tag");
		return $query->result();
	}
	function displayrecordsById($id)
	{
	$query=$this->db->query("select * from tag where tag_id='".$id."'");
	return $query->result();
	}
	function updaterecords($tag,$id)
	{
	$query=$this->db->query("update tag SET tag_name='$tag' where tag_id='".$id."'");
	}
	function user_records($id,$status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('tag_id',$id);
		$this->db->update('tag',$data);
	}
	
}
?>