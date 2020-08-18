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
                'per_page' => 5,
              
            );

            //   'full_tag_open' => '<ul class="pagination text-center">',
            //     'full_tag_close' => '</ul>',
            //     'first_tag_open' => '<li>',
            //     'last_tag_open' => '<li>',
            //     'next_tag_open' => '<li>',
            //     'prev_tag_open' => '<li>',
            //     'num_tag_open' => '<li>',
            //     'num_tag_close' => '</li>',
            //     'prev_tag_close' => '</li>',
            //     'next_tag_close' => '</li>',
            //     'last_tag_close' => '</li>',
            //     'first_tag_close' => '</li>',
            //     'cur_tag_open' => "<li class =\"active\"><span><b>",
            //     'cur_tag_close' => "</b></span></li>"

            $this->pagination->initialize($config);

            $data_results['response'] = $this->AdminModel->getAllAppointment($config['per_page'] , $offset);
            $this->load->view('admin/login_header');
            $this->load->view('admin/'.$page ,$data_results);
            $this->load->view('includes/footer');
            
        }
    }


   
    
}