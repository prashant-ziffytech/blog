Simple Dropdown program in codeigniter 

Database:-Table name
myblog,category,authortable,blogtag

CREATE TABLE `myblog` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT, 
    `blog_title` varchar(200) DEFAULT NULL, 
    `description` varchar(200) DEFAULT NULL, 
    `created_at` timestamp NOT NULL, 
    `updated_at` timestamp NOT NULL, 
'status' enum('0','1') NOT NULL,
'category' varchar(100) DEFAULT NULL,
'author' varchar(100) DEFAULT NULL,
'tag' varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`));

CREATE TABLE `category` ( 
 `category_id` int(11) NOT NULL AUTO_INCREMENT, 
`category_name` varchar(200) DEFAULT NULL, 
PRIMARY KEY (`id`));


<?php
class Blog_controller extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url','form');
		$this->load->model('Blog_Model');
	}
        public function savedata()
	{
		$this->load->helper('form'); 
         $data['groups']=$this->Blog_Model->getAllGroups();
          $data['auth']=$this->Blog_Model->getAllauthor();
          $data['tags']=$this->Blog_Model->getAlltag();
		$this->load->view('add_view',$data);
		if($this->input->post('save'))
		{
			$n=$this->input->post('blog_title');
			$d=$this->input->post('description');
			$c=$this->input->post('category');
			$a=$this->input->post('author');
			$t=$this->input->post('tag');
			$this->Blog_Model->saverecords($n,$d,$c,$a,$t);		
			redirect("Blog_controller/dispdata");  
		}
	}
	public function dispdata()
	{
		$result['data']=$this->Blog_Model->displayrecords();
		$this->load->view('view_page',$result);
	}
	
	public function deletedata($id)
	{
		$this->Blog_Model->deleterecords($id);
		redirect("Blog_controller/dispdata");
	}
	
	public function updatedata($id)
	{
		
		$result['data']=$this->Blog_Model->displayrecordsById($id);
		//print_r($result);die();
		$result['groups']=$this->Blog_Model->getAllGroups();
          $result['auth']=$this->Blog_Model->getAllauthor();
          $result['tags']=$this->Blog_Model->getAlltag();
		$this->load->view('update_blog',$result);

	
		 if($this->input->post('update'))
		 {
		 	$blog_title=$this->input->post('blog_title');
		 	$description=$this->input->post('description');
		 	$category=$this->input->post('category');
		 	$author=$this->input->post('author');
		 	$tag=$this->input->post('tag');
		 	$this->Blog_Model->updaterecords($blog_title,$description,$category,$author,$tag,$id);
			redirect("Blog_controller/dispdata");
		 }
	}
	
	public function update_status()
	{
		$id=$this->input->post('id');
		$status=$this->input->post('status');
		$this->Blog_Model->user_records_status($id,$status);
	}
		public function fetch_author()
       {
            if($this->input->post('author_id'))
              {
               echo $this->Blog_Model->fetch_author($this->input->post('author_id'));
              }
        }

       public function fetch_tag()
      {
          if($this->input->post('tag_id'))
          {
            echo $this->Blog_Model->fetch_tag($this->input->post('tag_id'));
          }
     }

     public function fetch_category()
     {

     	if($this->input->post('category_id'))
     	{
     		echo $this->Blog_Model->fetch_category($this->input->post('category_id'));
     	}
     }
  }		
?>
