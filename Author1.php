<?php
class Author1 extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models');
	}

	public function index()
	{
		$this->load->view('add_view');
	}

	public function dispdata()
	{
		$result['data']=$this->Models->displayrecords();
		$this->load->view('display_view',$result);
	}

	public function create()
	{	
		$author_name = $this->input->post('author_name');
		$author_mobno = $this->input->post('author_mobno');

		$data = array
		(
			'author_name' => $author_name,
			'author_mobno' => $author_mobno
		);

		$insert = $this->Models->createData($data);
		echo $insert;	
	}

	public function deletedata($id)
	{
		$this->Models->deleterecords($id);
		redirect("Author1/dispdata");
	}

	public function updatedata($id)
	{

		$result['data']=$this->Models->displayrecordsById($id);
		$this->load->view('updateview',$result);	
	
		if($this->input->post('update'))
		{
			$name=$this->input->post('author_name');
			$mno=$this->input->post('author_mobno');
		
			$this->Models->updaterecords($name,$mno,$id);
			redirect("Author1/dispdata");
		}
	}	
	public function update_status()
	{
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->Models->user_records_status($id,$status);
	}
}
?>