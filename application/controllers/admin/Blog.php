<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
 
		$this->load->view('adminPanel/viewBlog');
	}

	public function add_blog(){
        $this->load->view('adminPanel/addBlog');

    }
    public function addblog_post(){
        print_r($_POST);
        $config['upload_path']          = './application/assets/uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());
                print_r ($error);
                die("error");

                //$this->load->view('upload_form', $error);     //future improvement
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());
                // echo "<pre>";
                // print_r($data);    
                // echo "</pre>";
                $post_title = $_POST['title'];
                $post_desc = $_POST['desc'];
                $imgurl = '/application/assets/uploads/'.$data['upload_data']['file_name'];
                $query = $this->db->query("INSERT INTO `articles`(`blog_title`, `blog_desc`, `blog_img`) VALUES ( '$post_title','$post_desc','$imgurl')");
                if($query){
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blog/add_blog');

                }
                else{
                    $this->session->set_flashdata('inserted', 'no');
                    redirect('admin/blog/add_blog');

                }
                
                //$this->load->view('upload_success', $data);
        }
    }
}
