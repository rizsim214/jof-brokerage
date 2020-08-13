<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       
        $this->load->model('AdminModel');

        $user_logged = $this->session->userdata('isUserLoggedIn');
        if(!$user_logged == TRUE){
            redirect('MainController');
        }

    }

    public function index(){

       

        $this->dynamic_view();
    }

     public function dynamic_view($page = 'dashboard' , $offset = 0 ){
       if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
			show_404();
		}else{
           
             $config = array(
                'base_url' => site_url('admin'),
                'total_rows' => $this->AdminModel->countAllAppointments(),
                'per_page' => 5
            );

            $this->pagination->initialize($config);

            $data_results['response'] = $this->AdminModel->getAllAppointment($config['per_page'] , $offset);
            $this->load->view('admin/login_header');
            $this->load->view('admin/'.$page ,$data_results);
            $this->load->view('includes/footer');
            
        }
    }


   
    
}