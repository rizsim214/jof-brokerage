<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountingController extends CI_Controller {

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
       if(!file_exists(APPPATH.'views/accounting/'.$page.'.php')){
			show_404();
		}else{
           
            $data['transactions'] = $this->AdminModel->getAllTransactions();

            if($this->session->userdata('success')){
                $data['success'] = $this->session->userdata('success');
            }
    
            if($this->session->userdata('error')){
    
                $data['error'] = $this->session->userdata('error');
               
            }

            $this->load->view('accounting/includes/header');
            $this->load->view('accounting/'.$page, $data);
            $this->load->view('includes/footer');
            
        }
    }

    public function bill($id, $transaction_number, $first_name, $last_name){
        $data['transaction_id'] = $id;
        $data['transaction_number'] = $transaction_number;
        $data['name'] = $first_name . ' ' .$last_name;
        $data['billing_items'] = $this->AdminModel->getBillingItems();


        $data['transaction_billing'] = $this->AdminModel->getTransactionbilling($transaction_number);

 
 
        if($this->session->userdata('success')){
            $data['success'] = $this->session->userdata('success');
        }

        if($this->session->userdata('error')){

            $data['error'] = $this->session->userdata('error');
           
        }

        $this->load->view('accounting/includes/header');
        $this->load->view('accounting/bill', $data);
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
            $this->session->set_flashdata('success', 'Transaction Updated Successfully');
        }else{
            $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
        }
    
        redirect('AccountingController/dynamic_view');
    }
    public function uploadFile(){
        $config['upload_path'] =  './assets/uploads/files';
      
        $config['allowed_types'] = 'jpg|jpeg|png|docs|pdf|docx|doc';

        $this->load->library('upload', $config);
        
        $rand = date('Y-m-d H:i:s');
        $rand = preg_replace("/[^0-9]/", "", $rand);

        if (!empty($_FILES['billingfile']['name'])){
          
            $result = $this->upload->do_upload('billingfile');
         
             $data = array(
                'billing_file'  => $_FILES['billingfile']['name'],
                );

                $resultUpdate = $this->AdminModel->updateTransaction($this->input->post('transaction_id'),$data);

                if($resultUpdate){
                    $this->session->set_flashdata('success', 'Billing file uploaded successfully');
                }else{
                    $this->session->set_flashdata('error', 'There was an error updating. Please try again.');
                }
            
                redirect('AccountingController/dynamic_view');
        }


    }
}