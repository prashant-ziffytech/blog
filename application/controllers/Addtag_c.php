<?php
class Addtag_c extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Addtag_Models');
	}

	public function Addtag()
	{
		$this->load->view('Add_view');
		if ($this->input->post('Add'))
		 {
			$a=$this->input->post('tag');
			$this->Addtag_Models->Addrecords($a);
			redirect('Addtag_c/display_data');
		}

	}
	public function display_data()
	{
		$result['data']=$this->Addtag_Models->displayrecords();
		$this->load->view('display_view',$result);
	}
	public function updatedata($id)
	{
		$result['data']=$this->Addtag_Models->displayrecordsById($id);
		$this->load->view('update_view',$result);

		if($this->input->post('update'))
		{
			$tag=$this->input->post('tag');
			$this->Addtag_Models->updaterecords($tag,$id);
			redirect('Addtag_c/display_data');

		}
	}
	public function user_status()
	{
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->Addtag_Models->user_records($id,$status);
	}

}
?>a