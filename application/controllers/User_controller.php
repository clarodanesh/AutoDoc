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
	            $appts = $this->User_model->get_appt_single($this->session->email);
	            
	            if($docs->num_rows() > 0){
	                foreach ($docs->result() as $row){
                        $data[] = $row;
                    } 
                    
                    if($appts->num_rows() == 1){
                        foreach ($appts->result() as $row2){
                            $data2[] = $row2;
                        } 
                        $viewData['appts'] = $data2;
                    }else{
                        $viewData['appts'] = "empty";
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
	
	public function cancel(){
	    $id = $this->uri->segment(3);
	    $this->load->model('User_model');
	    $this->User_model->Delete($id);
	}
	
	private function _CheckDate($date){
	    
	    /*echo '<br>';
	    echo $date[0];
	    echo '-';
	    echo $date[1];
	    echo '-';
	    echo $date[2];
	    echo '<br>';*/
	    $currDate = date('Y-m-d');
	    $currDateArr = explode("-", $currDate);
	    $currDateints = array_map(
            function($value) { return (int)$value; },
            $currDateArr
        );
        
        if($date[0] >= $currDateints[0]){
        //echo '<br>first<br>';
        //echo $currDateints[0];
            if($date[1] >= $currDateints[1]){
            //echo '<br>second<br>';
            //echo $currDateints[1];
                if($date[2] >= $currDateints[2]){
                //echo '<br>third<br>';
                //echo $currDateints[2];
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
	}
	
	private function _CheckTime($time){
	    if($time[0] <= 17 && $time[0] >= 9){
	        return true;
	    }
	    else{
	        return false;
	    }
	}
	
	private function _IsBookingUnique($uniqueData){
	    $this->load->model('User_model');
	
	    $data = array(
	        'doctor' => $uniqueData['doctor'],
	        'date' => $uniqueData['date'],
	        'time' => $uniqueData['time'],
	        'astate' => 'booked'
	    );
	
	    $user = $this->User_model->get_appt($data);
	    if($user->num_rows() > 0){
	        //echo 'bookin no unique';
	        return false;
	    }else{
	        //echo 'bookin unique';
	        return true;
	    }
	} 
	
	private function _IsUserBookingUnique(){
	    $this->load->model('User_model');
	
	    /*$data = array(
	        'user' => $this->session->email,
	    );*/
	
	    $user = $this->User_model->get_appt_single($this->session->email);
	    if($user->num_rows() > 0){
	        //echo 'bookin no unique';
	        return false;
	    }else{
	        //echo 'bookin unique';
	        return true;
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
	        /*echo $this->input->post('date');
	        echo " ";
	        echo $this->input->post('time');*/
	        $exp = explode(":", $this->input->post('time'));
	        $expDate = explode("-", $this->input->post('date'));
	        /*echo " ";
	        echo $exp[0];
	        echo $exp[1];
	        echo $expDate[0];
	        echo $expDate[1];
	        echo $expDate[2];
	        echo " ";
	        echo $this->input->post('doc-slct');
	        echo " ";
	        echo 'booked appt ';*/
	        
	        $time = array_map(
                function($value) { return (int)$value; },
                $exp
            );
            
            $date = array_map(
                function($value) { return (int)$value; },
                $expDate
            );
            
            $uniqueData = array(
                'doctor' => $this->input->post('doc-slct'),
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time')
            );
	        
	        if($this->_CheckTime($time) && $this->_CheckDate($date) && $this->_isBookingUnique($uniqueData) && $this->_IsUserBookingUnique()){
	            //echo 'working out';
	            $data = array(
	                'date' => $this->input->post('date'),
	                'time' => $this->input->post('time'),
	                'doctor' => $this->input->post('doc-slct'),
	                'user' => $this->session->email,
	                'astate' => 'booked'
	            );
	            
	            $affRows = $this->User_model->set_appt($data);
	            if($affRows > 0){
	                redirect('/User_controller/');
	            }
	        }else{
	            //echo 'not working out';
	            $this->load->model('User_model');
	            $docs = $this->User_model->GetDoctors();
	            $appts = $this->User_model->get_appt_single($this->session->email);
	            
	            if($docs->num_rows() > 0){
	                foreach ($docs->result() as $row){
                        $data[] = $row;
                    } 
                    
                    if($appts->num_rows() == 1){
                        foreach ($appts->result() as $row2){
                            $data2[] = $row2;
                        } 
                        $viewData['appts'] = $data2;
                    }else{
                        $viewData['appts'] = "empty";
                    }
                    
                    $viewData['doctors'] = $data;
                    $this->load->view('user_nav');
	                $viewData['error'] = 'Fill the booking in correctly';
	                $this->load->view("user_landing", $viewData);
	            }else{
	                if($appts->num_rows() == 1){
                        foreach ($appts->result() as $row2){
                            $data2[] = $row2;
                        } 
                        $viewData['appts'] = $data2;
                    }else{
                        $viewData['appts'] = "empty";
                    }
	            
	                $viewData['doctors'] = "empty";
	                $this->load->view('user_nav');
	                $viewData['error'] = 'Fill the booking in correctly';
	                $this->load->view('user_landing', $viewData); 
	            }
	        }
	        
	        
	        /*UNCOMMENT ONCE FINISHED VALIDATION OF INPUT*/
	        /*$data = array(
	            'date' => $this->input->post('date'),
	            'time' => $this->input->post('time'),
	            'doctor' => $this->input->post('doc-slct'),
	            'user' => $this->session->email,
	            'astate' => 'booked'
	        );
	        
	        $this->User_model->set_appt($data);*/
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function ViewDetails(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'user'){
	        $this->load->model('User_model');
	        $user = $this->User_model->GetUser($this->session->email);
	        
	        foreach ($user->result() as $row){
                $data[] = $row;
            } 
            
            $viewData['dob'] = $data[0]->dob;
            $viewData['firstname'] = $data[0]->firstname;
            $viewData['lastname'] = $data[0]->lastname;
	        
	        $this->load->view('user_nav');
	        $this->load->view('user_view_details', $viewData);
	    }else{
	        redirect('/Login_controller');
	    }
	}
	
	public function EditDetails(){
	    if($this->session->has_userdata('email') && $this->session->has_userdata('uType') && $this->session->uType == 'user'){
	        $this->load->model('User_model');
	        
	        $dob = filter_var($this->input->post('dob'), FILTER_SANITIZE_STRING);
	        $firstname = filter_var($this->input->post('firstname'), FILTER_SANITIZE_STRING);
	        $lastname = filter_var($this->input->post('lastname'), FILTER_SANITIZE_STRING);
	           echo 'check';
	        echo $this->input->post('dob'); 
	        echo " ";
	        echo $this->input->post('firstname');
	        echo " ";
	        echo $this->input->post('lastname');
	                           
	        $data = array(
	            'firstname' => $firstname,
	            'lastname' => $lastname,
	            'dob' => $dob
	        );
	        
	        $this->User_model->EditUser($this->session->email, $data);
	        redirect('User_controller/ViewDetails');
	    }else{
	        redirect('/Login_controller');
	    }
	}
}
