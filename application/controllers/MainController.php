<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('array');
       
        $this->load->model('MainModel');


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
                              $this->dynamic_view('login' , 'refresh');

                          }else{
                              
                            $data = array(
                                'email_add' => $this->input->post('email'),
                                 'user_pass' => md5($this->input->post('password'))
                            );
                          
                             $data_result = $this->MainModel->check_user($data);
                       
                            

                           if(!$data_result){

                                     $this->session->set_flashdata('error' , 'The user account that you have entered is invalid or not yet approved by the admin... Please try again');
                                         $this->dynamic_view('login','refresh');
                                }else{
                                    $this->session->set_userdata('IsLoggedIn' , TRUE);
                                    $this->session->set_userdata('user_type', $data_result['user_type']);
                                    
                                    if($this->session->userdata('user_type') == 1 || $this->session->userdata('isLoggedIn') == TRUE){
                                        redirect('ConsigneeController/index');
                                          }elseif($this->session->userdata('user_type') == 2 || $this->session->userdata('isLoggedIn') == TRUE){
                                               redirect('BrokerController/index');
                                                  }elseif($this->session->userdata('user_type') == 3 || $this->session->userdata('isLoggedIn') == TRUE){
                                                       redirect('AccountingController/index');
                                                          }elseif($this->session->userdata('user_type') == 4 || $this->session->userdata('isLoggedIn') == TRUE){
                                                              redirect('AdminController/index');
                                                    }

                                     }
                                
                    }
              }
    }

    public function setAppointment(){

        $appointment = array(
            'firstname' => $this->input->post('firstName'),
            'lastname' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'contact' => $this->input->post('contact'),
            'message' => $this->input->post('message'),
            'date_posted' => date('Y-m-d H:m:s')
        );
        $result = $this->MainModel->insert_appointment($appointment);

        if(!$result){
            show_404();
        }else{

         $this->session->set_flashdata('success' , "Message Sent! We will contact you As Soon As Possible!!");
            $this->dynamic_view();
             
        }
    }



}
