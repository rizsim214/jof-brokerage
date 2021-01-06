<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

        $this->load->model('MainModel');
        $this->load->model('AdminModel');
        $this->load->helper('captcha');
        $this->load->helper('string');

    }
    
	
	public function index()
	{
        $this->dynamic_view();
    }
    
    public function dynamic_view($page = 'home'){
       if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
		}else{
          
          
            $this->load->view('includes/header');
            $this->load->view('pages/'.$page );
            $this->load->view('includes/footer');
            
        }
    }

   public function view_register(){
            
                
            $this->load->view('includes/header');
            $this->load->view('pages/register' );
            $this->load->view('includes/footer');
   }


    public function landing_client_validation(){
               
                $this->form_validation->set_rules('firstname' , 'First Name' , 'trim|required' , array('required' => ' First Name field is required.'));
                $this->form_validation->set_rules('lastname' , 'Last Name' , 'trim|required' , array('required' => ' Last Name field is required.'));
                $this->form_validation->set_rules('company_name' , 'Company Name' , 'trim|required' , array('required' => 'Company Name field is required.'));
                $this->form_validation->set_rules('company_location' , 'Company Location' , 'trim|required' , array('required' => ' Company Location field is required.'));
                $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required' , array('required' => ' Email field is required.'));
                $this->form_validation->set_rules('contact' , 'Contact Information' , 'trim|required' , array('required' => 'Contact Information field is required.'));
                $this->form_validation->set_rules('password' , 'Password' , 'trim|required|min_length[8]' , array('required' => ' Password field is required.' , 'min_length' => 'Minimum length must be 8 characters or more'));
                $this->form_validation->set_rules('confirm' , 'Confirm Password' , 'trim|required|matches[password]' , array('required' => 'Password Confirmation field is required.' , 'matches' => 'Confirmation Password must be the same with password.'));
                
               
        
     }
    public function landing_client_registration(){
        
     if(!$this->input->post('submit')){
       $this->session->set_flashdata('error' , 'Failed to submit registration... Please try again.');
        redirect('register_client');
     }else{
        $this->landing_client_validation();
        

            if(!$this->form_validation->run() == TRUE){
                $this->session->set_flashdata('error' , 'Some error occured while registration was under process! Please try again...');
                redirect('register_client');
            }else{
                
                 $captcha_response = trim($this->input->post('g-recaptcha-response'));

                //  print_r($captcha_response);die();
                 if($captcha_response != ''){
                        $keySecret = '6LcP4AYaAAAAAMG3i0qm7CsOOZrrjg6FLBFeQxDz';
                            $check = array(
                                'secret'   => $keySecret,
                                'response' => trim($this->input->post('g-recaptcha-response'))
                            );
                        $start_process = curl_init();

                        curl_setopt($start_process , CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
                        curl_setopt($start_process , CURLOPT_POST , true);
                        curl_setopt($start_process , CURLOPT_POSTFIELDS , http_build_query($check));
                        curl_setopt($start_process , CURLOPT_SSL_VERIFYPEER , false);
                        curl_setopt($start_process , CURLOPT_RETURNTRANSFER , true);

                        $received_data = curl_exec($start_process);
                        $final_response = json_decode($received_data, true);
                        //    var_dump($final_response);die();
                        if($final_response['success']){

                               $register_data = array(
                                    'user_role' => 1,
                                    'first_name' => $this->input->post('firstname'),
                                    'last_name' => $this->input->post('lastname'),
                                    'company_name' =>$this->input->post('company_name'),
                                    'company_location' =>$this->input->post('company_location'),
                                    'email_add' =>$this->input->post('email'),
                                    'contact_info' =>$this->input->post('contact'),
                                    'user_pass' => md5($this->input->post('password')),
                                    'register_status' => 'pending',
                                    'accept_terms' => $this->input->post('check'),
                                    'date_registered' => date('Y-m-d H:m:s')

                                       );

                                        if(!$register_data['accept_terms'] == "checked"){

                                                $this->session->set_flashdata('error' , 'Terms and Agreement not accepted');
                                                redirect('register_client');
                                            }elseif($register_data['accept_terms'] == "checked"){
                                                $register_result = $this->MainModel->create_client_account($register_data);
                                                    if(!$register_result){
                                                        $this->session->set_flashdata('error', 'Registration Error! Something went wrong while creating your account! Please try again...');
                                                        redirect('register_client');
                                                    }else{
                                                        $this->session->set_flashdata('success', 'Registration Successful! Just wait for the admin to approve your registration');
                                                        redirect('login');
                                                    }
                                            }
                        }else{
                            $this->session->set_flashdata('error' , 'VALIDATION FAILED.... PLEASE TRY AGAIN');
                            redirect('register_client');
                        }
                 }else{
                     $this->session->set_flashdata('error' , 'Validation Failed... Try again');
                     redirect('register_client');
                 }
         
          
          }
     }
}
    public function login_validation(){
         $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required' , array('required' => '1: Email field is required.'));
         $this->form_validation->set_rules('password' , 'Password' , 'trim|required' , array('required' => '1: Please Enter your password.'));
    }

    public function login(){
      

      if(!$this->input->post()){
            show_404();

               }else{

                    $this->login_validation();

                    if(!$this->form_validation->run() == true){
                        $this->session->set_flashdata('error' , 'You entered an invalid account! Please try again...');
                              redirect('login' , 'refresh');

                          }else{

                             $data_result = $this->MainModel->check_user($this->input->post('email') ,  md5($this->input->post('password')));
               
                    //   print_r($data_result);die();
                            

                           if(!$data_result){

                                     $this->session->set_flashdata('error' , 'Credentials not found... Please try again');
                                        redirect('login' , 'refresh');
                                }else{
                                    $this->session->set_userdata('isUserLoggedIn' , TRUE);
                                  
                                    //  print_r($data_result['user_role']);die();
                                    $this->session->set_userdata('user_ID' , $data_result['user_ID']);
                                    $this->session->set_userdata('user_info', $data_result);
                                    $this->session->set_userdata('fullname' ,$data_result['first_name'].' '.$data_result['last_name']);
                                    $this->session->set_userdata('user_this' ,$data_result['first_name']);
                                    $this->session->set_userdata('user_that' ,$data_result['last_name']);
                                    $this->session->set_userdata('userRole',$data_result['user_role']);
                                    
                                   

                                    

                                    // print_r($data_result);die();
                                    if($data_result['user_role'] == 1 && $data_result['register_status'] == "accepted"){
                                        redirect('consignee' , 'refresh');
                                    } elseif($data_result['user_role'] == 2 && $data_result['register_status'] == "accepted") {
                                        redirect('broker' , 'refresh');
                                    } elseif($data_result['user_role'] == 3 && $data_result['register_status'] == "accepted") {
                                        redirect('accounting' , 'refresh');
                                    } elseif($data_result['user_role'] == 4 && $data_result['register_status'] == "accepted") {
                                        redirect('admin' , 'refresh', $data_result);
                                    }else{
                                        $this->session->set_flashdata('error', 'Account has not yet been approved by the admin... Please contact JOF BROKERAGE');
                                        redirect('login' , 'refresh');
                                    }
                           }
                                
                    }
              }
    }

    public function setAppointment(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while scheduling an appointment... Please try again!');
            $this->dynamic_view();
            } else {
                    $this->validate_appointment();

                        if(!$this->form_validation->run() == TRUE){
                            $this->session->set_flashdata('error' , 'Some unfortunate error has occured... Please try again!');
                            redirect('contacts');
                            } else {
                                    $appointment = array(
                                            'firstname' => ucfirst($this->input->post('firstName')),
                                            'lastname' => ucfirst($this->input->post('lastName')),
                                            'email' => $this->input->post('email'),
                                            'contact' => $this->input->post('contact'),
                                            'subject' => $this->input->post('subject'),
                                            'message' => $this->input->post('message'),
                                            'appointment_status' => ucfirst("unread"),
                                            'date_posted' => date('Y-m-d H:m:s')
                                            );
                                           
                                    $result = $this->MainModel->insert_appointment($appointment);
                                            
                                    if($result == FALSE ){
                                        $this->session->set_flashdata('error' , 'STARLORD IS NOT HAPPY WITH THE RESULT!!');
                                        redirect('contacts');
                                    }elseif($result ==TRUE){
                                        $this->session->set_flashdata('success' , "Thank you for messaging JOF CUSTOMS BROKERAGE. We will contact you as soon as possible");
                                        redirect('contacts');
                                    }
                            }
                }
   
    }

 public function validate_appointment(){
    $this->form_validation->set_rules('firstName' , 'First Name' , 'trim|required' , array('required' => ' Firstname field is required.'));
    $this->form_validation->set_rules('lastName' , 'Last Name' , 'trim|required' , array('required' => ' Lastname field is required.'));
    $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required' , array('required' => ' Email field is required.'));
    $this->form_validation->set_rules('contact' , 'Contact' , 'trim|required' , array('required' => ' Contact field is required.'));
    $this->form_validation->set_rules('subject' , 'Subject' , 'trim|required' , array('required' => 'Subject field is required.'));
    $this->form_validation->set_rules('message' , 'Message' , 'trim|required' , array('required' => 'Message field is required.'));
 }

 public function view_feedback_landing(){

    $feedback_result['all_feedback'] = $this->MainModel->get_all_feedbacks();

    if(!$feedback_result){
        $this->session->set_flashdata('error' , 'Something went wrong while fetching data... Please try again and reload the page');
           $this->dynamic_view('feedbacks');
    }else{
                     
         $this->load->view('includes/header');
         $this->load->view('pages/feedback' , $feedback_result );
         $this->load->view('includes/footer');
    }
 }
 
 public function view_glossary_landing(){
    //    $config = array(
    //                     'base_url' => site_url('support'),
    //                     'total_rows' => $this->MainModel->countAllGlossary(),
    //                     'per_page' => 5,
    //                     'num_tag_open' => '<li class="pg-item">' ,
    //                     'num_tag_close' => '</li>' ,
    //                     'cur_tag_open' => '<li class="active"><a href="javascript:void(0);">',
    //                     'cur_tag_close' => '</a></li>',
    //                     'next_link' => '<li class="pg-next ml-2">Next</li>',
    //                     'prev_link'=> '<li class="pg-prev mr-2">Prev</li>',
    //                     'next_tag_open' => '<li class="pg-next">',
    //                     'next_tag_close' => '</li>', 
    //                     'prev_tag_open' => '<li class="pg-prev">',
    //                     'prev_tag_close' => '</li>',   
    //                     'first_tag_open' => '<li class="pg-item mr-2">',
    //                     'first_tag_close' => '</li>',
    //                     'last_tag_open' => '<li class="pg-item ml-2">',
    //                     'last_tag_close' => '</li>' 
    //                         );
    //                                 $this->pagination->initialize($config);
    //  $glossary_result['all_glossary'] = $this->MainModel->get_all_glossary($config['per_page'] , $offset = 0);
     $glossary_result['all_glossary'] = $this->MainModel->get_all_glossary();

     if(!$glossary_result){
        $this->session->set_flashdata('error' , 'Something went wrong while fetching data from the database');
        $this->dynamic_view('support');
     }else{
          $this->load->view('includes/header');
         $this->load->view('pages/support' , $glossary_result );
         $this->load->view('includes/footer');
     }
 }
 public function logout(){

        $this->session->unset_userdata('isUserLoggedIn');

        $this->session->unset_userdata('user_ID');

        $this->session->unset_userdata('user_info');

        $this->session->sess_destroy();

        redirect('home');
    }


    public function openTerms(){


    
        $page ="termOfuse";
        //  print_r($data);

          if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
              show_404();

          }

          


        $this->load->view('includes/header');
         $this->load->view('pages/'.$page);
         $this->load->view('includes/footer');

    }

    public function cargoDoc(){


            //echo "this";
            $page ="cargoDocu";
            //  print_r($data);
    
              if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                  show_404();
    
              }
    
            $this->load->view('includes/header');
            $this->load->view('pages/'.$page);
            $this->load->view('includes/footer');
    }

    public function customsInq(){

        $page ="custInq";
        //  print_r($data);

          if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
              show_404();

          }

        $this->load->view('includes/header');
        $this->load->view('pages/'.$page);
        $this->load->view('includes/footer');

    }

    public function cargoMon(){

        $page ="cargoMonitor";
        //  print_r($data);

          if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
              show_404();

          }

        $this->load->view('includes/header');
        $this->load->view('pages/'.$page);
        $this->load->view('includes/footer');

}

    public function imExp(){

        $page ="importExprt";
        //  print_r($data);

          if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
              show_404();

          }

        $this->load->view('includes/header');
        $this->load->view('pages/'.$page);
        $this->load->view('includes/footer');



    }

}
