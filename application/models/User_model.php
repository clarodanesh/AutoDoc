<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class User_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function GetDoctors(){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('utype'=> 'doctor'));
        return $query;
    }
    
    function GetDoctorName($email){
        //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('email' => $email, 'utype'=> 'doctor'));
        return $query;
    }
    
    function set_appt($data){
        //$query = $this->db->get_where('users', array('email'=> $data['email'], 'password'=> $data['password']),1,0);
        $this->db->insert('appt', $data);
        return $this->db->affected_rows();
    }
    
    function get_appt($data){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('appt', array('doctor'=> $data['doctor'], 'date'=> $data['date'], 'time'=> $data['time'], 'astate' => 'booked'),1,0);
        return $query;
    }
    
    function get_appt_single($data){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('appt', array('user' => $data, 'astate' => 'booked'),1,0);
        return $query;
    }
    
    function GetUser($email){
        $query = $this->db->get_where('users', array('email' => $email),1,0);
        return $query;
    }
    
    function EditUser($email, $data){
        $this->db->where('email', $email);
        $this->db->update('users', $data);
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
        $this->db->delete('appt', array('apptid' => $id));
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
}
?>    
