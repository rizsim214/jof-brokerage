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

   public function get_questions(){
     $this->db->select('*');
     $this->db->from('predef_questions');
     $this->db->order_by('question_ID DESC');
     $result = $this->db->get();
     if(!$result){
        return NULL;
     }else{
       return $result->result();
     }
   }
    public function get_all_feedbacks(){
      $this->db->select('*');
      $this->db->from('feedbacks');
     
      
      //  $this->db->where('feedback_status' , 1);
      $this->db->ORDER_BY('feedback_ID DESC');
      $this->db->join('users_table' , 'feedbacks.user_fk_ID = users_table.user_ID' );
      $result = $this->db->get();

      if(!$result){
        return NULL;
      }else{
        return $result->result();
      }
    }
    public function countAllGlossary(){
        $result = $this->db->get('glossary_table');
        return $result->num_rows();
    }
    public function create_client_account($register_data){
        if(!$register_data){
          return NULL;
        }else{
          $result =  $this->db->insert('users_table' , $register_data);
            return TRUE;
        }
    }
    // public function get_all_glossary($limit , $offset){
    //   $this->db->select('*');
    //   $this->db->from('glossary_table');
    //   $this->db->limit($limit);
    //   $this->db->offset($offset);
    //   // $this->db->where('feedback_status' , 1);
    //   $this->db->ORDER_BY('glossary_ID DESC');
  
    //   $result = $this->db->get();

    //   if(!$result){
    //     return NULL;
    //   }else{
    //     return $result->result();
    //   }
    // }
      public function get_all_glossary(){
      $this->db->select('*');
      $this->db->from('glossary_table');
     
      // $this->db->where('feedback_status' , 1);
      $this->db->ORDER_BY('glossary_ID DESC');
  
      $result = $this->db->get();

      if(!$result){
        return NULL;
      }else{
        return $result->result();
      }
    }
}