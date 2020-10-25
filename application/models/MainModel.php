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
      return NULL;
      
     }else{

       $this->db->select('*');
       $this->db->from('users_table');
       $this->db->where('email_add' , $email);
       $this->db->where('user_pass' , $password);

      $result = $this->db->get();
      
       return $result->row_array();
     }      
    }

    public function countAllFeedbacks(){
        $result = $this->db->get('feedbacks');
        return $result->num_rows();
    }
    public function get_all_feedbacks(){
      $this->db->select('*');
      $this->db->from('feedbacks');
      // $this->db->where('feedback_status' , 1);
      $this->db->ORDER_BY('feedback_ID DESC');
      $this->db->join('users_table' , 'feedbacks.user_fk_ID = users_table.user_ID' );
      $result = $this->db->get();

      if(!$result){
        return NULL;
      }else{
        return $result->result();
      }
    }
}