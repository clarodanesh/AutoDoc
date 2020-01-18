<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    function __construct(){
        parent::__construct();
        $this->load->helper('url');   
        $this->load->library('session');     
    }

	public function index()
	{
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType')){
	        //echo 'email and utype are set';
	        //echo $this->session->email;
	        //echo $this->session->uType;
	        if($this->session->uType == 'admin'){
	            $this->load->view('admin_dashboard');
	        }
	        else if($this->session->uType == 'doctor'){
	            echo 'you are a doctor';
	        }
	        else if($this->session->uType == 'user'){
	            echo 'you are a user';
	        }
	        else{
	            echo 'user type not recognised';
	        }
	    }else{
	        echo 'not logged in';
		    $this->load->view('login');
	    }
	} 
	
	public function logout(){
	    $this->session->sess_destroy();
	    redirect('/');
	}
}
