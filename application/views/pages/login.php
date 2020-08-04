
<div class="l-form">
    <div class="shape1"></div>
    <div class="shape2"></div>

    <div class="form">
        <img class="<?php echo base_url();?>assets/img/quickExpress.png" class="form__img">
           
             <div class="container col-md-5 container__shadow ">
                <?php echo form_open();?>
                    <img src="<?php echo base_url();?>assets/img/avatar.png" class="user__img">
                     <h1 class="form__title text-center py-2">User Login</h1>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="email" class="form__label col-md-4"><i class="fas fa-user mr-1"></i>Email </label>
                                     <input type="email" class="form-control col-md-7 mx-2" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group my-2">
                            <div class="row">
                                 <label for="pass" class="form__label col-md-4"><i class="fas fa-lock mr-1"></i>Password</label>
                                     <input type="password" class="form-control col-md-7 mx-2" placeholder="password">
                            </div>
                        </div>

                        <a href="#" class="forgot__password">Forgot Password?</a>

                        <div class="form__login ">
                             <button class="btn btn-md btn-danger form__login-btn " type="submit" name="login" >Login</button>
                       </div>                        
                <?php echo form_close();?>
             </div>
        </div>       
                                                                    
    

</div>

