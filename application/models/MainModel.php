<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model{

    function __construct(){
        parent:: __construct();

        $this->load->database();
    }


    function insert_appointment($data){
      $result =  $this->db->insert('appointments' , $data);
      return $result;
    }

    public function check_user($email , $pass){
     
      $this->db->SELECT('*');
      $this->db->FROM('users_table');
      $this->db->where('email_add' , $email);
      $this->db->where('user_pass' , $pass);
     
      return $result = $this->db->get()->row_array();
    }
}