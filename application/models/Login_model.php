<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function check_user($data){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('email'=> $data['email']),1,0);
        return $query;
    }
}
?>    
