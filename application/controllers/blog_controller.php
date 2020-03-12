<?php
class Blog_controller extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url','form');
		$this->load->model('Blog_Models');
	}
	public function savedata()
	{
		
		$this->load->helper('form');
		$data['categories']			=$this->Blog_Models->getAllcategory();
		$data['tags']				=$this->Blog_Models->getAlltag();
		$data['authors']			=$this->Blog_Models->getAllauthor();
		$this->load->view('Add',$data);
		if($this->input->post('save'))
		{
			$n		=$this->input->post('blog');
			$b  	=$this->input->post('dblog');
			$c  	=$this->input->post('category');
			$t  	=$this->input->post('tag');
			$a  	=$this->input->post('author');
			$this->Blog_Models->saverecords($n,$b,$c,$t,$a);		
			redirect("Blog_controller/dispdata");  
		}
		
	}
	public function dispdata()
	{
		$result['data']			=$this->Blog_Models->displayrecords();
		$this->load->view('blog_view',$result);
	}
	public function updatedata($id)
	{
			echo $id;
			$data['categories']			=$this->Blog_Models->getAllcategory();
			$data['tags']				=$this->Blog_Models->getAlltag();
			$data['authors']			=$this->Blog_Models->getAllauthor();
			$data['data']				=$this->Blog_Models->displayrecordsById($id);
			$this->load->view('update_view',$data);
		 	if($this->input->post('update'))
		 {
		 	$blog_title			=$this->input->post('blog');
			$blog_description	=$this->input->post('dblog');
			$category			=$this->input->post('category');
			$tag				=$this->input->post('tag');
			$author				=$this->input->post('author');

		 	$this->Blog_Models->updaterecords($blog_title,$blog_description,$category,$tag,$author,$id);
			redirect("Blog_controller/dispdata");
		 }
	}
	public function update_status()
	{
		$id 					=$this->input->post('id');
		$status 				=$this->input->post('status');
		$this->Blog_Models->user_records($id,$status);
	}
}
?>