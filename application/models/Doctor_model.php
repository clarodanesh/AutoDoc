<?php
defined ('BASEPATH')OR exit ('No direct script access allowed');
class Doctor_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function GetDocAppts($data){
        $query = $this->db->get_where('appt', array('doctor'=> $data, 'astate' => 'booked'),1,0);
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
    
    function GetUser($email){
        $query = $this->db->get_where('users', array('email' => $email),1,0);
        return $query;
    }
    
    function GetPatients(){
    //, 'password'=> $data['password']
        $query = $this->db->get_where('users', array('utype'=> 'user'));
        return $query;
    }
    
    function Delete($id){
        $this->db->delete('appt', array('apptid' => $id));
    }
    
    function GetDocPass($email){
        $query = $this->db->get_where('users', array('email'=> $email));
        return $query;
    }
    
    function UpdatePassword($e, $p){
        $this->db->where('email', $e);
        $this->db->update('users', array('password'=> $p));
    }
}
?>    
