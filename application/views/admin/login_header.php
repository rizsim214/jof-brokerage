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
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
<div class="container-fluid">
      
        
         <a class="navbar-brand" href="<?php echo base_url('admin');?>"><span class="mt-2">Admin Panel</span></a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
           
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
                <a class="dropdown-item" href="#">Manage Account</a>
                
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
                 <h4 class="modal-title mx-auto" id="optionModalLabel">Select Options</h4>
                  
            </div>
             <div class="modal-body">
                  <div class="row">
                    <div class="container mx-auto my-2 ">
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="CreateAccount">CREATE ACCOUNT</a>
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="ViewClientInfo">CONSIGNEES</a> 
                        </div>    
                  </div>
                    <div class="row">
                    <div class="container mx-auto my-2">
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="SetClientBill">ACCOUNTING</a>
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="ViewClientBalances">BALANCES</a> 
                        </div>    
                  </div>
                    <div class="row">
                    <div class="container mx-auto my-2">
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="ViewAppointments">APPOINTMENTS</a>
                            <a href="#" class="btn btn-outline-danger col-md-5" aria-labelledby="AvailableProcessors">PROCESSORS</a> 
                        </div>    
                  </div> 
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               
             </div>
          </div>
      </div>
    </div>
<!-- 
  <form method="post" action="<?php echo base_url('HomeController/setAppointment'); ?>">
  	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Set Appointment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Full Name*</label>
            <input type="text" name="name" class="form-control" id="full-name" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Contact Number*</label>
            <input type="text" name="contact" class="form-control" id="contact-text" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Email Address*</label>
            <input type="email" name="email" class="form-control" id="email-text" required>
          </div>
          <div class="form-group" >
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="message-text" style="padding-bottom: 100px;" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Submit</button>
        <div class="modal fade" id="myModal" role="dialog">
        </form>
        
    <div class="modal-dialog">
    
      <!-- Modal content
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <p href= "<?php echo base_url('jofcontroller/view/signup')?>">Appointment Sent</p>
        </div>
      </div>

    </div>
  </div>

   	 </div>
 	</div>
	</div>
</div> -->