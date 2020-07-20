<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font_awesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jof_styles.css">
    <title>JOF Customs Brokerage</title>
  </head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg sticky-top ">
<div class="container-fluid row">
  <a class="navbar-brand mb-n1" href="<?php echo base_url();?>">
      Customs
        <img src="<?php echo base_url();?>assets/img/logo3.png" class="d-inline-block align-top" width="35" height="35" alt="logo" loading="jof_logo">
      Brokerage
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto py-n1">
     <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdown">

          <div class="d-flex py-2 ">
             <a class="dropdown-item pr-2" href="#"><i class="fas fa-plane pr-2" style="font-size:18px;"></i>Airway Shipping</a>
          </div>
           <div class="d-flex py-2">
             <a class="dropdown-item pr-2" href="#"><i class="fas fa-book pr-2" style="font-size:18px;"></i> Consultations</a>  
           </div>
          <div class="d-flex py-2">
            <a class="dropdown-item pr-2" href="#"><i class="fas fa-group pr-2" style="font-size:18px;"></i>Domestic/International</a>
          </div>
           <div class="d-flex py-2 pr-2">          
             <a class="dropdown-item pr-2" href="#"><i class="fas fa-ship pr-2" style="font-size:18px;"></i>Ocean Shipping</a>
           </div>
           <div class="d-flex py-2">
               <a class="dropdown-item pr-2" href="#"><i class="fas fa-handshake-o pr-2" style="font-size:18px;"></i>Request a Qoute</a>
           </div>
          <div class="d-flex py-2"> 
              <a class="dropdown-item pr-2" href="#"><i class="fas fa-truck pr-2" style="font-size:18px;"></i>Trucking Agents</a>
          </div>
          <div class="d-flex py-2">
             <a class="dropdown-item pr-2"  href="#"><i class="fas fa-building pr-2" style="font-size:18px;"></i> Warehousing</a>
          </div>
        </div>
      </li>
      <li class="nav-item <?php if($this->uri->uri_string() == 'about'){ echo 'active'; }?>">
        <a class="nav-link " href="<?php echo base_url('about');?>">About Us</a>
      </li>
       <li class="nav-item <?php if($this->uri->uri_string() == 'resources'){ echo 'active'; }?>">
        <a class="nav-link" href="<?php echo base_url('resources');?>">Resources</a>
      </li>
       <li class="nav-item <?php if($this->uri->uri_string() == 'news'){ echo 'active'; }?>">
        <a class="nav-link" href="<?php echo base_url('news');?>">News</a>
      </li>
      <li class="nav-item <?php if($this->uri->uri_string() == 'faqs'){ echo 'active'; }?>">
        <a class="nav-link" href="<?php echo base_url('faqs');?>">FAQs</a>
      </li>
     
    </ul>
</div>
      
   
    <a href="<?php echo base_url('login');?>" class="btn btn-md btn-outline-light mt-1" id="login"><i class="fas fa-user-circle pr-2" style="font-size:18px;"></i>Login</a>
</div>
</nav>