<div class="container col-md-10 mx-auto">
<!-- <h1><?= $title; ?></h1>
   <h1><?= $id; ?>
   <?= $uRole; ?></h1> -->

   <input type="hidden" name="id" value="<?= $id; ?>">
   <?php echo validation_errors(); ?>

<div class="container">
<br>
<br>
<div class="row">
<h2 class="text-dark"> Account update for:  </h2><div> </div><h2><?= ucfirst($firstname) ?> <?= ucfirst($lastname) ?></h2>
</div>
<hr>

<p> This Account was created on: <?= $dateStart; ?> </p>


<?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $this->session->flashdata('error'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <?php } ?>
                         <?= form_open('editAccount/'.$id);?>

                        <div class="row">

                     
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name* </label>
                                <input type="text" class="form-control" name="first_name"  onkeydown="return alphaOnly(event);"
                                        onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
                                        onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" value="<?= $firstname ?>">
                            </div>
                             <div class="form-group col-md-6">
                                <label for="lastname">Last Name* </label>
                                <input type="text" class="form-control" name="lastname" onkeydown="return alphaOnly(event);"
                                    onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
                                      onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" value="<?= $lastname ?>" >
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="form-group col-md-6">
                                <label for="company_name">Company Name </label>
                                <input type="text" class="form-control" name="company_name"  value="<?= $companyName ?>">
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
                             <!--maxlength="11" minlength="11"  -->
                                <input type="text" class="form-control" name="contact"  value="<?= $cnt ?>">
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_pass">Password* </label>
                                <input type="password" class="form-control" oninput="checkPassword()" id="pass" name="password">
                            </div>
                             <div class="form-group col-md-6">
                               
                                <label for="confirm_pass">Confirm Password* </label>
                                <input type="password" class="form-control" oninput="checkPassword()" name="confirm" id="conf_pass">
                                <span style="color:red; display: none" id="password_message">Password do not match</span>
                            </div>
                        </div> 
                        <!-- echo ucfirst($firstname).' '.ucfirst($lastname).' '. "is Consignee"; -->

                       <?php if($uRole == 1)
                         { ?>  <label class="text-dark"> <?php   echo ucfirst($firstname).' '.ucfirst($lastname)?> is  Processor </label>
                        <?php }elseif($uRole == 2){?>
                        <label class="text-dark"> <?php   echo ucfirst($firstname).' '.ucfirst($lastname)?> is  Processor </label>
                      <?php  }elseif($uRole == 3){ ?>
                        <label class="text-dark"> <?php   echo ucfirst($firstname).' '.ucfirst($lastname)?> is  Accounting </label>
                      <?php  }elseif($uRole == 4){?>
                        <label class="text-dark"> <?php   echo ucfirst($firstname).' '.ucfirst($lastname); ?> is  Admin </label> <?php } ?>
                       

             <?php if($this->session->userRole == 4){  ?>
               <div class="form-group text-center">

                            <label for="uRole">Job Type <?php echo $uRole; ?></label>

                                    <select id="uRole"  name="uRole"  class="form-control">
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
                           <button type="submit" class="btn btn-md btn-primary mt-3 btn-md" name="submit">Update</button>
                           <a type="button" class="btn btn-secondary btn-md" style="margin-top:16px;" 
                           href="<?php if($this->session->userRole == 2) {
                                              echo base_url('broker');
    
                                    }elseif($this->session->userRole == 4) {
                                        echo base_url('admin');
                            
                                    }elseif($this->session->userRole == 3) {
                                        echo base_url('accounting');
                            
                                    }elseif($this->session->userRole == 1) {
                                        echo base_url('consignee');        } ?>">Cancel</a>
                            
           
                         <br>
                        </div>
                        <!-- <a type="button" class="btn btn-secondary btn-lg " href="<?php echo base_url('admin');?>">Cancel</a> -->
                        <?php echo form_close();?>
                 </div> 
             </div>
               
          </div>
      </div>
    </div> 


<script>
  function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
}
</script>









