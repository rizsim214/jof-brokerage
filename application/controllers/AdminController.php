<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
       
        $this->load->model('AdminModel');
        $this->load->model('ConsigneeModel');
        $this->load->helper('date');
        date_default_timezone_set('Asia/Manila');
        $user_logged = $this->session->userdata();
            if(!$user_logged['isUserLoggedIn'] == TRUE){
                redirect('home');
            }
        
            // var_dump($user_logged);die();
    }

    public function bill($id, $transaction_number, $first_name, $last_name){
        $data['transaction_id'] = $id;
        $data['transaction_number'] = $transaction_number;
        $data['name'] = $first_name . ' ' .$last_name;
        $data['billing_items'] = $this->AdminModel->getBillingItems();
         $billing_data = array(
            'transaction_number' => $transaction_number,
            'transaction_id' => $id
        );
        $result = $this->ConsigneeModel->post_billing($billing_data , $transaction_number);
        
        $data['transaction_billing'] = $this->AdminModel->getTransactionbilling($transaction_number);

        $data['transaction_details'] = $this->AdminModel->get_transaction_details($transaction_number);
        // var_dump($transaction_number);die();
        if($this->session->userdata('success')){
            $data['success'] = $this->session->userdata('success');
        }

        if($this->session->userdata('error')){

            $data['error'] = $this->session->userdata('error');
           
        }

    
          $this->load->view('admin/includes/login_header');
        $this->load->view('admin/bill', $data);
        $this->load->view('includes/footer');

    }

    public function billingSubmit(){

        $post_transaction_billing = array(
            "transaction_id" => $this->input->post("transaction_id") ,
            "transaction_number" => $this->input->post("transaction_number") ,
            "date" => $this->input->post("date") ,
            "bill_to" => $this->input->post("bill_to") ,
            "invoice_no" => $this->input->post("invoice_no") ,
            "customer_po" => $this->input->post("customer_po") ,
            "shipping_method" => $this->input->post("shipping_method") ,
            "payment_term" => $this->input->post("payment_term") ,
            "shipping_date" => $this->input->post("ship_date") ,
            "due_date" => $this->input->post("due_date") ,
        );

        $transaction_number = $this->input->post("transaction_number");

        $transaction_billing = $this->AdminModel->getTransactionbilling($transaction_number);

        $this->AdminModel->deleteTransactionBillingItems($transaction_billing['transaction_billing_id']);
        $this->AdminModel->deleteTransactionBilling($transaction_number);
        $id = $this->AdminModel->insertBilling($post_transaction_billing);

       
        $billing_item_ids = $this->input->post('billing_item_id'); 
        $amounts = $this->input->post('amount'); 
        $quantity = $this->input->post('quantity'); 
        $tax = $this->input->post('tax'); 
        for($i= 0 ; $i < count($billing_item_ids);$i++ ){
            
            if($quantity[$i]){
            $data_transaction_items = array(
                "transaction_billing_id" => $id,
                "transaction_billing_item_id" => $billing_item_ids[$i],
                "amount" => $amounts[$i],
                "quantity" => $quantity[$i],
                "tax" => $tax[$i],
            );
            $this->AdminModel->insertBillingItems($data_transaction_items);
          }
        }

        if($id){

            $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Updated the transaction billing",
                        'transaction_number' => $post_transaction_billing['transaction_number'],
                        'date_updated' => date('Y-m-d H:i:s')
                    );
                    $this->AdminModel->post_log_report($update_data);

            $this->session->set_flashdata('success', 'Transaction Billing Updated Successfully');
        }else{
            $this->session->set_flashdata('error', 'There was an error updating transaction billing. Please try again!!');
        }
    
        redirect('transactions');
    }

    
    public function index(){


        $this->dynamic_view();
        
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

    

       $itexmo = array('1' => $consignee->contact_info, '2' => "Hello ". ucfirst($consignee->first_name) ." ". ucfirst($consignee->last_name) ."! Your Transcation ".$this->input->post('transaction_number')." status is  '". ucfirst($this->input->post('status')) ."' . Please check your account." , '3' => "ST-LUKEK646498_3PAKR", 'passwd' => "vstrq{8y64");
       curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, 
       http_build_query($itexmo));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_exec ($ch);
       curl_close ($ch);

       $result = $this->AdminModel->updateTransaction($this->input->post('transaction_id'), $data);
       
       if($result){
            switch ($this->input->post('status')) {
                case "documentation":
                    $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Documentation at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    
                    $this->AdminModel->post_log_report($update_data);
                    break;
                case "submission of entry":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Submission of Entry at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break;
                case "assessment division":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Assessment Division at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break;    
                case "cash division":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Cash Division at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break;  
                case "releasing":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Releasing at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break; 
                case "delivering":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Delivering at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break;   
                case "arrived":
                     $update_data = array(
                        'updater_name' => $this->session->userdata('fullname'),
                        'update_desc' => "Status has been updated to Arrived at:",
                        'date_updated' => date('Y-m-d H:i:s'),
                        'transaction_number' => $this->input->post('transaction_number')
                    );
                    $this->AdminModel->post_log_report($update_data);
                    break;   
                default:
                     $this->session->set_flashdata('error', 'Cargo Status update was unsuccessful... Please try again later!!');
                    break;
            }
           $this->session->set_flashdata('success', 'Transaction Updated Successfully');

       }else{
           $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
       }

       redirect('transactions');
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

    redirect('transactions');
}

public function assignTransaction(){
        
    $data = array(
        'processor_id' => $this->input->post('broker')
    );

  
    $result = $this->AdminModel->updateTransaction($this->input->post('transaction_id'), $data);
    
    if($result){
        $this->session->set_flashdata('success', 'Broker Assignment successful');
    }else{
        $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
    }

    redirect('transactions');
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

    redirect('transactions');
}
     public function dynamic_view($page = 'dashboard' , $offset = 0 ){
         
       if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
			show_404();
		}else{
            
           
          
            $data_results = array(
                
                'transactions' => $this->AdminModel->getAllTransaction(),
                'update_logs' => $this->AdminModel->getAllUpdateReport(),
                'brokers' => $this->AdminModel->getAllbroker(),
                'response' => $this->AdminModel->getAllAppointment(),
                'billing_form' => $this->AdminModel->getBillingItems(),
                'predef_questions' => $this->AdminModel->getAllContactQuestions(),
                'count_transactions' => $this->AdminModel->countAllTransaction(),
                'count_messages' => $this->AdminModel->countAllAppointments(),
                'count_feedbacks' => $this->AdminModel->countAllFeedbacks()
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


           
            // var_dump($data_results['predef_questions']);die();
           // $this->load->view('admin/includes/login_header');
            $this->load->view('admin/'.$page ,$data_results);
            $this->load->view('includes/footer');
            
            
        }
    }
    public function view_this_bill($id){
       
            $form_data['this_billing'] = $this->AdminModel->get_billing_data($id);
            //  var_dump($form_data);die();
            if(!$form_data){
                $this->session->set_flashdata('error' , 'Unable to get billing items information from the database... Please try again!!');
                redirect('accounting_form');
            }else{
                 $this->load->view('admin/includes/login_header');
                 $this->load->view('admin/update_bill_form' ,$form_data);
                 $this->load->view('includes/footer');
            }
          
        
    }
    public function update_this_bill($id){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Unable to successfully update this billing information... Please try again!!');
            redirect('accounting_form');
        }else{
            $data = array(
                'name'  => $this->input->post('billing_form_name'),
                'description'  => $this->input->post('billing_form_desc'),
                'gl_account'  => $this->input->post('billing_form_account'),
                'unit_price'  => $this->input->post('billing_form_price'),
                'billing_tax'  => $this->input->post('billing_form_tax')/100,
                'date_updated' => date('Y-m-s H:i:s')
            );
            
           $result = $this->AdminModel->post_this_billing($id, $data);

           if(!$result){
                $this->session->set_flashdata('error' , 'Unsuccessful Update of billing items information... Please try again!!');
                
           }else{
                $this->session->set_flashdata('success' , 'Successful Update of billing items information... ');
           }
           redirect('accounting_form');
        }
    }
    public function verify_billing_item(){
                $this->form_validation->set_rules('billingItem' , 'Billing Item' , 'trim|required');
                $this->form_validation->set_rules('billingDesc' , 'Billing Description' , 'trim|required');
                $this->form_validation->set_rules('gl_account' , 'Billing GL Account' , 'trim|required');
                $this->form_validation->set_rules('unit_price' , 'Billing Unit Price' , 'trim|required');
                $this->form_validation->set_rules('unit_tax' , 'Billing Unit Tax' , 'trim|required');
    }
    public function add_billing_item(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'An error has occured while updating your billing items... Please try again!!');
            redirect('accounting_form');
        }else{

            $this->verify_billing_item();

            if(!$this->form_validation->run() == TRUE){
                $this->session->set_flashdata('error' , 'Something went wrong while validating your update request... Some input fields were not filled.');
                redirect('accounting_form');
            }else{
                $billing_data = array(
                    'name' => $this->input->post('billingItem'),
                    'description' => $this->input->post('billingDesc'),
                    'gl_account' => $this->input->post('gl_account'),
                    'unit_price' => $this->input->post('unit_price'),
                    'billing_tax' => $this->input->post('unit_tax'),
                    'date_created' => date('Y-m-s H:i:s')
                );
                $result = $this->AdminModel->insert_billing_item($billing_data);
                    if(!$result){
                        $this->session->set_flashdata('error' , 'Unable to insert billing item... Please try again!!!');
                        
                    }else{
                          $this->session->set_flashdata('success' , 'Successfully inserted billing item... ');
                          
                    }
                redirect('accounting_form');
            }
             
        }
       
    }
    public function client_accounts(){
        $data['clients'] =$this->AdminModel->getAllClients();

        if(!$data){
            $this->session->set_flashdata('error' , 'Something went wrong while fetching client acounts... Please try again later!');
            redirect('client_accounts');
        }else{
                         $this->load->view('admin/includes/login_header');
                         $this->load->view('admin/client_accounts' , $data );
                         $this->load->view('includes/footer');
             }
           
        }
         
        public function employee_accounts(){
        $data['employees'] =$this->AdminModel->getAllEmployees();

        if(!$data){
            $this->session->set_flashdata('error' , 'Something went wrong while fetching client acounts... Please try again later!');
            redirect('employee_accounts');
        }else{
                         $this->load->view('admin/includes/login_header');
                         $this->load->view('admin/employee_accounts' , $data );
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
            redirect('client_accounts');
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
                    'active_status' => "active",
                    'register_status' => "accepted",
                    'date_registered' => date('Y-m-d H:m:s')
                    );

                    $result = $this->AdminModel->register_user($data);

                    if(!$result){
                        $this->session->set_flashdata('error' , 'Database was not able to register the user account... Please try again');
                        
                        redirect('admin');
                    }else{
                       $this->session->set_flashdata('success' , 'Database has successfully registered the user account:');
                        redirect('admin');
                        }
                       
                    
            }else{

               $this->session->set_flashdata('error' , 'Some validation errors have occured... Please try again');
                $this->dynamic_view('client_accounts');                 
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
        
        redirect('client_accounts','refresh');
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
                    //  var_dump($results);die();
                        if($results){
                            $this->session->set_flashdata('error' , 'Some kind of error occured... Please try again');
                        }else{
                            $this->session->set_flashdata('success' , 'Account succesfully declined');
                }
        }
        
        redirect('client_accounts', 'refresh');
    }
   
    public function delete_account($id){
        $get_data = $this->AdminModel->get_user_info_delete($id);
        //  print_r($get_data->user_role);die();
        $data = array(
            'active_status' => "inactive",
            'date_updated' => date('Y-m-s H:i:s')
        );
        $result = $this->AdminModel->delete_user($data, $id);
        if($get_data->user_role == '1' ){
                if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong upon deleting the account... Please try again');
                }else{
                    $this->session->set_flashdata('success' , 'Account has been successfully Deleted');
                }
            redirect('client_accounts');
            }elseif($get_data->user_role == '2' || $get_data->user_role == '3' || $get_data->user_role == '4'  ){
                 if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong upon deleting the account... Please try again');
                }else{
                    $this->session->set_flashdata('success' , 'Account has been successfully Deleted');
                }
            redirect('employee_accounts');
            }
       
    }
    public function client_transaction($id){
       $transaction['this_client_transaction'] = $this->AdminModel->get_this_transaction($id);
       
       if(!$transaction){
            $this->session->set_flashdata('error' , 'Unable to get the transaction of the chosen client... Please try again!!');
            redirect('client_accounts');
       }else{
           
            $this->load->view('admin/includes/login_header');
            $this->load->view('admin/client_transactions' , $transaction  );
            $this->load->view('includes/footer');
       }

    }
     public function activate_account($id){
        $get_data = $this->AdminModel->get_user_info_delete($id);
        $data = array(
            'active_status' => "active",
            'date_updated' => date('Y-m-s H:i:s')
        );
        $result = $this->AdminModel->delete_user($data, $id);
        
        if($get_data->user_role == '1' ){
                if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong upon Activating the account... Please try again');
                }else{
                    $this->session->set_flashdata('success' , 'Account has been successfully Activated');
                }
            redirect('client_accounts');

            }elseif($get_data->user_role == '2' || $get_data->user_role == '3' || $get_data->user_role == '4' ){
                 if(!$result){
                    $this->session->set_flashdata('error' , 'Something went wrong upon Activating the account... Please try again');
                }else{
                    $this->session->set_flashdata('success' , 'Account has been successfully Activated');
                }
            redirect('employee_accounts');
            }
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
    //
    
    public function view_account($id){
        
        $user_data = $this->AdminModel->get_user_info($id);

        if(!$user_data){
            $this->session->set_flashdata('error' , 'Account data unsucessfully retrieved... Please try again.');
            redirect('client_accounts');
        }else{
            $this->dynamic_view('view_user');
        }
    }

    public function view_feedbacks(){
      
                 $feedback_data['all_feedbacks'] = $this->AdminModel->get_feedback();
                 $feedback_data['average'] = $this->AdminModel->get_average_feedback();
              
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
                     $this->dynamic_view('glossary_management');
                 }else{
                      $this->load->view('admin/includes/login_header');
                      $this->load->view('admin/glossary_management' , $glossary_data );
                      $this->load->view('includes/footer');
                 }
    }
    public function validate_glossary(){
      
        $this->form_validation->set_rules('glossary_term' , 'GLOSSARY TERM' , 'trim|required');
        $this->form_validation->set_rules('glossary_meaning' , 'GLOSSARY MEANING' , 'trim|required');
    }
     public function validate_question(){
      
        $this->form_validation->set_rules('question' , 'PREDEFINED QUESTION' , 'trim|required');
       
    }
     public function create_question(){
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while posting your question... Please try again!!');
            redirect('predefined_questions');
        }else{
            $this->validate_question();
                if(!$this->form_validation->run() == TRUE){
                    $this->session->set_flashdata('error' , 'Something went wrong while validating predefined question... Please try again!!');
                    redirect('question_manager');
                }else{
                    $data_array = array(
                        'question_content' => $this->input->post('question'),
                        'date_created' => date('Y-m-d H:i:s')
                    );
                    $result = $this->AdminModel->post_question($data_array);

                    if(!$result){
                        $this->session->set_flashdata('error' , 'Cannot post question due to some unforseen problem... Please try again!!');
                        
                    }else{
                        $this->session->set_flashdata('success' , 'Successfully created predefined question... you can now view the question in the table below.');
                    }
                    redirect('question_manager');
                }
        }
    }
    public function create_glossary(){
      
        if(!$this->input->post()){
            $this->session->set_flashdata('error' , 'Something went wrong while creating GLOSSARY');
            redirect('glossary_management');
        }else{
            $this->validate_glossary();

            if(!$this->form_validation->run() == TRUE){
                $this->session->set_flashdata('error' , 'An error occured while validating post request! Please try again...');
                redirect('glossary_management');
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
    public function fetch_question($id){
    $question_data['this_question'] = $this->AdminModel->get_this_question($id);
    if(!$question_data){
            $this->session->set_flashdata('error' , 'The item you have chosen is unavailable or already deleted from the database...');
            redirect('question_manager');
        }else{
             $this->load->view('admin/includes/login_header');
             $this->load->view('admin/update_question' , $question_data );
             $this->load->view('includes/footer');
        }
    }
    public function update_question($id){
       if(!$this->input->post()){
           
            $this->session->set_flashdata('error' , 'Something went wrong while updating glossary terms & definition!! Please try again...');
            redirect('question_manager');

        }else{
            

                $question_data = array(
                    'question_content' => $this->input->post('question'),
                    'date_updated' => date('Y-m-d H:m:s')
                );
                $result = $this->AdminModel->update_this_question($question_data , $id);
                // var_dump($result);die();
                if(!$result){
                    $this->session->set_flashdata('error' , 'Predefined Question Update error has occurred!! No changes were made to the glossary Terms & Definitions.');
                    redirect('question_manager');
                }else{
                    $this->session->set_flashdata('success' , 'Predefined Question Update Successful!! ');
                    redirect('question_manager');
                }
            
        }
    }
     public function delete_question($id){
        
        $question_data = $this->AdminModel->delete_this_question($id);

        if(!$question_data){
            $this->session->set_flashdata('error' , 'Error!! Something went wrong while deleting Predefined Question... Please try again later');
        }else{
            $this->session->set_flashdata('success' , 'Successfully removed Predefined Question!');
        }
          redirect('question_manager');
    }
    public function fetch_glossary($id){
        $glossary_data['this_glossary'] = $this->AdminModel->get_this_glossary($id);
        if(!$glossary_data){
            $this->session->set_flashdata('error' , 'The item you have chosen is unavailable or already deleted from the database...');
            redirect('glossary_management');
        }else{
             $this->load->view('admin/includes/login_header');
             $this->load->view('admin/update_glossary' , $glossary_data );
             $this->load->view('includes/footer');
        }
    }

    public function update_glossary($id){
        
        if(!$this->input->post()){
           
            $this->session->set_flashdata('error' , 'Something went wrong while updating glossary terms & definition!! Please try again...');
            redirect('glossary_management');

        }else{
            
          

            
                $glossary_data = array(
                    'glossary_term' => $this->input->post('glossary_term'),
                    'glossary_meaning' => $this->input->post('glossary_meaning'),
                    'date_updated' => date('Y-m-d H:m:s')
                );
                $result = $this->AdminModel->update_this_glossary($glossary_data , $id);
                // var_dump($result);die();
                if(!$result){
                    $this->session->set_flashdata('error' , 'Glossary Update error has occurred!! No changes were made to the glossary Terms & Definitions.');
                    redirect('glossary_management');
                }else{
                    $this->session->set_flashdata('success' , 'Glossary Update Successful!! ');
                    redirect('glossary_management');
                }
            
        }
        // 
        // if(!$result){
        //     $this->session->set_flashdata('error' , 'Glossary Update Failed!! Please try again...');
        //     redirect('managements');
        // }else{
        //     $this->session->set_flashdata('success' , 'Glossary Update Successful... ');
        //     redirect('managements');
        // }
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
            $this->session->set_flashdata('error' , 'There is no entry in the database...');
            redirect('appointments');
        }else{
            if($message_data['appointment_status'] == "Unread"){
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
            }elseif($message_data['appointment_status'] == "Read"){
                 $message_data['message_data'] = $this->AdminModel->get_final_message($id);
                 if(!$message_data){
                      $this->session->set_flashdata('error' , 'Something went wrong while fetching message!! Please try again...');
                        redirect('appointments');
                 }else{
                        $this->load->view('admin/includes/login_header');
                        $this->load->view('admin/view_appointment' , $message_data );
                        $this->load->view('includes/footer');
                 }
                   
            }
           

            
            
        }
    }
    public function view_this_account($id){
        $data['view_account'] = $this->AdminModel->get_this_user($id);
        // var_dump($data);die();
        if(!$data){
            $this->session->set_flashdata('error' , 'This account is not in the system!! Please try again later...');
            redirect('user_accounts');
        }else{
             $this->load->view('admin/includes/login_header');
             $this->load->view('admin/view_account' , $data );
             $this->load->view('includes/footer');
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