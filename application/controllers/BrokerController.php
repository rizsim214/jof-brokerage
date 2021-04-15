<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrokerController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('AdminModel');
        
        $user_logged = $this->session->userdata();
            if(!$user_logged['isUserLoggedIn'] == TRUE){
                redirect('home');
            }
    }

    public function index(){
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'landingPage'){
       if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
			show_404();
		}else{
            $data['transactions'] = $this->AdminModel->getAllTransactions();

            if($this->session->userdata('success')){
                $data['success'] = $this->session->userdata('success');
            }
    
            if($this->session->userdata('error')){
    
                $data['error'] = $this->session->userdata('error');
               
            }
            $this->load->view('broker/includes/header');
            $this->load->view('broker/'.$page, $data);
            $this->load->view('includes/footer');
            
        }
    }
    public function acceptTransaction($id, $consignee_id,$transcation_number){
      
        $data = array(
            'status' => 'accepted',
            'processor_id' => $this->session->userdata('user_ID'),
            'date_started' => date('Y-m-d H:i:s')
        );
        
        $consignee = $this->AdminModel->getUser($consignee_id);
       
      
        $ch = curl_init();
        $itexmo = array('1' => $consignee->contact_info, '2' => "Hello ". ucfirst($consignee->first_name) ." ". ucfirst($consignee->last_name) ."! Your Transcation ". $transcation_number." for importing/exporting at JOF brokerage is now accepted." , '3' => "ST-LUKEK646498_3PAKR" , 'passwd' => "vstrq{8y64");
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec ($ch);
        curl_close ($ch);
            
     
        $result = $this->AdminModel->updateTransaction($id, $data);
        
        if($result){
            $this->session->set_flashdata('success', 'Transaction Updated Successfully');
        }else{
            $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
        }

        redirect('BrokerController/index');
    }

    public function declineTransaction(){
        
        $data = array(
            'status' => 'declined',
            'reason' => $this->input->post('reason')
        );

        $consignee = $this->AdminModel->getUser($this->input->post('consignee_id'));
        $ch = curl_init();

        $itexmo = array('1' => $consignee->contact_info, '2' => "Hello ". ucfirst($consignee->first_name) ." ". ucfirst($consignee->last_name) ."! Your Transcation ".$this->input->post('transaction_number')." has been declined. Please check your account." , '3' => "ST-LUKEK646498_3PAKR", 'passwd' => "vstrq{8y64");
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
        http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec ($ch);
        curl_close ($ch);

        $result = $this->AdminModel->updateTransaction($this->input->post('transaction_id'), $data);
        
        if($result){
            $this->session->set_flashdata('success', 'Transaction Updated Successfully');
        }else{
            $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
        }

        redirect('BrokerController/index');
    }
    public function changeStatus(){

        $data = array(
           'status' => $this->input->post('status')
           
       );

       if($this->input->post('status') == 'done'){
        $data += array(
            'date_ended' => date('Y-m-d H:i:s')
        );
            }
       if($this->input->post('destination')){
        $data = array(
            'status' => $this->input->post('status'),
            'origin' => $this->input->post('origin'),
            'destination' => $this->input->post('destination'),
            'time_of_departure' => date("Y-m-d H:i:s")
        );
       }

       if($this->input->post('status') == "arrived"){
        $data = array(
            'status' => $this->input->post('status'),
            'time_of_arrival' => date("Y-m-d H:i:s")
        );
       }
       $consignee = $this->AdminModel->getUser($this->input->post('consignee_id'));
       $cons = $this->AdminModel->getUser($this->input->post('first_name'));
       $ch = curl_init();

       $itexmo = array('1' => $consignee->contact_info, '2' => "Hello ". ucfirst($consignee->first_name) ." ". ucfirst($consignee->last_name) ."! Your Transcation ".$this->input->post('transaction_number')." status is '". ucfirst($this->input->post('status')) ."' Please check your account." , '3' => "ST-LUKEK646498_3PAKR", 'passwd' => "vstrq{8y64");
       curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, 
       http_build_query($itexmo));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_exec ($ch);
       curl_close ($ch);

       $result = $this->AdminModel->updateTransaction($this->input->post('transaction_id'), $data);
       
       if($result){
           $this->session->set_flashdata('success', 'Transaction Updated Successfully');
       }else{
           $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
       }

       redirect('BrokerController/index');
   }
//    CALL THIS FOR UPDATE ACCOUNTS ON MODAL
    public function get_edit_accounts($param){

      //  echo "fuck hsit";
         $this->load->model('BrokerModel');
         $this->load->model('AdminModel');

        //  $this->form_validation->set_error_delimiters('<div class="alert alert-danger">Error: ','</div>');
        //  $this->form_validation->set_rules('firstname', 'First Name', 'required');
        //  $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        
        if($this->input->post()){
            if(!empty($this->input->post('password')) && !empty($this->input->post('confirm'))){
                 if($this->input->post('password') == $this->input->post('confirm')){
                
                    $data = array(
                        'first_name' => $this->input->post('first_name'),
                        'last_name' => $this->input->post('lastname'),
                        'company_name' => $this->input->post('company_name'),
                        'company_location' => $this->input->post('company_location'),
                        'email_add' => $this->input->post('email'),
                        'contact_info' => $this->input->post('contact'), 
                        'user_pass' => md5($this->input->post('password')),  
                    );

                    $result = $this->BrokerModel->updateAccount($param,$data);

                    if($result){
                        $this->session->set_flashdata('success', 'Updated Successfully');
                    }else{
                        $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
                    }
                 }else{
                    $this->session->set_flashdata('error', 'Password and Confirm password do not match. Please try again.');
                    redirect('editAccount/'. $param);
                 }
            }else{
                $data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('lastname'),
                    'company_name' => $this->input->post('company_name'),
                    'company_location' => $this->input->post('company_location'),
                    'email_add' => $this->input->post('email'),
                    'contact_info' => $this->input->post('contact')
                );

                $result = $this->BrokerModel->updateAccount($param,$data);
                if($result){
                    $this->session->set_flashdata('success', 'Updated Successfully');
                }else{
                    $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
                }
                
            }
        }

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
             $data['uRole'] = $data['emp']['user_role'];
            // print_r($data);



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

    
            if($this->session->userdata('success')){

                $data['success'] = $this->session->userdata('success');
    
               
            }
    
            if($this->session->userdata('error')){
    
                $data['error'] = $this->session->userdata('error');
               
            }
           

           
            if($this->session->userRole == 2) {
                $this->load->view('broker/includes/header');
    
            }elseif($this->session->userRole == 4) {
                $this->load->view('admin/includes/login_header');
    
            }elseif($this->session->userRole == 3) {
                $this->load->view('accounting/includes/header');
    
            }elseif($this->session->userRole == 1) {
                $this->load->view('consignee/includes/login_header');
    
            }

            $this->load->view('broker/'.$page,$data);
            $this->load->view('includes/footer');
           
            
          
    }

    
}


        public function view_accounts($param){


            //echo "view my account";

            $page ="myAccount";
            //  print_r($data);
  
              if(!file_exists(APPPATH.'views/broker/'.$page.'.php')){
                  show_404();
  
              }






              if($this->session->userRole == 2) {
                $this->load->view('broker/includes/header');
    
            }elseif($this->session->userRole == 4) {
                $this->load->view('admin/includes/login_header');
    
            }elseif($this->session->userRole == 3) {
                $this->load->view('accounting/includes/header');
    
            }elseif($this->session->userRole == 1) {
                $this->load->view('consignee/includes/login_header');
    
            }

               //  $this->load->view('broker/includes/login_header');
                $this->load->view('broker/'.$page);
                $this->load->view('includes/footer');
    
            

        }


}