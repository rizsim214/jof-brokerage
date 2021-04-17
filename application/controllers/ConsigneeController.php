<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsigneeController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->model('ConsigneeModel');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->helper('array');
        $this->load->model('AdminModel');
        $this->conId = $this->session->userdata('user_ID');
        $this->data['transactions'] = $this->ConsigneeModel->getTransactions($this->conId);

        $user_logged = $this->session->userdata();
            if(!$user_logged['isUserLoggedIn'] == TRUE){
                redirect('home');
            }
    }

    public function index(){
      
        $this->dynamic_view();
    }

     public function dynamic_view($page = 'dashboard'){
       if(!file_exists(APPPATH.'views/consignee/'.$page.'.php')){
			show_404();
		}else{
           
            $this->load->view('consignee/includes/login_header');
            $this->load->view('consignee/'.$page, $this->data);
            $this->load->view('includes/footer');
            
        }
    }

    public function billing($id, $transaction_number){
        $data['transaction_id'] = $id;
        $data['transaction_number'] = $transaction_number;
        $data['name'] = $this->session->userdata('fullname');
        $data['billing_items'] = $this->AdminModel->getBillingItems();
        

        $data['transaction_billing'] = $this->AdminModel->getTransactionbilling($transaction_number);

 


        $this->load->view('consignee/includes/login_header');
        $this->load->view('consignee/billing', $data);
        $this->load->view('includes/footer');

    }

    public function rate_transaction(){
        $data = array(
            'user_fk_ID' => $this->conId,
            'transaction_id' => $this->input->post('transaction_id'),
            'message' => $this->input->post('message'),
            'rating' => $this->input->post('rating_number'),
            'date_posted' => date('Y-m-d')
            );

            $this->ConsigneeModel->insertRating($data);

            echo '<script>alert("Rate Added")
            history.back()
          </script>';
    }
    public function sendFiles(){

        $config['upload_path'] =  './assets/uploads/files';
      
        $config['allowed_types'] = 'jpg|jpeg|png|docs|pdf|docx|doc';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = FALSE;
        // $config['max_size'] = '5000'; //1 MB

        $this->load->library('upload', $config);
        
        $rand = date('Y-m-d H:i:s');
        $rand = preg_replace("/[^0-9]/", "", $rand);
     
        if($this->input->post('import')){
            
            $data = array(
                'consignee_id' => $this->conId,
                'transaction_number' => 'TR-' . $rand,
                'transaction_type' => 'import',
                'date_posted' => date('Y-m-d H:i:s')
                );
            if (!empty($_FILES['bureau']['name'])){
          
            $result = $this->upload->do_upload('bureau');
         
             $data += array(
                'bureau'  => $_FILES['bureau']['name']
                );

                
             }

             if (!empty($_FILES['packing']['name'])){
          
                $this->upload->do_upload('packing');
                
                 $data += array(
                    'packing'  => $_FILES['packing']['name']
                    );

                    
                 }
            if (!empty($_FILES['commercial']['name'])){
          
                    $this->upload->do_upload('commercial');
                    
                    $data += array(
                        'commercial'  => $_FILES['commercial']['name']
                    );
    
                        
            }
            if (!empty($_FILES['bill']['name'])){
          
                    $this->upload->do_upload('bill');
                        
                    $data += array(
                        'bill'  => $_FILES['bill']['name']
                    );
                            
            }
            
            
         }
        

         if($this->input->post('export')){
            $data = array(
                'consignee_id' => $this->conId,
                'transaction_number' => 'TR-' . $rand,
                'transaction_type' => 'export',
                'date_posted' => date('Y-m-d H:i:s')
                );

             if (!empty($_FILES['bureau']['name'])){
          
            $result = $this->upload->do_upload('bureau');
       
             $data += array(
                'bureau'  => $_FILES['bureau']['name']
                );

                
             }

             if (!empty($_FILES['packing']['name'])){
          
                $this->upload->do_upload('packing');
                
                 $data += array(
                    'packing'  => $_FILES['packing']['name']
                    );

                    
                 }
            if (!empty($_FILES['commercial']['name'])){
          
                    $this->upload->do_upload('commercial');
                    
                    $data += array(
                        'commercial'  => $_FILES['commercial']['name']
                    );
    
                        
            }
        }
        $this->ConsigneeModel->insertTransaction($data);
    echo '<script>alert("Transcation Inserted")
           history.back()
         </script>';
}
}