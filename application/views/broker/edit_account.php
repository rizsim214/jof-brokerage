
<!-- <h1><?= $title; ?></h1>
   <h1><?= $id; ?></h1> -->

   <input type="hidden" name="id" value="<?= $id; ?>">
   <?php echo validation_errors(); ?>

<div class="container">
<br>
<br>

<h1 class="text-dark"> Manage Account for: <?= ucfirst($firstname) ?> <?= ucfirst($lastname) ?> </h2>
<hr>

<p> This Account was created on: <?= $dateStart; ?> </p>

<div class="container">
                         <?= form_open('editAccount/'.$id);?>

                        <div class="row">

                     
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name* </label>
                                <input type="text" class="form-control" name="first_name" value="<?= $firstname ?>">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="lastname">Last Name* </label>
                                <input type="text" class="form-control" name="lastname" value="<?= $lastname ?>" >
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="form-group col-md-6">
                                <label for="company_name">Company Name </label>
                                <input type="text" class="form-control" name="company_name" value="<?= $companyName ?>">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="company_location">Company Location </label>
                                <input type="text" class="form-control" name="company_location" value="<?= $companyLoc ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email* </label>
                                <input type="email" class="form-control" name="email" value="<?= $email?>">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="contact">Contact Info* </label>
                                <input type="text" class="form-control" name="contact" value="<?= $cnt ?>">
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_pass">Password* </label>
                                <input type="password" class="form-control" name="password">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="confirm_pass">Confirm Password* </label>
                                <input type="password" class="form-control" name="confirm">
                            </div>
                        </div>

             <?php if($this->session->userRole == 4){  ?>
               <div class="form-group text-center">
                            <label for="user_role">Job Type</label>
                                    <select id="user_role"  name="user_role"  class="form-control">
                                        <option selected >--Select a role--</option>
                                        <option value="4">Administrator</option>
                                        <option value="3">Accounting</option>
                                        <option value="1">Consignee</option>
                                        <option value="2">Processor</option>
                                    </select>
             <?php }else{ echo "";
             }?>
             <hr>

                        <div class="text-center">
                           <button type="submit" class="btn btn-md btn-primary mt-3 btn-lg" name="submit">Update</button>
                           <a type="button" class="btn btn-secondary btn-lg" style="margin-top:16px;" href="<?php echo base_url('admin');?>">Cancel</a>
                         <br>
                        </div>
                        <!-- <a type="button" class="btn btn-secondary btn-lg " href="<?php echo base_url('admin');?>">Cancel</a> -->
                        <?php echo form_close();?>
                 </div> 
             </div>
               
          </div>
      </div>
    </div> 












