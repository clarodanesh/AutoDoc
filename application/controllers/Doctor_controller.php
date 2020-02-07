<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor_controller extends CI_Controller {

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
	            $this->load->model('Doctor_model');
	            $appts = $this->Doctor_model->GetDocAppts($this->session->email);
	            $viewData['docEmail'] = $this->session->email;
	            if($appts->num_rows() > 0){
	                foreach ($appts->result() as $row){
	                    $user = $this->Doctor_model->GetUser($row->user);
	                    if($user->num_rows()>0){
	                        foreach($user->result() as $row2){
	                            $row->fname = $row2->firstname;
	                            $row->lname = $row2->lastname;
	                        }
	                    }
                        $data[] = $row;
                    } 
                  
                    $viewData['appts'] = $data;
	                $this->load->view('doctor_landing', $viewData);
	                $this->load->view('footer', $viewData);
	            }else{
	                $viewData['appts'] = "empty";
	                $this->load->view('doctor_landing', $viewData);
	                $this->load->view('footer', $viewData);
	            }
	        }
	        else if($this->session->uType == 'user'){
	            $this->load->view('login');
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
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'doctor'){
	        $this->session->sess_destroy();
	        redirect('/');
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function cancel(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'doctor'){
	        $id = $this->uri->segment(3);
	        $this->load->model('Doctor_model');
	        $this->Doctor_model->Delete($id);
	        redirect('/');
	    }else{
	        redirect('/Login_controller');
	    }
	}
}
