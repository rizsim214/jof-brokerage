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
   
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/custom_style.css">
    <title>J.O.F Customs Brokerage</title>

  </head>
  <body>
<header>
  <nav class="navbar navbar-expand-lg navbar-light absolute-top">
<div class="container-fluid">
      
        
         <a class="navbar-brand" href="<?php echo base_url('consignee');?>"><span class="pt-2">Consignee Panel</span></a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
           
          <li class="nav-item">
               <a class="nav-link" href="#"  id="navItem">Welcome <?= $this->session->fullname; ?></a>
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
                    <a class="dropdown-item" href="#">View Account</a>
                <a class="dropdown-item" href="<?php echo base_url('editAccount/'); ?><?= $this->session->user_ID?>">Manage Account</a>
                
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

<!-- <div id="content">
    <span class="slide">
        <a href="#" onclick="openSlideMenu()">
          <i class="fas fa-bars"></i>
        </a>
    </span>
  <div class="nav" id="menu" aria-hidden="true">
      <a href="#" class="close" onclick="closeSlideMenu()">
        <i class="fas fa-times"></i>
	  </a>
	  
      <a href="#">ACCOUNTS</a>
      <a href="#">APPOINTMENTS</a>
      <a href="#">FINANCE</a>
      <a href="#">FEEDBACKS</a>
      <a href="#">TRANSACTIONS</a>

  </div> -->


 	 <div class=" modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                 <h4 class="modal-title mx-auto" id="optionModalLabel">Selection of Options</h4>
                  
            </div>
             <div class="modal-body">
                  <div class="row">
                    <div class="container mx-auto my-2 ">
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="AccountDropdown">IMPORT</a>
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="AppointmentsLink">EXPORT</a> 
                        </div>    
                  </div>
                 
             </div>
             <div class="modal-footer mx-auto">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
             </div>
          </div>
      </div>
    </div> 
