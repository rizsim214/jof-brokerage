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

    <title>J.O.F Customs Brokerage</title>

  </head>
  <body>
<header>
      <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        
        <a class="navbar-brand " href="<?php echo base_url();?>"><span>CUSTOMS<img class="img-fluid mx-1" src="<?php echo base_url();?>assets/img/logo.png">BROKERAGE</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
               <a class="nav-link" href="<?php echo site_url('about');?>" id="navItem" >About</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#" id="navItem">Services</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?php echo site_url('support');?>" id="navItem">Support</a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('feedbacks');?>" id="navItem">Feedback</a>
            </li>
              <li class="nav-item">
               <a class="nav-link" href="<?php echo site_url('contacts');?>" id="navItem">Contact Us</a>
            </li>
            <li>
                 <a class="btn btn-md btn-danger ml-3" id="login-button" href="<?php echo base_url('login');?>" ><i class="fas fa-user-circle pr-2" style="font-size:18px;"></i>sign in</a>
            </li>           
          </ul>
            
              
            
         </div>
        
      </nav>
      

 
 </header>