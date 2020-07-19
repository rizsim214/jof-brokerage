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
                              $this->dynamic_view();
                          }else{
                              
                           $result = $this->MainModel->check_user($this->input->post('email') , md5($this->input->post('password')));
                           
                           if($result){
                                $this->session->set_userdata('IsLoggedIn' , TRUE);
                                $this->session->set_userdata('userID' , $result['id']);
                                $this->session->set_userdata('user_info' ,$result);

                                if($result['user_role'] == 1){
                                    echo "Consignee";
                                    }elseif($result['user_role'] == 2){
                                        echo "Broker";
                                        }elseif($result['user_role'] == 3){
                                            echo "Accounting";
                                            }elseif($result['user_role'] == 4){
                                                 echo "Admin";
                                                }
                                }else{
                                     $this->session->set_flashdata('error' , 'The user account that you have entered is invalid or not yet approved by the admin... <br>Sorry for the inconvenience...');
                                         $this->dynamic_view('login');
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
