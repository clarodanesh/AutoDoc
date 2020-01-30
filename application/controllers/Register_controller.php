<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_controller extends CI_Controller {

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

	public function index(){
	    //echo $this->session->logged;
	    
	    //if the session with email and userType are set then open that user session type page
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType')){
	        //echo 'email and utype are set';
	        //echo $this->session->email;
	        //echo $this->session->uType;
	        if($this->session->uType == 'admin'){
	            redirect('/Admin_controller');
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
		    $this->load->view('register');
	    }
	}
	
	public function AttemptRegister(){
	    $this->load->model('Register_model');
	    
	    //filter_var($str, FILTER_SANITIZE_STRING)
	    //filter_var($email, FILTER_SANITIZE_EMAIL)
	    
	    $email = filter_var($this->input->post('email'), FILTER_SANITIZE_EMAIL);
	    $password = $this->input->post('password');
	    $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	    $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	    $passLength = strlen($password);
	    
	    if(filter_var($email, FILTER_VALIDATE_EMAIL) && $password && $firstname && $lastname && $passLength > 6){
	        $passHash = password_hash($password, PASSWORD_BCRYPT);
	        
	        //check if all the variables are set
	        $data = array(
	                'email' => $email,
	                'password' => $passHash,
	                'firstname' => $firstname,
	                'lastname' => $lastname,
	                'utype' => 'user'
	        );
	        
	        if($this->IsUserUnique($email)){
	            $affRows = $this->Register_model->set_user($data);
	            if($affRows > 0){
	                echo 'yes';
                    
                    $uType = 'user';
                    
                    $this->session->set_userdata('email', $email); 
                    $this->session->set_userdata('uType', $uType);
                    
                    //$this->session->sess_destroy();
                    if($uType == 'admin'){
                        redirect('/Admin_controller');
                    }
                    else if($uType == 'doctor'){
                        redirect('/Doctor_controller');
                    }
                    else if($uType == 'user'){
                        redirect('/User_controller');
                    }
                    else{
                        echo 'user type not recognised';
                    }
	                //will successfully go to a new controller and method when called
	                /*$this->load->view('<?php echo base_url(); ?>Check_controller/hello');*/
	            }else{
	                echo 'no';
	                $viewData['error'] = 'Unable to set data. Try again';
	                $this->load->view('register', $viewData); //here pass a variable with the error in, then in the view make a empty div to hold the error variable 
	            }
	        }else{
	            $viewData['error'] = 'Use a unique email';
	            $this->load->view('register', $viewData);  
	        }
	    }else{
	        $viewData['error'] = 'Please fill the form correctly';
	        $this->load->view('register', $viewData);
	    }
	}  
	
	public function IsUserUnique($e){
	    $this->load->model('Register_model');
	
	    $data = array(
	        'email' => $e
	    );
	
	    $user = $this->Register_model->get_users($data);
	    if($user->num_rows() > 0){
	        return false;
	    }else{
	        return true;
	    }
	} 
}
