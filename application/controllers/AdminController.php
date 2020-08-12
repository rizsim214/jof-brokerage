<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

        $this->load->model('AdminModel');
        $user_logged = $this->session->userdata();
        if($user_logged['isUserLoggedIn'] == TRUE){
            redirect('MainController');
        }
    }

    public function index(){
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'dashboard'){
       if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
			show_404();
		}else{
           
            $data_results['response'] = $this->AdminModel->getAllAppointment();
            $this->load->view('includes/login_header');
            $this->load->view('admin/'.$page ,$data_results);
            $this->load->view('includes/footer');
            
        }
    }

   
    
}