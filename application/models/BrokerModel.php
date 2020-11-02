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


    }