<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

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