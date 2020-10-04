<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsigneeController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

    }

    public function index(){
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'dashboard'){
       if(!file_exists(APPPATH.'views/consignee/'.$page.'.php')){
			show_404();
		}else{
           
            $this->load->view('consignee/includes/login_header');
            $this->load->view('consignee/'.$page);
            $this->load->view('includes/footer');
            
        }
    }
}