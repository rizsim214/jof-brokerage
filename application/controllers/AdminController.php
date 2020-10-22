<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       
        $this->load->model('AdminModel');

        $user_logged = $this->session->userdata('isUserLoggedIn');
        if(!$user_logged == TRUE){
            redirect('home');
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
                'base_url' => site_url('appointments'),
                'total_rows' => $this->AdminModel->countAllAppointments(),
                'per_page' => 5,
                'num_tag_open' => '<li class="pg-item">' ,
                'num_tag_close' => '</li>' ,
                'cur_tag_open' => '<li class="active"><a href="javascript:void(0);">',
                'cur_tag_close' => '</a></li>',
                'next_link' => '<li class="pg-next ml-2">Next</li>',
                'prev_link'=> '<li class="pg-prev mr-2">Prev</li>',
                'next_tag_open' => '<li class="pg-next">',
                'next_tag_close' => '</li>', 
                'prev_tag_open' => '<li class="pg-prev">',
                'prev_tag_close' => '</li>',   
                'first_tag_open' => '<li class="pg-item mr-2">',
                'first_tag_close' => '</li>',
                'last_tag_open' => '<li class="pg-item ml-2">',
                'last_tag_close' => '</li>' 
                
            );
          
              
            $this->pagination->initialize($config);
            $data_results = array(
                'transactions' => $this->AdminModel->getAllTransaction(),
                'clients' =>  $this->AdminModel->getAllClients(),
                'employees' => $this->AdminModel->getAllEmployees(),
                'response' => $this->AdminModel->getAllAppointment($config['per_page'] , $offset)
            );
           
            $this->load->view('admin/includes/login_header');
            $this->load->view('admin/'.$page ,$data_results);
            $this->load->view('includes/footer');
            
        }
    }
    //  public function register_validation(){
           
        
    // }
  
    public function register(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while creating your account... Please try again');
            $this->dynamic_view('users');
        }else{
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'company_name' => $this->input->post('company_name'),
                    'company_location' => $this->input->post('company_location'),
                    'email_add' => $this->input->post('email_add'),
                    'user_pass' => md5($this->input->post('user_pass')),
                    'contact_info' => $this->input->post('contact_info'),
                    'user_role' => $this->input->post('user_role'),
                    'date_registerd' => date('Y-m-d H:m:s')

                );
                // print_r($data);die();
                $this->form_validation->set_rules('firstname' , 'First Name' , 'trim|required');
                $this->form_validation->set_rules('lastname' , 'Last Name' , 'trim|required');
                $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required');
                $this->form_validation->set_rules('password' , 'Password' , 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirm' , 'Confirm Password' , 'trim|required|matches[password]');
                $this->form_validation->set_rules('contact' , 'Contact Information' , 'trim|required');
                $this->form_validation->set_rules('user_role' , 'User Role' , 'required');

         
            if($this->form_validation->run() == TRUE){
                
                   $data = array(
                    'first_name' => $this->input->post('firstname'),
                    'last_name' => $this->input->post('lastname'),
                    'company_name' => $this->input->post('company_name'),
                    'company_location' => $this->input->post('company_location'),
                    'email_add' => $this->input->post('email'),
                    'user_pass' => md5($this->input->post('password')),
                    'contact_info' => $this->input->post('contact'),
                    'user_role' => $this->input->post('user_role'),
                    'date_registered' => date('Y-m-d H:m:s')
                    );

                    $result = $this->AdminModel->register_user($data);

                    if(!$result){
                        $this->session->set_flashdata('error' , 'Database was not able to register the user account... Please try again');
                        $this->dynamic_view('users');
                    }else{
                        $this->session->set_flashdata('success' , 'Database has successfully registered your user account');
                        $this->dynamic_view('users');
                    }
            }else{

               $this->session->set_flashdata('error' , 'Some validation errors have occured... Please try again');
                $this->dynamic_view('users');                 
            }
        }

    }
     
    public function delete($id){
        $result = $this->AdminModel->delete_user($id);

        if(!$result){
            $this->session->set_flashdata('error' , 'Something went wrong upon deleting the account... Please try again');
        }else{
            $this->session->set_flashdata('success' , 'Account has been successfully deleted');
        }
        $this->dynamic_view('users');
    }
    public function delete_appointments($id){
        $result = $this->AdminModel->delete_appointment($id);

         if(!$result){
            $this->session->set_flashdata('error' , 'Something went wrong upon deleting this appointment... Please try again');
        }else{
            $this->session->set_flashdata('success' , 'Message has been successfully deleted');
        }
        $this->dynamic_view('appointments');
    }


    public function editUser(){

        echo "users";
    }
}