<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrokerController extends CI_Controller {

    public function __construct(){
        parent:: __construct();

    }

    public function index(){
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'landingPage'){
       if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
			show_404();
		}else{
           
            $this->load->view('broker/includes/login_header');
            $this->load->view('broker/'.$page);
            $this->load->view('includes/footer');
            
        }
    }

    public function get_edit_accounts($param){

      //  echo "fuck hsit";
         $this->load->model('BrokerModel');
         $this->load->model('AdminModel');

        //  $this->form_validation->set_error_delimiters('<div class="alert alert-danger">Error: ','</div>');
        //  $this->form_validation->set_rules('firstname', 'First Name', 'required');
        //  $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        

        if($this->form_validation->run() == FALSE){

          
            $page ="edit_account";
          //  print_r($data);

            if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
                show_404();

            }
           
            $data['title'] = "Manage Account";
            $data['emp'] = $this->BrokerModel->get_editEmp($param);
            $data['id'] = $data['emp']['user_ID'];
             $data['firstname'] =$data['emp']['first_name'];
             $data['lastname'] = $data['emp']['last_name'];
             $data['companyName'] = $data['emp']['company_name'];
             $data['companyLoc'] = $data['emp']['company_location'];
             $data['email'] = $data['emp']['email_add'];
             $data['cnt'] = $data['emp']['contact_info'];
             $data['dateStart'] = $data['emp']['date_registered'];
            print_r($data);



            // if(!$this->input->post()){
            //     $this->session->set_flashdata('error' , 'Something went wrong while creating your account... Please try again');
               
            // }else{
            //         $datar = array(
            //             'first_name' => $this->input->post('first_name'),
            //             'last_name' => $this->input->post('last_name'),
            //             'company_name' => $this->input->post('company_name'),
            //             'company_location' => $this->input->post('company_location'),
            //             'email_add' => $this->input->post('email_add'),
            //             'user_pass' => md5($this->input->post('user_pass')),
            //             'contact_info' => $this->input->post('contact_info'),
            //             'user_role' => $this->input->post('user_role'),
            //             'date_registerd' => date('Y-m-d H:m:s')
    
            //         );
            //         // print_r($data);die();
            //         //$this->form_validation->set_rules('firstname' , 'First Name' , 'trim|required');
            //         $this->form_validation->set_rules('lastname' , 'Last Name' , 'trim|required');
            //         $this->form_validation->set_rules('email' , 'Email Address' , 'trim|required');
            //         $this->form_validation->set_rules('password' , 'Password' , 'trim|required|min_length[8]');
            //         $this->form_validation->set_rules('confirm' , 'Confirm Password' , 'trim|required|matches[password]');
            //         $this->form_validation->set_rules('contact' , 'Contact Information' , 'trim|required');
                   
    
             
            //     if($this->form_validation->run() == TRUE){
                    
            //            $datar = array(
            //             'first_name' => $this->input->post('firstname'),
            //             'last_name' => $this->input->post('lastname'),
            //             'company_name' => $this->input->post('company_name'),
            //             'company_location' => $this->input->post('company_location'),
            //             'email_add' => $this->input->post('email'),
            //             'user_pass' => md5($this->input->post('password')),
            //             'contact_info' => $this->input->post('contact'),
            //             'user_role' => $this->input->post('user_role'),
            //             'date_registered' => date('Y-m-d H:m:s')
            //             );
    
            //             $result = $this->BrokerModel->update_user($datar);
    
            //             if(!$result){
            //                 $this->session->set_flashdata('error' , 'Database was not able to register the user account... Please try again');
                            
            //             }else{
            //                 $this->session->set_flashdata('success' , 'Database has successfully registered your user account');
                           
            //             }
            //     }else{
    
            //        $this->session->set_flashdata('error' , 'Some validation errors have occured... Please try again');
                                 
            //     }
            // }

    

           

           
            if($this->session->userRole == 2) {
                $this->load->view('broker/includes/login_header');
    
            }elseif($this->session->userRole == 4) {
                $this->load->view('admin/includes/login_header');
    
            }elseif($this->session->userRole == 3) {
                $this->load->view('accounting/includes/login_header');
    
            }elseif($this->session->userRole == 1) {
                $this->load->view('consignee/includes/login_header');
    
            }

            $this->load->view('broker/'.$page,$data);
            $this->load->view('includes/footer');
           
            
          
    }else{ //$result = $this->BrokerModel->update_user($datar);
      $this->BrokerModel->updateAccount();
    //   print_r($id);
        $this->session->set_flashdata('acc_updated','Account was updated');
     redirect(base_url('editAccount/').$param);

    }  

    
}


}