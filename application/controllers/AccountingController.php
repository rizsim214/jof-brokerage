<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountingController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('AdminModel');
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

    public function bill($id){
        $data['transaction_id'] = $id;
        $data['billing_items'] = $this->AdminModel->getBillingItems();
        $this->load->view('accounting/includes/header');
        $this->load->view('accounting/bill', $data);
        $this->load->view('includes/footer');

    }

    public function billingSubmit(){

        $post_transaction_billing = array(
            "transaction_id" => $this->input->post("transaction_id") ,
            "customer_id" => $this->input->post("customer_id") ,
            "date" => $this->input->post("date") ,
            "bill_to" => $this->input->post("bill_to") ,
            "invoice_no" => $this->input->post("invoice_no") ,
            "customer_po" => $this->input->post("customer_po") ,
            "shipping_method" => $this->input->post("shipping_method") ,
            "payment_term" => $this->input->post("payment_term") ,
            "shipping_date" => $this->input->post("ship_date") ,
            "due_date" => $this->input->post("due_date") ,
        );

    }
}