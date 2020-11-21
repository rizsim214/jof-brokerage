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
}