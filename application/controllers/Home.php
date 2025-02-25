<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $query = $this->db->query("SELECT * FROM `articles` ORDER BY `blogid` ASC" );
        $data['blog'] = $query->result_array();
		$this->load->view('blog_list_page', $data);
	}

    function blog_details($blogid){
        // $query = $this->db->query("SELECT * FROM `articles` ORDER BY `blogid` ASC" );
        // $data['blog'] = $query->result_array();
        // $this->load->view('blog_details_page', $data);

        $query = $this->db->query("SELECT * FROM `articles` WHERE `blogid` = $blogid");
        $data['blog'] = $query->result_array();
        $this->load->view('blog_details_page', $data);

    }
}
