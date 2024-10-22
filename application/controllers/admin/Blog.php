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
        if (!$this->session->userdata('user_id')) {
            // If no user is logged in, redirect to the login page
            redirect('admin/Login');
        }
		else{
            $query = $this->db->query("SELECT * FROM `articles` ORDER BY `blogid` ASC" );
            $data['blog'] = $query->result_array();
            $this->load->view('adminPanel/viewBlog', $data); 

		}

	}

	public function add_blog(){
        if (!$this->session->userdata('user_id')) {
            // If no user is logged in, redirect to the login page
            redirect('admin/Login');
        }
        else{
    
        $this->load->view('adminPanel/addBlog');
        }
    }

    function edit_blog($blogid){
        
        $query = $this->db->query("SELECT * FROM `articles` WHERE `blogid` = $blogid");
        $data['blog'] = $query->result_array();
        $this->load->view('adminPanel/editBlog', $data);

    }

    function delete_blog($blogid){
        $this->db->query("DELETE FROM `articles` WHERE `blogid` = $blogid");
        redirect('admin/blog');
    }

    public function addblog_post(){
        print_r($_POST);
        $config['upload_path']          = './assets/uploads/';
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
                $imgurl = '/assets/uploads/'.$data['upload_data']['file_name'];
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

    function editblog_post(){
        echo "<pre>";
        print_r($_FILES);    
        echo "</pre>";
        $post_title = $_POST['title'];
        $post_desc = $_POST['desc'];
        $blogid = $_POST['blogid'];
        $updated_time = time();
        if($_FILES['file']['name']){
            $config['upload_path']          = './assets/uploads/';
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
                    $imgurl = '/assets/uploads/'.$data['upload_data']['file_name'];          
                    $query = $this->db->query("UPDATE `articles` SET  `blog_title`='$post_title',`blog_desc`='$post_desc',`blog_img`='$imgurl' ,`updated_on`= '$updated_time' WHERE `blogid`= '$blogid'");
     
                    
            }
        }
        else{
            $query = $this->db->query("UPDATE `articles` SET  `blog_title`='$post_title',`blog_desc`='$post_desc' ,`updated_on`= '$updated_time' WHERE `blogid`= '$blogid'");

        }
                if($query){
                    $this->session->set_flashdata('inserted', 'yes');
                    redirect('admin/blog');

                }
                else{
                    $this->session->set_flashdata('inserted', 'no');
                    redirect('admin/blog');

                }
                
                //$this->load->view('upload_success', $data);
        }


    }
