<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrokerController extends CI_Controller {

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
           
            $this->load->view('broker/includes/login_header');
            $this->load->view('broker/'.$page);
            $this->load->view('includes/footer');
            
        }
    }

    public function edit_accounts($param){

        echo "fuck hsit";

        if($this->form_validation->run() == FALSE){

            $page ="edit_account";
            $data['title'] = "fuck";

            if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
                show_404();

            }

           
         

            $this->load->view('broker/includes/login_header');
            $this->load->view('broker/'.$page,$data);
            $this->load->view('includes/footer');
          
    }
}


}