
<div class="l-form">
    <div class="shape1"></div>
    <div class="shape2"></div>


    <div class="form">
        <img class="<?php echo base_url();?>assets/img/quickExpress.png" class="form__img">
            
             <div class="container col-md-6 container__shadow contactPage_container mx-auto " >
                <?php if($this->session->flashdata('error')) {?>
                 <div class="alert alert-danger mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('error');?>
                            </div>
                              <?php }elseif($this->session->flashdata('success')) {?>
                                <div class="alert alert-success mt-5 col-md-8 mx-auto " role="alert">
                       <?php echo $this->session->flashdata('success');?>
                            </div>
                              <?php }?>
                <?php echo form_open('login_account');?>
                    <img src="<?php echo base_url();?>assets/img/avatar.png" class="user_img">
                     <h1 class="form__title text-center py-2">Login Account</h1>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="email" class="form__label col-md-4"><i class="fas fa-user mr-1"></i>Email </label>
                                     <input type="email" class="form-control col-md-7 mx-2" name="email" placeholder="Email Address">
                                        <div class="invalid-feedback" ><?php echo form_error('email'); ?></div>                                     
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="pass" class="form__label col-md-4"><i class="fas fa-lock mr-1"></i>Password</label>
                                     <input type="password" class="form-control col-md-7 mx-2" name="password" placeholder="Password">
                                     <div class="invalid-feedback" ><?php echo form_error('password'); ?></div>  
                            </div>
                        </div>
                        
                        <a href="#" class="forgot__password">Forgot Password?</a>
                        
                        <div class="form__login ">
                        <p class="text-center mx-auto sign_up" >Not signed up yet? Click here <a href="<?php echo site_url('register_client');?>" class="ml-1">Sign Up</a></p>
                             <button class="btn btn-md btn-success form__login-btn  " type="submit" name="login" >Login</button>
                       </div>                        
                <?php echo form_close();?>
             </div>
           
             
                                                                    
    <hr>
        <div class="copyright text-center mb-2 " >Copyright: JOF CUSTOMS BROKERAGE 2020</div>

    </div>

