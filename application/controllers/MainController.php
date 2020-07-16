<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct(){
        parent:: __construct();
        $this->load->helper('form');
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

    public function login(){
        echo "You have succesfully logged in!!";
    }


}
