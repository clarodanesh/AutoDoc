<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function set_user($data){
        //$query = $this->db->get_where('users', array('email'=> $data['email'], 'password'=> $data['password']),1,0);
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }
    
    function get_users($data){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('email'=> $data['email']),1,0);
        return $query;
    }
}
?>    
