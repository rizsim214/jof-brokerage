<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{

    public function __construct(){
        parent:: __construct();

        $this->load->database();
    }

    public function getAllAppointment(){
        $query = $this->db->query('SELECT * FROM appointment');

        if(!$query){
            return FALSE;
        }else{
            return $query->result();
        }
    }
}