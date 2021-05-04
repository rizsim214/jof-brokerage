<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

    public function __construct(){
        parent:: __construct();

        $this->load->database();
    }

    public function get_client_data($id){
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->where('user_ID' , $id);
        $query = $this->db->get();
        if(!$query){
           return NULL;
        }else{
             return $query->row_array();
        }
        
    }   

    public function getTransactionItem($billing_items_id, $transaction_billing_id){

        $this->db->select('*');
        $this->db->from('transaction_items');
        $this->db->where('transaction_billing_id' , $transaction_billing_id);
        $this->db->where('transaction_billing_item_id' , $billing_items_id);

        $query = $this->db->get();
        if(!$query){
           return NULL;
        }else{
             return $query->row_array();
        }

    }
    public function getTransactionbilling($transaction_number){
        $this->db->select('*');
        $this->db->from('transaction_billing');
        $this->db->where('transaction_number' , $transaction_number);
        $query = $this->db->get();

        if(!$query){
            return NULL;
         }else{
              return $query->row_array();
         }
    }

    public function deleteTransactionBillingItems($transaction_billing_id){
        $this->db->where('transaction_billing_id', $transaction_billing_id);
        $this->db->delete('transaction_items');

    }

    public function deleteTransactionBilling($transaction_number){
        $this->db->where('transaction_number', $transaction_number);
        $this->db->delete('transaction_billing');

    }

    public function change_account_status($data, $id){


        $this->db->select('*');
        $this->db->from('users_table');
         $this->db->where('user_ID' , $id);
         $this->db->update('users_table' , $data);
         $result = $this->db->affected_rows();
         
        if(!$result){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function get_user_info($id){
       $this->db->select('*');
       $this->db->from('users_table');
        $this->db->where('user_ID' , $id);
      $this_query = $this->db->get();
      return $this_query->result();
    }
    
     public function get_user_info_delete($id){
       $this->db->select('*');
       $this->db->from('users_table');
        $this->db->where('user_ID' , $id);
      $this_query = $this->db->get();
      return $this_query->row();
    }
        //GETTING ALL APPOINTMENTS
    public function getAllAppointment(){
        
        
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->order_by('appointment_ID', 'DESC');
        $query = $this->db->get();

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
        

        
        $this->db->WHERE('user_role' , 1 );
        $this->db->ORDER_BY('user_ID DESC');
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
        $this->db->join('users_table', 'transaction.consignee_id = users_table.user_ID');
        $this->db->order_by('date_posted', 'DESC');

        $query = $this->db->get();

        if(!$query){
            return NULL;
        }else{
            return $query->result();
        }
    }
    public function getBillingItems(){
        $this->db->select('*');
        $this->db->from('billing_items');
        $result = $this->db->get();

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }

    public function insert_billing_item($data){
        $result = $this->db->insert('billing_items' , $data);

        if(!$result){
            return NULL;
        }else{
            return $result;
        }

    }
    public function get_this_transaction($id){
        $this->db->select('* , transaction.status as transaction_status');
        $this->db->from('transaction');
        $this->db->where('user_ID' , $id);
        $this->db->join('users_table' , 'transaction.consignee_id = users_table.user_ID');
        $this->db->order_by('date_posted' , 'DESC');

        $result = $this->db->get();

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
    public function getProcessor($id){
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->where('user_ID', $id);
        $result = $this->db->get();
        return $result->row();
    }
    public function checkRating($id){
        $this->db->select('*');
        $this->db->from('feedbacks');
        $this->db->where('transaction_id', $id);
        $result = $this->db->get();
        return $result->row();
    }
    public function updateTransaction($id, $data){
        $this->db->set($data);
        $this->db->where('transaction_id', $id);

        $result = $this->db->update('transaction');
        return $result;
    }
    public function get_billing_data($id){
        $this->db->select('*');
        $this->db->from('billing_items');
        $this->db->where('billing_items_id' , $id);
        $result = $this->db->get();

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
    public function post_this_billing($id, $data){
        $this->db->select('*');
        $this->db->from('billing_items');
        $this->db->where('billing_items_id' , $id);
        $this->db->update('billing_items',$data);
        $result = $this->db->affected_rows();

        if(!$result){
            return NULL;
        }else{
            return $result;
        }
    }
    public function insertBilling($data){
        $this->db->insert('transaction_billing' , $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    public function insertBillingItems($data){
        $result = $this->db->insert('transaction_items' , $data);
       
        return  $result;
    }
    public function getUser($id){
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->where('user_ID', $id);

        $result = $this->db->get();
        return $result->row();
        
    }

    public function getAllTransactions(){
        $this->db->select('*,transaction.status as transaction_status');
        $this->db->from('transaction');
        $this->db->join('users_table', 'transaction.consignee_id = users_table.user_ID');
        $this->db->order_by('date_posted', 'desc');
        $result = $this->db->get();

        return $result->result();

    }

    public function getAllbroker(){
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->where('user_role', 2);
        $this->db->where('active_status', 'active');
        $result = $this->db->get();

        return $result->result();

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
    
    public function delete_user($data, $id){
        $this->db->where('user_ID' , $id);
        $this->db->update('users_table' , $data);
        

        return TRUE;
       
    }
    public function delete_appointment($id){
        $this->db->where('appointment_ID' , $id);
        $this->db->delete('appointments');
        return TRUE;
    } 

     //FEEDBACK FUNCTIONS
    public function delete_this_feedback($id){
        $this->db->where('feedback_ID' , $id);
        $this->db->delete('feedbacks');
        return TRUE;
    }
    public function countAllFeedbacks(){
        $result = $this->db->get('feedbacks');
        return $result->num_rows();
    }
    public function get_feedback(){
       $this->db->select('*');
       $this->db->from('feedbacks');
       $this->db->ORDER_BY('feedback_ID DESC');
       $this->db->join('users_table' , 'feedbacks.user_fk_ID = users_table.user_ID');
       $query = $this->db->get();

       return $query->result();
    }
    public function get_average_feedback(){
        $this->db->select_avg('rating');
        $this->db->from('feedbacks');
        $this->db->ORDER_BY('feedback_ID DESC');
        $this->db->join('users_table' , 'feedbacks.user_fk_ID = users_table.user_ID');
        $query = $this->db->get();


        if(!$query){
            return NULL;
         }else{
              return $query->row_array();
         }
     }
     public function post_question($data){
         $result = $this->db->insert('predef_questions' , $data);
        
         if(!$result){
            return NULL;
         }else{
             return TRUE;
         }
     }
     public function delete_this_question($id){
         $this->db->where('question_ID' , $id);
        $this->db->delete('predef_questions');
        return TRUE;
    }
     public function getAllContactQuestions(){
         
         $this->db->select('*');
         $this->db->from('predef_questions');
         $this->db->order_by('question_ID DESC');
         $result = $this->db->get();
         return $result->result();
     }
    // GLOSSARY MODEL
    public function add_glossary($data){
        $result = $this->db->insert('glossary_table' , $data);
      return $result;
    }
    public function countAllGlossary(){
        $result = $this->db->get('glossary_table');
        return $result->num_rows();
    }
    public function get_glossary(){
        $this->db->select('*');
       $this->db->from('glossary_table');
       $this->db->ORDER_BY('glossary_ID DESC');
      
       $query = $this->db->get();

       return $query->result();
    }
    public function get_this_question($id){
        $this->db->select('*');
        $this->db->from('predef_questions');
        $this->db->where('question_ID' , $id);
        $result = $this->db->get();

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
    public function update_this_question($data, $id){
         $this->db->where('question_ID' , $id);
        $this->db->update('predef_questions' , $data);
        $result = $this->db->affected_rows();
        if(!$result){
            return NULL;
        }else{
            return $result;
        }
    }
   
    public function get_this_glossary($id){
        $this->db->select('*');
        $this->db->from('glossary_table');
        $this->db->where('glossary_ID' , $id);
        $result = $this->db->get();

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
    public function update_this_glossary($data , $id){
        
        $this->db->where('glossary_ID' , $id);
        $this->db->update('glossary_table' , $data);
        $result = $this->db->affected_rows();
        if(!$result){
            return NULL;
        }else{
            return $result;
        }
    }
    //  $this->db->where('appointment_ID' , $id);
    //      $this->db->update('appointments' , $data);
    //      $result = $this->db->affected_rows();
    //     return $result;
        // 
    public function delete_this_glossary($id){
         $this->db->where('glossary_ID' , $id);
        $this->db->delete('glossary_table');
        return TRUE;
    }
    
    public function get_this_user($id){
        $this->db->select('*');
        $this->db->from('users_table');
        $this->db->where('user_ID' , $id);

        $result = $this->db->get();
            if(!$result){
                return NULL;
            }else{
                return $result->result();
            }
    }
    
    
    public function get_message($id){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('appointment_ID' , $id);
        $this->db->order_by('appointment_ID' , 'DESC');
        $result = $this->db->get();
        if(!$result){
            return FALSE;
        }else{
            return $result->row_array();
        }
    }
    public function change_appointment_status($data , $id){
        
         $this->db->where('appointment_ID' , $id);
         $this->db->update('appointments' , $data);
         $result = $this->db->affected_rows();
        return $result;
    }

    public function get_final_message($id){
        $this->db->select('*');
        $this->db->from('appointments');
        $this->db->where('appointment_ID' , $id);
        $this->db->order_by('appointment_ID' , 'DESC');
        $result = $this->db->get();

        return $result->result();
    }

    public function get_feedback_result($id){
        $this->db->select('*');
        $this->db->from('feedbacks');
        $this->db->where('feedback_ID' , $id);
        $result = $this->db->get();

        return $result->result();
    }
     public function update_feedback($data , $id){
        
         $this->db->where('feedback_ID' , $id);
         $this->db->update('feedbacks' , $data);
         $result = $this->db->affected_rows();
        return $result;
    }

}
