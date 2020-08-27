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
    public function getAllEmployees($limit , $offset){
        
        $user_role = array('2' ,'3' ,'4');
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->ORDER_BY('user_ID DESC');
        
        $this->db->WHERE_IN('user_role', $user_role);

        $query = $this->db->get('users_table');

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    }
    
    public function countAllEmployees(){
       $user_role = array('2' ,'3' ,'4');
       
        $this->db->WHERE_IN('user_role' , $user_role);
        $result = $this->db->get('users_table');
        return $result->num_rows();
    }
    //GETTING ALL CLIENT ACCOUNTS
    public function getAllClients($limit , $offset){
        
        
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->ORDER_BY('user_ID DESC');
        $this->db->WHERE('user_role' , 1 );

        $query = $this->db->get('users_table');

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    }
    
     public function countAllClients(){
       
        $this->db->where('user_role' , 1);
        $result= $this->db->get('users_table');
        return $result->num_rows();
    }
    //GETTING ALL TRANSACTIONS
    public function getAllTransaction($limit , $offset){
        
        $this->db->select('*,transaction.status as transaction_status');
        $this->db->from('transaction');
        $this->db->join('users_table', 'transaction.consignee_id = users_table.user_ID');
        $this->db->order_by('date_posted', 'desc');
        $this->db->limit($limit);
        $this->db->offset($offset);
        
       

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
}