<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model{

    function __construct(){
        parent:: __construct();

        $this->load->database();
    }


    function insert_appointment($data){
      if(!$data){
        return FALSE;
      }else{
        $result =  $this->db->insert('appointment' , $data);
              return $result;
        }
      }
     

    public function check_user($data){
     if(!$data){
      return FALSE;
     }else{
       $this->db->select('*');
       $this->db->from('users');
       $this->db->where('email_add' , $data['email_add']);
       $this->db->where('password' , $data['user_pass']);
      $result = $this->db->get();
       return $result->row_array();
     }
     
      
    }
}