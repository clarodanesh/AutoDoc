<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class Admin_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function GetDoctors(){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('utype'=> 'doctor'));
        return $query;
    }
    
    function GetPatients(){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('utype'=> 'user'));
        return $query;
    }
    
    function GetAdmins(){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('utype'=> 'admin'));
        return $query;
    }
    
    function Delete($id){
        $this->db->delete('users', array('id' => $id));
    }
    
    function UpdateDoctor($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    
    function UpdatePatient($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    
    function AddDoctor($data){
        //$query = $this->db->get_where('users', array('email'=> $data['email'], 'password'=> $data['password']),1,0);
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }
    
    function AddAdmin($data){
        //$query = $this->db->get_where('users', array('email'=> $data['email'], 'password'=> $data['password']),1,0);
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }
    
    function GetAdmPass($email){
        $query = $this->db->get_where('users', array('email'=> $email));
        return $query;
    }
    
    function UpdatePassword($e, $p){
        $this->db->where('email', $e);
        $this->db->update('users', array('password'=> $p));
    }
    
    function GetUsers($e){
        $query = $this->db->get_where('users', array('email'=> $e),1,0);
        return $query;
    }
}
?>    
