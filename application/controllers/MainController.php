<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

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
                                    $this->session->set_userdata('isUserLoggedIn' , TRUE);
                                    $this->session->set_userdata('user_ID' , $data_result['id']);
                                    $this->session->set_userdata('user_info', $data_result);
                                    
                                    if($this->session->userdata($data_result['user_type']) == 1 || $this->session->userdata('isUserLoggedIn') == TRUE){
                                        redirect('admin');
                                          }elseif($this->session->userdata($data_result['user_type']) == 2 || $this->session->userdata('isUserLoggedIn') == TRUE){
                                               redirect('broker');
                                                  }elseif($this->session->userdata($data_result['user_type']) == 3 || $this->session->userdata('isUserLoggedIn') == TRUE){
                                                       redirect('accounting');
                                                          }elseif($this->session->userdata($data_result['user_type']) == 4 || $this->session->userdata('isUserLoggedIn') == TRUE){
                                                              redirect('consignee');
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
                            $this->dynamic_view('contact');
                            } else {
                                    $appointment = array(
                                            'firstname' => ucfirst($this->input->post('firstName')),
                                            'lastname' => ucfirst($this->input->post('lastName')),
                                            'email' => $this->input->post('email'),
                                            'contact_number' => $this->input->post('contact'),
                                            'subject' => $this->input->post('subject'),
                                            'message' => $this->input->post('message'),
                                            'date_posted' => date('Y-m-d H:m:s')
                                            );
                                    $result = $this->MainModel->insert_appointment($appointment);

                                    if(!$result ){
                                        $this->session->set_flashdata('error' , 'STARLORD IS NOT HAPPY WITH THE RESULT!!');
                                        redirect('home');
                                    }else{
                                        $this->session->set_flashdata('success' , "Message Sent! We will contact you As Soon As Possible!!");
                                        redirect('home');
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

 public function logout(){

        $this->session->unset_userdata('isUserLoggedIn');

        $this->session->unset_userdata('user_ID');

        $this->session->unset_userdata('user_info');

        $this->session->sess_destroy();

        redirect('MainController');
    }

}
