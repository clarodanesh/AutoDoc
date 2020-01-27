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
    
    function DeleteDoctor($id){
        $this->db->delete('users', array('id' => $id));
    }
    
    function UpdateDoctor($id, $data){
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
}
?>    
