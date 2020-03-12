<?php
class Tag_controller extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('TAg_models');
	}
	public function Addtag()
	{
		$data=array(
			'tag_name'		=> 	$this->input->post('tag')
		);
		$insert=$this->TAg_models->Addrecords($data);
		echo ($insert);
	}
	public function display_data()
	{
		$result['data']		=	$this->TAg_models->displayrecords();
		$this->load->view('Tag_view',$result);
	}
	public function updatedata()
	{
	 		/*echo "<pre>";
			print_r($_POST);die();*/
		$data=array(
			'tag_name'	=> 	$this->input->post('tag'),
			"sr_no"  	=> 	$this->input->post("sr_no")
		);
		$update=$this->TAg_models->updaterecords($data);
		echo ($update);
	}

	/* Shubhagi 28022020
	 Get Tag information*/

	public function getTagData()
	{
			$result 	=	$this->TAg_models->getTagData();
			echo json_encode($result);
	}

	public function user_status()
	{

			$id   		=    $this->input->post('id');
			$status     =    $this->input->post('status');
			$this->TAg_models->user_records($id,$status);
	}

}
?>