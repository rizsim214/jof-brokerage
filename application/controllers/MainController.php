<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

        $this->load->model('MainModel');
        $this->load->model('AdminModel');


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
            $this->load->view('pages/'.$page);
            $this->load->view('includes/footer');
            
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
                                        $this->session->set_flashdata('error', 'Account has not yet been approved by the admin... Please try again');
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
                            $this->dynamic_view('home');
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
                                        $this->session->set_flashdata('success' , "Message Sent! We will contact you As Soon As Possible!!");
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
    $config = array(
                        'base_url' => site_url('feedbacks'),
                        'total_rows' => $this->MainModel->countAllFeedbacks(),
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

    $feedback_result['all_feedback'] = $this->MainModel->get_all_feedbacks($config['per_page'] , $offset = 0);

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

}
