
   
<div class="form " >
     <img src="<?php echo base_url();?>assets/img/about.jpg" class="form_img">
           <div class="form_content"> 
               <?php echo form_open();?>
                <h1 class="form_title">Welcome</h1>
                    <div class="form__div form__div-one">
                        <div class="form__icon">
                            <i class="fas fa-user-circle"></i>
                                </div>
                                    </div>
                    <div class="form__div form__div-input">
                        <h4 for="" class="form__label form__label-one">Email </h4>
                            <input class="form__input" type="email" name="emailAdd" >
                                
                    </div>
                     <div class="form__div">
                        <div class="form__icon">
                            <i class="fas fa-lock"></i>
                                </div>
                                    </div>
                     <div class="form__div form__div-input">
                         <h4 for="" class="form__label form__label-two">Password</h4>
                             <input class="form__input" type="password" name="pass"  >
                                 
                                      </div>
                    <a href="#" class="forgot__password">Forgot Password?</a>
                    <input type="submit" class="form__button" value="Sign In" name="signin">
            <?php echo form_close();?>
            </div>
</div>
