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
	            $this->load->view('admin_panel');
	            $this->load->view('admin_dashboard');
	        }
	        else if($this->session->uType == 'doctor'){
	            $this->load->view('login');
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
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->session->sess_destroy();
	        redirect('/');
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ManageDoctors(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->load->model('Admin_model');
	    
	        $this->load->view('admin_panel');
	        
	        /*if(!$this->session->has_userdata('refFrom') && $this->session->refFrom != base_url() . "index.php/Admin_controller/ManageDoctors"){
	            $this->session->set_userdata('refFrom', current_url());
	        }*/
	        
	        $this->session->set_userdata('refFrom', base_url() . "index.php/Admin_controller/ManageDoctors");
	        
	        $doctors = $this->Admin_model->GetDoctors();
	        if($doctors->num_rows() > 0){
	            foreach ($doctors->result() as $row){
                    $data[] = $row;
                } 
                
                $viewData['docInfo'] = $data;
                $this->load->view('manage_doctors', $viewData);
	        }else{
	            $viewData['docInfo'] = "empty";
	            $this->load->view('manage_doctors', $viewData); 
	        }
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ManagePatients(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->load->model('Admin_model');
	    
	        $this->load->view('admin_panel');
	        
	        /*if(!$this->session->has_userdata('refFrom') && $this->session->refFrom != base_url() . "index.php/Admin_controller/ManagePatients"){
	            $this->session->set_userdata('refFrom', base_url() . "index.php/Admin_controller/ManagePatients");
	        }*/
	        
	        $this->session->set_userdata('refFrom', base_url() . "index.php/Admin_controller/ManagePatients");
	        
	        $patients = $this->Admin_model->GetPatients();
	        if($patients->num_rows() > 0){
	            foreach ($patients->result() as $row){
                    $data[] = $row;
                } 
                
                $viewData['patInfo'] = $data;
                $this->load->view('manage_patients', $viewData);
	        }else{
	            $viewData['patInfo'] = "empty";
	            $this->load->view('manage_patients', $viewData); 
	        }
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ManageAdmins(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->load->model('Admin_model');
	    
	        $this->load->view('admin_panel');
	        
	        /*if(!$this->session->has_userdata('refFrom') && $this->session->refFrom != base_url() . "index.php/Admin_controller/ManageDoctors"){
	            $this->session->set_userdata('refFrom', current_url());
	        }*/
	        
	        $this->session->set_userdata('refFrom', base_url() . "index.php/Admin_controller/ManageAdmins");
	        
	        $admins = $this->Admin_model->GetAdmins();
	        if($admins->num_rows() > 0){
	            foreach ($admins->result() as $row){
                    $data[] = $row;
                } 
                
                $viewData['admInfo'] = $data;
                $this->load->view('manage_admins', $viewData);
	        }else{
	            $viewData['admInfo'] = "empty";
	            $this->load->view('manage_admins', $viewData); 
	        }
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function Delete(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $id = $this->uri->segment(4);
	        $userType = $this->uri->segment(3);
	        $this->load->model('Admin_model');
	        $this->Admin_model->Delete($id);
	        
	        if($userType == "doctors"){
	            redirect('/Admin_controller/ManageDoctors');
	        }else if($userType == "patients"){
	            redirect('/Admin_controller/ManagePatients');
	        }else if($userType == "admin"){
	            redirect('/Admin_controller/ManageAdmins');
	        }else{
	            redirect('/Admin_controller/ManageDoctors');
	        }
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ShowUpdateForm(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $userType = $this->uri->segment(3);
	        $viewData['userType'] = $userType;
	        $this->load->view('admin_modal_form', $viewData);
	        if($userType == "doctors"){
	            $this->ManageDoctors();
	        }else if($userType == "patients"){
	            $this->ManagePatients();
	        }else if($userType == "admin"){
	            $this->ManageAdmins();
	        }else{
	            $this->ManageDoctors();
	        }
	    }else{
	        $this->load->view('login');
	    }
	}
	
	public function UpdateDoctor(){	
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $id = $this->uri->segment(3);
	        $this->load->model('Admin_model');
	        
	        $dob = $this->input->post('dob');
	        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	            
	        $data = array(
	            'dob' => $dob,
	            'firstname' => $firstname,
	            'lastname' => $lastname
	        );
	        
	        $this->Admin_model->UpdateDoctor($id, $data);
	        redirect('/Admin_controller/ManageDoctors');
	       //$this->Admin_model->UpdateDoctor($id);
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function UpdatePatient(){	
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $id = $this->uri->segment(3);
	        $this->load->model('Admin_model');
	        
	        $dob = $this->input->post('dob');
	        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	        
	        $data = array(
	            'dob' => $dob,
	            'firstname' => $firstname,
	            'lastname' => $lastname
	        );
	        
	        $this->Admin_model->UpdatePatient($id, $data);
	        redirect('/Admin_controller/ManagePatients');
	       //$this->Admin_model->UpdateDoctor($id);
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function Cancel(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $refFrom = $this->session->userdata('refFrom');
	        redirect($refFrom, 'refresh');
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ShowAddForm(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $userType = $this->uri->segment(3);
	        $viewData['userType'] = $userType;
	        $this->load->view('admin_modal_form_add', $viewData);
	        if($userType == "doctors"){
	            $this->ManageDoctors();
	        }else if($userType == "patients"){
	            $this->ManagePatients();
	        }else if($userType == "admin"){
	            $this->ManageAdmins();
	        }else{
	            $this->ManageDoctors();
	        }
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function AddDoctor(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->load->model('Admin_model');
	        $passHash = password_hash('password', PASSWORD_BCRYPT);
	        
	        $email = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
	        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	        $dob = $this->input->post('dob');
	        
	        $data = array(
	            'email' => $email,
	            'firstname' => $firstname,
	            'lastname' => $lastname,
	            'password' => $passHash,
	            'dob' => $dob,
	            'utype' => 'doctor'
	        );
	        
	        $this->Admin_model->AddDoctor($data);
	        redirect('/Admin_controller/ManageDoctors');
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function AddAdmin(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'admin'){
	        $this->load->model('Admin_model');
	        $passHash = password_hash('password', PASSWORD_BCRYPT);
	        
	        $email = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
	        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	        $dob = $this->input->post('dob');
	        
	        $data = array(
	            'email' => $email,
	            'firstname' => $firstname,
	            'lastname' => $lastname,
	            'password' => $passHash,
	            'dob' => $dob,
	            'utype' => 'admin'
	        );
	        
	        $this->Admin_model->AddAdmin($data);
	        redirect('/Admin_controller/ManageAdmins');
	    }else{
	        redirect('/Login_controller');
	    }
	}
}
