
<div class="container-fluid register_container my-5">
    <div class="col-md-10 mx-auto ">
    <h1 class="text-center">Client Registration</h1>
      <p class="text-center">Field with asterisks(*) must be filled</p>

      <div class="col-md-8 mx-auto my-4">
               <?php if($this->session->flashdata('error')){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php }elseif($this->session->flashdata('success')) { ?>
                     <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php }?>
             </div>
        <div class="container mt-3" >

                        <?php echo form_open('landing_client_registration');?>
                        <?php echo form_hidden('token', random_string('alnum', 16)); ?>
                           <div class="row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name* </label>
                                <input type="text" class="form-control <?php echo form_error('firstname') ? 'is-invalid' : '';?>" onkeydown="return alphaOnly(event);"
                                 onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
                                 onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" name="firstname" >
                                 <div class="invalid-feedback" ><?php echo form_error('firstname') ? form_error('firstname') : '';?></div>
                            </div>
                             <div class="form-group col-md-6">
                                <label for="lastname">Last Name* </label>
                                <input type="text" class="form-control <?php echo form_error('lastname') ? 'is-invalid' : '';?>" onkeydown="return alphaOnly(event);"
                                 onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
                              onfocus="if (this.value == 'Type Letters Only') {this.value = '';}" name="lastname">
                                 <div class="invalid-feedback" ><?php echo form_error('lastname') ? form_error('lastname') : '';?></div>
                            </div>
                        </div>

                        <div class="row">
                        
                            <div class="form-group col-md-6">
                                <label for="company_name">Company Name* </label>
                                <input type="text" class="form-control" name="company_name">
                               
                            </div>
                             <div class="form-group col-md-6">
                                <label for="company_location">Company Location* </label>
                                <input type="text" class="form-control " name="company_location">
                                 
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email* </label>
                                <input type="email" class="form-control <?php echo form_error('email') ? 'is-invalid' : '';?>" name="email">
                                 <div class="invalid-feedback" ><?php echo form_error('email') ? form_error('email') : '';?></div>
                            </div>
                             <div class="form-group col-md-6">
                                <label for="contact">Contact Info* </label>
                                <input type="text" class="form-control <?php echo form_error('contact') ? 'is-invalid' : '';?>" name="contact">
                                 <div class="invalid-feedback" ><?php echo form_error('contact') ? form_error('contact') : '';?></div>
                                 
                            </div>
                        </div>
                         <div class="row">
                            <div class="form-group col-md-6">
                                <label for="user_pass">Password* </label>
                                <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '';?>" name="password">
                                 <div class="invalid-feedback" ><?php echo form_error('password') ? form_error('password') : '';?></div>
                            </div>
                             <div class="form-group col-md-6">
                                <label for="confirm_pass">Confirm Password* </label>
                                <input type="password" class="form-control <?php echo form_error('confirm') ? 'is-invalid' : '';?>" name="confirm">
                                 <div class="invalid-feedback" ><?php echo form_error('confirm') ? form_error('confirm') : '';?></div>
                                
                            </div>
                        </div>
                            <div class="form-group col-md-4 mx-auto">
                            <!--  -->
                                <div class="g-recaptcha" data-sitekey="6LcP4AYaAAAAAG7VbrYvgOEyctnUMvRGtQwWFKT4"></div>
                            </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="checked" name="check">
                                Before you proceed, do you accept the company's terms and agreements? <a href="<?= site_url('term_of_use');?>">Terms & Agreements</a>
                            </label>
                           
                        </div>
                        
                        
                           <div class=" text-center ">
                             <button  type="submit" class="btn btn-md btn-danger mt-3 mx-2 " name="submit" value="submit" >Register</button>
                              <a  href="<?php echo base_url();?>" class="btn btn-md btn-secondary mt-3 mx-2 " >Back</a>
                           </div>
                   <?php echo form_close();?>
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


