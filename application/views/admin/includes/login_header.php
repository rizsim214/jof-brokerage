<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font_awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jof_styles.css">
    <link rel="icon" href="<?php echo base_url();?>assets/img/favicon.png" type="image/png">
  
    <title>J.O.F Customs Brokerage</title>

  </head>
  <body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light absolute-top">
<div class="container-fluid">
      
        
         <a class="navbar-brand" href="<?php echo base_url('admin');?>"><span class="pt-2">Admin Panel</span></a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

          <li class="nav-item">
               <a class="nav-item nav-link" href="<?php echo base_url('admin');?>"   id="adminName">Welcome <?= $this->session->user_this; ?></a>
            </li>
           
              <li class="nav-item">
               <a class="nav-link" href="#" data-toggle="modal" data-target="#optionModal" id="navItem">Options</a>
            </li> 

             <li class="nav-item">
                 <!-- Default dropleft button -->
                <div class="btn-group dropleft">
                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-optin-monster"></i>
                </button>
                <div class="dropdown-menu">
                
               
                    <a class="dropdown-item" href="<?php echo base_url('view_account');?>">View Account</a>
                   <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">TBD</a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('logout');?>">Logout</a>
                </div>
                </div> 
            </li>    
          </ul>
         </div>
      </div>
    </nav>
 </header>


 	 <div class=" modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title mx-auto text-dark" id="optionModalLabel">Selection of Options</h4>
                  
            </div>
             <div class="modal-body">
                  <div class="row">
                    <div class="container mx-auto my-2 ">
                            <a href="<?php echo base_url('user_accounts');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="AccountDropdown">VIEW ACCOUNTS</a>
                            <a href="<?php echo base_url('appointments');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="AppointmentsLink">APPOINTMENTS</a> 
                        </div>    
                  </div>
                    <div class="row">
                    <div class="container mx-auto my-2">
                            <a href="<?php echo base_url('financial_transaction');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="AccountingDropdown">ACCOUNTING</a>
                            <a href="<?php echo base_url('admin_feedback');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="FeedbacksLink">FEEDBACKS</a> 
                        </div>    
                  </div>
                    <div class="row">
                    <div class="container mx-auto my-2">
                            <a href="<?php echo base_url('faq_management');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="ManangementDropwdown">FAQs MANAGER</a>
                            <a href="<?php echo base_url('transactions');?>" class="btn btn-outline-danger col-md-5" aria-labelledby="TransactionsDropdown">TRANSACTIONS</a> 
                        </div>    
                  </div> 
             </div>
             <div class="modal-footer mx-auto">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
             </div>
          </div>
      </div>
    </div> 
