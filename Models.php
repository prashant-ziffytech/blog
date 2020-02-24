<?php 
class Models extends CI_Model
{
	public function createData($data)
	{
		$author_name = $data['author_name'];
		$author_mobno = $data['author_mobno'];

		
		$arraUser = array
		(
			"author_name"=>$author_name,
			"author_mobno"=>$author_mobno
		);
		
			$this->db->insert("author",$arraUser);
			$id = $this->db->insert_id();
			return $id;
	}

	function displayrecords()
	{
		$query=$this->db->query("select * from author");
		return $query->result();
	}

	function deleterecords($id)
	{
		$this->db->query("delete  from author where user_id='".$id."'");
	}
	
	function displayrecordsById($id)
	{
		$query=$this->db->query("select * from author where user_id='".$id."'");
		return $query->result();
	}
	
	function updaterecords($author_name,$author_mobno,$id)
	{
		$query=$this->db->query("update author SET author_name='$author_name',author_mobno='$author_mobno' 
		where user_id='".$id."'");
	}	

	function user_records_status($id,$status)
	{
		$data = array(
			'status' => $status
		);
		$this->db->where('user_id',$id);
		$this->db->update('author',$data);
	}
	
}            