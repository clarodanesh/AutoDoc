<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function check_user($data){
        $query = $this->db->get_where('users', array('email'=> $data['email'], 'password'=> $data['password']),1,0);
        return $query;
    }
}
?>    
