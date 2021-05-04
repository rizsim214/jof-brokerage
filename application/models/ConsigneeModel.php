<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ConsigneeModel extends CI_Model{

    function __construct() {
         $this->load->database();
         parent:: __construct();

    }

    public function getTransactions($id){
        $this->db->select('*');
        $this->db->select('transaction.status as transaction_status');
        $this->db->from('transaction');
        $this->db->join('users_table', 'users_table.user_ID = transaction.processor_id', 'left');
        $this->db->where('consignee_id', $id);
        $this->db->order_by('transaction.transaction_id', "DESC");

        $result = $this->db->get();

        return $result->result();
    }

    public function insertTransaction($data){
     
        $result = $this->db->insert('transaction', $data);

        return $result;
    }
    public function insertRating($data){
     
        $result = $this->db->insert('feedbacks', $data);

        return $result;
    }

    public function postEvaluation($post_data){
       
       $result = $this->db->insert('feedback', $post_data);

       return $result;
    }
}

