<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

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
    /*
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType')){
	    
	    }else{
	        $this->load->view('login');
	    }
	*/
	public function index()
	{
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType')){
	        //echo 'email and utype are set';
	        //echo $this->session->email;
	        //echo $this->session->uType;
	        if($this->session->uType == 'admin'){
	            $this->load->view('login');
	        }
	        else if($this->session->uType == 'doctor'){
	            $this->load->view('login');
	        }
	        else if($this->session->uType == 'user'){
	            $this->load->model('User_model');
	            $docs = $this->User_model->GetDoctors();
	            
	            if($docs->num_rows() > 0){
	                foreach ($docs->result() as $row){
                        $data[] = $row;
                    } 
                    
                    $viewData['doctors'] = $data;
                    $this->load->view('user_nav');
	                $this->load->view('user_landing', $viewData);
	            }else{
	                $viewData['doctors'] = "empty";
	                $this->load->view('user_nav');
	            $this->load->view('user_landing', $viewData); 
	            }
	            
	            //$this->load->view('user_nav');
	            //$this->load->view('user_landing', $data);
	        }
	        else{
	            $this->load->view('login');
	        }
	    }else{
	        echo 'not logged in';
		    redirect('/Login_controller');
	    }
	} 
	
	public function logout(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'user'){
	        $this->session->sess_destroy();
	        redirect('/');
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function BookAppt(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'user'){
	        $this->load->model('User_model');
	        /*$passHash = password_hash('password', PASSWORD_BCRYPT);
	        
	        $data = array(
	            'email' => $this->input->post('email'),
	            'firstname' => $this->input->post('firstname'),
	            'lastname' => $this->input->post('lastname'),
	            'password' => $passHash,
	            'utype' => 'admin'
	        );
	        
	        $this->Admin_model->AddAdmin($data);
	        redirect('/Admin_controller/ManageAdmins');*/
	        
	        //these are getting the details
	        echo $this->input->post('date');
	        echo " ";
	        echo $this->input->post('time');
	        $exp = explode(":", $this->input->post('time'));
	        echo " "; 
	        echo $exp[0];
	        echo $exp[1];
	        echo " ";
	        echo $this->input->post('doc-slct');
	        echo " ";
	        echo 'booked appt';
	    }else{
	        redirect('/Login_controller');
	    }
	}
}
