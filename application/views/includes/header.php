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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jof_styles.css">
    <title>JOF Customs Brokerage</title>
  </head>

<body>
<nav class="navbar navbar-dark navbar-expand-lg ">
  <a class="navbar-brand mb-0 h1" href="<?php echo base_url();?>">
      Customs
       <img src="<?php echo base_url();?>assets/img/logo.png" class="d-inline-block align-top" width="35" height="35" alt="logo" loading="jof_logo">
      Brokerage
  </a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">FAQs</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="navbarDropdown">
          <a class="dropdown-item" href="#">Set   Appointment</a>
          <a class="dropdown-item" href="#">Terms & Agreement</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Contact US</a>
        </div>
      </li>
    </ul>
</div>

<a class="btn btn-md btn-light">Sign In</a>

</nav>