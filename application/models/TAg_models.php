<?php
class Tag_Models extends CI_Model
{
	function Addrecords($data)
	{
		$this->db->insert('tag_table',$data);
	}
	public function displayrecords()
	{
		$query=$this->db->query("select * from tag_table");
		return $query->result();
	}
	public function getTagData(){
		$tag_id 	=	$this->input->post("tag_id");

		$this->db->select("*");
		$this->db->from("tag_table");
		$this->db->where("tag_id",$tag_id);
		
		$resTag 	=	$this->db->get();
		$rowTag     =	$resTag->row();
		return $rowTag;
	}
	function updaterecords($data)
	{
		$upd_data 	=	array(
							"tag_name" => $data['tag_name']
							);
		$tag_id 	=	$data['tag_id'];
		$this->db->where('tag_id',$tag_id);
		$this->db->update('tag_table', $upd_data);
	}
	function user_records($id,$status)
	{
		$data     =    array(
			'status' => $status
		);
		$this->db->where('tag_id',$id);
		$this->db->update('tag_table',$data);
	}
}
?>