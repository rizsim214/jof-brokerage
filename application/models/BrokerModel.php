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

     public function updateAccount(){


        echo "sdsadasdas";
       $id = $this->input->post('user_ID');

    //   echo $id;
    //    print_r($id);
        $data = array(
            
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'company_name' => $this->input->post('company_name'),
            'company_location' => $this->input->post('company_location'),
            'email_add' => $this->input->post('email'),
            'user_pass' => md5($this->input->post('password')),
            'contact_info' => $this->input->post('contact'),
            

    );

  //  print_r($data);

   
   
        $this->db->where('user_ID',$id);
         return $this->db->update('users_table',$data);


     }

     public function update_user($datar){

       // echo "asdasdasd";
      
       $this->db->where('user_ID',$id);
        $result = $this->db->update('users_table' , $datar);
        print_r($datar);
        return $result;
      }


    }