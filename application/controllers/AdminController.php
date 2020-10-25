<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       
        $this->load->model('AdminModel');

        $user_logged = $this->session->userdata();
        
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
      public function register_validation(){
                $this->form_validation->set_rules('firstname' , 'First Name' , 'trim|required');
                $this->form_validation->set_rules('lastname' , 'Last Name' , 'trim|required');
                $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required');
                $this->form_validation->set_rules('password' , 'Password' , 'trim|required|min_length[8]');
                $this->form_validation->set_rules('confirm' , 'Confirm Password' , 'trim|required|matches[password]');
                $this->form_validation->set_rules('contact' , 'Contact Information' , 'trim|required');
                $this->form_validation->set_rules('user_role' , 'User Role' , 'required');
        
     }
        
    public function register(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while creating your account... Please try again');
            $this->dynamic_view('users');
        }else{
                
           $this->register_validation();

         
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
     
    public function delete_account($id){
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
    
    public function view_account($id){
        $user_data = $this->AdminModel->get_user_info($id);

        if(!$user_data){
            $this->session->set_flashdata('error' , 'Account data unsucessfully retrieved... Please try again.');
            $this->dynamic_view('users');
        }else{
            $this->dynamic_view('view_user');
        }
    }

    public function view_feedbacks(){
           
          $config = array(
                        'base_url' => site_url('admin_feedback'),
                        'total_rows' => $this->AdminModel->countAllFeedbacks(),
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

                 $feedback_data['all_feedbacks'] = $this->AdminModel->get_feedback($config['per_page'] , $offset = 0);
                
                 if(!$feedback_data){
                        $this->session->set_flashdata('error' , 'Unable to access feedbacks... Please reload the page');
                        $this->dynamic_view('feedbacks');
                 }else{
                         $this->load->view('admin/includes/login_header');
                         $this->load->view('admin/admin_feedback' , $feedback_data );
                         $this->load->view('includes/footer');
                        }

    }
    public function faq_management(){
          $config = array(
                        'base_url' => site_url('faq_management'),
                        'total_rows' => $this->AdminModel->countAllFaqs(),
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

                 $faq_data['all_faqs'] = $this->AdminModel->get_faqs($config['per_page'] , $offset = 0);

                 if(!$faq_data){
                     $this->session->set_flashdata('error' , 'Unable to access FAQS... Please reload the page');
                     $this->dynamic_view('management');
                 }else{
                      $this->load->view('admin/includes/login_header');
                      $this->load->view('admin/admin_feedback' , $faq_data );
                      $this->load->view('includes/footer');
                 }
    }
    public function validate_FAQ(){
        $this->form_validation->set_rules('faq_question' , 'FAQ QUESTION' , 'trim|required');
        $this->form_validation->set_rules('faq_answer' , 'FAQ ANSWER' , 'trim|required');
    }
    public function create_faq(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while creating FAQ');
            $this->dynamic_view('managements');
        }else{
            $this->validate_FAQ();

            if(!$this->form_validation->run() == TRUE){
                $this->session->set_flashdata('error' , 'An error occured while validating post request! Please try again...');
                $this->dynamic_view('managements');
            }else{
                $faq_data = array(
                    'question' => $this->input->post('faq_question'),
                    'answer' => $this->input->post('faq_answer'),
                    'date_created' => date('Y-m-d H:m:s')
                );

                $result = $this->AdminModel->add_faq($faq_data);

                if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong while creating FAQ! Please try again...');
                    $this->dynamic_view('managements');
                }else{
                    $this->session->set_flashdata('success' , 'Successfully created FAQ! You can now see FAQ in the SUPPORT page');
                    $this->dynamic_view('managements');
                }
            }
        }
    }
    public function delete_feedback($id){
        $result_data = $this->AdminModel->delete_this_feedback($id);
       
        if(!$result_data){
            $this->session->set_flashdata('error' , 'Error!! Something went wrong while deleting feedback... Please try again later');
        }else{
            $this->session->set_flashdata('success' , 'Successfully removed feedback!');
        }
          redirect('admin_feedback');
    }
}