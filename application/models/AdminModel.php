<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

    public function __construct(){
        parent:: __construct();

        $this->load->database();
    }
        //GETTING ALL APPOINTMENTS
    public function getAllAppointment($limit , $offset){
        
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->ORDER_BY('appointment_id DESC');

        $query = $this->db->get('appointments');

        if(!$query){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    public function countAllAppointments(){
        return $this->db->get('appointments')->num_rows();
    }
    
    //GETTING ALL EMPLOYEE ACCOUNTS
    public function getAllEmployees(){
        
        $user_role = array('2' ,'3' ,'4');
      
        $this->db->ORDER_BY('user_ID DESC');
        
        $this->db->WHERE_IN('user_role', $user_role);

        $query = $this->db->get('users_table');

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    } 
    
  
    //GETTING ALL CLIENT ACCOUNTS
    public function getAllClients(){
        

        $this->db->ORDER_BY('user_ID DESC');
        $this->db->WHERE('user_role' , 1 );

        $query = $this->db->get('users_table');

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    }
   
    //GETTING ALL TRANSACTIONS
    public function getAllTransaction(){
        
        $this->db->select('*,transaction.status as transaction_status');
        $this->db->from('transaction');
        $this->db->join('users_table', 'transaction.consignee_id = users_table.user_ID',
                        'users_table' , 'transaction.processor_id = users_table.user_ID');
        $this->db->order_by('date_posted', 'desc');

        $query = $this->db->get();

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    }
    
     public function countAllTransaction(){

        $result= $this->db->get('transaction');
        return $result->num_rows();
    }
    //REGISTER USER ACCOUNT

    public function register_user($data){
      $result = $this->db->insert('users_table' , $data);
      return $result;
    }
    
    public function delete_user($id){
        $this->db->where('user_ID' , $id);
        $this->db->delete('users_table');
        return TRUE;
    }
    public function delete_appointment($id){
        $this->db->where('appointment_ID' , $id);
        $this->db->delete('appointments');
        return TRUE;
    } 
}