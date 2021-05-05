<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrokerModel extends CI_Model{

    public function __construct(){
        parent:: __construct();

        $this->load->database();
    }


    public function countAllEmployees(){
        $user_role = array('2' ,'3' ,'4');
        
         $this->db->WHERE_IN('user_role' , $user_role);
         $result = $this->db->get('users_table');
         return $result->num_rows();
     }

     public function get_editEmp($param){

        $this->db->where('user_ID',$param);
            $result =  $this->db->get('users_table');
        
            return $result->row_array();
     }

     public function updateAccount($id, $data){

        $this->db->set($data);
        $this->db->where('user_ID',$id);
         return $this->db->update('users_table');

         


     }

     public function update_user($datar){

       // echo "asdasdasd";
      
       $this->db->where('user_ID',$id);
        $result = $this->db->update('users_table' , $datar);
        print_r($datar);
        return $result;
      }


      public function get_done(){
        
        
       // $rar =   $this->db->WHERE('processor_id' , $this->session->user_ID );
        $this->db->WHERE('status' , 'delivered' );
        $this->db->from('transaction');
        $this->db->join('users_table','transaction.consignee_id = users_table.user_ID');
        $this->db->order_by('date_posted', 'desc');
         $result = $this->db->get();

         

    
        // $this->db->where('user_role', 1);
    //    $qqw = $this->db->join('transaction',' transaction.transaction_id =  users_table.user_ID');
       

      //  var_dump($qwe);
    //    foreach($query as $rw)
    //    {
    //    echo $rw->first_name;
    //    }

        if(!$result){
            return NULL;
        }else{
            return $result->result();
        
        }
    


    }

    public function get_mine($var){

         $rar =  $this->db->WHERE('processor_id' , $this->session->user_ID );
         $this->db->from('transaction');
       //
       // $this->db->where('user_ID',$var);
        $this->db->join('users_table' , 'transaction.consignee_id = users_table.user_ID');
         $this->db->order_by('date_posted', 'desc');
         $result = $this->db->get();

        //  var_dump($result);
        //  exit;

        // $this->db->select('* , transaction.status as transaction_status');
        // $this->db->from('transaction');
        // $this->db->where('user_ID' , $var);
        // $this->db->join('users_table' , 'transaction.consignee_id = users_table.user_ID');
        // $this->db->order_by('date_posted' , 'DESC');
        // $result = $this->db->get();


        if(!$result){
            return NULL;
        }else{
            return $result->result();
        }
    }
        


        public function getMineActive(){

            $this->db->select('*,transaction.status as transaction_status');
            $this->db->where('processor_id', $this->session->user_ID);
            $this->db->where('status !=','delivered' );
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


    


    

}

