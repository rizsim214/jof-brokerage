<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

    }

    public function index(){
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'landingPage'){
       if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
			show_404();
		}else{
           
            $this->load->view('includes/login_header');
            $this->load->view('broker/'.$page);
            $this->load->view('includes/footer');
            
        }
    }
}