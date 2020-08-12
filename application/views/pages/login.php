
<div class="l-form">
    <div class="shape1"></div>
    <div class="shape2"></div>

   
    <div class="form">
        <img class="<?php echo base_url();?>assets/img/quickExpress.png" class="form__img">
            <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php }?>
             <div class="container col-md-5 container__shadow ">
                
                <?php echo form_open('login_account');?>
                    <img src="<?php echo base_url();?>assets/img/avatar.png" class="user__img">
                     <h1 class="form__title text-center py-2">User Login</h1>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="email" class="form__label col-md-4"><i class="fas fa-user mr-1"></i>Email </label>
                                     <input type="email" class="form-control col-md-7 mx-2" name="email" placeholder="email">
                                        <div class="invalid-feedback" ><?php echo form_error('email'); ?></div>                                     
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="pass" class="form__label col-md-4"><i class="fas fa-lock mr-1"></i>Password</label>
                                     <input type="password" class="form-control col-md-7 mx-2" name="password" placeholder="password">
                                     <div class="invalid-feedback" ><?php echo form_error('password'); ?></div>  
                            </div>
                        </div>

                        <a href="#" class="forgot__password">Forgot Password?</a>

                        <div class="form__login ">
                             <button class="btn btn-md btn-danger form__login-btn " type="submit" name="login" >Login</button>
                       </div>                        
                <?php echo form_close();?>
             </div>
        </div>       
                                                                    
    
<?php echo form_open('Appointment');?>
        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
               <div class="modal-header ">
                   <h4 class="modal-title mx-auto " id="contactModalLable">Fill up the Fields with (*)</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
              <div class="modal-body">
              <div class="row">
                  <div class="form-group col-md-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" name="firstName" placeholder="First Name">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" name="lastName" placeholder="Last Name">
                     </div>
                  </div>
                  
                  <div class="row">
                     
                     <div class="form-group col-md-6">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="contact">Contact Info</label>
                        <input type="text" class="form-control" name="contact" placeholder="Contact">
                     </div>
                  </div>
                  
                  <div class="form-group">
                     <label for="subject">Subject</label>
                     <input type="text" class="form-control" name="subject" placeholder="Subject">
                  </div>
                  <div class="form-group">
                     <label for="message">Message</label>
                     <textarea name="message"  class="form-control" rows="3" required="required" ></textarea>
                  </div>
              </div>
              <div class="modal-footer">
              
                <button type="button" onclick="alert('Message Sent! Thank you for Contacting Us');" name="submit" class="btn btn-danger" data-dismiss="modal">Submit</button>
               
              </div>
          </div>
    </div>
    <?php echo form_close();?>
</div>

