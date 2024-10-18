<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller {

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

     //$this->load->library('session');
	public function index()
	{
        if(isset($_SESSION['user_id'])){
            redirect('admin/Dashboard');
            return;
        }

        if(isset($_SESSION['error'])){
           // die($_SESSION['error']);
            $data['error'] = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        else{
            $data['error'] = 'NO_ERROR'; 

        }

		$this->load->view('adminPanel/loginView', $data);


	}
    
    public function login_post(){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if(isset($_POST)){
            $email = $_POST['email'];
            $password = $_POST['password'];
            //check login credentials here
            $query = $this->db->query("SELECT * FROM `backendusers` WHERE `username` = '$email' AND `password` = '$password'");
            if($query->num_rows()){
                $result = $query->result_array();
                // echo "<pre>";
                // print_r($query->result_array());
                // echo "</pre>";  
                $this->session->set_userdata('user_id', $result[0]['user_id']);
                redirect('admin/Dashboard');

            }
            //if valid, redirect to dashboard
            else{
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('admin/Login');
            }
            //if not, display error message

        }
        else{
            die("Invalid input");
        }
    }

    public function logout(){
        //$this->session->unset_userdata('user_id');
        session_destroy();
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        $this->output->set_header("Content-Type: application/json");
        echo json_encode(array('message'=>'Logged Out Successfully'));
        redirect('admin/Login');
    }
  
}
?>
