<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

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
		    $this->load->view('login');
	    }
	}
	
	public function CheckLogin(){
	    $this->load->model('Login_model');
	    $data = array(
	            'email' => $this->input->post('email'),
	            'password' => $this->input->post('password')
	    );
	    
	    $user = $this->Login_model->check_user($data);
	    if($user->num_rows() == 1){
	        echo 'yes';
	        foreach ($user->result() as $row){
                $data[] = $row;
            }          
            
            $Email = $data['0']->email;
            $uType = $data['0']->utype;
            
            $this->session->set_userdata('email', $Email); 
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
	        $this->load->view('login');
	    }
	}   
}
