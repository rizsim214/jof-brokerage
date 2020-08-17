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
        $result =  $this->db->insert('appointments' , $data);
            return TRUE;
        }
      }
     

    public function check_user($email , $password){
     if(!$email && !$password){
      return FALSE;
     }else{

       $this->db->select('*');
       $this->db->from('users_table');
       $this->db->where('email_add' , $email);
       $this->db->where('user_pass' , $password);

      $result = $this->db->get();
      
       return $result->row_array();
     }
     
      
    }
}