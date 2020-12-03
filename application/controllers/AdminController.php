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
                'response' => $this->AdminModel->getAllAppointment()
            );

            if($this->session->userRole == 2) {
                $this->load->view('broker/includes/login_header');
    
            }elseif($this->session->userRole == 4) {
                $this->load->view('admin/includes/login_header');
    
            }elseif($this->session->userRole == 3) {
                $this->load->view('accounting/includes/login_header');
    
            }elseif($this->session->userRole == 1) {
                $this->load->view('consignee/includes/login_header');
    
            }else{
                $this->load->view('admin/includes/login_header');
            }


           
        
           // $this->load->view('admin/includes/login_header');
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
            redirect('user_accounts');
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
                    'register_status' => "accepted",
                    'date_registered' => date('Y-m-d H:m:s')
                    );

                    $result = $this->AdminModel->register_user($data);

                    if(!$result){
                        $this->session->set_flashdata('error' , 'Database was not able to register the user account... Please try again');
                        // $this->dynamic_view('users');
                        redirect('user_accounts');
                    }else{
                        $this->session->set_flashdata('success' , 'Database has successfully registered your user account');
                        // $this->dynamic_view('users');
                        redirect('user_accounts');
                    }
            }else{

               $this->session->set_flashdata('error' , 'Some validation errors have occured... Please try again');
                $this->dynamic_view('users');                 
            }
        }

    }
    public function accept_account($id){
         $client_data = $this->AdminModel->get_client_data($id);
         
        if($client_data['register_status'] === "accepted" || $client_data['register_status'] == "declined" ){
            $this->session->set_flashdata('error' , 'Registration status has already been changed.');
        }elseif($client_data['register_status'] === "pending"){

            $client_data = array(
                'register_status' => "accepted",
                'date_accepted' => date('Y-m-d H:m:s')
            );
            $results = $this->AdminModel->change_account_status($client_data , $id);
            //  var_dump($results);die();
                if(!$results){
                    $this->session->set_flashdata('error' , 'Unable to accept account! Please Try again');
                }else{
                    $this->session->set_flashdata('success' , 'Accept Account Successful...');
                }
        }
        
        redirect('user_accounts','refresh');
    }
    public function decline_account($id){
         $client_data_decline = $this->AdminModel->get_client_data($id);
        //   var_dump($client_data_decline);die();
         if($client_data_decline['register_status'] == "accepted" || $client_data_decline['register_status'] == "declined"  ){
            $this->session->set_flashdata('error' , 'Registration status has already been changed. ');
          }elseif($client_data_decline['register_status'] == "pending"){

                    $client_data_decline = array(
                        'register_status' => "declined",
                        'date_accepted' => date('Y-m-d H:m:s')
                    );
                    $results = $this->AdminModel->change_account_status($client_data_decline , $id);
                     var_dump($results);die();
                        if($results){
                            $this->session->set_flashdata('error' , 'Some kind of error occured... Please try again');
                        }else{
                            $this->session->set_flashdata('success' , 'Account succesfully declined');
                }
        }
        
        redirect('user_accounts', 'refresh');
    }
   
    public function delete_account($id){
        $result = $this->AdminModel->delete_user($id);

        if(!$result){
            $this->session->set_flashdata('error' , 'Something went wrong upon deleting the account... Please try again');
        }else{
            $this->session->set_flashdata('success' , 'Account has been successfully deleted');
        }
       redirect('user_accounts');
    }
    public function delete_appointments($id){
        $result = $this->AdminModel->delete_appointment($id);

         if(!$result){
            $this->session->set_flashdata('error' , 'Something went wrong upon deleting this appointment... Please try again');
        }else{
            $this->session->set_flashdata('success' , 'Message has been successfully deleted');
        }
        redirect('appointments');
    }

    
    public function view_account($id){
        $user_data = $this->AdminModel->get_user_info($id);

        if(!$user_data){
            $this->session->set_flashdata('error' , 'Account data unsucessfully retrieved... Please try again.');
            redirect('user_accounts');
        }else{
            $this->dynamic_view('view_user');
        }
    }

    public function view_feedbacks(){
           

                 $feedback_data['all_feedbacks'] = $this->AdminModel->get_feedback();
                
                 if(!$feedback_data){
                        $this->session->set_flashdata('error' , 'Unable to access feedbacks... Please reload the page');
                        redirect('admin_feedback');
                 }else{
                         $this->load->view('admin/includes/login_header');
                         $this->load->view('admin/admin_feedback' , $feedback_data );
                         $this->load->view('includes/footer');
                        }

    }
    public function glossary_management(){
         

                 $glossary_data['all_glossary'] = $this->AdminModel->get_glossary();

                 if(!$glossary_data){
                     $this->session->set_flashdata('error' , 'Unable to access GLOSSARY... Please reload the page');
                     $this->dynamic_view('managements');
                 }else{
                      $this->load->view('admin/includes/login_header');
                      $this->load->view('admin/managements' , $glossary_data );
                      $this->load->view('includes/footer');
                 }
    }
    public function validate_glossary(){
        $this->form_validation->set_rules('glossary_term' , 'GLOSSARY TERM' , 'trim|required');
        $this->form_validation->set_rules('glossary_meaning' , 'GLOSSARY MEANING' , 'trim|required');
    }
    public function create_glossary(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while creating GLOSSARY');
            redirect('managements');
        }else{
            $this->validate_glossary();

            if(!$this->form_validation->run() == TRUE){
                $this->session->set_flashdata('error' , 'An error occured while validating post request! Please try again...');
                redirect('managements');
            }else{
                $glossary_data = array(
                    'glossary_term' => $this->input->post('glossary_term'),
                    'glossary_meaning' => $this->input->post('glossary_meaning'),
                    'date_posted' => date('Y-m-d H:m:s')
                );

                $result = $this->AdminModel->add_glossary($glossary_data);

                if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong while creating GLOSSARY! Please try again...');
                    
                }else{
                    $this->session->set_flashdata('success' , 'Successfully created GLOSSARY! You can now see DEFINITION in the SUPPORT page');
                    
                }
                redirect('glossary_management');
            }
        }
    }
    public function delete_glossary($id){
        $glossary_data = $this->AdminModel->delete_this_glossary($id);

        if(!$glossary_data){
            $this->session->set_flashdata('error' , 'Error!! Something went wrong while deleting GLOSSARY... Please try again later');
        }else{
            $this->session->set_flashdata('success' , 'Successfully removed GLOSSARY!');
        }
          redirect('glossary_management');
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

    public function view_message($id){
        $message_data = $this->AdminModel->get_message($id);
        if(!$message_data){
            $this->session->set_flashdata('error' , 'Something went wrong while fetching message! Please try again...');
            redirect('appointments');
        }else{
            $message_attribute = array(

                'appointment_status' => "Read",
                'date_updated' => date('Y-m-d H:m:s')
            );

            $result = $this->AdminModel->change_appointment_status($message_attribute , $id);
            if(!$result){
                $this->session->set_flashdata('error' , 'Something went wrong while updating appointment table');
                redirect('appointments');
            }else{
                $message_final_data['message_data'] = $this->AdminModel->get_final_message($id);
                if(!$message_final_data){
                    $this->session->set_flashdata('error' , 'ERROR! Cannot fetch message data! Please try again...');
                    redirect('appointments');
                }else{
                      $this->load->view('admin/includes/login_header');
                      $this->load->view('admin/view_appointment' , $message_final_data );
                      $this->load->view('includes/footer');
                }
            }
        }
    }

    public function back_to_appointments(){
        redirect('appointments');
    }
    public function post_feedback($id){
        $postFeedback_result = $this->AdminModel->get_feedback_result($id);
            if(!$postFeedback_result){
                $this->session->set_flashdata('error', 'Error! Something went wrong while fetching data... Please reload the page');
                redirect('admin_feedback');
            }else{
                if($postFeedback_result['feedback_status'] == 0){
                    $postFeedback_data = array(
                        'feedback_status' => 1,
                        'date_updated' => date('Y-m-d H:m:s')
                    );

                    $result = $this->AdminModel->update_feedback($postFeedback_data , $id);
                    if(!$result){
                        $this->session->set_flashdata('error' , 'Something went wrong... Please try again!');
                        
                    }else{
                        $this->session->set_flashdata('success' , 'Succesfully posted feedback... You can now see the feedback in feedback page.Thank you!');
                    }
                   redirect('admin_feedback');

                }elseif($postFeedback_result['feedback_status'] == 1){
                    $postFeedback_data = array(
                        'feedback_status' => 0,
                        'date_updated' => date('Y-m-d H:m:s')
                    );
                    $result = $this->AdminModel->update_feedback($postFeedback_data , $id);
                    if(!$result){
                        $this->session->set_flashdata('error' , 'Something went wrong... Please try again!');
                    }else{
                        $this->session->set_flashdata('success' , 'Succesfully Unposted feedback... Feedback was removed from the feedback page');
                    }
                    redirect('admin_feedback');
                }
            }
    }
}