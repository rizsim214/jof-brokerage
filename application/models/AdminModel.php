<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

    public function __construct(){
        parent:: __construct();

        $this->load->database();
    }

    public function getAllAppointment($limit , $offset){
        
        $this->db->limit($limit);
        $this->db->offset($offset);
        $this->db->ORDER_BY('appointment_id DESC');

        $query = $this->db->get('appointment');

        if(!$query){
            return FALSE;
        }else{
            return $query->result();
        }
    }
    public function countAllAppointments(){
        return $this->db->get('appointment')->num_rows();
    }
}